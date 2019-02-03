<?php

session_start();
include '../db/maindb.conn.php';
if (!isset($_SESSION['id'])) {
  die("0");
}

$id = $_SESSION['id'];
$url = $_POST['url'];
$url = strip_tags($url);
$sql = "UPDATE users SET profPic='$url' WHERE id='$id'";

$result = mysqli_query($mainDBConn,$sql);

$_SESSION['icn'] = $url;

?>