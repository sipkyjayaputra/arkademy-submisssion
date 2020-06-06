<?php
	$cashier = $_POST['cashier_id']+0;
	$category = $_POST['category_id']+0;
	$product = $_POST['product_name'];
	$price = $_POST['price']+0;

	$connection = mysqli_connect('localhost','root','','arkademy');
	$sql = "INSERT INTO product values ('','$product',$price,$category,$cashier)";
	$result = mysqli_query($connection, $sql);
	echo($sql);

	header('Location: ../3c.php');
?>