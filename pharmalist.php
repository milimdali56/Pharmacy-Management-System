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
    <title>location</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    </head>
    <body>
    
       <div class="container-fluid header">
        <!-- navbar start -->
        <div class="navbar pharmalistnav">
            <div class="col-5 navopt">
            <ul class="opt1">
                <li><a href="home.php" style="color: #25314B;">Home</a></li>
            <li><a href="profile.php" style="color: #f8f6f1;"><?php echo $_SESSION['username'];?></a></li>

                <!-- <li><a href="#" style="color: #25314B;">Pharmacies</a></li> -->
                <!-- <li><a href="" style="color: #25314B;">Quick Order</a></li> -->
            </ul>
            </div>
            <div class="col-2 logo">
            <img src="img/phl.png" alt="logo" style="height:80px; width:300px;">
            </div>
            <div class="col-5 navopt">
            <ul class="opt2">
                <li><a href="newcart.php" style="color: #25314B;">Cart</a></li>
                <li><a href="orders.php" style="color: #25314B;">Order Status</a></li>
                <!-- <li><a href="profile.php" style="color: #25314B;"><?php echo $_SESSION['username'];?></a></li> -->
                <a href="logout.php"><button type="button" class="btn btn-outline-dark logout ml-2">logout</button></a>
            </ul>
            </div>
        </div> 
        <!-- navbar end -->
        <?php
		if(isset($_POST['location'])) {
            $location = $_POST['location'];
            $q= "SELECT * FROM `user` WHERE usertype='pharmacy' and area='$location' ";
            $result = mysqli_query($con, $q);
        ?>
        <div class="container-fluid pharmah">
            <img src="img/a.gif" alt="" style="height:100%; width: 50%;">
            <b style="font-size: 4em;"><?php echo $location?></b>
        </div>

        <div class="container-fluid pharmalist">
        <?php
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_object($result)){?>
                <div class="col-sm-12 col-md-4 col-4 fst">
                    <img src="img/ph.jpeg" alt="pharmacy" style="width:100%; height: 15em;">
                    <a href="pharmacy.php?ph=<?php echo $row->userId; ?>"><b><?php echo $row->name;?><br></b> </a>
                    <?php echo "Area : ".$row->area;?><br>
                    <?php echo "Contact number : ".$row->phone;?><br>
                    <?php echo "Address : ".$row->address;?><br>
                    <?php echo "Email : ".$row->email;?>
                </div>
              
           <?php  }
        }else{
          ?>
            <div class="col-12 justify-content-md-center">
                <h3>No pharmacy is listed in this area</h3>
            </div>  
          <?php
        }
        ?>
            

        </div>
       </div> 
<?php
        }
        ?>
    </body>
</html>