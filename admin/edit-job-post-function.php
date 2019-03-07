<?php
session_start();
require_once("../db.php");

//If user clicked upadate profile button
if(isset($_POST)) {

	//Escape special characters
	$jobtitle = mysqli_real_escape_string($conn, $_POST['jobtitle']);
  	$description = mysqli_real_escape_string($conn, $_POST['description']);
  	$minimumsalary = mysqli_real_escape_string($conn, $_POST['minimumsalary']);
  	$maximumsalary = mysqli_real_escape_string($conn, $_POST['maximumsalary']);
  	$experience = mysqli_real_escape_string($conn, $_POST['experience']);
  	$qualification = mysqli_real_escape_string($conn, $_POST['qualification']);

	$sql = "SELECT * FROM job_post WHERE id_jobpost='$_GET[id]'";
	$result = $conn->query($sql);
	if($result->num_rows>0)
	{ 
		
	//Update Query
	$sql1 = "UPDATE job_post SET jobtitle='$jobtitle', description='$description', minimumsalary='$minimumsalary', maximumsalary='$maximumsalary', experience='$experience', qualification='$qualification' WHERE id_jobpost='$_GET[id]'";

	if($conn->query($sql1) === TRUE){
		header("Location: job-posts.php");
		exit();
	}
	else{
		echo "Error ". $sql . "<br>" . $conn->error;
	}
	$conn->close();
}
}
else {
	header("Location: job-posts.php");
	exit();
}