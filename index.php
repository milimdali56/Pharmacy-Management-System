<?php
session_start ();
require('database.php');
include('auth.php');
?>
<html> 
<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <title>Admin</title>
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
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Add Medicine</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="disOrders.php">Orders</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="users.php">Customers & Pharmacies</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="orderstatus.php">Oder Status</a>
            </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
            <a href="logout.php"><button class="btn btn-light">Logout</button></a>
            </div>
        </div>
    </nav>

<div class="container">
<form enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
    <input type="text" name="name" placeholder="Name" required/><br>
    <input type="text" name="gen" placeholder="Generic name" required/><br>
    <input type="text" name="strength" placeholder="Strength" required /><br>
    <input type="text" name="pharma" placeholder="Company name" required /><br>
    <input type="text" name="price" placeholder="Price" required/><br><br>
    Choose a file to upload: <input name="uploaded_file" type="file" />
    <input type="submit" value="Upload" />
  </form> 
  
  <?php
// if($con){
//   echo "connected";
// }

//Check that we have a file
if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
    //Check if the file is JPEG image and it's size is less than 350Kb
    $filename = basename($_FILES['uploaded_file']['name']);
    $name = $_POST['name'];
    $generic = $_POST['gen'];
    $str = $_POST['strength'];
    $com = $_POST['pharma'];
    $pri = $_POST['price'];

    $ext = substr($filename, strrpos($filename, '.') + 1);
    
      //Determine the path to which we want to save this file
        $newname = dirname(__FILE__).'/medImg/'.$filename;
        $imgd = 'medImg/'.$filename;
        // echo "the directory".$imgd."<br>";
        //Check if the file with the same name is already exists on the server
        if (!file_exists($newname)) {
          //Attempt to move the uploaded file to it's new place
          if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) {
            ?>
            <div class="alert alert-success" role="alert">
            <?php
             echo "It's done! The file has been saved in: ".$newname."<br><br>";
             echo "Upload Information : <br>";
             echo "Name - ".$name."<br> Strength - ".$str."<br> Price - ".$pri." tk <br> Generic - ".$generic." <br> Company - ".$com."<br> Image Directory - ".$imgd."<br> ";
             $q = "INSERT INTO `medicine`(`name`, `generic`, `price`, `img`, `strength`, `pharma`) VALUES ('$name','$generic','$pri', '$imgd','$str','$com')";
              $qry = mysqli_query($con, $q);

            //  var_dump($qry);

             if($qry){
              echo "Image uploaded ";
              ?>
              </div>
              <?php
            }else{
              ?>
              <div class="alert alert-danger" role="alert">
              <?php
              echo "image not uploaded ";
            }  
// uploading to database
          } else {
             echo "Error: A problem occurred during file upload!";
          }
        }else{
           echo "Error: File ".$_FILES["uploaded_file"]["name"]." already exists";
             }
             ?>
             </div>
             <?php
  //      } else {
  //  echo "Error: No file uploaded";
  //      }
      }
  ?>
</div>

</div>
</body> 
</html>