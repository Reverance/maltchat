<?php

session_start();
include '../../DB/db.inc.php';

$prof = $_GET['prof'];
$name = $_SESSION['name'];
$message = $_POST['message'];
if ($message == "") {
	echo "";
} else {
	$sql = "INSERT INTO chat (p1, p2, message) VALUES ('$prof', '$name', '$message')";
	$result = mysqli_query($conn, $sql);
}

header("Location: ../newchat.php?prof=".$prof);