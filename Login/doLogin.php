<?php

session_start();
include '../db/maindb.conn.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

$uid = strip_tags($uid);
$uid = preg_replace("/[^a-zA-Z]/", "", $uid);
if ($uid == "") {
	die('1');
}
$pwd = hash('sha256',$pwd);

$sql0 = "SELECT * FROM users WHERE uid='$uid' and pwd='$pwd'";
$sql1 = "UPDATE users SET online=1, tim=now() WHERE uid='$uid'";

if (!$result = mysqli_query($mainDBConn, $sql0)) {

	die('2');

} else {

	if (!$row = mysqli_fetch_assoc($result)) {

		die('3');

	} else {

		if ($row['bcheck'] != "0") {

			die('4');

		} else if ($row['power'] != "1" && $row['power'] != "2" && $row['power'] != "3") {

			die('5');
		}

		session_destroy();
		session_start();

		mysqli_query($mainDBConn, $sql1);

		$_SESSION['id'] = $row['id'];
		$_SESSION['uid'] = $row['uid'];
		$_SESSION['pwd'] = $row['pwd'];
		$_SESSION['name'] = $row['name'];
		$_SESSION['pwr'] = $row['power'];
		$_SESSION['icn'] = $row['profPic'];

		die('100');

	}

}

?>