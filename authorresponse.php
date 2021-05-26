<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;
include("connection.php");
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
	
				$edit_id = $_POST["edit_id"];
				$fname = $_POST["fname"];
				$lname = $_POST["lname"];
				$email = $_POST["email"];
				$mobile = $_POST["mobile"];
				$address = $_POST["address"];
		     	$pass=substr($_POST["fname"],0,4).substr($mobile, -4);;
				
				 require_once "phpmailerautoload.php";
				 require 'Exception.php';
				 require 'PHPMailer.php';
				 require 'SMTP.php';
				 $mail = new PHPMailer(true);
				 
				 //Enable SMTP debugging.
				 $mail->SMTPDebug = 0;                               
				 //Set PHPMailer to use SMTP.
				 $mail->isSMTP();            
				 //Set SMTP host name                          
				 $mail->Host = "smtp.gmail.com";
				 //Set this to true if SMTP host requires authentication to send email
				 $mail->SMTPAuth = true;                          
				 //Provide username and password     
				 $mail->Username = "mailtestingw@gmail.com";    //id : //pass:            
				 $mail->Password = "testmail12345";                           
				 //If SMTP requires TLS encryption then set it
				 $mail->SMTPSecure = "tls";                           
				 //Set TCP port to connect to
				 $mail->Port = 587;                                   
				 
				 $mail->From = "";
				 $mail->FromName = "Increase Productivity Using Quality Management System";
				 
				 $mail->addAddress($email, "");
				 
				 $mail->isHTML(true);
				 
				 $mail->Subject = "Password Verification";
				 

				 $mail->Body = "<i>Dear Auditor,</i> <br><br><i>Your Registration at Increase Productivity Using Quality Management System is Successfull.</i><br><br><i>Login ID</i> :".$edit_id." <br><br><i>Password</i> :".$pass;
				 
				 
				 try {
					 $mail->send();
					 $query2 = "INSERT INTO `auditor`(`aid`, `fname`,`lname`, `mobile`, `email`, `address`, `password`) VALUES ('".$edit_id."','".$fname."','".$lname."','".$mobile."','".$email."','".$address."','".$pass."')";
					// echo $query2;Atis9999
					 if(mysqli_query($con, $query2))
					 {
					 echo 'Auditors Details Added Successfully';
					 }
				 } catch (Exception $e) {
					 echo 'Auditors Mail is invalid !';
				 }

				
	}
	 if($_POST["operation"] == "Edit")
	{
		$edit_id = $_POST["edit_id"];
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$email = $_POST["email"];
		$mobile = $_POST["mobile"];
		$address = $_POST["address"];
		
	
		
		$query = "UPDATE `auditor` SET `fname`='".$fname."', `lname`='".$lname."', `mobile`='".$mobile."', `email`='".$email."', `address`='".$address."'  WHERE `aid` = ".$edit_id." ";
		
		if(mysqli_query($con, $query))
		{
			echo 'Auditors Details Updated Successfully';
		}
	}
}

 else if(isset($_POST["edit"]))
{
	$query = "SELECT * FROM `auditor` WHERE aid = '".$_POST["cid"]."'";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result))
	{
		$output["aid"] = $row["aid"];
		$output["fname"] = $row["fname"];
		$output["lname"] = $row["lname"];
		$output["mobile"] = $row["mobile"];
		$output["email"] = $row["email"];
		$output["address"] = $row["address"];
	}
	echo json_encode($output);
}
else if(isset($_POST["del"]))
{
	$query = "SELECT *,concat(Afname,' ',Alname) as Name FROM author WHERE Aid = '".$_POST["cid"]."'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$output["aid"] = $row["Aid"];
	$output["audname"] = $row["Name"];
	echo json_encode($output);
} 
else if(isset($_POST["operation1"]))
{
	$query = "DELETE FROM author WHERE Aid = '".$_POST["cid1"]."'";
	if(mysqli_query($con, $query))
	{
		echo $query;
	}
}
else if(isset($_POST["approve"]))
{
	$query = "SELECT *,concat(Afname,' ',Alname) as Name FROM author WHERE Aid = '".$_POST["cid"]."'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$output["aid"] = $row["Aid"];
	$output["audname"] = $row["Name"];
	echo json_encode($output);
} 
else if(isset($_POST["operation2"]))
{
	$query = "update  author set status='Approved' WHERE Aid = '".$_POST["cid2"]."'";
	if(mysqli_query($con, $query))
	{
		echo 'Author Approved Successfully';
	}
}
else
{
	$query = '';
	$data = array();
	$records_per_page = 10;
	$start_from = 0;
	$current_page_number = 0;
	if(isset($_POST["rowCount"]))
	{
	 $records_per_page = $_POST["rowCount"];
	}
	else
	{
	 $records_per_page = 10;
	}
	if(isset($_POST["current"]))
	{
	 $current_page_number = $_POST["current"];
	}
	else
	{
	 $current_page_number = 1;
	}
	$start_from = ($current_page_number - 1) * $records_per_page;
	$query .= "SELECT *,concat(Afname,' ',Alname) as Name FROM author ";
	if(!empty($_POST["searchPhrase"]))
	{
	 $query .= 'WHERE (Aid LIKE "%'.$_POST["searchPhrase"].'%" )';
	
	} 
	else
	{ 
	 $query .= 'ORDER BY aid ASC ';
	} 
	if($records_per_page != -1)
	{
	 $query .= " LIMIT " . $start_from . ", " . $records_per_page;
	}
	$result = mysqli_query($con, $query);
	$query1 = "SELECT *,concat(Afname,' ',Alname) as Name FROM `author`";
	$result1 = mysqli_query($con, $query1);
	$total_records = mysqli_num_rows($result1);
	while($row = mysqli_fetch_assoc($result))
	{
	 $data[] = $row;
	}
		$output = array(
	 'current'  => intval($_POST["current"]),
	 'rowCount'  => $total_records,
	 'total'   => intval($total_records),
	 'rows'   => $data
	);
	echo json_encode($output);
} 
?>