<?php

session_start();
include '../db/maindb.conn.php';
if (!isset($_SESSION['id'])) {
  die("0");
}

$id = $_POST['id'];
$bio = $_POST['bio'];
$sql = "UPDATE users SET bio='$bio' WHERE id='$id'";
$result = mysqli_query($mainDBConn,$sql);

?>