<!DOCTYPE html>
<?php
	//ini_set('display_errors', 1);
	function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = filter_var($data, FILTER_SANITIZE_STRING);
	   return $data;
	}
	include 'connectvars.php'; 
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = test_input($_POST['username']);
		$firstname = test_input($_POST['first']);
		$lastname = test_input($_POST['last']);
		$email = test_input($_POST['email']);
		$password = md5($_POST['password']);
		$age = test_input($_POST['age']);
		$check = test_input($_POST['check']);
		
		$query = "SELECT * FROM Users where username='$username' ";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result)> 0) {
			//header("Refresh:3 ; url=SignUp.php");
			$url='SignUp.php';
			echo '<META HTTP-EQUIV=REFRESH CONTENT="2; '.$url.'">';
			echo "Already a user with that username <br>";
			echo "You'll be redirected to the sign up page shortly <br>";
		} else {	
			$sql = "INSERT INTO Users (username, firstname, lastname, password, email, age) VALUES('$username','$firstname','$lastname','$password', '$email', $age)";
			if (mysqli_multi_query($conn, $sql)) {
				include('navigation.php');
				echo "<h1>My Account</h1>";
				echo "<br><br><br><br>";
				echo "Welcome " . $username . "<br>";
				echo "Email: " . $email . "<br>";
				echo "First Name: " . $firstname . "<br>";
				echo "Last Name: " . $lastname . "<br>";
				echo "Username: " . $username . "<br>";
				if(isset($_POST["privacy"])){
					echo "Agree to Privacy Policy: Yes";
				}
				else{
					echo "Agree to Privacy Policy: No";
				}
			} else {
				//echo "Error updating record: " . mysqli_error($dbc);
			}
		}
	}
	mysqli_free_result($result);
	mysqli_close($conn);
?>
<html>
<link rel="stylesheet" href="css/style.css" />
<head>
</html>