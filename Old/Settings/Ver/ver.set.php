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
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script type="text/javascript">
			 $(document).ready(function(){
			 	window.setInterval(function(){
			 		$("#bod2").load("../inc/ver.set.inc.php");
			 	}, 500);
			 });
		</script>
	</head>
	<body style="margin: auto;">
		<h1 class="text">Verify Accounts</h1>
		<br><br>
		<div class="bod2">
		<?php

		include '../inc/ver.set.inc.php';

		?>
		</div>
		<br>
		<div style="width: 100%; text-align: center; margin: auto;">
			<a href="../settngs.php"><button class="buttons" style="cursor: pointer; text-align: center;">Back</button></a>
		</div>
	</body>
</html>