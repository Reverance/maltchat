<?php

session_start();
include '../../DB/db.inc.php';

$counter = 0;
echo "Counter - ".$counter."<br>";
$message = $_POST['message'];
echo "Message - ".$message."<br>";
$id = $_SESSION['id'];
echo "Id - ".$id."<br>";
$sql = "SELECT * FROM comments WHERE author='$id' ORDER BY Tim DESC LIMIT 5";

if ($message == "") {
	header("Location: ../newchat.php");
} else {
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_row($result)) {
		echo "Message - ".$row['4']."<br>";
		if ($row['4'] == $message) {
			$counter = $counter + 1;
			echo $counter."<br>";
		}
	}
	if ($counter > 0) {
		echo "SPAM<br>";
		header("Location: ../newchat.php");
	} else {
		header("Location: cho.inc.php?message=".$message);
	}
}

?>