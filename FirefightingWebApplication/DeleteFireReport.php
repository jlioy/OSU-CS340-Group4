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
	<h1>Delete Fire Report</h1>
	<div id="create">
		<form method="post" action="DeleteFireProcess.php" onsubmit="return checkForm(this)">
			<table id="signup" class="form">
				<tr>
					<td>Fire ID<br>
						<input type="text" name="id">
					</td>
				</tr>
				<tr>
					<td>Location<br>
						<input type="text" name="location">
					</td>
				</tr>
			</table>
			<button type="submit">Submit</button>
		</form>
		</div>
	<?php include 'footer.php' ?>
</body>
