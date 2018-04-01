<?php

include 'config.php';

$fname = $_POST["fname"];
$lname = $_POST["pwd"];
//$address = $_POST["address"];
//$city = $_POST["city"];
//$pin = $_POST["pin"];
$tsa_num = $_POST["tsa_num"];
//$pwd = $_POST["pwd"];
$points = $_POST["points"];

if($mysqli->query("INSERT INTO users (fname, lname,tsa_num, points) VALUES('$fname', '$lname', '$tsa_num', '$points')")){
	echo 'Data inserted';
	echo '<br/>';
}

header ("location:login.php");

?>
