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
	$uploadOk = true;
		
	$folder_dir = "../uploads/items/";
		
	$base = basename($_FILES['image']['name']); 
		
	$imageFileType = pathinfo($base, PATHINFO_EXTENSION); 
		
	$file = uniqid() . "." . $imageFileType; 
	  
	$filename = $folder_dir .$file;  
		
	if(file_exists($_FILES['image']['tmp_name'])) { 
		
		if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg")  {
		
			if($_FILES['image']['size'] < 500000) { // File size is less than 5MB
		
				move_uploaded_file($_FILES["image"]["tmp_name"], $filename);
			} else {
					//Size Error
				$_SESSION['uploadError'] = "Wrong Size. Max Size Allowed : 5MB";
				$uploadOk = false;
			}
		} else {
				//Format Error
			$_SESSION['uploadError'] = "Wrong Format. Only jpg & png Allowed";
			$uploadOk = false;
		}
	} else {
								
			$uploadOk = false;
		}

		//If there is any error then redirect back.
	if($uploadOk == false) {
		header("Location: addmenu.php");
		exit();	
	}

	//Update Query
	$sql1 = "INSERT INTO menuitems(name,description,price_small,price_regular,price_large,price_jumbo,image) VALUES ('$name','$description','$price_small','$price_regular','$price_large','$price_jumbo','$file');";

	if($conn->query($sql1) === TRUE){
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