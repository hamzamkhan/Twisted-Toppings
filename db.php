<?php

$servername = "localhost";
$username = "K152832";
$password = "lumosity1";
$dbname = "twisted_toppings";

//Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check Connection
if($conn->connect_error){
	die("Connection Failed :". $conn->connect_error);

}
