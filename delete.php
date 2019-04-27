<?php
include('database.php');
include('auth.php');

$orderid = $_POST['id'];

//deleting the row from table
$q1="UPDATE `order` SET `status`='order canceled' WHERE orderid='$orderid' ";
    $r1 = mysqli_query($con,$q1);

 
//redirecting to the display page (index.php in our case)
header("Location:porder.php");
?>
