<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="css/style.css"/>
   <title>Home</title>
   <script type="text/javascript" src="js/hw1.js">
   </script>
</head>
<body>
	<?php 
	if($_SESSION["position"] == "supervisor"){
		include 'navigation.php';
	}else if($_SESSION["position"] == "firefighter"){
		include 'fighternav.php';
	}else if($_SESSION["position"] == "dispatch"){
		include 'dispatchnav.php';
	}else{
		include 'usernav.php';
	}
	?>
	<div class="content">
	<h1>Home</h1>
	<p>
		This website is designed for users to be able to create and see important dispatch information quickly, and conveniently.
	</p>
	</div>
	<?php include 'footer.php' ?>
</body>
</html>