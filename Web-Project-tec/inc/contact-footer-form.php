<?php  
$success='';
	$name='';
	$phone='';
	$email='';
	$message='';
	$errors=array();
	if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$message=$_POST['message'];		
		if(empty(trim($_POST['name']))){
			$errors[]="You should enter your Name";
		}
		if(empty(trim($_POST['phone']))){
			$errors[]="You should enter your Phone Number";
		}
		if(empty(trim($_POST['email']))){
			$errors[]="You should enter your Email";
		}
		if(empty(trim($_POST['message']))){
			$errors[]="You should enter your Message";
		}
		if(!is_email($_POST['email'])){
			$errors[]="Email address is invalid";
		}
		if(empty($errors)){
		$name=mysqli_real_escape_string($connection,$_POST['name']);
		$phone=mysqli_real_escape_string($connection,$_POST['phone']);
		$email=mysqli_real_escape_string($connection,$_POST['email']);
		$message=mysqli_real_escape_string($connection,$_POST['message']);
		$query="INSERT INTO contact_us(name,phone,email,message)VALUES('{$name}','{$phone}','{$email}','{$message}')";
		$result=mysqli_query($connection,$query);
		if($result){
			$success="Your message has been sent successfully.";
			$success.="<br>";
			$success.="Thank you for your enquiry. It has been forwarded to the relevant department and will be dealt with as soon as possible.";
					}else{
						$errors[]="Something went wrong.";
					}
					}
		}	
?>