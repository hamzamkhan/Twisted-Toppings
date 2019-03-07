<?php
session_start();
require_once("../db.php");
if(isset($_POST)) {

	$deal_name = mysqli_real_escape_string($conn, $_POST['deal_name']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$price = mysqli_real_escape_string($conn, $_POST['price']);

	$sql = "SELECT deal_name FROM deals WHERE deal_name='$deal_name";
	$result = $conn->query($sql);
	if($result->num_rows==0)
	{ 
		
	//Update Query
	$sql1 = "UPDATE deals SET deal_name='$deal_name', description='$description', price='$price' WHERE deal_name='$deal_name'";

	if($conn->query($sql1) === TRUE){
		header("Location: deals.php");
		exit();
	}
	else{
		echo "Error ". $sql . "<br>" . $conn->error;
	}
	$conn->close();
	}
}
else {
	header("Location: deals.php");
	exit();
}