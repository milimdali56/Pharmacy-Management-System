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
    <title>Pharmacy</title>
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
<!-- navbar end -->

<!-- med display -->
<div class="col-12 cart">   

<?php
require 'item.php';

$pharmacy = $_GET['ph'];

if (isset ( $_GET ['mid'] ) && !isset($_POST['update'])) {

	$result = mysqli_query ( $con, 'select * from medicine where id=' . $_GET ['mid'] );
	$product = mysqli_fetch_object ( $result );
	$item = new Item ();
	$item->id = $product->id;
	$item->name = $product->name;
	$item->price = $product->price;
	$item->strength = $product->strength;
	$item->pharma = $product->pharma;
	$item->generic = $product->generic;
	$item->quantity = 1;
	// Check product is existing in cart
	$index = - 1;
	if (isset ( $_SESSION ['cart'] )) {
		$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
		for($i = 0; $i < count ( $cart ); $i ++)
		if ($cart [$i]->id == $_GET ['mid']) {
			$index = $i;
			break;
		}
	}
	if ($index == - 1)
	$_SESSION ['cart'] [] = $item;
	else {
		$cart [$index]->quantity ++;
		$_SESSION ['cart'] = $cart;
	}
}

// Delete product in cart
if (isset ( $_GET ['index'] ) && !isset($_POST['update'])) {
	$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
	unset ( $cart [$_GET ['index']] );
	$cart = array_values ( $cart );
	$_SESSION ['cart'] = $cart;
}

// Update quantity in cart
if(isset($_POST['update'])) {
	$arrQuantity = $_POST['quantity'];

	// Check validate quantity
	$valid = 1;
	for($i=0; $i<count($arrQuantity); $i++)
	if(!is_numeric($arrQuantity[$i]) || $arrQuantity[$i] < 1){
		$valid = 0;
		break;
	}
	if($valid==1){
		$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
		for($i = 0; $i < count ( $cart ); $i ++) {
			$cart[$i]->quantity = $arrQuantity[$i];
		}
		$_SESSION ['cart'] = $cart;
	}
	else
		$error = 'Quantity is InValid';
}

?>
<?php echo isset($error) ? $error : ''; ?>
<form method="post">
	<table cellpadding="8" cellspacing="2" border="1">
		<tr>
			<th>Option</th>
			<th>Id</th>
			<th>Name</th>
			<th>Price(tk)</th>
			<th>Strength</th>
			<th>Company</th>
			<th>Generic</th>
			<th>Quantity </th>
			<th>Total</th>
		</tr>
		<?php
		$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
		$s = 0;
		$index = 0;
		for($i = 0; $i < count ( $cart ); $i ++) {
			$s += $cart [$i]->price * $cart [$i]->quantity;
			?>
		<tr>
			<td><a href="newcart.php?index=<?php echo $index; ?>"
				onclick="return confirm('Are you sure?')">Delete</a></td>
			<td><?php echo $cart[$i]->id; ?></td>
			<td><?php echo $cart[$i]->name; ?></td>
			<td><?php echo $cart[$i]->price; ?>tk</td>
			<td><?php echo $cart[$i]->strength; ?></td>
			<td><?php echo $cart[$i]->pharma; ?></td>
			<td><?php echo $cart[$i]->generic; ?></td>
			<td><input type="text" value="<?php echo $cart[$i]->quantity; ?>"
				style="width: 50px;" name="quantity[]"></td>
			<td><?php echo $cart[$i]->price * $cart[$i]->quantity; ?> tk</td>
		</tr>
		<?php
		$index ++;
		}
		?>
		<tr>
			<td colspan="8" align="right">Sum
			<input type="image" style="height:30px; width:30px;" src="https://freeiconshop.com/wp-content/uploads/edd/calculator-flat.png"> 
			<input type="hidden" name="update">
			</td>
			<td align="left"><?php echo $s; ?> tk</td>
		</tr>
	</table>
</form>
<br>
<!-- <?php 
 echo "pharma id ".$pharmacy;
?> -->
<a href="pharmacy.php?ph=<?php echo $pharmacy;?>">Continue Shopping</a>
<form action="ncko.php" method="POST">
<input type="hidden" name="total" value="<?php echo $s;?>" />
<input type="hidden" name="pharmaid" value="<?php echo $pharmacy;?>" />
<input type="submit" value="Checkout"/>
            </form>
<!-- <a href="checkout.php">checkout</a> -->
</div>
</body>
</html>

