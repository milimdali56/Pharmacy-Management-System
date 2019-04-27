<?php
require('database.php');
include('auth.php');
session_start ();
?>
<!DOCTYPE html>
<html>
    <head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <title>Orders</title>
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
        <div class="col-12 orders">
        <h3>Orders Information & Status</h3>
        <?php
        $user=$_SESSION['username'];
        $q1 = "SELECT * FROM `order` WHERE userName='$user' ";
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
                        </h6> <?php 
                        $status= $a->status;
                        if($status=='order delivered'){
                            ?> 
                        <h6 style="color:green;" class="card-subtitle mb-2">Order Status : <?php echo $status; ?></h6>
                            <?php
                        }elseif($status=='ordered'){
                            ?> 
                        <h6 style="color:#2888b4;" class="card-subtitle mb-2">Order Status : <?php echo $status; ?></h6>
                            <?php
                        }elseif($status=='order proceed'){
                            ?> 
                        <h6 style="color:rgb(255, 217, 0);" class="card-subtitle mb-2">Order Status : <?php echo $status; ?></h6>
                            <?php
                        }else{
                            ?>
                        <h6 style="color:red;" class="card-subtitle mb-2 ">Order Status : <?php echo $status; ?></h6>
                            <?php
                        }
                            
                         ?>
                         <h6 class="card-subtitle mb-2 text-muted">
                        Pharmacy Name: <?php echo $a->phName; ?><br>
                      <b> Total bill: <?php echo $a->total; ?></b> <br> 
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