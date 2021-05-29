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
					background-size: cover;
				  background-image: url("image/banner1.jpg");
				  background-blend-mode: overlay;
				  background-color: #ffffff47;
				}
		</style>

	</head>
	<body>
<div class="back">
		<div class="content ">
			<?php include 'loginheader.php';
			?>

			<div style="margin-top: 9%; background-color: lightgrey; width: 55%;  margin-left: 20%;">
			<h1 class="text-center my-5" style="color: black;"> About Us</h1>
<<<<<<< Updated upstream
=======
			</div>
			<div style="margin-top:2%;">
			<h2 class="text-center my-5" style="color: black;"> We Believe In</h2>
		</div>
		<div style="margin-top:2%;">
			<h3 class="text-center my-5" style="color: brown;">  Community. Quality. Action.</h3></div>
			<div style="margin-top:2%;">
			<h3 class="text-center my-5" style="color: brown;"> Online Ebook Maker website is free for all Authors who wants to write their thoughts, they can easily represent their book to the world through our website. our mission is to grow and create world's largest digital Ebook Maker platform, a place where people can read and write, and built any book they dream. As founder and CEO of this, our work is inspired more users and celebrate our own personal growth.</h3>
		</div>
			


>>>>>>> Stashed changes
			
			<h2 class="text-center my-5" style="color: black;"> We Believe In</h2>

			<pre><h3 class="text-center my-5" style="color: brown;">  Community || Quality || Action</h3></pre>
			<h3 class="text-center my-5" > Online Ebook Maker website is free of charge for all Authors who wants to write their thoughts, they can easily represent their book to the world through our website. Our mission is to grow and create world's largest digital Ebook Maker platform, a place where people can read and write, and built any book they wish for. <br><br>

			Our team is made up of smart and talented people that are passionate about developing this website more and more user friendly and useful. </h3>
		</div>
	
		</div>
		 </div>
		<?php
		include('footer.php');
		?>
</div>
	</body>
</html>