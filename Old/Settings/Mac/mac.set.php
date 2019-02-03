<?php
session_start();
if (!isset($_SESSION['id'])) {
	if ($_SESSION['pwr'] >= 3) {
		header("Location: ../../Chat/newchat.php");
	}
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
		<h1 class="text">Manage Accounts</h1>
		<br><br>
		<div class="bod2">
		<?php

		include '../inc/mac.inc.php';

		?>
		</div>
		<br>
		<div style="width: 100%; text-align: center; margin: auto;">
			<a href="../settngs.php"><button class="buttons" style="cursor: pointer; text-align: center;">Back</button></a>
		</div>
	</body>
</html>