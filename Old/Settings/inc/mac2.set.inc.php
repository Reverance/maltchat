<?php
session_start();
if (isset($_SESSION['id'])) {
	if ($_SESSION['pwr'] >= 3) {
		header("Location: inc/lgt.inc.php");
	}
} else {
	header("Location: inc/lgt.inc.php");
}
if (isset($_GET['id'])) {
	include 'db.inc.php';
	$sql = "SELECT * FROM users WHERE id=".$_GET['id'];
	$result = mysqli_query($conn, $sql);
	if ($row = mysqli_fetch_assoc($result)) {
		$uid = $row['uid'];
		$name = $row['name'];
		$power = $row['power'];
		$online = $row['online'];
		$profPic = $row['profPic'];
		$bio = $row['bio'];
		$ban = $row['bcheck'];
	}
} else {
	header("Location: inc/lgt.inc.php");
}
include '../inc/flog.check.inc.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Manage Accounts</title>
		<link rel="stylesheet" type="text/css" href="../css/set.css">
	</head>
	<body style="background-color: #000;">
		<br><br>
		<div style="margin: auto; width: 60%; text-align: center; background-color: #004fa5; color: #fff;">
			<br>
			<h1>Manage User <?php echo $name;?></h1>
			<form method="POST" action=<?php echo 'mac.set.inc.php?id='.$_GET['id']?>>
				<label>Edit Name</label><br>
				<input style="width: 50%; background-color: #007BFF; border: none; color: #fff;" type="text" name="name" value=<?php echo '"'.$name.'"';?>><br><br>
				<label>Edit Power</label><br>
				<input style="width: 50%; background-color: #007BFF; border: none; color: #fff;" type="number" min="1" max="3" name="power" value=<?php echo '"'.$power.'"';?>><br><br>
				<label>Edit Online</label><br>
				<input style="width: 50%; background-color: #007BFF; border: none; color: #fff;" type="number" min="0" max="1" name="online" value=<?php echo '"'.$online.'"';?>><br><br>
				<label>Edit profPic</label><br>
				<input style="width: 50%; background-color: #007BFF; border: none; color: #fff;" type="text" name="profPic" value=<?php echo '"'.$profPic.'"';?>><br><br>
				<label>Edit Bio</label><br>
				<input style="width: 50%; background-color: #007BFF; border: none; color: #fff;" type="text" name="bio" value=<?php echo '"'.$bio.'"';?>><br><br>
				<label>Edit Ban (0 = Not Banned)</label><br>
				<input style="width: 50%; background-color: #007BFF; border: none; color: #fff;" type="text" name="ban" value=<?php echo '"'.$ban.'"';?>><br><br>
				<button type="submit" style="width: 50%; background-color: #007BFF; cursor: pointer; border: none; color: #fff;">Send</button><br><br>
			</form>
			<a href="../set/mac.set.php"><button type="submit" style="width: 50%; background-color: #007BFF; cursor: pointer; border: none; color: #fff;">Back</button></a><br><br>
		</div>
	</body>
</html>