<?php
session_start();
include("../connection.php");
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$valid_extensions = array('xls', 'xlsx');
		$path = '../file/';
		$file = $_FILES['file_image']['name'];
		$tmp = $_FILES['file_image']['tmp_name'];
		$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
		if(in_array($ext, $valid_extensions)) 
		{ 
			$path = $path.strtolower($file);
			if(move_uploaded_file($tmp,$path))
			{
				$edit_id = $_POST["edit_id"];
				$auditor=$_POST["hiddenid"];
				$agent = $_POST["agent_name"];
				$task = $_POST["taskname"];
				$adate = $_POST["adate"];
				$ddate = $_POST["ddate"];
			
				  $query2 = "INSERT INTO `task`(`Tid`, `Aid`, `Agentid`, `Task_name`, `assigned_date`, `due_date`, `filepath`, `status`, `tscore`, `ascore`) VALUES ('".$edit_id."','".$auditor."','".$agent."','".$task."','".$adate."','".$ddate."','".$file."','Assigned','','')";
				
					 if(mysqli_query($con, $query2))
					 {
					 echo 'Task Details Added Successfully';
					 }
		    }
			else{
				echo 'Not Added Successfully';
			}		
		}
	
	else 
	{
		echo 'invalid file extension, only .jpg, .jpeg and .png extensions are allowed';
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
else if(isset($_POST["finish"]))
{
	$query = "Update ebook set status='finish' WHERE Eid = '".$_POST["cid"]."'";
	if(mysqli_query($con, $query))
	{
		echo 'Data Updated Successfully';
	}
    //	echo json_encode($output);
}
else if(isset($_POST["del"]))
{
	$query = "Select * from ebook where eid = '".$_POST["cid"]."'";

	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$output["Eid"] = $row["Eid"];
	$output["ebookname"] = $row["Ebname"];
	echo json_encode($output);
} 
else if(isset($_POST["operation1"]))
{
	$query = "DELETE FROM ebook WHERE Eid = '".$_POST["cid1"]."'";
	//echo $query;
	if(mysqli_query($con, $query))
	{
		echo 'Data Deleted Successfully';
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
	$query .= "Select e.*,concat(a.Afname,' ',a.Alname) as Name from ebook e inner join author a on a.Aid=e.Aid where a.Aid='".$_SESSION["Aid"]."'";
	if(!empty($_POST["searchPhrase"]))
	{
	 $query .= 'WHERE( a.Eid LIKE "%'.$_POST["searchPhrase"].'%" )';

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
	$query1 = "Select e.*,concat(a.Afname,' ',a.Alname) as Name from ebook e inner join author a on a.Aid=e.Aid where a.Aid='".$_SESSION["Aid"]."'";
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