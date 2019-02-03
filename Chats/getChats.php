<?php

session_start();
include '../db/maindb.conn.php';
if (!isset($_SESSION['id'])) {
  die("0");
}

$sql = "SELECT * FROM groups ORDER BY gid ASC";
$result = mysqli_query($mainDBConn,$sql);
$id = $_SESSION['id'];

$array = array();

while ($row = mysqli_fetch_row($result)) {

	$gid = $row['0'];
	$name = $row['1'];
	$pic = $row['2'];
	$people = unserialize($row['3']);

	for ($i=0; $i < count($people); $i++) { 
		if ($people[$i] == $id) {
			array_push($array, array($gid,$pic,$name));
		}
	}

}

echo json_encode($array);
