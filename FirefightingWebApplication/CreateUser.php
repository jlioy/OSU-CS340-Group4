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
	<h1>Create User</h1>
	<div id="create">
		<form method="post" action="CreateUserProcess.php" onsubmit="return checkForm(this)">
			<table id="signup" class="form">
				<tr>
					<td>Name<br>
						<input type="text" name="name">
					</td>
					<td>User ID<br>
						<input type="text" name="userID">
				</tr>
				<tr>
				</td>
					<td>Position<br>
						<input type="text" name="position">
					</td>
					<td>Pass<br>
						<input type="text" name="password">
					</td>
				</tr>
			</table>
			<button type="submit">Submit</button>
		</form>
		</div>
	<?php include 'footer.php' ?>
</body>
