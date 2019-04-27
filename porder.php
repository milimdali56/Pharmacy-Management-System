<?php
require('database.php');
include('auth.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Orders</title>

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
$user = $_SESSION['username'];
// echo $user;
$q1 = "SELECT * FROM `order` WHERE status='order proceed' and phName ='$user' ";
$r1 = mysqli_query($con,$q1);

if(mysqli_num_rows($r1)>0){
   
    while($a = mysqli_fetch_object($r1)){
    
        $id= $a->orderid;
        ?>
        <div class="card mr-3 mb-3 mt-3" style="width: 25rem; float: left;">
             <div class="card-body">
            <h5 class="card-title">Order Id: <?php echo $id;?></h5>
            <h6 class="card-subtitle mb-2 text-muted">Customer Name: <?php echo $a->userName;?><br>
            Customer Id: <?php echo $a->userId; ?><br>
            Order Status: <?php echo $a->status; ?><br>
            Pharmacy Name: <?php echo $a->phName; ?><br>
            Total bill: <?php echo $a->total; ?><br> </h6>

            <p class="card-text">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Med Id</th>
                        <th scope="col">Med name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        </tr>
                    </thead>
            <?php
            $q3= "SELECT * FROM `orderInfo` WHERE orderid='$id'";
            $r3= mysqli_query($con,$q3);
            if(mysqli_num_rows($r3)>0){
                while($b = mysqli_fetch_object($r3)){
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
            }
            ?>
            <!-- med list loop -->
            </tbody>
                </table>
            </p>

            <!-- table of med -->
            
            <form action="" method="POST">
            <a href="deliver.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-dark">Order delivered</a>
            <a href="delete.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-danger">Cancel Order</a> 
            </form>
          
            
        </div>
    </div>
   <?php         
}

}else{
    echo "No order accepted";
}


?>



</div>
</body>
</html>