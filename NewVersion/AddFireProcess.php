<!DOCTYPE html>
<?php
	include 'connectvars.php'; 
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$fireID = $_POST['id'];
		$fireActivity = $_POST['activity'];
		$fireSize = $_POST['size'];
		$incidentCommander = $_POST['commander'];
		$fireLocation = $_POST['location'];
		$pointOfAccess = $_POST['pointofaccess'];
		$fireStatus = $_POST['status'];
		$dateCreated = $_POST['DateCreated'];
$sql = "INSERT INTO FireReports(FireID,FireActivity,FireSize, IncidentCommander, FireLocation, PointOfAccess,DateCreated,FireStatus) VALUES('$fireID','$fireActivity','$fireSize','$incidentCommander', '$fireLocation','$pointOfAccess','$dateCreated', '$fireStatus')";	
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	echo "<script>setTimeout(function (){
		window.location.href='http://web.engr.oregonstate.edu/~millcour/CS340/finalProject/repo/NewVersion/Home.php'
		}, 2000);</script>";

}else{
	echo "Unable to create record. Redirecting...";
			echo "<script>setTimeout(function (){
				window.location.href='http://web.engr.oregonstate.edu/~millcour/CS340/finalProject/repo/NewVersion/CreateFireReport.php'
			}, 2000);</script>";
}

}
	mysqli_close($conn);

?>
<html>
<link rel="stylesheet" href="css/style.css" />
<head>
</html>
