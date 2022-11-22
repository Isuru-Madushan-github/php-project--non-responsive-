<?php  
	session_start();
	require_once('inc/connection.php');
	if(!isset($_SESSION['admin_name'])){
		header('Location:sign-in.php');
	}
	if(isset($_POST['customer_details'])){
		$_SESSION['admin_change_pass_form']='';
		$_SESSION['admin_delete_yes/no']='';
		$_SESSION['admin_edit_success']='';
		$_SESSION['admin_edit_form']='';	
		$_SESSION['category_add_form']='';
		$_SESSION['category_edit_form']='';
		$_SESSION['seafood_delete_message']='';
		$_SESSION['deliver_message']='';
		$query="SELECT * FROM customer_details";
		$result=mysqli_query($connection,$query);
		if($result){
			$table='<table>';
			$table.='<tr><th>Customer ID</th><th>First Name</th><th>Last Name</th><th>Address</th><th>Zip Code</th><th>Email</th><th>Phone Number</th></tr>';
			while($result_set=mysqli_fetch_assoc($result)){
				$table.='<tr>';
				$table.='<td>'.$result_set['customer_id'].'</td>';
				$table.='<td>'.$result_set['first_name'].'</td>';
				$table.='<td>'.$result_set['last_name'].'</td>';
				$table.='<td>'.$result_set['address'].'</td>';
				$table.='<td>'.$result_set['zip_code'].'</td>';
				$table.='<td>'.$result_set['email'].'</td>';
				$table.='<td>'.$result_set['phone_number'].'</td>';
				$table.='</tr>';
			}
			$table.='</table>';
		}
	}
	if(isset($_POST['view_orders'])){
		$_SESSION['admin_change_pass_form']='';
		$_SESSION['admin_delete_yes/no']='';
		$_SESSION['admin_edit_success']='';
		$_SESSION['admin_edit_form']='';
		$_SESSION['category_add_form']='';
		$_SESSION['category_edit_form']='';
		$_SESSION['deliver_message']='';
		$_SESSION['seafood_delete_message']='';
		$query="SELECT * FROM orders";
		$result=mysqli_query($connection,$query);
		if($result){
			$table='<table>';
			$table.='<tr><th>Customer ID</th><th>Category ID</th><th>Quantity</th><th>Total Price</th><th>Order Date</th><th</th></tr>';
			while($result_set=mysqli_fetch_assoc($result)){
				$table.='<tr>';
				$table.='<td>'.$result_set['customer_id'].'</td>';
				$table.='<td>'.$result_set['category_id'].'</td>';
				$table.='<td>'.$result_set['quantity'].'</td>';
				$table.='<td>'.$result_set['total_price'].'</td>';
				$table.='<td>'.$result_set['order_date'].'</td>';
				$_SESSION['order_id']=$result_set['order_id'];
				$table.='<td><a href="order-deliverd.php?order_id='.$result_set['order_id'].'">Delivered</a></td>';
				$table.='</tr>';
			}
				$table.="</table>";
		}
			
		
	}
	if(isset($_POST['view_d_orders'])){
		$_SESSION['admin_change_pass_form']='';
		$_SESSION['admin_delete_yes/no']='';
		$_SESSION['admin_edit_success']='';
		$_SESSION['admin_edit_form']='';
		$_SESSION['category_add_form']='';
		$_SESSION['category_edit_form']='';
		$_SESSION['deliver_message']='';
		$_SESSION['seafood_delete_message']='';
		$query="SELECT * FROM delivered_orders";
		$result=mysqli_query($connection,$query);
		if($result){
			$table='<table>';
			$table.='<tr><th>Order ID</th><th>Customer ID</th><th>Category ID</th><th>Quantity</th><th>Total Price</th><th>Delivered Date</th></tr>';
			while($result_set=mysqli_fetch_assoc($result)){
				$table.='<tr>';
				$table.='<td>'.$result_set['order_id'].'</td>';
				$table.='<td>'.$result_set['customer_id'].'</td>';
				$table.='<td>'.$result_set['category_id'].'</td>';
				$table.='<td>'.$result_set['quantity'].'</td>';
				$table.='<td>'.$result_set['total_price'].'</td>';
				$table.='<td>'.$result_set['deliver_date'].'</td>';
				$table.='</tr>';
			}
			$table.="</table>";
		}
	}
	if(isset($_POST['view_seafood'])){
		$_SESSION['admin_change_pass_form']='';
		$_SESSION['admin_delete_yes/no']='';
		$_SESSION['admin_edit_success']='';
		$_SESSION['admin_edit_form']='';
		$_SESSION['category_add_form']='';
		$_SESSION['category_edit_form']='';
		$_SESSION['deliver_message']='';
		$_SESSION['seafood_delete_message']='';
		$query="SELECT * FROM seafood_categories";
		$result=mysqli_query($connection,$query);
		if($result){
			$table='<table>';
			$table.='<tr><th>Category ID</th><th>Category Name</th><th>Image Name</th><th>Total Quantity</th><th>Price</th><th></th><th></th></tr>';
			while($result_set=mysqli_fetch_assoc($result)){
				$table.='<tr>';
				$table.='<td>'.$result_set['id'].'</td>';
				$table.='<td>'.$result_set['category_name'].'</td>';
				$table.='<td>'.$result_set['image_name'].'</td>';
				$table.='<td>'.$result_set['quantity'].'</td>';
				$table.='<td> Rs.'.$result_set['price'].'</td>';
				$table.='<td><a href="edit-seafood-category.php?seafood_id='.$result_set['id'].'">Edit</a></td>';
				$table.='<td><a href="delete-seafood-category.php?seafood_id='.$result_set['id'].'">Delete</a></td>';
				$table.='</tr>';	
			}
			$table.="</table>";
		}
	}
	if(isset($_POST['save'])){
		$id=$_POST['id'];
		$category_name=$_POST['category_name'];
		$image_name=$_POST['image_name'];
		$quantity=$_POST['quantity'];
		$price=$_POST['price'];
		$query="UPDATE seafood_categories SET category_name='{$category_name}',image_name='{$image_name}',quantity='{$quantity}',price='{$price}' WHERE id='{$id}'";
		$result=mysqli_query($connection,$query);
		if($result){
			$_SESSION['category_edit_form']='';
			$update_success='*Updated Successfully....';	
		}
		
	}
	if(isset($_POST['view_a_users'])){
		$_SESSION['admin_change_pass_form']='';
		$_SESSION['admin_delete_yes/no']='';
		$_SESSION['admin_edit_success']='';
		$_SESSION['admin_edit_form']='';
		$_SESSION['category_add_form']='';
		$_SESSION['category_edit_form']='';
		$_SESSION['deliver_message']='';
		$_SESSION['seafood_delete_message']='';
		$query="SELECT * FROM admin_users";
		$result=mysqli_query($connection,$query);
		if($result){
			$table='<table>';
			$table.='<tr><th>Name</th><th>User Name</th><th>Last Login</th><th></th><th></th></tr>';
			while($result_set=mysqli_fetch_assoc($result)){
				$_SESSION['admin_id']=$result_set['admin_id'];
				$table.='<tr>';
				$table.='<td>'.$result_set['name'].'</td>';
				$table.='<td>'.$result_set['user_name'].'</td>';
				$table.='<td>'.$result_set['last_login'].'</td>';
				$table.='<td><a href="edit-admin.php?admin_id='.$result_set['admin_id'].'">Edit</a>';
				$table.='<td><a href="delete-admin.php?admin_id='.$result_set['admin_id'].'& admin_name='.$result_set['name'].'">Delete</a>';
				$table.='</tr>';
			}
			$table.='</table>';
		}
	}
	if(isset($_POST['add_seafood'])){
		$_SESSION['admin_change_pass_form']='';
		$_SESSION['admin_delete_yes/no']='';
		$_SESSION['admin_edit_success']='';
		$_SESSION['admin_edit_form']='';
		$_SESSION['category_add_form']='';
		$_SESSION['category_edit_form']='';
		$_SESSION['deliver_message']='';
		$_SESSION['seafood_delete_message']='';
		$form="<form action=admin-login.php method=post>";
		$form.="<p>";
		$form.="<label>Category Name:</label>";
		$form.="<input type=text name=category_name>";
		$form.="</p>";
		$form.="<p>";
		$form.="<label>Image Name:</label>";
		$form.="<input type=text name=image_name>";
		$form.="</p>";
		$form.="<p>";
		$form.="<label>Price:</label>";
		$form.="<input type=text name=price>";
		$form.="</p>";
		$form.="<p>";
		$form.="<label>Quantity:</label>";
		$form.="<input type=text name=quantity>";
		$form.="</p>";
		$form.="<p>";
		$form.="<label>&nbsp;</label>";
		$form.="<button type=submit name=add>Add</button>";
		$form.="</p>";
		$form.="</form>";
	}
	if(isset($_POST['add'])){
		$req_fields=array('category_name','image_name','price','quantity');
		foreach ($req_fields as $field) {
			if(empty(trim($_POST[$field]))){
				$errors='*All fields are required....';
			}
			}
			if(empty($errors)){
				$category_name=$_POST['category_name'];
				$image_name=$_POST['image_name'];
				$price=$_POST['price'];
				$quantity=$_POST['quantity'];
				$query="INSERT INTO seafood_categories(category_name,image_name,price,quantity)VALUES('{$category_name}','{$image_name}','{$price}','{$quantity}')";
				$result=mysqli_query($connection,$query);
				if($result){
					$errors='*Record has successfully added....';
				}
			}
		}
		if(isset($_POST['admin_save'])){
		$id=$_POST['id'];
		$admin_name=$_POST['admin_name'];
		$user_name=$_POST['user_name'];
		$query="UPDATE admin_users SET name='{$admin_name}',user_name='{$user_name}' WHERE admin_id='{$id}'";
		$result=mysqli_query($connection,$query);
		if($result){
			$_SESSION['admin_edit_form']='';	
			$update_success='*Updated Successfully....';	
		}
		
	}
		if(isset($_POST['yes'])){
			$query="DELETE FROM admin_users WHERE admin_id='{$_SESSION['admin_delete_id']}'";
			$rslt=mysqli_query($connection,$query);
			if($rslt){
				$admin_delete_success='*The user: '.$_SESSION['admin_delete_name'].' has successfully deleted from the system.....';
				if($_SESSION['admin_delete_name']==$_SESSION['admin_name']){
					$_SESSION=array();
					if(isset($COOKIE[session_name()])){
						setcookie(session_name(),'',time()-86400,'/');
					}
					session_destroy();
					header('Location:index.php');
				}
			}
		}
		if(isset($_POST['no'])){
			$admin_delete_success='*Deletion was cancelled....';
		}
		if(isset($_POST['view_messages'])){
			$query="SELECT * FROM contact_us";
			$result=mysqli_query($connection,$query);
			if($result){
				$table='<table>';
				$table.='<tr><th>Customer Name</th><th>Email</th><th>Phone Number</th><th>Subject</th><th>Message</th></tr>';
				while($result_set=mysqli_fetch_assoc($result)){
					$table.='<tr>';
					$table.='<td>'.$result_set['name'].'</td>';
					$table.='<td>'.$result_set['email'].'</td>';
					$table.='<td>'.$result_set['phone'].'</td>';
					$table.='<td>'.$result_set['subject'].'</td>';
					$table.='<td>'.$result_set['message'].'</td>';
					$table.='</tr>';				
			}
					$table.='</table>';
		}
	}
		if(isset($_POST['add_a_users'])){
			$form="<form action=admin-login.php method=post>";
			$form.="<p>";
			$form.="<label>Admin Name:</label>";
			$form.="<input type=text name=admin_name>";
			$form.="</p>";
			$form.="<p>";
			$form.="<label>User Name:</label>";
			$form.="<input type=text name=user_name>";
			$form.="</p>";
			$form.="<p>";
			$form.="<label>Pasword:</label>";
			$form.="<input type=password name=password>";
			$form.="</p>";
			$form.="<p>";
			$form.="<label>&nbsp;</label>";
			$form.="<button type=submit name=admin_add>Add</button>";
			$form.="</p>";
			$form.="</form>";
		}
		if(isset($_POST['admin_add'])){
			$req_fields=array('admin_name','user_name','password');
			foreach ($req_fields as $field) {
				if(empty(trim($_POST[$field]))){
					$errors='*All fields are required....';
				}
			if(empty($errors)){
				$admin_name=$_POST['admin_name'];
				$user_name=$_POST['user_name'];
				$password=$_POST['password'];
				$hashed_password=sha1($password);
				$query="INSERT INTO admin_users(name,user_name,password)VALUES('{$admin_name}','{$user_name}','{$hashed_password}')";
				$result=mysqli_query($connection,$query);
				if($result){
					$errors='*Record has successfully added....';
				}
			}
			}
			
		}
		if(isset($_POST['change_password'])){
			$id=$_POST['id'];
			$password=$_POST['password'];
			$hashed_password=sha1($password);

			$query="UPDATE admin_users SET password='{$hashed_password}' WHERE admin_id={$id}";
			$result=mysqli_query($connection,$query);
			if($result){
				$_SESSION['admin_change_pass_form']='';
				$update_success='*Password updated Successfully....';
			}
		}

