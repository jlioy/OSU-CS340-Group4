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
		if($position == "Dispatch"){
			$CreateFires = 1;
			$MarkExt = 1;
			$DelFires = 0;
			$CreateAcct = 0;
		}else if($position == "Firefighter"){
			$MarkExt = 1;
			$CreateFires = 0;
			$DelFires = 0;
			$CreateAcct = 0;
		}else{
			$CreateFires = 1;
			$DelFires = 1;
			$CreateAcct = 1;
			$MarkExt = 1;
		}
		$name = $_POST['name'];
		$password = md5($_POST['password']);
	$sql = "INSERT INTO USERS(UserID,Position,Name,Pass) VALUES('$userID','$position','$name','$password');";
	$sql .= "INSERT INTO AdminPriv(UserID, CreateFires, DelFires, CreateAcct, MarkExt) VALUES('$userID', '$CreateFires', '$DelFires', '$CreateAcct', '$MarkExt');";
	if ($conn->multi_query($sql) === TRUE) {
		echo "New record created successfully. Redirecting...";
		echo "<script>setTimeout(function (){
			window.location.href='http://web.engr.oregonstate.edu/~millcour/CS340/finalProject/repo/NewVersion/Home.php'
			}, 2000);</script>";		
	}else{
		echo "Unable to create record. Redirecting...";
		echo "<script>setTimeout(function (){
			window.location.href='http://web.engr.oregonstate.edu/~millcour/CS340/finalProject/repo/NewVersion/CreateUser.php'
			}, 2000);</script>";
	}
	
	}
	mysqli_close($conn);
	
?>
<html>
<link rel="stylesheet" href="css/style.css" />
<head>
</html>
