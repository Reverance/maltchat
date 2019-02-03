<?php

session_start();
include '../db/maindb.conn.php';

$id = $_POST['id'];
$message = $_POST['message'];
$message = strip_tags($message);
$name = $_SESSION['name'];
$pic = $_SESSION['icn'];

if (!isset($_SESSION['id']) || !isset($message) || $message == "") {
  die("0");
}

$sql = "INSERT INTO comments (author, name, message, profPic) VALUES ('$id', '$name', '$message', '$pic')";
if ($result = mysqli_query($mainDBConn, $sql)) {
	echo "100";
} else {
	echo "1";
}


?>