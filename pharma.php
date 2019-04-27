<?php
include("auth.php");
session_start();
require('database.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Pharmacy Profile</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/pharmastyle.css">
</head>
<body>

<div class="container option">
<button class="btn">Select</button>
<div class="dropdown">
  <button class="btn" style="border-left:1px solid #0d8bf2">
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content">
    <a href="porder.php">Orders</a>
    <a href="history.php">Order history</a>
    <a href="logout.php">Logout</a>
    
  </div>
</div>
</div>


<div class="container pharmacy">

    <img src="img/pharmacy.png" alt="admin" style="width:20em;">
    <?php $user = $_SESSION['username']; 

        $u ="SELECT * FROM `user` WHERE name='$user'";
        $res = mysqli_query($con,$u);
        $row = mysqli_num_rows($res);

        if($row > 0){
            $a = mysqli_fetch_object($res)
                
                
        ?>
        <i><h4><?php echo $a->name; ?></h4></i>
        <h5>Mail :<?php echo $a->email; ?></h5>        
        <h5>Area :<?php echo $a->area; ?></h5>
        <h5>Address :<?php echo $a->address; ?></h5>
        <h5>Phone :<?php echo $a->phone; ?></h5>
        <?php
            
        }
        ?>
</div>
</body>
</html>
