<?php

session_start();
include '../db/maindb.conn.php';
if (!isset($_SESSION['id'])) {
  die("0");
}

$id = $_SESSION['id'];
$target = $_POST['target'];
$gid = $_POST['gid'];
$sql = "SELECT * FROM messages WHERE gid='$gid' ORDER BY mid ASC LIMIT 100";
$result = mysqli_query($mainDBConn,$sql);

$array1 = array();

while ($row = mysqli_fetch_row($result)) {
	//vars for chat message
	$mid = $row['0'];//mid
	$author = $row['2']; //author
	$msg = $row['3']; //message
	$tim = $row['4']; //timestamp

	$result2 = mysqli_query($mainDBConn,"SELECT * FROM users WHERE id='$author'");
	$row2 = mysqli_fetch_row($result2);
	$nm = $row2[3];
	$im = $row2[7]; //icon
	
	if (strpos($im,"https") != 'false') {
		$im = "https://cdn2.iconfinder.com/data/icons/rcons-user/32/male-shadow-circle-512.png";
	}

	if ($target == "all") {
		$array2 = array($mid,$author,$nm,$msg,$tim,$im);
	}

	if ($target == "id") {
		$array2 = $mid;
	}


	array_push($array1, $array2);

}

echo json_encode($array1);