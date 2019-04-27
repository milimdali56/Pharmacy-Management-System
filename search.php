<?php
require('database.php');
include('auth.php');
session_start ();

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Search</title>

 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/style.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
<div class="row">
                <div class="col-12"><h1>PHARMACY MANAGEMENT SYSTEM</h1></div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fullw">
        <a class="navbar-brand" href="pharmacy.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="profile.php">Profile</a>
            </li>
            <li class="nav-item active">
                <!-- <a class="nav-link" href="disOrders.php">Orders</a> -->
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="newcart.php">Cart</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="orders.php">Order Status</a>
            </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
            <a href="logout.php"><button>Logout</button></a>
            </div>
        </div>
    </nav>
    <br>
<!-- med display -->
<div class="container-fluid mb-2">
               <div class="col-sm ">
                    <form action ="search.php" method="POST" class="my-lg-0 col-12">
                    <input class="form-control badge-pill col-6 float-left mr-2" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn my-2 my-sm-0" style="background:#999999;" type="submit">Search</button>
                    </form>
                </div>
</div> 
<div class="col-12 userinfo">   
            <div class="left"></div>

            <div class="right">
                <a href="profile.php"  target="_blank"><img src="img/user.png" class="usericon" alt="<?php echo $_SESSION['username'];?>"></a>
                <a href="profile.php"  target="_blank"><h4 class="username"> <?php echo $_SESSION['username'];?></h4></a>            </div>

        </div>
        <div class="container mb-3 mt-2">
               <div class="col-sm mb-2">
                        <form action ="search.php" method="POST" class="my-lg-0 col-12">
                        <input class="form-control badge-pill col-6 float-left mr-2" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn my-2 my-sm-0 float-right" type="submit">Search</button>
                    </form>
                </div>
         </div> 
         <!-- search portion -->
        <div class="conatiner">
           
            
            <table class="table table-borderless">
			<thead class="thead-dark">
				<tr>
				<th>Name</th> 
				<th>Strength</th> 
				<th>Generic Name</th> 
				<!-- <th>Pharmacy info</th>  -->
				<th>Company</th> 
				<th>Price (TK / piece)</th> 
				</tr>
            </thead>	
		<?php
			// $con = mysqli_connect("localhost","root","Madwoman@8","reg");
			if(isset($_POST['search'])){
				$s = $_POST['search'];
				$q = "SELECT * FROM `medicine` WHERE name like '$s%%'";
			}
			$result = mysqli_query($con, $q);
                        while($row = mysqli_fetch_object($result)){
		?>

				<tr>
				<th><?php echo $row->name;?></th> 
				<th><?php echo $row->strength;?></th> 
				<th><?php echo $row->generic;?></th> 
				<!-- <th><?php echo $row->pharmainfo;?></th>  -->
				<th><?php echo $row->pharma;?></th> 
				<th><?php echo $row->price;?></th>    
				</tr>

				<?php
				}
				?>
       		</table>
            
        </div>
</div>    
</body>
</html>
