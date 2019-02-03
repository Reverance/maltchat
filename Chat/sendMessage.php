<?php

session_start();
include '../db/maindb.conn.php';

$id = $_POST['id'];
$gid = $_POST['gid'];
$message = $_POST['message'];
$message = strip_tags($message);

if (!isset($_SESSION['id']) || !isset($message) || $message == "") {
  die("0");
}

$sql = "INSERT INTO messages (gid, author, message) VALUES ('$gid', '$id', '$message')";
if ($result = mysqli_query($mainDBConn, $sql)) {
	echo "100";
} else {
	echo "1";
}


?>