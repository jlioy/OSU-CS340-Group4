<!DOCTYPE html>
<?php
	include 'connectvars.php'; 
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$fireID = $_POST['id'];
$sql = "DELETE FROM FireReports WHERE FireID = $fireID";	
if ($conn->query($sql) === TRUE) {
    echo "New record successfully deleted";
	
}}
	mysqli_close($conn);
?>
<html>
<link rel="stylesheet" href="css/style.css" />
<head>
</html>
