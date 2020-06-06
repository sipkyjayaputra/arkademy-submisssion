<?php
	$id = $_POST['id']+0;

	$connection = mysqli_connect('localhost','root','','arkademy');
	$sql = "DELETE FROM product WHERE id=$id";
	$result = mysqli_query($connection, $sql);
	
	header('Location: ../3c.php');
?>