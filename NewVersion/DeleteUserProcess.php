<!DOCTYPE html>
<?php
	include 'connectvars.php'; 
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$userID = $_POST['id'];
$sql = "DELETE FROM `USERS` WHERE `USERS`.`UserID` = '$userID'";	
if ($conn->query($sql) === TRUE) {
    echo "Record successfully deleted. Redirecting...";
	echo "<script>setTimeout(function (){
		window.location.href='http://web.engr.oregonstate.edu/~millcour/CS340/finalProject/repo/NewVersion/DeleteUser.php'
	}, 2000);</script>";
}

}
	mysqli_close($conn);
?>
<html>
<link rel="stylesheet" href="css/style.css" />
<head>
</html>
