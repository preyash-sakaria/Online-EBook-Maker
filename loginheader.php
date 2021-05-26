<?php
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
		 <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link rel='stylesheet' href="css/themes/all-themes.css"  />
	
	</head>
	<body>
		<div class="content">
						<div class="home_banner1">
				<nav class="navbar navbar-expand-md fixed-top navbar-light">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<i class="fa fa-navicon" style="color: white; "></i>
					</button>
					<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<img src="image/logo.png" alt="Northern Lights" width="100" height="100" style="margin-left: 9px;"><h1 class="navbar-brand">Online E-Book Maker </h1>
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
			</div>
		</div>
</body>
</html>
