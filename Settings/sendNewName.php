<?php

session_start();
include '../db/maindb.conn.php';
if (!isset($_SESSION['id'])) {
  die("0");
}

$id = $_SESSION['id'];
$name = $_POST['name'];
$name = strip_tags($name);
$sql = "UPDATE users SET name='$name' WHERE id='$id'";

if (strpos($name,"admin") == 'false') {
	die('1');
}

$result = mysqli_query($mainDBConn,$sql);

$_SESSION['name'] = $name;

?>