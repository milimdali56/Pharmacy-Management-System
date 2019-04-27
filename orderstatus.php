<?php
require('database.php');
session_start();
include('auth.php');
?>
<!DOCTYPE html>
<html>
    <head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <title>Order Status</title>
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
    <br>

 <div class="container orders">
 <h2><b>Order Status</b></h2>
 </div>
    <?php
    $orderid = $_GET['id'];
    
    $q1="UPDATE `order` SET `status`='order proceed' WHERE orderid='$orderid' ";
    $r1 = mysqli_query($con,$q1);
    
    if($r1){
        $q2="SELECT * FROM `order` WHERE orderid='$orderid' ";
        $r2 = mysqli_query($con,$q2);

    if(mysqli_num_rows($r2)>0){
        while($a=mysqli_fetch_object($r2)){
        ?>
        <div class="alert alert-success" role="alert">
  


        Order Id: <?php echo $a->orderid;?><br>
        Order Status: <?php echo $a->status;?><br>
        Customer Name: <?php echo $a->userName;?><br>
        Customer Id: <?php echo $a->userId; ?><br>
        Pharmacy Name: <?php echo $a->phName; ?><br>
        Total bill: <?php echo $a->total; ?> tk <br> 
            
        </div>
       <?php     
        }
    }
    }else{
        ?>
        <div class="alert alert-danger" role="alert">
            Order Status is not updated!
        </div>
    <?php
        }
  

// other order status;
        $q3="SELECT * FROM `order` ";
        $r3 = mysqli_query($con,$q3);
        ?>
        <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">Order Id</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Pharmacy</th>
            <th scope="col">Date</th>
            <th scope="col">Total</th>
            <th scope="col">Status</th>
            </tr>
        </thead>
        
        
    <?php
    if(mysqli_num_rows($r3)>0){
        while($b=mysqli_fetch_object($r3)){
    ?>
        <tbody>
          <tr>
            <th scope="row"><?php echo $b->orderid;?></th>
            <td><?php echo $b->userName;?></td>
            <td><?php echo $b->phName; ?></td>
            <td><?php echo $b->date;?></td>
            <td><?php echo $b->total; ?> tk</td>

            

            <?php 
                $status= $b->status;
                if($status=='order delivered'){
                    ?> 
                <td style="color:green;"><?php echo $status; ?></td>
                <?php
                }elseif($status=='ordered'){
                ?> 
                <td style="color:#2888b4;"><?php echo $status; ?></td>
                <?php
                }elseif($status=='order proceed'){
                ?>
                <td style="color:rgb(255, 217, 0);"><?php echo $status; ?></td>
                <?php
                }else{
                ?>
                <td style="color:red;" ><?php echo $status; ?></td>
                <?php
                }
                            
                ?>
            
          </tr>
        </tbody>
    <?php
        }
    }
        ?>
</table>
</div>

</body>
</html>