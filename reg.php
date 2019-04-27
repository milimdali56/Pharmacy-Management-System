<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('database.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['name'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['name']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con,$email);
        $area = stripslashes($_REQUEST['area']);
        $area = mysqli_real_escape_string($con,$area);
        $address = stripslashes($_REQUEST['address']);
        $address = mysqli_real_escape_string($con,$address);
        $contactNum = stripslashes($_REQUEST['number']);
        $contactNum = mysqli_real_escape_string($con,$contactNum);
	$password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con,$password);
        $userRole = stripslashes($_REQUEST['usertype']);
        $userRole = mysqli_real_escape_string($con,$userRole);

        $query= "INSERT INTO `user`(`name`, `email`, `password`, `usertype`, `area`, `address`, `phone`)
        VALUES ('$username','$email','".md5($password)."','$userRole','$area','$address','$contactNum')";
       
       $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
        <h3>You are registered successfully.</h3>
        <br/>Click here to <a href='login.php'>Login</a></div>";
                }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="name" placeholder="Name" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="text" name="area" id="loc" placeholder="Area" required />
<button type="button" class="btn btn-secondary" onclick="getLocation()">Find your location</button>
<textarea type="text" name="address" placeholder="Address" rows="5" required></textarea>
<input type="text" name="number" placeholder="Contact Number" required />
<select name="usertype">
    <option value="">Select user type</option>
    <option value="user">Customer</option>
    <option value="pharmacy">Pharmacy</option>
    <option value="admin">Admin</option>

</select><br>
<input type="submit" name="submit" value="Register" />
</form>
<?php } ?>

        <script
	        src="http://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		crossorigin="anonymous">
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwF2pm_mx4uAyrYi-Mn2SBTxR8gHHhnkQ"></script>

         <script>
                // var x = document.getElementById("demo");
                var a ;
                function getLocation() {
                  if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                  } else {
                    a.innerHTML = "Geolocation is not supported by this browser.";
                  }
                }
                
                
                function showPosition(position) {

                var settings = {
                    "async": true,
                    "crossDomain": true,
                    "url": "https://us1.locationiq.com/v1/reverse.php?key=34064a78a96f0c&lat="+position.coords.latitude+"&lon="+position.coords.longitude+"&format=json",
                    "method": "GET"
                  }

                  $.ajax(settings).done(function (response) {
                    a= response.address.suburb;
                    // console.log(a);
                    document.getElementById('loc').value=a;
                    
                  });
                }
              
        </script> 

</body>
</html>