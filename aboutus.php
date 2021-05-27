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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css"/>

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
			<h1 class="text-center my-5" style="color: black;"> About Us</h1>

			

			</div>



		</div>
		<?php
		include('footer.php');
		?>
</div>
	</body>
</html>