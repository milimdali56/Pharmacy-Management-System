<?php
require('database.php');
session_start();
include('auth.php');
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Order History</title>

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
<div class="container-fluid">
    <?php
    // other order status;
    $user = $_SESSION['username'];
            $q3="SELECT * FROM `order` where phName='$user' and status='order delivered' ";
            $r3 = mysqli_query($con,$q3);

            $q4="SELECT * FROM `order` where phName='$user' and status='order canceled' ";
            $r4 = mysqli_query($con,$q4);
            if($r4){

          
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
                <td style="color: green;"><?php echo $b->status;?></td>
            </tr>
            
            </tbody>
        <?php
            }
        }
        
        if(mysqli_num_rows($r4)>0){
            while($c =mysqli_fetch_object($r4)){
        ?>
            <tbody>
            <tr>
                <th scope="row"><?php echo $c->orderid;?></th>
                <td><?php echo $c->userName;?></td>
                <td><?php echo $c->phName; ?></td>
                <td><?php echo $c->date;?></td>
                <td><?php echo $c->total; ?> tk</td>
                <td style="color: red;"><?php echo $c->status;?></td>
            </tr>
            
            </tbody>
        <?php
            }
        }
    }else{
        echo "<h3>No Order History</h3>";
    }

            ?>

    </table>
</div>

</body>
</html>