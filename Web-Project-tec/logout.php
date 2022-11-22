<?php  
	session_start();

	$_SESSION=array();

	if(isset($_COOKIE[session_name()])){
		//setcookie(name,value,expiration-time,affect-area)
		setcookie(session_name(),'',time()-86400,'/');
	}
	session_destroy();

	header('Location:index.php');
?>
