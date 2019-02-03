<?php

session_start();
include '../db/maindb.conn.php';
if (!isset($_SESSION['id'])) {
  die("0");
}

$id = $_POST['id'];
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($mainDBConn,$sql);
$row = mysqli_fetch_assoc($result);

if (!$result = mysqli_query($mainDBConn, $sql)) {

	die('2');

} else {


	if (!$row = mysqli_fetch_assoc($result)) {

		die('3');

	} else {

		$uid = $row['uid']; // username
		$nm = $row['name']; // name
		$em = $row['email']; // email
		$pwr = $row['power']; // power
		$o = $row['online']; // online
		$im = $row['profPic']; // image
		$bio = $row['bio']; // bio
		$bcheck = $row['bcheck']; // bcheck
		$tim = $row['tim']; // time

	}

}



if (strpos($im,"https") != 'false') {
	$im = "https://cdn2.iconfinder.com/data/icons/rcons-user/32/male-shadow-circle-512.png";
}

$array = array($id,$uid,$nm,$em,$pwr,$o,$im,$bio,$bcheck,$tim);
echo json_encode($array);