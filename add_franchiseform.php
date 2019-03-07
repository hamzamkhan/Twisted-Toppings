<?php
session_start();
require_once("db.php");
if(isset($_POST)){

	//Escape Special Characters in String First
	$infoMedium= implode(", ",$_POST["infoMedium"]);
	$name = mysqli_real_escape_string($conn, $_POST['fullname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
		$sql = "INSERT INTO franchise_form(name, email, phone, address, infoMedium) VALUES ('$name', '$email', '$phone','$address','$infoMedium')";

		if($conn->query($sql)===TRUE){
			    $_SESSION['registerCompleted'] = true;
				header("Location: index.php");
				exit();
			}
		else{
			echo "Error " . $sql . "<br>" . $conn->error;
		}
}
else{
	header("Location: franchiseform.php");
	exit();
}
?>