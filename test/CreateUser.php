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
	<?php include 'navigation.php' ?>
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
						<input type="text" name="verify"><br>
					</td>
						
			</table>
			<button type="submit">Submit</button>
		</form>
		</div>
		</div>
	<?php include 'footer.php' ?>
</body>
</html>
