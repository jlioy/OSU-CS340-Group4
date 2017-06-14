<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="css/style.css"/>
   <title>Create User</title>
   <script type="text/javascript" src="js/hw1.js">
   </script>
</head>
<body>
	<?php 
	$user = $_SESSION["user"];
	include 'connectvars.php';
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
	
	$sql = "SELECT position FROM USERS WHERE UserID = '$user'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			$position = $row["position"];
			$_SESSION["position"] = $position;
		}
	}
	//echo "'$result'";

	mysqli_free_result($result);
	mysqli_close($conn); 
	if($_SESSION["position"] == "supervisor"){
		include 'navigation.php';
	}else if($_SESSION["position"] == "firefighter"){
		include 'fighternav.php';
	}else if($_SESSION["position"] == "dispatch"){
		include 'dispatchnav.php';
	}else{
		include 'usernav.php';
	}
	?>
	<div class="content">
	<h1>Create User</h1>
	<div id="create">
		<form method="post" action="CreateUserProcess.php" onsubmit="return checkForm(this)">
			<table id="signup" class="form">
				<tr>
					<td>Name<br>
						<input type="text" name="name"><br>
					</td>
					<td>User ID<br>
						<input type="text" name="userID"><br>
				</tr>
				<tr>
				</td>
					<td>Position<br>
						<select name="position">
							<option selected="Select One">Select One</option>
							<option value="dispatch">Dispatch</option>
							<option value="supervisor">Supervisor</option>
							<option value="firefighter">Firefighter</option>
						</select>
					</td>
					<td>Password<br>
						<input type="password" name="password"><br>
					</td>
				</tr>
				<tr> 
					<td></td>
					<td>Re-Enter Password<br>
						<input type="password" name="verify"><br>
					</td>
						
			</table>
			<button type="submit">Submit</button>
		</form>
		</div>
		</div>
	<?php include 'footer.php' ?>
</body>
</html>
