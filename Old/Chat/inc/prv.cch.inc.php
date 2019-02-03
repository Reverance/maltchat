<?php

session_start();
include '../../DB/db.inc.php';

$id = $_SESSION['id'];
$pwr = $_SESSION['pwr'];

$sql = "DELETE FROM chat WHERE id > 0";

if ($pwr <= 2) {
	$result = mysqli_query($conn, $sql);
	header("Location: ../newchat.php");
}
$_SESSION['message'] = "Insufficent Permission";
header("Location: ../settngs.php");

?>