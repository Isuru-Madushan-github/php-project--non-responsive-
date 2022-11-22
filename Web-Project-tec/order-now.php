<?php 
	session_start();
	require_once('inc/connection.php');
	include('inc/functions.php');
	include('inc/contact-footer-form.php');

	if(!isset($_SESSION['return_cus_last_name'])){
		if(isset($_GET['id'])){
		$_SESSION['item_id']=$_GET['id'];
		header("Location:sign-in.php");	
		}
		
	}
	
	
	$query="SELECT * FROM seafood_categories WHERE id='{$_GET['id']}'";
	$result=mysqli_query($connection,$query);
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<?php include('inc/header.php'); ?>
	<?php if($result){
		
		while($records=mysqli_fetch_assoc($result)){
			echo "<div class=records>"; 
			echo "<div class=img>";
			echo "<img src=\"images/details/{$records['image_name']}\">";
			echo "</div>";	//.img	
			echo "<div class=img-details>";
			echo "<div class=name-stock>";
			echo "<h2>{$records['category_name']}</h2>";
			$_SESSION['category_name']=$records['category_name'];
			$_SESSION['category_id']=$records['id'];
			echo "<p>(In Stock"." "."{$records['quantity']}Kg)</p><br>";
			echo "</div>";	//.name-stock
			echo "<p>Rs.{$records['price']}.00</p>";
			$_SESSION['item_price']=$records['price'];
			echo "</div>";	//.img-details
			echo "<div class=content-order-form>";
			echo "<iframe src=iframe-order-form.php ></iframe>";
			echo "</div>";	//content-order-form
			echo "</div>";	//.records
		} 
		}
	?>
	<?php include('inc/footer.php'); ?>
</body>
</html>