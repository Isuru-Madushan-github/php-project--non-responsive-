<?php
	session_start();  
	require_once('inc/connection.php');
	require_once('inc/functions.php');
	include('inc/contact-footer-form.php');

	$csuccess='';
	$cname='';
	$cphone='';
	$cemail='';
	$csubject='';
	$cmessage='';
	$cerrors=array();
	if(isset($_POST['fsubmit'])){
		$cname=$_POST['cname'];
		$cphone=$_POST['cphone'];
		$cemail=$_POST['cemail'];
		$csubject=$_POST['subject'];
		$cmessage=$_POST['cmessage'];		
		if(empty(trim($_POST['cname']))){
			$cerrors[]="You should enter your Name";
		}
		if(empty(trim($_POST['cphone']))){
			$cerrors[]="You should enter your Phone Number";
		}
		if(empty(trim($_POST['cemail']))){
			$cerrors[]="You should enter your Email";
		}
		if(empty(trim($_POST['cmessage']))){
			$cerrors[]="You should enter your Message";
		}
		if(!is_email($_POST['cemail'])){
			$cerrors[]="Email address is invalid";
		}
		if(empty($cerrors)){
		$cname=mysqli_real_escape_string($connection,$_POST['cname']);
		$cphone=mysqli_real_escape_string($connection,$_POST['cphone']);
		$cemail=mysqli_real_escape_string($connection,$_POST['cemail']);
		$csubject=mysqli_real_escape_string($connection,$_POST['subject']);
		$cmessage=mysqli_real_escape_string($connection,$_POST['cmessage']);
		$cquery="INSERT INTO contact_us(name,phone,email,subject,message)VALUES('{$cname}','{$cphone}','{$cemail}','{$csubject}','{$cmessage}')";
		$cresult=mysqli_query($connection,$cquery);
		if($cresult){
			$csuccess="Your message has been sent successfully.";
			$csuccess.="<br>";
			$csuccess.="Thank you for your enquiry. It has been forwarded to the relevant department and will be dealt with as soon as possible.";
					}else{
						$cerrors[]="Something went wrong.";
					}
					}
		}	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://kit.fontawesome.com/3e9d6bf6d8.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="wrapper">
	<?php include('inc/header.php');?>
		<div class="top-image">
			<img src="images/contact-us-page.jfif">
		</div>
		<div class="content">
			<div class="content-part-one">
				<h2 class="contact-h2">Contact Us For All Your Seafood Needs</h2>
				<p class="contact-p">Let us know your requirements and we are happy to help. Whether you are a wholesale retailer, a supermarket chain, a restaurant or just anyone in need of a reliable supplier, we can offer you the best.</p>
				<h3 class="contact-h3">Ceylon Seafood Pvt Ltd</h3>
				<ul>
					<li><i class="fas fa-map-marker-alt"></i>Address</li>
					<p>Ceylon Seafood Pvt Ltd <br>No:115/8 Malwatta Road<br>Colombo 7.</p>
					<li><i class="fas fa-envelope"></i>Email</li>
					<p>info@ceylonseafoods.com</p>
					<li><i class="fas fa-phone-alt"></i>Phone</li>
					<p>011-8246781</p>
					<li><i class="fas fa-fax"></i>Fax</li>
					<p>011-8246782</p>
					<li><i class="fas fa-globe-europe"></i>Website</li>
					<p>Ceylonseafoods.com</p>
				</ul>
			</div>
			<div class="content-part-two">
					<h1 class="part-two-h1">CONTACT US</h1>
					<p class="part-two-p">Our professionals are available to attend to your needs</p>
					<?php  
						if (!empty($cerrors)) {
							echo "<div class=errmsg>";
							echo "<p>For successfull messege:</p> <br>";
							echo "</div>";
					foreach ($cerrors as $cerror) {
							echo "<div class=errmsg>";
							echo "<p>"."&nbsp;"."&nbsp;"."&nbsp;"."-".$cerror."</p><br>";
							echo "</div>";
						}
					}
					?>
					<form action="contact-us.php" method="post">
						<input type="text" name="cname" placeholder="Your Name*" <?php echo 'value="'.$cname.'"' ?>>
						<input type="text" name="cphone" placeholder="Your Phone*" <?php echo 'value="'.$cphone.'"' ?>>
						<input type="text" name="cemail" placeholder="Your Email*"<?php echo 'value="'.$cemail.'"' ?>>
						<input type="text" name="subject" placeholder="Subject*" <?php echo 'value="'.$csubject.'"' ?>>
						<input type="text" name="cmessage" placeholder="Message*" <?php echo 'value="'.$cmessage.'"' ?>><br>
						<?php if(!empty($csuccess)){
					echo "<br>";
					echo "<div class=success>";
					echo "<p>".$csuccess."</p>";
					echo "</div>";
				} ?>
						<button type="submit" name="fsubmit">SUBMIT</button>
					</form>
				</div>
		</div>
	<?php include('inc/footer.php');?>
	</div>
</body>
</html>
<?php mysqli_close($connection); ?>