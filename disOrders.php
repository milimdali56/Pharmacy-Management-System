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
    <title>Orders for Pharmacies</title>
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

<div class="container-fluid">
<?php
$q1 = "SELECT * FROM `order` WHERE status='ordered' ";
$r1 = mysqli_query($con,$q1);

if(mysqli_num_rows($r1)>0){
   
    while($a = mysqli_fetch_object($r1)){
        $id= $a->orderid;
        ?>
        <div class="card mr-3 mb-3 mt-3" style="width: 100%; float: left;">
            <div class="card-body">
                <h5 class="card-title">Order Id: <?php echo $id;?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Customer Name: <?php echo $a->userName;?><br>
                Customer Id: <?php echo $a->userId; ?><br>
                Order Status: <?php echo $a->status; ?><br>
                Pharmacy Name: <?php echo $a->phName; ?><br>
                Total bill: <?php echo $a->total; ?><br> 
                </h6>
            <p class="card-text">
                <table class="table table-bordered">
                    <thead class="">
                        <tr>
                        <th scope="col">Med Id</th>
                        <th scope="col">Med name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        </tr>
                    </thead>
                        <?php
                        $q2= "SELECT * FROM `orderInfo` WHERE orderid='$id' ";
                        $r2 = mysqli_query($con,$q2);
                        
                        if(mysqli_num_rows($r2)>0){
                            while($b = mysqli_fetch_object($r2)){
                                ?>
                                <tbody>
                                <tr>
                                <th scope="row"><?php echo $b->medid;?></th>
                                <td><?php echo $b->medName;?></td>
                                <td><?php echo $b->quantity;?></td>
                                <td><?php echo $b->price;?> tk</td>
                                </tr>


                                <?php
                            }
                            }//medlist loop
                            ?>
                                </tbody>
                </table>
            
                <form action="" method="POST">
                <a href="orderstatus.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-dark aprbtn" >Approve Order</a>
                </form>
                
                </p>
            </div>
        </div>
                 <?php
                 
    }
}
?>
<!--    these are for the first while loop -->

</div>
</div>

</body>
</html>

