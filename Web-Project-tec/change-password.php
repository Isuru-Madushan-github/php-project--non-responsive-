<?php 
session_start(); 
	require_once('inc/connection.php');
	if(!isset($_GET['admin_id'])){
		header('Location:admin-login.php');
	}
	$admin_id=mysqli_real_escape_string($connection,$_GET['admin_id']);

		$query="SELECT * FROM admin_users WHERE admin_id={$admin_id} LIMIT 1";
		$result=mysqli_query($connection,$query);
		if($result){
			$result_set=mysqli_fetch_assoc($result);
			$form='<form action="admin-login.php" method="post">';
			$form.='<input type="hidden" name="id" value="'.$result_set['admin_id'].'">';
			$form.='<p>';
			$form.='<label>Admin Name:</label>';
			$form.='<input type="text" name="admin_name" value="'.$result_set['name'].'" disabled>';
			$form.='</p>';
			$form.='<p>';
			$form.='<label>Admin User Name:</label>';
			$form.='<input type="text" name="user_name" value="'.$result_set['user_name'].'" disabled>';
			$form.='</p>';
			$form.='<p>';
			$form.='<label>New Password:</label>';
			$form.='<input type=password name=password>';
			$form.='</p>';
			$form.='<p>';
			$form.='<label>&nbsp;</label>';
			$form.='<button type="submit" name="change_password">Update Password</button>';
			$form.='</p>';
			$form.='</form>';
			$_SESSION['admin_change_pass_form']=$form;	
			header('Location:admin-login.php');
		}

?>