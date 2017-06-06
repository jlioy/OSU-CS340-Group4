<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="css/style.css" />
   <title>View Fires</title>
</head>
<body>
<?php
	include('navigation.php');
	echo "<div class='content'>";
        echo"<h2>Active Fires:</h2>";
	include 'connectvars.php';
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
		
	$sql = "SELECT * FROM FireReports WHERE FireReports.FireID IN (SELECT FireID FROM ActiveFires)";
	$result = mysqli_query($conn, $sql);
	echo "<table id='listusers'><tr><th>Fire ID</th><th>Location</th><th>Activity</th><th>Size</th><th>Incident Commander</th><th>Point of Access</th><th>Data Created</th></tr><tr><td>";
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
		
	$sql = "SELECT * FROM FireReports WHERE FireReports.FireID IN (SELECT FireID FROM ActiveFires)";
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
		
	$sql = "SELECT * FROM FireReports WHERE FireReports.FireID IN (SELECT FireID FROM ActiveFires)";
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
		
	$sql = "SELECT * FROM FireReports WHERE FireReports.FireID IN (SELECT FireID FROM ActiveFires)";
	$result = mysqli_query($conn, $sql);
	echo "<td>";
	while($row = mysqli_fetch_assoc($result)){
		echo $row[FireSize] . "<br>";
	}
	echo"</td>";

	mysqli_free_result($result);
	mysqli_close($conn);
	 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                if (!$conn) {
                        die('Could not connect: ' . mysql_error());
                }

	  $sql = "SELECT * FROM FireReports WHERE FireReports.FireID IN (SELECT FireID FROM ActiveFires)";
        $result = mysqli_query($conn, $sql);
        echo "<td>";
        while($row = mysqli_fetch_assoc($result)){
                echo $row[IncidentCommander] . "<br>";
        }
        echo"</td>";

        mysqli_free_result($result);
        mysqli_close($conn);
         $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                if (!$conn) {
                        die('Could not connect: ' . mysql_error());
                }
	
	   $sql = "SELECT * FROM FireReports WHERE FireReports.FireID IN (SELECT FireID FROM ActiveFires)";
        $result = mysqli_query($conn, $sql);
        echo "<td>";
        while($row = mysqli_fetch_assoc($result)){
                echo $row[PointOfAccess] . "<br>";
        }
        echo"</td>";

        mysqli_free_result($result);
        mysqli_close($conn);
         $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                if (!$conn) {
                        die('Could not connect: ' . mysql_error());
                }
	 $sql = "SELECT * FROM FireReports WHERE FireReports.FireID IN (SELECT FireID FROM ActiveFires)";
        $result = mysqli_query($conn, $sql);
        echo "<td>";
        while($row = mysqli_fetch_assoc($result)){
                echo $row[DateCreated] . "<br>";
        }
        echo"</td>";

        mysqli_free_result($result);
        mysqli_close($conn);
 
	echo "</div>";;
	include('footer.php');
?>
</body>

