<?php
session_start();
$name = $_SESSION['name'];
if (!isset($_SESSION['id'])) {
	header("Location: ../../Chat/newchat.php");
}
include '../../Check/check.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/set.css">
    	<link rel="stylesheet" type="text/css" href="../css/nom.css">
	</head>
	<body style="margin: auto;">
		<h1 class="text">Bio Change</h1>
		<p class="wrong"><?php

		if ($_SESSION['wrong1'] == true) {
			echo "Incorrect Details";
		}

		?></p>
		<form action="../inc/bio.set.inc.php" method="POST" class="text">
			<label>Enter Bio </label><br>
			<textarea style="width: 50%; height: 100px; color: #fff; background-color: #007BFF;" name="Bio" required></textarea><br>
			<button type="submit">Change</button>
			<br><br>
		</form>
		<form action="../settngs.php" method="POST" class="text">
			<button type="submit">Back</button>
		</form>
	</body>
</html>