?>
<!DOCTYPE html>
<html>
<head>
	<a href=""></a>
	<title>Admin-Users</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body style="background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(css/Wkipedia_blank_world_map.jpg);">
	<div class="wrapper">
		<div class="wrapper1">
			<header>
				<p><?php  echo "Welcome ".$_SESSION['admin_name']."...!";?><a href="logout.php">Log Out !</a></p>
			</header>
		<main>
			<div class="button-area">
				<form action="admin-login.php" method="post">	
			 		<button class="view-c" type="submit" name="customer_details">View Customers' details</button>
			 		<button class="view-0" type="submit" name="view_orders">View Orders</button>
			 		<button class="d-orders" type="submit" name="view_d_orders">View Delivered Orders</button>
			 		<button class="view-a" type="submit" name="view_a_users">View Admin Users</button>
			 		<button class="view-c-m" type="submit" name="view_messages">View Customers' Messages</button>
			 		<button class="add-i" type="submit" name="add_seafood">Add Seafood categories</button>
			 		<button class="add-u" type="submit" name="add_a_users">Add Admin Users</button>
			 		<button class="view-i" type="submit" name="view_seafood">View Seafood categories</button>
			 	</form>
			 </div>
			<div class="detail-area">
				<?php  
					if(isset($_SESSION['admin_edit_form'])){
						echo $_SESSION['admin_edit_form'];
					}
					if(isset($_SESSION['admin_edit_success'])){
						echo $_SESSION['admin_edit_success'];
					}
					if(isset($_SESSION['deliver_message'])){
						echo "<p>".$_SESSION['deliver_message']."</p>";
					}
					if(isset($_SESSION['seafood_delete_message'])){
						echo "<p>".$_SESSION['seafood_delete_message']."</p>";
					}
					if(isset($_SESSION['category_edit_form'])){
						echo $_SESSION['category_edit_form'];
					}
					if(!empty($update_success)){
						echo "<p>".$update_success."</p>";
					}
					if(!empty($_SESSION['category_add_form'])){
						echo $_SESSION['category_add_form'];
					}
					if(!empty($errors)){
						echo "<p>".$errors."</p>";
					}
					if(isset($_SESSION['admin_delete_yes/no'])){
						echo '<p>'.$_SESSION['admin_delete_yes/no'].'</p>';
					}
					if(isset($_SESSION['admin_change_pass_form'])){
						echo $_SESSION['admin_change_pass_form'];	
					}
					
				?>
				<?php  
					if(!empty($table)){
						echo $table;
					}
					if(!empty($admin_delete_success)){
						echo "<p>".$admin_delete_success."</p>";
					}
					if(!empty($form)){
						echo $form;
					}
				?>
			</div>
		</main>
		</div>	
		</div>
</body>
</html>