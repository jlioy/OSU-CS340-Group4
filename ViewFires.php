<?php
	include('navigation.php');
	echo "<h1>View Fires</h1>";
	include 'connectvars.php';
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
		
	$sql = "SELECT * FROM FireReports";
	$result = mysqli_query($conn, $sql);
	echo "<table id='listusers'><tr><th>Location</th><th>Activity</th><th>Size</th></tr><tr><td>";
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
		
	$sql = "SELECT * FROM FireReports";
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
		
	$sql = "SELECT * FROM FireReports";
	$result = mysqli_query($conn, $sql);
	echo "<td>";
	while($row = mysqli_fetch_assoc($result)){
		echo $row[FireSize] . "<br>";
	}
	echo"</td>";

	mysqli_free_result($result);
	mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="css/style.css" />
   <title>View Fires</title>
</head>