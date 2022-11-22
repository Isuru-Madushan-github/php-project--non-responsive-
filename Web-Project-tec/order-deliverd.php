<?php 
	session_start(); 
	require_once('inc/connection.php');

	if(isset($_GET['order_id'])){
	 $query="DELETE FROM orders WHERE order_id={$_GET['order_id']} LIMIT 1";
	 $result=mysqli_query($connection,$query);
	 if($result){
	 	$_SESSION['deliver_message']='Order No.'.$_GET['order_id'].' has delivered successfully...!';
	 	$_SESSION['order_id']='';
	 	header('Location:admin-login.php');
	 }
	 }
?>