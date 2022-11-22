<?php  
	session_start();
	require_once('inc/connection.php');

	if(isset($_GET['admin_id'])){
		$admin_id=mysqli_real_escape_string($connection,$_GET['admin_id']);

		$query="SELECT * FROM admin_users WHERE admin_id={$admin_id} LIMIT 1";
		$result=mysqli_query($connection,$query);
		if($result){
			$result_set=mysqli_fetch_assoc($result);
			$form='<form action="admin-login.php" method="post">';
			$form.='<input type="hidden" name="id" value="'.$result_set['admin_id'].'">';
			$form.='<p>';
			$form.='<label>Admin Name:</label>';
			$form.='<input type="text" name="admin_name" value="'.$result_set['name'].'">';
			$form.='</p>';
			$form.='<p>';
			$form.='<label>Admin User Name:</label>';
			$form.='<input type="text" name="user_name" value="'.$result_set['user_name'].'">';
			$form.='</p>';
			$form.='<p>';
			$form.='<label>&nbsp;</label>';
			$form.='<span>*******</span> | <a href=change-password.php?admin_id='.$result_set['admin_id'].'>Change Password</a>';
			$form.='</p>';
			$form.='<p>';
			$form.='<label>&nbsp;</label>';
			$form.='<button type="submit" name="admin_save">Save</button>';
			$form.='</p>';
			$form.='</form>';
			$_SESSION['admin_edit_form']=$form;	
			header('Location:admin-login.php');
		}
	}
	
?>