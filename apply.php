<?php
session_start();
if(empty($_SESSION['id_user'])) {
  $_SESSION['callFrom'] = "apply-job-post.php?id=".$_GET[id];
  header("Location: login.php");
  exit();
} 

require_once("db.php");
if(isset($_GET)) {
	$sql1 = "SELECT * FROM apply_job_post WHERE id_user='$_SESSION[id_user]' AND id_jobpost='$_GET[id]'";
    $result1 = $conn->query($sql1);
    if($result1->num_rows == 0) {  
    	
	    $sql = "INSERT INTO apply_job_post(id_jobpost, id_user) VALUES ('$_GET[id]', '$_SESSION[id_user]')";

		if($conn->query($sql)===TRUE) {
			$_SESSION['jobApplySuccess'] = true;
			header("Location: search.php");
			exit();
		} else {
			echo "Error " . $sql . "<br>" . $conn->error;
		}

		$conn->close();

	} else {
		$_SESSION['jobAlreadyApplied']=true;
		header("Location: applied-jobs.php");
		exit();
	}
	

} else {
	header("Location: search.php");
	exit();
}