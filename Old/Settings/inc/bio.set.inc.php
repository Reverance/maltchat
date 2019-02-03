<?php

session_start();
include 'db.inc.php';
$bio = $_POST['Bio'];
$name = $_SESSION['name'];
if ($bio != "") {
	if ($name != "") {
		$sql = "UPDATE users SET bio='$bio' WHERE name='$name'";
		$result = mysqli_query($conn, $sql);
		header("Location: ../settngs.php");
	}
}

?>