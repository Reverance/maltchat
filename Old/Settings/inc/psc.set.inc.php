<?php

session_start();
include 'db.inc.php';

#variables
$opwd = $_POST['opwd'];
$hashopwd = hash(sha256, $opwd);
$npwd = $_POST['npwd'];
$hashpwd = hash(sha256, $npwd);
$vpwd = $_POST['vpwd'];
$pwd = $_SESSION['pwd'];
$id = $_SESSION['id'];

if (!isset($opwd)){
	echo "string";
	$_SESSION['wrong3'] = true;
	header("Location: ../Psc/psc.set.php");
} elseif (!isset($npwd)) {
	echo "string";
	$_SESSION['wrong3'] = true;
	header("Location: ../Psc/psc.set.php");
} elseif (!isset($vpwd)) {
	echo "string";
	$_SESSION['wrong3'] = true;
	header("Location: ../Psc/psc.set.php");
} else {
	if ($hashopwd == $pwd) { #checking old password is correct
		if ($npwd == $vpwd) {
			$sql = "UPDATE users SET pwd='$hashpwd' WHERE id='$id'";
			$result = mysqli_query($conn, $sql);
			header("Location: lgt.inc.php");
		} else {
			$_SESSION['wrong1'] = true;
			header("Location: ../Psc/psc.set.php");
		}
	} else {
		$_SESSION['wrong2'] = true;
		header("Location: ../Psc/psc.set.php");
	}
}

?>