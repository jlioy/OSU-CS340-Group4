<?php
	session_start();
	//$_SESSION["user"] = $_POST['UserID'];
	include 'connectvars.php';
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$UserID = mysqli_real_escape_string($conn, $_POST['UserID']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$password = md5($password);
		$query = "SELECT * FROM USERS WHERE UserID = '$UserID' AND Pass = '$password'";
		$result = mysqli_query($conn, $query);
		$count = mysqli_num_rows($result);
		if($count > 0) {
			$_SESSION["user"] = $_POST['UserID'];
			header("Location: Home.php");
		}
		else {
			header("Refresh:2; url=Login.php");
			$_SESSION["user"] = "";
			echo "Invalid Username or Password Please Try Again <br>";
			echo "Redirecting...";
		}
		mysqli_free_result($result);
		mysqli_close($conn);

}
?>