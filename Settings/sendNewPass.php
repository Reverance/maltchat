<?php

session_start();
include '../db/maindb.conn.php';
if (!isset($_SESSION['id'])) {
  die("0");
}

$id = $_SESSION['id'];
$oldP = hash('sha256',$_POST['oldP']);
$newP = hash('sha256',$_POST['newP']);
$conP = hash('sha256',$_POST['conP']);
$sql = "UPDATE users SET pwd='$newP' WHERE id='$id'";

if ($oldP != $_SESSION['pwd']) {
	die('1');
}
if ($newP != $conP) {
	die('2');
}

$result = mysqli_query($mainDBConn,$sql);

$_SESSION['pwd'] = $newP;

die('100');

?>