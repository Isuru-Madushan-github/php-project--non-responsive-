<?php 
	session_start(); 
	require_once('inc/connection.php');

		if(isset($_GET['seafood_id'])){
	 	$seafood_id=mysqli_real_escape_string($connection,$_GET['seafood_id']);
	 	$query="DELETE FROM seafood_categories WHERE id={$seafood_id} LIMIT 1";
	 	$result=mysqli_query($connection,$query);
	 	if($result){
	 		$_SESSION['seafood_delete_message']='Seafood category No.'.$seafood_id.' has deleted successfully...!';
	 	header('Location:admin-login.php');
	 	}
	 	}
?>