<?php
include('connection.php');
include('loginheader.php');
$id = "";
	$select = "SELECT Aid FROM `author` ORDER by Aid desc LIMIT 1";
	$result1 = mysqli_query($con, $select);
	if($row1 = mysqli_fetch_array($result1))
	{
		$id = $row1["Aid"] + 1;
	}
	else
	{
		$id = 101;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $PAGE_TITLE; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<style type="text/css">
			.back{
				background-image: url(image/3.jpg);
				background-blend-mode: screen;
				background-size: cover;
				background-repeat: no-repeat;
				background-attachment: fixed;
			}

		</style>

</head>

<body>


<div class="back">
<div class="container my-5" style=" ">
<form method="post" id="product_form" style="margin-top: 10%; background-color: lightgrey; width: 55%; margin-left: 20%;">
	<h1 class="text-center" style="color: navy">Author Personal Details</h1>
	<br />
	<div class="row">
	<div class="col-md-3"></div>
    <div class="col-md-6">
	<label>Author Id :</label>
	<input type="text" name="aid" id="aid" class="form-control" value="<?php echo $id; ?>" readonly required/>	
    </div>
	<div class="col-md-3"></div>
	<div class="col-md-3"></div>
    <div class="col-md-6">
	<label>First Name :</label>
	<input type="text" name="first_name" id="first_name" Placeholder="First Name" class="form-control"   required/>	
    </div>
	<div class="col-md-3"></div>
	<div class="col-md-3"></div>
    <div class="col-md-6">
	<label>Last Name :</label>
	<input type="text" name="last_name" id="last_name" Placeholder="Last Name" class="form-control"   required/>	
    </div>
	<div class="col-md-3"></div>
	<div class="col-md-3"></div>
    <div class="col-md-6">
	<label>Mobile :</label>
	<input type="text" name="mobile" id="mobile" Placeholder="Mobile" class="form-control"   required/>	
    </div>
	<div class="col-md-3"></div>
	<div class="col-md-3"></div>
    <div class="col-md-6">
	<label>Email Id :</label>
	<input type="text" name="email_id" id="email_id"  Placeholder="Email ID" class="form-control"   required/>	
    </div>
	<div class="col-md-3"></div>
	<div class="col-md-3"></div>
    <div class="col-md-6">
	<label>Address :</label>
	<input type="text" name="address" id="address" Placeholder="Address" class="form-control"   required/>	
    </div>

	<div class="col-md-3"></div>
	<div class="col-md-3"></div>
    <div class="col-md-6">
	<label>Password :</label>
	<input type="password" name="pass" id="pass"  Placeholder="Password" class="form-control"   required/>
	<span toggle="#password-field"><i class="fa fa-eye toggle-password" aria-hidden="true"></i></span>	
    </div>

	<div class="col-md-3"></div>
	<div class="col-md-3"></div>
    <div class="col-md-6">
	<label>Confirm Password :</label>
	<input type="password" name="cpass" id="cpass"  Placeholder="Confirm Password" class="form-control"   required/>	
	<span toggle="#password-field"><i class="fa fa-eye toggle-password1" aria-hidden="true"></i></span>	
    </div>
	<div class="col-md-3"></div>
	


	<div class="col-md-3"></div>
    <div class="col-md-6 text-center">
<br/>

<button class="btn btn-primary"  name="submit" required>Submit</button>
    </div>
	<div class="col-md-3"></div>
	</div>
</div>

</form>
</div>
</div>

<?php

if(isset($_POST["submit"]))
{
	$aid = $_POST["aid"];
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$mobile = $_POST["mobile"];
	$email_id = $_POST["email_id"];
	$address = $_POST["address"];
	$pass = $_POST["pass"];
	$cpass = $_POST["cpass"];
	$error = false;

	if(!filter_var($email_id,FILTER_VALIDATE_EMAIL)) {
		echo "<script>alert('Please Enter Valid Email ID!');</script>";
		echo "<script> window.history.go(-1); </script>";		
        
    }
	elseif($pass!=$cpass){
		echo "<script>alert('Password And Confirm Password Not Matched!');</script>";
		echo "<script> window.history.go(-1); </script>";
	}
	else{
	$query2 = "select * from author where Aemail = '".$email_id."'";
	$result = mysqli_query($con, $query2);
	if($row = mysqli_fetch_array($result))
	{
		echo "<script>alert('Already registered with this email ID');</script>";
		echo "<script> window.history.go(-1); </script>";
	}
	else
	{
		
	 $query2 = "INSERT INTO `author`(`Aid`, `Afname`, `Alname`, `Aemail`, `Amobile`, `address`, `password`,`status`) VALUES ('".$aid."', '".$first_name."', '".$last_name."', '".$email_id."', '".$mobile."', '".$address."', '".$pass."', 'pending')";
	
		if(mysqli_query($con, $query2))
		{
			echo "<script>alert('Successfully Registered..Kindly Login Now');window.location.href='index.php?type=login';</script>";
		}
		
	}
}
}
include('footer.php');
?>
<style>
.toggle-password {
    float: right;
    margin-left: -25px;
    margin-top: -59px;
    position: relative;
    z-index: 2;
    top: 35px;
    right: 15px;
}
  .toggle-password1 {
    float: right;
    margin-left: -25px;
    margin-top: -59px;
    position: relative;
    z-index: 2;
    top: 35px;
    right: 15px;
}
</style>

<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<script>
$(document).on('click', '.toggle-password', function () {

$(this).toggleClass("fa-eye fa-eye-slash");


var input = $('#pass');

if (input.attr("type") === "password") {

	input.attr("type", "text");
} else {

	input.attr("type", "password");
}

});

$(document).on('click', '.toggle-password1', function () {

$(this).toggleClass("fa-eye fa-eye-slash");


var input1 = $('#cpass');

if (input1.attr("type") === "password") {

	input1.attr("type", "text");
} else {

	input1.attr("type", "password");
}



});

</script>
</body>
</html>