<?php

session_start();
include 'db.inc.php';

if (!isset($_SESSION['id'])) {
	header("Location: lgt.inc.php");
} else {
	if (!isset($_GET['id'])) {
		header("Location: index.php");
	} else {
		$id = $_GET['id'];
		echo $id."<br>";
		$sql = "UPDATE users SET power=3 WHERE id=".$id;
		echo $sql."<br>";
		if ($result = mysqli_query($conn, $sql)) {
			echo "success<br>";
			header("Location: ../set/ver.set.php");
		} else {
			echo "Fail<br>";
		}
	}
}

?>