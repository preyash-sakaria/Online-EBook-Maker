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
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />
	
	</head>
	<body style="background-image: url(image/1.jpg); background-color: #ffffff47; background-attachment: fixed;       background-blend-mode: overlay;">

		<div class="content">
			<?php
			if(!isset($_GET["type"]))
			{
			?>
				<div class="home_banner"  >
			<?php
			}
			else
			{
			?>
				<div class="h_banner" >
			<?php
			}
			?>

			<nav class="navbar navbar-expand-md fixed-top navbar-light">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<i class="fa fa-navicon" style="color: white; "></i>
					</button>
					<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<img src="image/logo.png" alt="Northern Lights" width="100" height="100" style="margin-left: 9px;"> <h2 class="">Online E-Book Maker </h2>
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" id="userhome" href="index.php" id="home"><i class="fa fa-home"></i> Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="aboutus.php"><i class="fa fa-users"></i> About Us</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="contactus.php"><i class="fa fa-phone"></i> Contact Us</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="user" href="index.php?type=login"><i class="fa fa-lock"></i> Login</a>
							</li>
						</ul>
					</div> 
				</nav>

	
				<?php
				if(!isset($_GET["type"]))
				{
					
				?>
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							
						</ol>
						<div class="carousel-inner text-center" role="listbox" >
							<div class="carousel-item active" style="background-image: url('image/back.jpg') ; background-color: #ffffff47;     background-blend-mode: overlay;">
								<div class="d-flex h-100 align-items-center justify-content-center">
							
							<h2> Welcome to Online Ebook Maker  </h2>
								</div>
							</div>
							<div class="carousel-item" style="background-image: url('image/3.jpg'); background-color: #ffffff47;     background-blend-mode: overlay;">
								<div class="d-flex h-100 align-items-center justify-content-center">
							
							<h2> Make ebooks here for free of charge</h2>							
							
								</div>
							</div>
						
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				<?php
				}
				else
				{
				?>

					<div class="container main_content my-5">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 admin text-center">

							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 admin text-right">
								<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
									<i class="fa fa-lock"></i> Admin Login
								</button>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 text-center">
								<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal1">
									<i class="fa fa-users"></i> Author Login
								</button>
							</div>
						
						</div>
					</div>
				<?php
				}
				?>
				</div>
			
<!-- Admin Modal -->
				<div class="modal fade" id="myModal">
					<div class="modal-dialog ">
						<div class="modal-content lgndiv shadow-lg p-3 mb-5 bg-white rounded">
							<div class="modal-header">
								<h2  class="text-white">Admin Sign-in</h2>
								<button type="button" class="close text-white font-weight-bold" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<form id="admin_login" method="post">
									<div class="form-group">
										<input type="text" class="txtbox" name="admin_id" placeholder="Admin Id" />
									</div>
									<div class="form-group">
										<input type="password" class="txtbox" name="admin_pass" placeholder="Password" />
									</div>
									<div class="form-group">
										<input type="submit" name="admin_submit" class="btn bg-white" id="btnlogin" value="Login" />
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
<!-- Author  Modal -->	
				<div class="modal fade" id="myModal1">
					<div class="modal-dialog ">
						<div class="modal-content lgndiv shadow-lg p-3 mb-5 bg-white rounded">
							<div class="modal-header">
								<h2  class="text-white">Author Sign-in</h2>
								<button type="button" class="close text-white font-weight-bold" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<form id="author_login" method="post">
									<div class="form-group">
										<input type="text" class="txtbox" name="author_id" placeholder="Login Id" />
									</div>
									<div class="form-group">
										<input type="password" class="txtbox" name="author_pass" placeholder="Password" />
									</div>
									<div class="form-group">
										<input type="submit" name="author_submit" class="btn bg-white" id="btnlogin" value="Login" />
										
									</div>
									<div> <label >Dont have an account? </label>
                                   <b><a  href="authorsignup.php">SIGNUP</a></b>
									</div>
									
								</form>
							</div>
						</div>
					</div>
				</div>

			
			</div>
			<?php
			include('footer.php');
			?>
			
			<script type="text/javascript" language="javascript" > 
				<?php
				if(!isset($_GET["type"]))
				{
				?>
					$("#home").addClass('active1');
				<?php
				}
				?>
				$(document).ready(function(){
					$(".show-modal").click(function(){
						$("#myModal").modal({
							backdrop: 'static',
							keyboard: false
						});
					});
				});
				$( "#admin_login" ).validate({
					rules: {
						admin_id: {
							required: true
						},
						admin_pass: {
							required: true
						}
					},
					messages: {
						admin_id: " Insert Admin ID<br/>",
						admin_pass: "Insert Password",
					}	
				});	
				$( "#author_login" ).validate({
					rules: {
						author_id: {
							required: true
						},
						author_pass: {
							required: true
						}
					},
					messages: {
						author_id: " Insert Login ID<br/>",
						author_pass: "Insert Password",
					}	
				});	
				$( "#Agent_login" ).validate({
					rules: {
						agent_email: {
							required: true
						},
						agent_pass: {
							required: true
						}
					},
					messages: {
						agent_email: " Insert Login ID<br/>",
						agent_pass: "Insert Password",
					}	
				});	
				
				function compare()
				{
					window.location.href="index.php?type=login";
				}
				
			
		
			</script>

			<?php
			if(isset($_POST["admin_submit"]))
			{
				$query = "select * from admin";
				$result = mysqli_query($con, $query);
				if($row = mysqli_fetch_array($result))
				{
					if($_POST["admin_id"] == $row["adminid"] && $_POST["admin_pass"] == $row["pass"])
					{
						$_SESSION["type"] = "admin";
						echo "<script>window.location.href='manageauthor.php';</script>";
					}
					else
					{
						echo "<script>alert('Kindly insert correct credentials!');</script>";
					}
				}
			}
			if(isset($_POST["author_submit"]))
			{
				$query = "select * from author where Aid = '".$_POST["author_id"]."' and password = '".$_POST["author_pass"]."'";
				$result = mysqli_query($con, $query);
				if($row = mysqli_fetch_array($result))
				{
					if($row["status"]=="Approved"){
						$_SESSION["user_type"] = "author";
						$_SESSION["Aid"] = $row["Aid"];
						$_SESSION["name"] = $row["Afname"]." ".$row["Alname"];
					
						echo "<script>window.location.href='author/ebook.php';</script>";
					}
					else{
						echo "<script>alert('Your Account not Aprroved by Admin,try again later!');</script>";
					}
					
				}
				else
				{
					echo "<script>alert('Kindly insert correct credentials!');</script>";
				}	
			}

			
			?>
		</body>
	</html>
	