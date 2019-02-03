<?php

session_start();
include '../db/maindb.conn.php';
if (!isset($_SESSION['id'])) {
  die("0");
}

$sql = "SELECT * FROM comments ORDER BY id ASC LIMIT 100";
$result = mysqli_query($mainDBConn,$sql);
$id = $_SESSION['id'];
$target = $_POST['target'];

$array1 = array();

while ($row = mysqli_fetch_row($result)) {
	//vars for chat message
	$mid = $row['0'];//mid
	$author = $row['1'];//author
	$nm = $row['2']; //name
	$msg = $row['4']; //message
	$tim = $row['5']; //timestamp


	$im = $row['3']; //icon
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