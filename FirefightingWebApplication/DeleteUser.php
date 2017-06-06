<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="css/style.css"/>
   <title>Delete Fire Report</title>
   <script type="text/javascript" src="js/hw1.js">
   </script>
</head>
<body>
	<?php include 'navigation.php' ?>
	<div class="content">
	<h1>Delete User</h1>
	<div id="create">
		<form method="post" action="DeleteUserProcess.php" onsubmit="return checkForm(this)">
			<table id="signup" class="form">
				<tr>
					<td>User ID<br>
						<input type="text" name="id">
					</td>
				</tr>
			</table>
			<button type="submit">Submit</button>
		</form>
		</div>
		</div>
	<?php include 'footer.php' ?>
</body>
</html>
