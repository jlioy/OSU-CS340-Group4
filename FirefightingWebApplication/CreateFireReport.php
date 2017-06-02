<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="css/style.css"/>
   <title>Create Fire Report</title>
   <script type="text/javascript" src="js/hw1.js">
   </script>
</head>
<body>
	<?php include 'navigation.php' ?>	
	<h1>Create Fire Report</h1>
	<div id="create">
		<form method="POST" action="AddFireProcess.php">
			<table id="signup" class="form">
				<tr>
					<td>Fire ID<br>
						<input type="number" name="id">
					</td>
					<td>Fire Activity<br>
						<input type="text" name="activity">
					</td>
					<td>Fire Size<br>
						<input type="text" name="size">
					</td>
				</tr>
				<tr>
					<td>Incident Commander<br>
						<input type="text" name="commander">
					</td>
					<td>Fire Location<br>
						<input type="text" name="location">
					</td>
					<td></td>
				</tr>
				<tr>
					<td>Point of Access<br>
						<input type="text" name="pointofaccess">
					</td>
					<td>Status<br>
						<input type="number" name="status">
					</td>
					<td>Date<br>
                                                <input type="date" name="DateCreated"></td>
				</tr>
			</table>
			<button type="submit">Submit</button>
		</form>
		</div>
	<?php include 'footer.php' ?>
</body>
