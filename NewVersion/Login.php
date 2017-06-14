<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/formFeild.css">
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/inputFeilds.js"></script>
</head>

<body>
    <?php 
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
        <form method="post" action="LoginProcess.php" onsubmit="return checkForm(this)">
            <h1>Login</h1>

            <label for="userName">User Name</label>
            <input id="userName" type="text" name="UserID" class="textBox">

            <label for="password">Password</label>
            <input id="password" type="password" name="password" class="textBox">

            <div style="text-align: center">
                <input type="submit" value="submit" id="submit">
            </div>
        </form>
    </div>



<!--
    <h1>Login</h1>
    <div id="create">
        <form method="post" action="LoginProcess.php" onsubmit="return checkForm(this)">
            <table id="signup" class="form">
                <tr>
                    <td>UserID<br>
                        <input type="text" name="UserID">
                    </td>
                </tr>
                <tr>
                    <td>Password<br>
                        <input type="password" name="password">
                    </td>
                </tr>
            </table>
            <button type="submit">Submit</button>
        </form>
    </div>
-->
    <?php include 'footer.php' ?>
</body>


</html>