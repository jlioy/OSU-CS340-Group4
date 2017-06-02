<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <title>Firefighting App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
</head>
<body>
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
	<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" id ="findfire" onclick ="return Button1_onclick()" data-toggle="modal" data-target="#myModal">FIND A FIRE</button>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" style = "background:RGBA(0,0,0,0.8);">
    <div class="modal-dialog">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" id="xclose" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Fire Locator</h2>
		  <h4> Input examples:</h4>
		  <h4> Latitude Longitude: 44.5646, -123.2620</h4>
		  <h4> Address: 1600 Amphitheatre Pkwy, Mountain View, CA 94043</h4>
		  <h4> General landmarks/notable locations: Oregon state University</h4>
        </div>
        <div class="modal-body">
<table>
<tr>
<td>
    <input id="addressinput" type="text" style="width: 500px" />   
</td>
<td>
    <input id="Button1" type="button" value="Find" onclick="return Button1_onclick()" /></td>
</tr>
<tr>
<td colspan ="2">
<div id ="map" style="height: 300px" >
</div>
</td>
</tr>
</table>
</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</div>
		
</body>
</html>
<script language="javascript" type="text/javascript">
    var map;
    var geocoder;
    function InitializeMap() {

        var latlng = new google.maps.LatLng(44.5646,-123.2620);
        var myOptions =
        {
            zoom: 14,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.HYBRID,
			tilt:45,
            
        };
        map = new google.maps.Map(document.getElementById("map"), myOptions);
    }

    function FindLocaiton() {
        geocoder = new google.maps.Geocoder();
        InitializeMap();

        var address = document.getElementById("addressinput").value;
        geocoder.geocode({ 'address': address }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });

            }
            else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });

    }

    function Button1_onclick() {
        FindLocaiton();
    }
    window.onload = InitializeMap;
</script>
