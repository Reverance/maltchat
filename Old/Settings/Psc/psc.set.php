<?php
session_start();
$name = $_SESSION['name'];
if (!isset($_SESSION['id'])) {
	header("Location: ../../Chat/newchat.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/set.css">
    	<link rel="stylesheet" type="text/css" href="../css/nom.css">
	</head>
	<body style="margin: auto;">
		<h1 class="text">Password Reset</h1>
		<p class="wrong"><?php

		if ($_SESSION['wrong2'] == true) {
			echo "Incorrect Details";
		}

		?></p>
		<form action="../inc/psc.set.inc.php" method="POST" class="text">
			<label>Old Password</label><br>
			<input type="Password" name="opwd" required><br>
			<label>New Password</label><br>
			<input type="Password" name="npwd" required><br>
			<label>Verfiy New Password</label><br>
			<input type="Password" name="vpwd" required><br>
			<button type="submit">Change</button>
		</form>
		<form action="../settngs.php" method="POST" class="text">
			<button type="submit">Back</button>
		</form>
	</body>
</html>