<?php
require('database.php');
include('auth.php');
?>
<!DOCTYPE html>
<html>
    <head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <title>Users</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    </head>
<body>
<div class="alogo">
    <img src="img/l.png" alt="logo" style="height:80px; width:300px;">
    </div>
<div class="container-fluid fullwidth">
    <nav class="navbar navbar-expand-lg fullw">
        <a class="navbar-brand" href="admin.php">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="index.php">Add Medicine</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="disOrders.php">Orders</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="users.php">Customers & Pharmacies</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="orderstatus.php">Oder Status</a>
            </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
            <a href="logout.php"><button class="btn btn-light">Logout</button></a>
            </div>
        </div>
    </nav>
    

    <div class="container fullw">
    <h3>Customers</h3>
    <hr>
    <?php
    $q= "SELECT * FROM `user` WHERE usertype='user'";
    $r= mysqli_query($con,$q);

    if(mysqli_num_rows($r)>0){
        while($a=mysqli_fetch_object($r)){
            ?>
        <div class="col-lg-3 col-md-3 col-sm-12 mb-3 mt-3 mr-2 user">
            <img src="img/2.png" alt="user" style="width:15em;">
            <h3><?php echo $a->name;?></h3>
            <h5><?php echo $a->email;?></h5>
            <h5><?php echo $a->area;?></h5>
            <h5><?php echo $a->address;?></h5>
            <h5><?php echo $a->phone;?></h5>

        </div>
    <?php
        }
    }
    ?>

       
    </div>
    
<!-- new div -->

    <div class="container fullw">
    <h3>Pharmacies</h3>
    <hr>
    <?php
    $q= "SELECT * FROM `user` WHERE usertype='pharmacy'";
    $r= mysqli_query($con,$q);

    if(mysqli_num_rows($r)>0){
        while($a=mysqli_fetch_object($r)){
            ?>
        <div class="col-lg-3 col-md-3 col-sm-12 mb-3 mt-3 mr-2 user">
            <img src="img/pharmacy.png" alt="user" style="width:15em;">
            <h3><?php echo $a->name;?></h3>
            <h5><?php echo $a->email;?></h5>
            <h5><?php echo $a->area;?></h5>
            <h5><?php echo $a->address;?></h5>
            <h5><?php echo $a->phone;?></h5>
            <!-- <a href="delete.php?id=<?php echo $a->userId; ?>" target="_blank" class="btn btn-danger">Cancel Order</a> -->
        </div>
    <?php
        }
    }
    ?>

    </div>

</div>

</body>
</html>