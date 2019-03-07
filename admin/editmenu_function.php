<?php
session_start();
require_once("../db.php");


if(isset($_POST)) {

	
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$price_small = mysqli_real_escape_string($conn, $_POST['price_small']);
	$price_regular = mysqli_real_escape_string($conn, $_POST['price_regular']);
	$price_large = mysqli_real_escape_string($conn, $_POST['price_large']);
	$price_jumbo = mysqli_real_escape_string($conn, $_POST['price_jumbo']);

	$sql = "SELECT name FROM menuitems WHERE name='$name";
	$result = $conn->query($sql);
	if($result->num_rows==0)
	{ 
		
	//Update Query
	$sql1 = "UPDATE menuitems SET name='$name', description='$description', price_small='$price_small', price_regular='$price_regular', price_large='$price_large', price_jumbo='$price_jumbo' WHERE name='$name'";

	if($conn->query($sql1) === TRUE){
		header("Location: menu.php");
		exit();
	}
	else{
		echo "Error ". $sql . "<br>" . $conn->error;
	}
	$conn->close();
}
}
else {
	header("Location: menu.php");
	exit();
}