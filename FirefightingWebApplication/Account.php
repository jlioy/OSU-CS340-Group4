<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="css/style.css" />
   <title>Account</title>
</head>
<body>
<?php
	include('navigation.php');
	echo "<div class='content'>";
	echo "<h1>Account</h1>";
	include 'connectvars.php';
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
		
	$sql = "SELECT * FROM USERS";
	$result = mysqli_query($conn, $sql);
	echo "<table id='listusers'><tr><th>User ID</th><th>Name</th></tr><tr><td>";
	while($row = mysqli_fetch_assoc($result)){
		echo $row[UserID] .  "<br>";
	}
	$sql = "SELECT * FROM USERS";
	$result = mysqli_query($conn, $sql);
	echo "<td>";
	while($row = mysqli_fetch_assoc($result)){
		echo $row[Name] . "<br>";
	}
	echo"</td>";

	mysqli_free_result($result);
	mysqli_close($conn);
	echo "</div>";
	include('footer.php');
?>
</body>
</html>
