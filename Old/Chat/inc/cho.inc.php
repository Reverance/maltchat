<?php
session_start();
include '../../DB/db.inc.php';
$message = $_GET['message'];
$message= str_replace('>', '', $message);
$message= str_replace('<', '', $message);
$name = $_SESSION['name'];
$icon = $_SESSION['icn'];
if ($message == "") {
	header("Location: ../newchat.php");	
} else {
	if (!isset($name)) {
		header("Location: ../newchat.php");	
	} else {
		if(!isset($message)) {
			header("Location: ../newchat.php");	
		} else {
			$author = $_SESSION['id'];
			echo $author;
			$sql = "INSERT INTO comments (author, name, message, profPic) VALUES ('$author', '$name', '$message', '$icon')";
			$result = mysqli_query($conn, $sql);
			header("Location: ../newchat.php");
		}
	}
}
?>