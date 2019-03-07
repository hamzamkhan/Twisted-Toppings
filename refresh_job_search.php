<?php
session_start();
require_once("db.php");

$sql = "SELECT * FROM job_post";

if(!empty($_GET['experience'])) {
	$sql = $sql . " WHERE experience='$_GET[experience]'";
}
if(!empty($_GET['qualification']) && !empty($_GET['experience'])) {
	$sql = $sql . " AND qualification='$_GET[qualification]'";
} else if(!empty($_GET['qualification'])) {
	$sql = $sql . " WHERE qualification='$_GET[qualification]'";
}
$result = $conn->query($sql);
if($result->num_rows > 0) 
{
	while($row1 = $result->fetch_assoc()) {

		if(isset($_SESSION['id_user'])) {

		$sql1 = "SELECT * FROM apply_job_post WHERE id_user='$_SESSION[id_user]' AND id_jobpost='$row1[id_jobpost]'";
		$result1 = $conn->query($sql1);
		if($result1->num_rows > 0) 
		{
			$apply = "<strong>Applied</strong>";
		}else {
			$apply = "<a href='apply-job-post.php?id=".$row1['id_jobpost']."'>Apply</a>";
		}

	} else {
			$apply = "<a href='apply-job-post.php?id=".$row1['id_jobpost']."'>Apply</a>";
	}
		$json[] = array(
			0 => $row1['jobtitle'],
			1 => $row1['minimumsalary'],
			2 => $row1['maximumsalary'],
			3 => $row1['experience'],
			4 => $row1['qualification'],
			5 => $apply,
			);
    }

    echo json_encode($json);
}

?>