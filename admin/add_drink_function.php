<?php
session_start();
require_once("../db.php");
if(isset($_POST)) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);

	$sql = "INSERT INTO drinks(name) VALUES ('$name');";

	if($conn->query($sql) === TRUE){
		header("Location: menu.php");
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