<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="css/style.css" />
   <title>View Fires</title>
</head>
<footer>Webpage Developed by Courtney Miller, Joshua Lioy, and Garrett Haley</footer>
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
	echo "<div class='content'>";
        echo"<h2>Deleted Fires:</h2>";
	include 'connectvars.php';
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
		
	$sql = "SELECT * FROM DeletedFireReports";
	$result = mysqli_query($conn, $sql);
	echo "<table id='listusers'><tr><th>Fire ID</th><th>Location</th><th>Activity</th><th>Size</th></tr><tr><td>";
	while($row = mysqli_fetch_assoc($result)){
		echo $row[FireID] .  "<br>";
	}
	echo"</td>";

	mysqli_free_result($result);
	mysqli_close($conn);
	echo "<td>";
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
		
	$sql = "SELECT * FROM DeletedFireReports";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)){
		echo $row[FireLocation] .  "<br>";
	}
	echo"</td>";

	mysqli_free_result($result);
	mysqli_close($conn);
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
		
	$sql = "SELECT * FROM DeletedFireReports";
	$result = mysqli_query($conn, $sql);
	echo "<td>";
	while($row = mysqli_fetch_assoc($result)){
		echo $row[FireActivity] . "<br>";
	}
	echo"</td>";

	mysqli_free_result($result);
	mysqli_close($conn);
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
		
	$sql = "SELECT * FROM DeletedFireReports";
	$result = mysqli_query($conn, $sql);
	echo "<td>";
	while($row = mysqli_fetch_assoc($result)){
		echo $row[FireSize] . "<br>";
	}
	echo"</td>";

	mysqli_free_result($result);
	mysqli_close($conn); 
	echo "</div>";
?>
</body>

