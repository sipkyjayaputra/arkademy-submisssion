<?php
	$id = $_POST['id']+0;
	$cashier = $_POST['cashier_id']+0;
	$category = $_POST['category_id']+0;
	$product = $_POST['product_name'];
	$price = substr($_POST['price'], 4)+0;

	$connection = mysqli_connect('localhost','root','','arkademy');
	$sql = "UPDATE product SET id_cashier=$cashier, id_category=$category, name='$product', price=$price WHERE id=$id";
	$result = mysqli_query($connection, $sql);
	
	header('Location: ../3c.php');
?>