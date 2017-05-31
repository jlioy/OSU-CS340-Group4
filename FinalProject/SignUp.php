<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="css/style.css"/>
   <title>Sign Up</title>
   <script type="text/javascript" src="js/hw1.js">
   </script>
</head>
<body>
	<?php include 'navigation.php' ?>
	<h1>Sign Up</h1>
	<div id="submission">
		<form method="post" action="AccountProcess.php" onsubmit="return checkForm(this)">
			<table id="signup" class="form">
				<tr>
					<td>Username<br>
						<input type="text" name="username">
					</td>
					<td>First Name<br>
						<input type="text" name="first">
					</td>
					<td>Last Name<br>
						<input type="text" name="last">
					</td>
				</tr>
				<tr>
					<td>Email<br>
						<input type="text" name="email">
					</td>
					<td>Age<br>
						<input type="text" name="age">
					</td>
					<td></td>
				</tr>
				<tr>
					<td>Password<br>
						<input type="password" name="password">
						<p>Password must contain at least:<br>
						   1 uppercase, 1 lowercase, 1 number</p>
					</td>
					<td>Re-Enter Password<br>
						<input type="password" name="check">
					</td>
					<td></td>
				</tr>
			</table>
			<button type="submit">Submit</button>
		</form>
		</div>
</body>