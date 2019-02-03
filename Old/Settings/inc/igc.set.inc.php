<?php

session_start();
include 'db.inc.php';

#variables
$nurl = $_POST['nurl'];
$vurl = $_POST['vurl'];
$id = $_SESSION['id'];

if (!isset($nurl)){
	echo "string";
	$_SESSION['wrong3'] = true;
	header("Location: ../set/nmc.set.php");
} elseif (!isset($vurl)) {
	echo "string";
	$_SESSION['wrong3'] = true;
	header("Location: ../set/nmc.set.php");
} else {
	if ($nurl == $vurl) {
		$sql = "UPDATE users SET profPic='$nurl' WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		$_SESSION['icn'] = $nurl;
		header("Location: ../settngs.php");
	} else {
		$_SESSION['wrong3'] = true;
		header("Location: ../set/igc.set.php");
	}
}

?>