<?php

session_start();
include 'db.inc.php';
if (!isset($_SESSION['id'])) {
	header("Location: lgt.inc.php");
}

$name = $_POST['name'];
$power = $_POST['power'];
$online = $_POST['online'];
$profPic = $_POST['profPic'];
$bio = $_POST['bio'];
$ban = $_POST['ban'];

if ($power == 1) {
	//header("Location: lgt.inc.php");
	echo "lack of permission";
} else {
	if ($uid == "admin") {
		//header("Location: lgt.inc.php");
		echo "admin is restricted uid";
	} else {
		$sql = "UPDATE users SET name='$name', power='$power', online='$online', profPic='$profPic', bio='$bio', flog=1, bcheck='$ban' WHERE id='".$_GET['id']."'";
		echo $sql.'<br>';
		if ($result = mysqli_query($conn, $sql)) {
			header("Location: ../set/mac.set.php");
			echo "success";
		} else {
			echo "fail";
		}
	}
}