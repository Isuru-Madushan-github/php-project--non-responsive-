<?php  
	session_start();
	require_once('inc/connection.php');

	if(isset($_GET['seafood_id'])){
		$seafood_id=mysqli_real_escape_string($connection,$_GET['seafood_id']);
		$query="SELECT * FROM seafood_categories WHERE id=$seafood_id LIMIT 1";
		$result=mysqli_query($connection,$query);
		if($result){
			$result_set=mysqli_fetch_assoc($result);
			$category_name=$result_set['category_name'];
			$image_name=$result_set['image_name'];
			$quantity=$result_set['quantity'];
			$price=$result_set['price'];
			$seafood_id=$result_set['id'];

			$form='<form action="admin-login.php" method="post">';
			$form.='<input type="hidden" name="id" value="'.$seafood_id.'">';
			$form.='<p>';
			$form.='<label>category Name:</label>';
			$form.='<input type="text" name="category_name" value="'.$category_name.'">';
			$form.='</p>';
			$form.='<p>';
			$form.='<label>Image Name:</label>';
			$form.='<input type="text" name="image_name" value="'.$image_name.'">';
			$form.='</p>';
			$form.='<p>';
			$form.='<label>Quantity:</label>';
			$form.='<input type="text" name="quantity" value="'.$quantity.'">';
			$form.='</p>';
			$form.='<p>';
			$form.='<label>Price:</label>';
			$form.='<input type="text" name="price" value="'.$price.'">';
			$form.='</p>';
			$form.='<p>';
			$form.='<label>&nbsp;</label>';
			$form.='<button type="submit" name="save">Save</button>';
			$form.='</p>';
			$form.='</form>';
			$_SESSION['category_edit_form']=$form;	
			header('Location:admin-login.php');
		}
	}
?>