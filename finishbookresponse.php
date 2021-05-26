<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;
include("connection.php");

 if(isset($_POST["process"]))
{
	$query = "SELECT e.*,concat(a.Afname,'',a.Alname) as name from ebook e inner join author a on e.Aid=a.Aid where Eid = '".$_POST["cid"]."'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$output["eid"] = $row["Eid"];
	$output["aname"] = $row["name"];
    $output["Ebname"] = $row["Ebname"];
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
else if(isset($_POST["downloadid"])){

 $query = "SELECT filepath from ebook where Eid = '".$_POST["cid"]."'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$file = urldecode($row["filepath"]); 

$filepath = "file/" . $file;
if(file_exists($filepath)) {

echo $filepath;

} else {
http_response_code(404);
die();
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
   // echo $_POST["emailid"];
$items = array();
$count = 0;
$emailid=$_POST["emailid"];
$ebookname=$_POST["ebookname"];
if(strpos($emailid, ",") != false) {
$emailid=rtrim($emailid,',');
}
else{
    $emailid=$emailid;
   
}

   
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
	$mail->Username = "aditidafda2404@gmail.com";    //id : //pass:            
	$mail->Password = "Aditi2404@2001";                           
	//If SMTP requires TLS encryption then set it
	$mail->SMTPSecure = "tls";                           
	//Set TCP port to connect to
	$mail->Port = 587;                                   
	
	$mail->From = "";
	$mail->FromName = "Online Ebook Maker";
	
	$mail->addAddress($emailid, "");
	
	$mail->isHTML(true);
	
	$mail->Subject = "Ebook";
	
	$mail->addAttachment("file/".$ebookname);
	$mail->Body = "<i>Dear ,</i> <br><br><i>Your Ebook ".$ebookname."  from Ebook Online Maker is Successfully delivered.</i><br><br>";
   
    try {
		$mail->send();
	   
		echo 'Ebook Process Mailed Successfully !';
	} catch (Exception $e) {
		throw $e;
		// echo 'Ebook Process failed !';
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
	$query .= "Select e.*,concat(a.Afname,' ',a.Alname) as Name from ebook e inner join author a on a.Aid=e.Aid WHERE e.status='finish'  ";
	if(!empty($_POST["searchPhrase"]))
	{
	 $query .= ' and e.Eid LIKE "%'.$_POST["searchPhrase"].'%" ';


	} 
	else
	{ 
	 $query .= 'ORDER BY e.Eid ASC ';
	} 
	if($records_per_page != -1)
	{
	 $query .= " LIMIT " . $start_from . ", " . $records_per_page;
	}
	$result = mysqli_query($con, $query);
	$query1 = "Select e.*,concat(a.Afname,' ',a.Alname) as Name from ebook e inner join author a on a.Aid=e.Aid  ORDER BY  eid ASC";
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