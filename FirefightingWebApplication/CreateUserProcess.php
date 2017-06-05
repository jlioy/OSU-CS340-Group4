<!DOCTYPE html>
<?php
	include 'connectvars.php'; 
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$userID = $_POST['userID'];
		$position = $_POST['position'];
		$name = $_POST['name'];
		$password = md5($_POST['password']);
$sql = "INSERT INTO USERS(UserID,Position,Name,Pass) VALUES('$userID','$position','$name','$password')";	
if ($conn->query($sql) === TRUE) {
	header("Refresh:2; url=Home.php");
    echo "New record created successfully. Redirecting...";	
}}
	mysqli_close($conn);
?>
<html>
<link rel="stylesheet" href="css/style.css" />
<head>
</html>
