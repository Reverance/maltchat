<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("Location: login.php");
}
include '../inc/flog.check.inc.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/set.css">
    	<link rel="stylesheet" type="text/css" href="../css/nom.css">
	</head>
	<body style="margin: auto;">
		<h1 class="text">Icon Reset</h1>
		<p class="wrong"><?php

		if ($_SESSION['wrong1'] == true) {
			echo "Incorrect Details";
		}

		?></p>
		<form action="../inc/igc.set.inc.php" method="POST" class="text">
			<label>IMG URL</label><br>
			<input type="url" name="nurl" required><br>
			<label>Verfiy IMG URL</label><br>
			<input type="url" name="vurl" required><br>
			<button type="submit">Change</button>
			<br><br>
		</form>
		<form class="text" action="../settngs.php">
			<a href="../settngs.php"><button>Back</button></a>
		</form>
	</body>
</html>