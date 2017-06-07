<!DOCTYPE html>
<html>
<title>Logout</title>
<link rel="stylesheet" href="css/style.css" />
	<?php
		$page = "logout";
		session_start();
		session_unset();
		session_destroy();
		include('usernav.php');
		echo "<div class='content'>";
		echo"<br><br><br><h2>You are succesfully logged out</h2>";
		echo "</div>";
		include 'footer.php';
	?>
</html>