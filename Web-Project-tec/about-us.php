<?php  
	session_start();
	require_once('inc/connection.php');
	require_once('inc/functions.php');
	include('inc/contact-footer-form.php');
?>	
<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://kit.fontawesome.com/3e9d6bf6d8.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="wrapper">
	<?php include('inc/header.php'); ?>
		<div class="top-image">
			<img src="images/about-us-page.jpg">
		</div>
		<div class="content">
			<h1>About Us</h1>
			<h3>Leading best source for fresh Seafoods from the Sri Lanka</h3>
			<h3 class="company-name">Ceylon Fisheries</h3>
			<p>ceylon Fisheries is the largest seafood saler from the Sri Lanka. Founded in 2020, Ceylon comes from the artisanal fishery communities of the Maldives, promoting its traditionally unique 100% sustainable one-by-one Pole-and-Line & Hand-Line fisheries.<br>Healthy & delicious, our products base is built to cater to our customers’ needs.</p>
			<p>There’s is a high demand for Sri Lankan's Seafoods, due to its unmatched sustainability, traceability, and quality. With our sales offices in Colombo, Jafna, and Batticaloa, we are continually looking to expand and diversify our markets. Our aim is to bring premium quality sustainable Sri Lankas to more markets worldwide – giving back to our fishermen the best premium possible.</p>
			<div class="content-part">	
			<div class="part-content">
				<h2>QUALITY OF PRODUCTS</h2>
				<p>To ensure our Customers re-order, Quality Standards need to be at the highest level.At the point of Picking/Harvesting and Packaging, trained Quality Assurance staff are hands-on, as we are fully aware of the expectations of our consumers.Re-usable or Returnable styrofoam boxes with lids which keep produce chilled, fresh and safe from germs, till the point of Delivery are transported in fully-enclosed trucks to ensure strict hygiene standards are achieved.</p>
			</div>
			<div class="part-content">
				<h2>DELIVERY TWICE PER WEEK</h2>
				<p>The practicality of delivering perishables daily, from almost 200KMs away to Colombo is daunting. To guarantee a smooth operation and minimize disappointing our valued customers, we will be carrying-out deliveries on Wednesday & Saturday. Deliveries will start as early as 7:30AM up to 7:30PM on these days.Customers will be contacted by our Delivery Team, an hour in advance to coordinate collection.</p>
				<p>Cut-off Time for Wednesday Deliveries: Tuesday 10:00 AM</p>
				<p>Cut-off Time for Saturday Deliveries: Friday 10:00 AM</p>
			</div>
			</div>
		</div>
	<?php include('inc/footer.php'); ?>
	</div>
</body>
</html>
<?php mysqli_close($connection); ?>