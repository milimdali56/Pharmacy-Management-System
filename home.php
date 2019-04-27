<?php
session_start ();
require('database.php');
include('auth.php');
?>
<!DOCTYPE html>
<html>
    <head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <title>location</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    </head>
<body>
    <div class="fullwidth">
      <div class="navbar">
        <div class="col-5 navopt">
          <ul class="opt1">
            <li><a href="home.php" style="color:#6de1f3;">Home</a></li>
            <li><a href="profile.php"><?php echo $_SESSION['username'];?></a></li>
            <!-- <li><a href="#">Pharmacies</a></li> -->
            <!-- <li><a href="">Quick Order</a></li> -->
          </ul>
        </div>
        <div class="col-2 logo">
          <img src="img/l.png" alt="logo" style="height:80px; width:300px;">
        </div>
        <div class="col-5 navopt">
        <ul class="opt2">
            <li><a href="newcart.php">Cart</a></li>
            <li><a href="orders.php">Order Status</a></li>
            <a href="logout.php"><button type="button" class="btn btn-outline-info logout ml-2">logout</button></a>
          </ul>
        </div>
      </div>

      <div class="main">
        <!-- <p class="lead">Lets find out your location</p> -->
            <br><br>
            <form action ="pharmalist.php" method="post">
            <div class="loc">
              <input type="text" id="loc" class="mb-2" name="location" placeholder="Click 'Find your location' for your location or Enter it"><br>
              <button type="button" class="btn btn-info" onclick="getLocation()">Find your location</button>
              <button type="submit" class="btn btn-info" >Find pharmacies near your location</button>

              <!-- <input type="submit" class="btn btn-secondary" value="send loc"/> -->
            </div>
            </form>
             
            
      </div>
    </div>    
            
            
         
        
        <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous">
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwF2pm_mx4uAyrYi-Mn2SBTxR8gHHhnkQ"></script>

         <script>
                var a ;
                function getLocation() {
                  if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                  } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
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
            
                    document.getElementById('loc').value=a;
                    
                    x.innerHTML =  response.address.suburb;                    
            
                    x.innerHTML += "</br> <button type='button' class='btn btn-secondary justify-content-center' onclick='getPharmacy()'>Find Pharmacies near you</button><br>"
                    document.getElementById('location')= x;
                  });
                }
  
        </script> 
</body>

</html>