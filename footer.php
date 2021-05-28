<!DOCTYPE html>
<html>
<head>
	<title>Footer</title>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>  
	
	<script type="text/javascript">
	<?php
		if ($_SERVER['REQUEST_URI'] == '/CarSalesAndInventory/index.php?type=login') { 
	?>
	$("#user").addClass('active1');
	
	<?php
	}
	else if($_SERVER['REQUEST_URI'] == '/CarSalesAndInventory/index.php')
	{
	?>

	$("#user").removeClass('active1');
	$("#userhome").addClass('active1');
	<?php
	}
	else
	{
	?>
	var url = window.location.pathname;
	var filename = url.substring(url.lastIndexOf('/')+1);
	$('li a[href^="' + filename + '"]').addClass('active1');
	<?php
	}
	?>
	</script>
  <style>
    .fa {
    padding: 20px;
text-align: center;
  margin: 5px 2px;
  font-size: 30px;
  width: 50px;

}
    .fa-facebook {
  background: #3B5998;
  color: white;

}
.fa-twitter {
  background: #55ACEE;
  color: white;
}
.fa-pinterest {
  background: #cb2027;
  color: white;
}
.fa-linkedin {
  background: #007bb5;
  color: white;
}
.fa-instagram {
  background: #125688;
  color: white;
}
  </style>
</head>
<body>

<div class="footer">
	<div class="container">
		<div class="row">
		
			<div class="col-md-8 text-left">
				<p><a href="aboutus.php" class="text-white">About Us</a> || <a href="contactus.php" class="text-white">Contact Us</a></p>
				<p>COPYRIGHT @ Online E-Book Maker</p>
			</div>
			<div class=""> 
    
          <a href="https://www.facebook.com/" class="fa fa-facebook"> </a> 

          <a href="https://www.twitter.com" class="fa fa-twitter"> </a>

          <a href="https://www.pinterest.com.au" class="fa fa-pinterest"> </a>

          <a href="https://au.linkedin.com/" class="fa fa-linkedin"> </a>

          <a href="https://www.instagram.com/" class="fa fa-instagram"> </a>
			</div>
		</div>
	</div>
</div>



</body>
</html>