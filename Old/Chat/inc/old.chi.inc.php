<?php

session_start();
if (!isset($_SESSION['id'])) {
	header("Location: login.php");
}
if (isset($_SESSION['muted'])) {
	$muted = $_SESSION['muted'];
}
echo "<br>";
include '../../DB/db.inc.php';
$name = $_SESSION['name'];
if (isset($_GET['prof'])) {
	$_SESSION['prof'] = $_GET['prof'];
}
$prof = $_SESSION['prof'];
$sql0 = "SELECT * FROM chat WHERE p1='$prof' OR p2='$prof' ORDER BY id desc";
if ($result = mysqli_query($conn,$sql0)) {
	while ($row = mysqli_fetch_row($result)){
		$checkprof1 = $row['1'];
		$checkprof2 = $row['2'];
		if ($name == $checkprof1) {
			$message =  "<li class='other'><div class='msg'><div class='avatar'><p><b>".$row['2']."</b></p></div><p>".$row['3']."</p><time>".$row['4']."</time></div></li>";
		} else if ($name == $checkprof2) {
			$message = "<li class='self'><div class='msg'><div class='avatar'><p><b>Me:</b></p></div><p>".$row['3']."</p><time>".$row['4']."</time></div></li>";
		} else {
			$message = "";
		}
		echo $message;
	}
	mysqli_free_result($result);
} else {
	echo 'Error';
}
mysqli_close($conn);
