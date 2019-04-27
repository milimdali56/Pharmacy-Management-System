<?php
include('auth.php');
session_start ();
require('database.php');
require 'item.php';
?>

<!DOCTYPE html>
<html>
    <head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <title>Home</title>
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
            <!-- <li><a href="profile.php"><?php echo $_SESSION['username'];?></a></li> -->
            <a href="logout.php"><button type="button" class="btn btn-outline-info logout ml-2">logout</button></a>
          </ul>
        </div>
      </div>
    <br>
<div class="container">



        <?php
$pharmacy = $_POST['pharmaid'];
// echo "pharmacy id ".$pharmacy.", ";


$p="SELECT * FROM `user` WHERE userId='$pharmacy'";
$pr1 = mysqli_query($con, $p);
$prow = mysqli_fetch_object($pr1);
$pharmacyId = $pharmacy;
$pharmacyName = $prow->name;
// echo "pharmacy name ".$pharmacyName.",  ";

$s =$_POST['total'];
$user = $_SESSION['username']; 

$u ="SELECT * FROM `user` WHERE name='$user'";
$res = mysqli_query($con,$u);
$row = mysqli_num_rows($res);

if($row > 0){
    while($a = mysqli_fetch_object($res)){
        $user = $a->name;
        $uadd= $a->address;
        $uarea = $a->area;
        $uphn= $a->phone;
        $uid = $a->userId;
        $uphn= $a->phone;
echo "<h3>Order details </h3><hr>";
echo $user."<br>Address:";
echo $uadd." <br>";
echo $uphn." <br>";
    }}
// Save new order
$q = "INSERT INTO `order`(`userId`, `pharmaId`, `total`, `userName`, `uaddress`, `uphone`, `phName`, `status`) 
VALUES ('$uid','$pharmacyId','$s','$user','$uadd', '$uphn','$pharmacyName','ordered')";

$r = mysqli_query($con, $q);
// var_dump($r." this is the value of r");
if($r){
    echo "<h4>Order placed </h4><br>";
}else{
    echo "<h4>Order not placed </h4><br>";
}

$ordersid = mysqli_insert_id($con);
echo "Your order number is ".$ordersid."<br>";

echo "Total ".$s." tk <br>";
// Save order details for new order
$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
for($i=0; $i<count($cart); $i++) {
    $mid = $cart[$i]->id;
    $mname = $cart[$i]->name;
    $pri = $cart[$i]->price;
    $quan = $cart[$i]->quantity;
    $q1= "INSERT INTO `orderInfo`(`medid`, `orderid`, `medName`, `price`, `quantity`) 
    VALUES ('$mid','$ordersid','$mname','$pri','$quan')";
    $r1 =mysqli_query($con, $q1);

}
if($r1){
    echo "<h4>Order info entered </h4><br>";
}else{
    echo "<h4>Order not info entered </h4><br>";
}
// var_dump($ordersid);
// Clear all products in cart
unset($_SESSION['cart']);



?>
Thanks for buying products. Click <a href="home.php">here</a> to continue buying.

</div>
</div>
</body>
</html>