<?php 
	$connection=mysqli_connect('localhost','root','','seafood_company');

	if (mysqli_connect_errno()) {
		die("Database Connection Failed:".mysqli_connect_error());
	}
 ?>