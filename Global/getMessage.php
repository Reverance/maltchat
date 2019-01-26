<?php

session_start();
include '../db/maindb.conn.php';
if (!isset($_SESSION['id'])) {
  die("0");
}

$sql = "SELECT * FROM comments ORDER BY Tim ASC LIMIT 100";
$result = mysqli_query($mainDBConn,$sql);
$id = $_SESSION['id'];

while ($row = mysqli_fetch_row($result)) {
	//vars for chat message
	$mid = $row['0'];//mid
	$author = $row['1'];//author
	$nm = $row['2']; //name
	$msg = $row['4']; //message
	$tim = $row['5']; //timestamp
	$im = $row['3']; //icon
	if ($author == $id) {
		echo "
		<div id='message$mid' style='float: right;'>
			$msg
			<br>
			$tim
			<br>
		</div>
		<br>
		<br>
		<br>
		";
	} else {
		echo "
		<div id='message$mid' style='float: left;'>
			<img src='$im' style='width:25px;'>
			<br>
			$nm : $msg
			<br>
			$tim
			<br>
		</div>
		<br>
		<br>
		<br>
		<br>
		";
	}
}

?>