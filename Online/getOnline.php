<?php

session_start();
include '../db/maindb.conn.php';
if (!isset($_SESSION['id'])) {
  die("0");
}

$sql = "SELECT * FROM users ORDER BY id ASC";
$result = mysqli_query($mainDBConn,$sql);
$id = $_SESSION['id'];
$target = $_POST['target'];

$array1 = array();
$arraya = array();

while ($row = mysqli_fetch_row($result)) {
	//vars for chat message
	$id = $row['0']; // id
	$nm = $row['3']; // name
	$pwr = $row['5']; // power
	$o = $row['6']; // online
	$im = $row['7']; // image
	$tim = $row['11']; // time

	if (strpos($im,"https") != 'false') {
		$im = "https://cdn2.iconfinder.com/data/icons/rcons-user/32/male-shadow-circle-512.png";
	}

	if ($o == '1') {

		if ($target == "all") {
			$array2 = array($id,$nm,$pwr,$im,$tim);
		}

		if ($target == "id") {
			$array2 = $id;
		}

		array_push($array1, $array2);

	} else {

		if ($target == "all") {
			$arrayb = array($id,$nm,$pwr,$im,$tim);
		}

		if ($target == "id") {
			$arrayb = $id;
		}

		array_push($arraya, $arrayb);

	}

}

$array = array($array1,$arraya);

echo json_encode($array);