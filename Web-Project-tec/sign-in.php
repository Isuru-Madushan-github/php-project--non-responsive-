<?php 
	session_start();
	require_once('inc/connection.php');
	include('inc/contact-footer-form.php');
	include('inc/functions.php');

	if(isset($_SESSION['return_cus_last_name'])){
		header("Location:index.php");
	}
	$remail='';
	if(isset($_POST['customer_signin'])){
		$remail=$_POST['remail'];
		$c_signin_errors='';
		if(empty(trim($_POST['remail']))){
			$c_signin_errors='All fields are required';
		}
		if(empty(trim($_POST['rpassword']))){
			$c_signin_errors='All fields are required';
		}
		if(empty($c_signin_errors)){
			$cus_email=mysqli_real_escape_string($connection,$_POST['remail']);
			$cus_password=mysqli_real_escape_string($connection,$_POST['rpassword']);
			$hashed_password=sha1($cus_password);

			$query="SELECT * FROM customer_details WHERE email='$cus_email' AND password='$hashed_password'";
			$result_set=mysqli_query($connection,$query);
			if($result_set){
				if(mysqli_num_rows($result_set)==1){
					$cus_user=mysqli_fetch_assoc($result_set);
					$_SESSION['return_cus_first_name']=$cus_user['first_name'];
					$_SESSION['return_cus_last_name']=$cus_user['last_name'];
					$_SESSION['customer_id']=$cus_user['customer_id'];
					$_SESSION['cus_email']=$cus_user['email'];

					header("Location:index.php");
				}else{
				$c_signin_errors='Invalid Email or Password.Please enter correct Email and Password';
			}
			}
		}
	}
	$user_name='';
	if(isset($_POST['admin_signin'])){
		$user_name=$_POST['user_name'];
		$admin_errors='';
		if(empty(trim($_POST['user_name']))){
			$admin_errors="*All Fields are required....";
		}
		if(empty(trim($_POST['admin_password']))){
			$admin_errors="*All Fields are required....";
		}
		if(empty($admin_errors)){
			$user_name=mysqli_real_escape_string($connection,$_POST['user_name']);
			$password=mysqli_real_escape_string($connection,$_POST['admin_password']);
			$hashed_password=sha1($password);

			$query="SELECT * FROM admin_users WHERE user_name='{$user_name}' AND password='{$hashed_password}'LIMIT 1";
			$result=mysqli_query($connection,$query);
			if($result){
				if(mysqli_num_rows($result)==1){
					$users=mysqli_fetch_assoc($result);
					$_SESSION['admin_name']=$users['name'];
					$_SESSION['admin_id']=$users['admin_id'];

					$query="UPDATE admin_users SET last_login=NOW() WHERE admin_id={$_SESSION['admin_id']} LIMIT 1";
					$result_set=mysqli_query($connection,$query);
					if(!$result_set){
						die("Database query failed");
					}
					header('Location:admin-login.php');
				}else{
					$admin_errors="*Username or Password invalid..Please enter correct Username and Password.....";
				}
			}else{
				$admin_errors="*Something went wrong.Please try again...";
			}
		}
	}

		$first_name='';
		$last_name='';
		$address='';
		$city='';
		$zip_code='';
		$email='';
		$phone_number='';
	if(isset($_POST['register'])){
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$address=$_POST['address'];
		$city=$_POST['city'];
		$zip_code=$_POST['zip_code'];
		$email=$_POST['email'];
		$phone_number=$_POST['phone_number'];
		$email_err='';
		$errors='';
		$wrong='';
		$fields=array('first_name','last_name','address','city','zip_code','email','phone_number','new_password');
		foreach ($fields as  $field) {
			if(empty(trim($_POST[$field]))){
				$errors='all fields are required.';
		}
		}
		if(empty($errors)){
		if(!is_email($_POST['email'])){
			$email_err='*Email Address is not valid';
		}
		}
		if(empty($errors) && empty($email_err)){
			$exist_email='';
			$email=mysqli_real_escape_string($connection,$_POST['email']);
			$query="SELECT * FROM customer_details WHERE email='{$email}' LIMIT 1";
			$result=mysqli_query($connection,$query);
			if($result){
				if(mysqli_num_rows($result)==1){
					$exist_email='email address already exists.';
				}
			}

		}
		if(empty($errors) && empty($email_err) && empty($exist_email)){
			$first_name=mysqli_real_escape_string($connection,$_POST['first_name']);
			$last_name=mysqli_real_escape_string($connection,$_POST['last_name']);
			$address=mysqli_real_escape_string($connection,$_POST['address']);
			$city=mysqli_real_escape_string($connection,$_POST['city']);
			$zip_code=mysqli_real_escape_string($connection,$_POST['zip_code']);
			$email=mysqli_real_escape_string($connection,$_POST['email']);
			$phone_number=mysqli_real_escape_string($connection,$_POST['phone_number']);
			$new_password=mysqli_real_escape_string($connection,$_POST['new_password']);
			$hashed_password=sha1($new_password);

			$query="INSERT INTO customer_details(first_name,last_name,address,city,zip_code,email,phone_number,password)VALUES('{$first_name}','{$last_name}','{$address}','{$city}','{$zip_code}','{$email}','{$phone_number}','{$hashed_password}')";
			$result=mysqli_query($connection,$query);
			if($result){
				$_SESSION['cus_email']=$email;
				$_SESSION['return_cus_first_name']=$first_name;
				$_SESSION['return_cus_last_name']=$last_name;
				header("Location:index.php");
			}else{
				$wrong='Something went wrong. Please try again later.';
			}
		}else{
			$wrong='Something went wrong. Please try again later.';
		}
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://kit.fontawesome.com/3e9d6bf6d8.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="wrapper">	
	<?php include('inc/header.php'); ?>
	<div class=first>
	<?php
		if(isset($_SESSION['item_id'])){
			echo "<h2 class=sign-first>*For orders, Please sign in with us or log into your account here!...</h2>";
			$_SESSION=array();

			if(isset($_COOKIE[session_name()])){
		//setcookie(name,value,expiration-time,affect-area)
				setcookie(session_name(),'',time()-86400,'/');
			}
			session_destroy();
		} 
	?>
	</div>
	<div class="sign-in-forms">
		<div class="part-returning">
			<h2>Returning Customer</h2>
			<p>If you are a registered customer, Please sign in below.</p>
			<?php  
				if(!empty($c_signin_errors)){
					echo "<p class=error>*".$c_signin_errors."...</p>";
				}
			?>
			<form action="sign-in.php" method="post">
				<input type="text" name="remail" placeholder="Email*" <?php echo 'value="'.$remail.'"';?>>
				<input type="password" name="rpassword" placeholder="password*">
				<button type="submit" name="customer_signin">SIGN IN</button>
			</form>
			<div class="part-admin">
			<h2>Admin User</h2>
			<p>Sign In form for Admin Users</p><br>
			<?php  
				if(!empty($admin_errors)){
					echo "<p class=error>".$admin_errors."</p>";
				}
			?>
			<form action="sign-in.php" method="post">
				<input type="text" name="user_name" placeholder="User Name*" <?php echo 'value="'.$user_name.'"'; ?>>
				<input type="password" name="admin_password" placeholder="Password*">
				<button type="submit" name="admin_signin">SIGN IN</button>
			</form>
		</div>
		</div>
		<div class="part-new">
			<h2>New Customer</h2>
			<p>Having an account with us means we store your profile on our secure server to make future visits fast, safe, and convenient.</p>
			<?php 
				if(!empty($errors)){
					echo "<p class=error>*All Fields are required....</p>";
				}
				if(!empty($email_err)){
					echo "<p class=error>*Please enter an valid Email Address....</p>";
				}
				if(!empty($exist_email)){
					echo "<p class=error>*Email Address already exists....</p>";
				}
			 ?>
			<form action="sign-in.php" method="post">
				<input type="text" name="first_name" placeholder="First Name*" <?php echo 'value="'.$first_name.'"' ?>>
				<input type="text" name="last_name" placeholder="Last Name*" <?php echo 'value="'.$last_name.'"' ?>>
				<input type="text" name="address" placeholder="Address*" <?php echo 'value="'.$address.'"' ?>>
				<input type="text" name="city" placeholder="City*" <?php echo 'value="'.$city.'"' ?>>
				<input type="text" name="zip_code" placeholder="Zip Code*" <?php echo 'value="'.$zip_code.'"' ?>>
				<input type="text" name="email" placeholder="Email*" <?php echo 'value="'.$email.'"' ?>>
				<input type="text" name="phone_number" placeholder="Phone Number*" <?php echo 'value="'.$phone_number.'"' ?>>
				<input type="password" name="new_password" placeholder="Password*">
				<button type="submit" name="register">REGISTER</button>				
			</form>
		</div>
		</div>
	<?php include('inc/footer.php'); ?>
</div>	<!--wrapper-->
</body>
</html>
<?php mysqli_close($connection); ?>