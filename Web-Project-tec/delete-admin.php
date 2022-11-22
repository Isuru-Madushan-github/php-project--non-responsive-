<?php  
	session_start();
	require_once('inc/connection.php');
	if(isset($_GET['admin_id'])){
		$admin_id=mysqli_real_escape_string($connection,$_GET['admin_id']);
		$_SESSION['admin_delete_id']=$admin_id;
		$_SESSION['admin_delete_name']=$_GET['admin_name'];
		$confirm='Do you really want to delete user '.$_GET['admin_name'].': ';
		$confirm.='<form action=admin-login.php method=post>';
		$confirm.='<button class=confirm type=submit name="yes">Yes</button>';
		$confirm.='<button class=confirm type=submit name="no">No</button>';
		$confirm.='</form>';
		$_SESSION['admin_delete_yes/no']=$confirm;
		header('Location:admin-login.php?');
		}
?>