<?php

session_start();
include '../DB/db.inc.php';


$uid = $_SESSION['uid'];
$sql = "SELECT * FROM users WHERE uid='$uid'";
if ($result = mysqli_query($conn, $sql)) {
	if ($row = mysqli_fetch_assoc($result)) {
		if ($row['flog'] == "1") {
			echo "ok";
			header("Location: inc/lgt.inc.php");
		}
	}
} else {
	header("Location: inc/lgt.inc.php");
}

?>