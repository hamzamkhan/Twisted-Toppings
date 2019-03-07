<?php

session_start();

if(empty($_SESSION['id_admin'])) {
	header("Location: index.php");
	exit();
}

require_once("../db.php");


if(isset($_GET)) {

	$sql = "DELETE FROM menuitems WHERE id_item='$_GET[id]'";
	if($conn->query($sql)) {
		header("Location: menu.php");
		exit();
	}else{
		echo "Error";
	}
}