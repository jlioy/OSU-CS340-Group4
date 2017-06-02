<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="css/style.css"/>
   <title>Login</title>
   <script type="text/javascript" src="js/hw1.js">
   </script>
</head>
<body>
	<?php include 'navigation.php' ?>
	<div class="content">
	<h1>Login</h1>
	<div id="create">
		<form method="post" action="Create.php" onsubmit="return checkForm(this)">
			<table id="signup" class="form">
				<tr>
					<td>Username<br>
						<input type="text" name="id">
					</td>
				</tr>
				<tr>
					<td>Password<br>
						<input type="text" name="activity">
					</td>
				</tr>
			</table>
			<button type="submit">Submit</button>
		</form>
		</div>
		</div>
	<?php include 'footer.php' ?>
</body>