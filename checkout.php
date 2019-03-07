<?php
session_start();
require_once("db.php");
if(isset($_POST)) {

	//Escape special characters
	$name = mysqli_real_escape_string($conn, $_POST['order_item_name']);
	$price = mysqli_real_escape_string($conn, $_POST['total_price']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$person_name = mysqli_real_escape_string($conn, $_POST['name']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);

	$sql1 = "INSERT INTO orders(items,name,phone,total_price,address) VALUES ('$name','$person_name','$phone','$price','$address');";

	if($conn->query($sql1) === TRUE){
		header("Location: index.php");
		exit();
	}
	else{
		echo "Error ". $sql . "<br>" . $conn->error;
	}
	$conn->close();
}
else {
	header("Location: menu.php");
	exit();
}