<?php
	session_start();  
	require_once('inc/connection.php');
	$item_price=$_SESSION['item_price'];
	$value=1;
	if(isset($_POST['minus'])){
		$value=$_POST['quantity'];
		if($value>=2){
			$value=$value-1;
			$item_price=$item_price*$value;
		}
	}
	if(isset($_POST['plus'])){
		$value=$_POST['quantity'];
		if($value>0){
			$value=$value+1;
			$item_price=$item_price*$value;
		}
	}
	if(isset($_POST['order-now'])){
		$query="SELECT * FROM customer_details WHERE email='{$_SESSION['cus_email']}' LIMIT 1";
		$result=mysqli_query($connection,$query);
		if($result){
			$result_set=mysqli_fetch_assoc($result);
			$_SESSION['customer_id']=$result_set['customer_id'];
		}
		$quantity=$_POST['quantity'];
		$category_name=$_SESSION['category_name'];
		$category_id=$_SESSION['category_id'];
		$customer_id=$_SESSION['customer_id'];
		$total_price=$item_price*$quantity;

		$query="INSERT INTO orders(category_id,quantity,total_price,customer_id,order_date)VALUES('{$category_id}','{$quantity}','{$total_price}','{$customer_id}',now())";
		$result=mysqli_query($connection,$query);

			 	if($result){
			 		
			 		$success="*Your order has successfully recorded!...";
			 		
			 	}
			 }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="iframe">
		<form action="iframe-order-form.php" method="post">
			<label>Enter Quantity:</label><br>
			<button class=minus type=submit name=minus>-</button>
			<input type=text name=quantity <?php echo 'value="'.$value.'"'; ?>>
			<button class=plus type=submit name=plus>+</button><br>
			<label class="subtotal">Sub total:&nbsp;&nbsp;<?php echo "Rs.".$item_price; ?></label><br>
			<button class="order" type="submit" name="order-now">Order Now</button><br>
			<?php  
				if(!empty($success)){
					echo "<h3>".$success."</h3>";
					echo "<h3>*The  order will deliver within 2 working days...</h3>";
				}
			?>
		</form>
	</div>
</body>
</html>
