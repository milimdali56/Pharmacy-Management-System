<?php
require('database.php');
include('auth.php');

?>
<!DOCTYPE html>
<html>
    <head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <title><?php echo $_SESSION['username'];?></title>
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
            <li><a href="home.php">Home</a></li>
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
    <br>
   

    <div class="container profile">
        
        <div class="pimg">
            <img class="prop" src="img/user.png" alt="user">
        </div>
        <?php 
        $user = $_SESSION['username'];
        $q1= "SELECT * FROM `user` WHERE name='$user' ";
        $r1= mysqli_query($con,$q1);
        
        $row = mysqli_num_rows($r1);
        
       
        if($row > 0){
            while($a = mysqli_fetch_object($r1)){
        ?>
        <div class="name">
        <h2><?php echo $a-> name; ?></h2>
        <h5><i><?php echo $a-> usertype; ?></i></h5>
        <h4><img src="img/gmail.png" alt="gmail" style="width:1.5em; height=1.5em;"> <?php echo $a-> email; ?></h4>
        </div>
        
    </div>
    <div class="details">
        <table class="table table-borderless table-light">
            <thead>
                <tr>
                <th scope="col">User Id</th>
                <td><?php echo $a-> userId; ?></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="col">Area</th>
                <td><?php echo $a-> area; ?></td>
                </tr>
                <tr>
                <th scope="col">Address</th>
                <td><?php echo $a-> address; ?></td>
                </tr>
                <tr>
                <th scope="col">Contact Number</th>
                <td><?php echo $a-> phone; ?></td>
                </tr>
            </tbody>
    </table>
        <?php
            }
        }
    ?>
    </div>
</div>
</body>
</html>