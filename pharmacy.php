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
    <title>Home</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    </head>
<body>
<?php 
    if(isset ( $_GET ['ph'] )){
        $id=$_GET ['ph'];
        $q1 = "SELECT * FROM `user` WHERE userId='$id'";
        $r1 = mysqli_query($con, $q1);

        $row = mysqli_fetch_object($r1);
        $pharmacy = $row->userId;
        ?>
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
            <li><a href="newcart.php?ph=<?php echo $row->userId;?>">Cart</a></li>
            <li><a href="orders.php">Order Status</a></li>
            <!-- <li><a href="profile.php"><?php echo $_SESSION['username'];?></a></li> -->
            <a href="logout.php"><button type="button" class="btn btn-outline-info logout ml-2">logout</button></a>
          </ul>
        </div>
      </div>
    

    <div class="container-fluid namep">
        <div class="col-12">
            <h3><?php echo $row->name;?></h3>
            <?php echo "Email : ".$row->email."<br>"; ?>
            <h6><?php echo "Address : ".$row->address; ?></h6>
        </div>
        <div class="col-6 info mb-4">
            <h4><?php echo "Area : ".$row->area;?></h4>
        </div>
        <div class="col-6 info mb-4">
            <h4><?php echo "Contact number : ".$row->phone; ?></h4>
        </div>

        <?php
    }
    ?>
    </div>
    <br>
    <!-- search part -->
<div class="container-fluid mb-2 justify-content-md-center search mb-5">
               <div class="col-sm">
                    <form action ="search.php" method="POST" class="my-lg-0 col-12">
                    <input class="form-control badge-pill col-6 float-left mr-2" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn" style="background:#999999;" type="submit">Search</button>
                    </form>
                </div>
</div> 
<!-- med display -->
<div class="container-fluid med">
        
        <div class="row med">
            
<?php
        $q = "SELECT * FROM `medicine`";
        $result = mysqli_query($con, $q);

        $rows = mysqli_num_rows($result);

        if($rows > 0){
            while($product = mysqli_fetch_object($result)){
        ?>
            <div class= "col-lg-3 col-md-3 col-sm-12 mb-2">
                <form action="" method="POST">
                <div class="card mb-3 " style="width: 18rem;" >
                        <img class="medimg mb-2 img"src ="<?php echo $product->img; ?>" alt="<?php echo $product->name; ?>">
                    <div class="card-body text-center">
                     <h4 class="card-title"><?php echo $product->id.'.' ; echo $product->name ;  ?></h4>
                        <h6 class="card-text"> <?php echo $product->pharma ;?></h6>                            
                        <h4> <?php echo $product->price ;?> tk</h4>      
                        <h6> [<?php echo $product->generic ;?>]</h6> 
                        <h6>(<?php echo $product->strength ;?>)</h6> 

                        <!-- <input type="hidden" name="pharmacy" value="<?php echo $pharmacy;?>"/> -->
                        <a href="newcart.php?mid=<?php echo $product->id; ?>&ph=<?php echo $pharmacy;?>">Add to cart</a>
                    </div>
                </div>
                </form>
            </div>

<?php
}
}
?>
      
    </div>
</body>
</html>

