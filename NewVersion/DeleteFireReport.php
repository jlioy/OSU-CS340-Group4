<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/formFeild.css">
    <title>Delete Fire Report</title>
    <script type="text/javascript" src="js/hw1.js"></script>
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
        <form method="post" action="DeleteFireProcess.php" onsubmit="return checkForm(this)">
            <h1>Delete Fire Report</h1>

            <label for="userName">Fire ID</label>
            <input id="userName" type="text" name="id" class="textBox">

            <div style="text-align: center">
                <input type="submit" value="submit" id="submit">
            </div>
        </form>
    </div>
   
<!--
    <div class="content">
        <h1>Delete Fire Report</h1>
        <div id="create">
            <form method="post" action="DeleteFireProcess.php" onsubmit="return checkForm(this)">
                <table id="signup" class="form">
                    <tr>
                        <td>Fire ID<br>
                            <input type="text" name="id">
                        </td>
                    </tr>
                </table>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
-->
    <?php include 'footer.php' ?>
</body>

</html>
