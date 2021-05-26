<?php
session_start();
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User registration</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	</head>
	<body>
		<div class="content">
			<div class="home_banner">
				<nav class="navbar navbar-expand-md">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<i class="fa fa-navicon" style="color: white; "></i>
					</button>
					<div class="collapse navbar-collapse" id="collapsibleNavbar">
						<h2 class="navbar-brand" style="font-size: 31px;">Car Sales And Inventory</h2>
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="index.php"><i class="fa fa-home"></i> Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="aboutus.php"><i class="fa fa-users"></i> About Us</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="contactus.php"><i class="fa fa-phone"></i> Contact Us</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="index.php?type=login"><i class="fa fa-lock"></i> Login</a>
							</li>
						</ul>
					</div> 
				</nav>

				<div class="container">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-12">
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12">
							<div class="lgndiv shadow-lg p-3 mb-5 bg-white rounded">
								<form method="post" id="registration_form">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<h3>Create your Account</h3>
											</div>
										</div>
										<div class="col-md-12" style="margin-top:4%;">
											<div class="form-group">
												<p class="text-white font-weight-bold text-left">Personel Details :</p>
												<hr class="text-white" style="width:24%;margin: 0;border-top: 3px solid white;margin-bottom:20px;" />
											</div>
										</div>
										<div class="col-md-4 px-0">
											<div class="form-group">
												<input type="text" name="fname" placeholder="First Name" class="txtbox" />
											</div> 
										</div>
										<div class="col-md-4 px-0">
											<div class="form-group">
												<input type="text" name="mname" placeholder="Middile Name" class="txtbox" />
											</div> 
										</div>
										<div class="col-md-4 px-0">
											<div class="form-group">
												<input type="text" name="lname" placeholder="Last Name" class="txtbox" />
											</div> 
										</div>
										<div class="col-md-4 px-0">
											<div class="form-group">
												<input type="number" name="phone" placeholder="Mobile Number" class="txtbox" />
											</div>
										</div>
										<div class="col-md-4 px-0">
											<div class="form-group"> 
												<input type="number" name="age" placeholder="Age" class="txtbox" />
											</div>
										</div>
										<div class="col-md-4 px-0">
											<div class="form-group">
												<input type="password" name="password" placeholder="Password" class="txtbox" />
											</div>
										</div>
										<div class="col-md-6 px-0">
											<div class="form-group">
												<input type="email" name="email" placeholder="Email Address" class="txtbox" />
											</div>
										</div>
										<div class="col-md-6 px-0">
											<div class="form-group"> 
												<textarea type="text" name="address" placeholder="Address" class="txtbox"></textarea>
												<br/>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<p class="font-weight-bold text-left" style="font-size:18px;">Gender :</p>
											</div>
											<div class="form-group text-left">
												<label class="radio-inline"><input type="radio" name="gender" value="male" /> &nbsp;Male</label>&nbsp;&nbsp;
												<label class="radio-inline"><input type="radio" name="gender" value="female" /> &nbsp;Female</label>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<input type="submit" name="submit" class="btn bg-white" id="btnlogin" value="Register" />
											</div>
											<div class="form-group">
												<label>Already Have An Account ? </label> <a href="index.php?type=login" class="text-uppercase text-white font-weight-bold">Sign In</a>
											</div> 
										</div>
									</div>
								</form>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-12">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		include('footer.php');
		?>
		<script type="text/javascript" language="javascript" >
			$( "#registration_form" ).validate({
			  rules: {
				  fname: {
				  required: true
				},
				mname: {
				  required: true
				},
				  lname:{
				  required: true
				  },
				  address:{
				  required: true
				  },
				  phone:{
				  required: true
				  },
				  age:{
				  required: true
				  },
				  password:{
				  required: true
				  },
				  email:{
				  required: true
				  },
				  gender:{
				  required: true
				  }
			  },
				messages: {
					fname: " * Insert First Name<br/>",
					mname: " * Insert Middile Name<br/>",
					lname: " * Insert Last Name<br/>",
					address: "* Insert Address",
					phone: "* Insert Contact Number",
					age: "* Insert age",
					password: "* Insert Password",
					email: "* Insert Email",
					gender: "* Select Gender",
				},
				errorPlacement: function(error, element) {
					if ( element.is(":radio") ) {
						error.prependTo( element.parent().parent() );
					}
					else { 
						error.insertAfter( element );
					}
				}
			});
		</script>

		<?php
			if(isset($_POST["submit"]))
			{
				$select = "select * from login where email = '".$_POST["email"]."'";
				$result1 = mysqli_query($con, $select);
				$count = mysqli_num_rows($result1);
				if($count != 0)
				{
					echo "<script>alert('You have already registered');</script>";
				}
				else
				{
					$address = $_POST['address'];	
					$address = addslashes($address);
					$query = "insert into login (fname, mname, lname, email, contact, address, password, gender,age) values ('".$_POST["fname"]."', '".$_POST["mname"]."', '".$_POST["lname"]."', '".$_POST["email"]."', '".$_POST["phone"]."', '".$address."', '".$_POST["password"]."', '".$_POST["gender"]."', '".$_POST["age"]."')";
					$result = mysqli_query($con, $query);
					if($result)
					{
						echo "<script>alert('Successfully Registered!');window.location.href='register.php';</script>";
					}
				}
			}
		?>
	</body>
</html>