<!DOCTYPE html>
<html>
	<nav>
		<ul class="navigation">
			<li><a class="<?php echo ($page == "login" ? "current" : "")?>" href='Login.php'>Login</a></li>
			<li><a class="<?php echo ($page == "createuser" ? "current" : "")?>" href='CreateUser.php'>Create User</a></li>
			<li><a class="<?php echo ($page == "deletefirereport" ? "current" : "")?>" href='DeleteFireReport.php'>Delete Fire Report</a></li>
			<li><a class="<?php echo ($page == "viewfires" ? "current" : "")?>" href='ViewFires.php'>View Fires</a></li>
			<li><a class="<?php echo ($page == "createfirereport" ? "current" : "")?>" href='CreateFireReport.php'>Create Fire Report</a></li>
			<li><a class="<?php echo ($page == "account" ? "current" : "")?>" href='Account.php'>Account</a></li>
			<li><a class="<?php echo ($page == "home" ? "current" : "")?>" href='Home.php'>Home</a></li>
		</ul>
	</nav>
</html>