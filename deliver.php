<?php
require('database.php');
include('auth.php');
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Delivery</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <!-- bootstrap -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

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
            <a href="pharma.php">Pharmacy panel</a>
            <a href="porder.php">Orders</a>
            <a href="history.php">Order history</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</div>
<div class="container pharmacy">
    <?php
    $orderid = $_GET['id'];
    
    $q1="UPDATE `order` SET `status`='order delivered' WHERE orderid='$orderid' ";
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
    }
        ?>
</div>
    </body>
    </html>
