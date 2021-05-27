<?php
session_start();
include('connection.php');
include('a_config.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $PAGE_TITLE; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />

		<style type="text/css">
			.back{
				  background-position: center;
				  background-attachment: fixed;
				  background-repeat: no-repeat;
				  background-image: url("image/banner.jpg");
				  background-blend-mode: overlay;
				  background-color: #ffffff47;
				}
		</style>
	</head>



	<body>
		<div class="back">
		<div class="content">

			<?php include 'loginheader.php';
			?>



			<div style="margin-top: 9%;">
			<h1 class="text-center my-5" style="color: navy;"> Contact Us</h1>
			<div class="row" style="margin-left: 0px; margin-right: 0px;">
				<div class="col-md-3">
				</div>
				<div class="col-md-6 shadow-lg p-3 mb-5 bg-white rounded">
					<form method="post">
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" class="form-control" id="name"  name="name" required />
						</div>
						<div class="form-group">
							<label for="phone">Contact No:</label>
							<input type="text" class="form-control" id="phone" name="phone" pattern="[0-9]{10}" required />
						</div>
						<div class="form-group">
							<label for="email">Email address:</label>
							<input type="email" class="form-control" id="email" name="email" required />
						</div>
						<div class="form-group">
							<label for="message">Message:</label>
							<textarea class="form-control" id="message" name="message" required ></textarea>
						</div>
						<input type="submit" name="submit" class="btn btn-primary" />
					</form>
				</div>
				<div class="col-md-3">
				</div>
			</div>
		</div>

		</div>
		<?php
		include('footer.php');
		?>
		
		<?php
		if(isset($_POST["submit"]))
		{
			$name = mysqli_real_escape_string($con, $_POST["c_name"]);
			$email = mysqli_real_escape_string($con, $_POST["c_email"]);
			$phone = mysqli_real_escape_string($con, $_POST["c_phone"]);
			$message = mysqli_real_escape_string($con, $_POST["c_msg"]);
			$error =false;

			$query = "INSERT INTO `contact`(`c_name`, `c_name`, `c_phone`, `c_msg`) VALUES ('".$name."', '".$email."', '".$phone."', '".$message."')";

			$result = mysqli_query($con, $query);
			
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		        $error = true;
		         echo "Please Enter Valid Email ID!";
				echo "<script> window.history.go(-1); </script>";

		        }
			else{

				if ($result) {
						
					echo "<script>alert('Successfully message sent!');window.location.href='contactus.php';</script>";
					}
				}
		}
		?>
		</div>
	</body>
</html>
