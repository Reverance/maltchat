<?php

session_start();
include 'db.inc.php';

if (!isset($_SESSION['id'])) {
	header("Location: lgt.inc.php");
} else {
	if (!isset($_GET['id'])) {
		header("Location: index.php");
	} else {
		if ($_SESSION['pwr']<3) {
			$id = $_GET['id'];
			echo $id."<br>";
			$sql = "DELETE FROM users WHERE id=".$id;
			echo $sql."<br>";
			if ($result = mysqli_query($conn, $sql)) {
				echo "success<br>";
				header("Location: ../set/ver.set.php");
			} else {
				echo "Fail<br>";
			}
		}
		else {
			header("Location: lgt.inc.php");
		}
	}
}