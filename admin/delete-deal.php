<?php

session_start();

if(empty($_SESSION['id_admin'])) {
	header("Location: index.php");
	exit();
}

require_once("../db.php");


if(isset($_GET)) {

	$sql = "DELETE FROM deals WHERE id_deal='$_GET[id]'";
	if($conn->query($sql)) {
		header("Location: deals.php");
		exit();
	}else{
		echo "Error";
	}
}