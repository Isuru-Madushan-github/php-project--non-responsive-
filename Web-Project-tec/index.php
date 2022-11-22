<?php  
	session_start();
	require_once('inc/connection.php');
	require_once('inc/functions.php');
	include('inc/contact-footer-form.php');
	
	$query="SELECT * FROM seafood_categories";
	$result_set=mysqli_query($connection,$query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home-Ceylon Seafoods PVT. LTD.</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://kit.fontawesome.com/3e9d6bf6d8.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="wrapper">
	<?php include('inc/header.php'); ?>
	<div class="slider">
		<div class="slides">
			<input type="radio" name="radio-btn" id="radio1">
			<input type="radio" name="radio-btn" id="radio2">
			<input type="radio" name="radio-btn" id="radio3">
			<input type="radio" name="radio-btn" id="radio4">
			<input type="radio" name="radio-btn" id="radio5">

			<div class="slide first">
				<img src="images/slider/1.jpg">
			</div>
			<div class="slide">
				<img src="images/slider/2.jpeg">
			</div>
			<div class="slide">
				<img src="images/slider/3.jpg">
			</div>
			<div class="slide">
				<img src="images/slider/4.jfif">
			</div>
			<div class="slide">
				<img src="images/slider/5.jpg">
			</div>
			<div class="navigation-auto">
				<div class="auto-btn1"></div>
				<div class="auto-btn2"></div>
				<div class="auto-btn3"></div>
				<div class="auto-btn4"></div>
				<div class="auto-btn5"></div>
			</div>
		</div>
		<div class="navigation-manual">
			<label for="radio1" class="manual-btn"></label>
			<label for="radio2" class="manual-btn"></label>
			<label for="radio3" class="manual-btn"></label>
			<label for="radio4" class="manual-btn"></label>
			<label for="radio5" class="manual-btn"></label>
		</div>
	</div>
	<div class="details">
		<h1>Fresh Seafood Wholesale Supplier From Sri Lanka</h1>
		<div class="more">
			<h1>OUR PRODUCTS</h1>
			<p>Ceylon Seafoods are the best available source of freshest quality Marine & Aquaculture products in Sri Lanka. Our factories are well-equipped to feed the proliferating requisite of the client community. The policies designed by our top-tier management ensure the traceability of all our products’ quality throughout the entire supply chain. We strictly implement the HACCP food safety system in every stage of production and our products are approved by the USFDA & European Commission, Russia, China and other non-EU countries</p>
		</div>
	</div>
	<?php  
		if($result_set){
			while($records=mysqli_fetch_assoc($result_set)){
				echo "<div class=category-content>";
				echo "<div class=categories>";
				echo "<img src=\"images/details/{$records['image_name']}\"";			
				echo "</div>"; //categories
				echo "<div class=category-details>";
				echo "<h3>{$records['category_name']}</h3>";
				echo "</div>"; //category-details
				echo "<div class=order-now>";
				echo "<a href=order-now.php?id=".$records['id'].">Order Now!</a>";
				echo "</div>"; //order-now
				echo "</div>"; //category-content
			}
		}
	?>
<?php include('inc/footer.php');?>
</div>	<!--wrapper-->
<script type="text/javascript">
	var counter=1;
	setInterval(function(){
		document.getElementById('radio' + counter).checked=true;
		counter++;
		if(counter>5){
			counter=1;
		}
	},5000);
</script>
</body>
</html>
<?php mysqli_close($connection); ?>