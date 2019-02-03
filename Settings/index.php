<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: ../Login/logout.php");
}
$f = 'class="active"';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		<script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			function redirect(url) {
						window.location = url;
					}
		</script>
	</head>
	<body>
		<div id="overlay"></div>
		<br>
		<div id="container">
			<?php include "../Navbar/navbar.php" ?>
			<div id="box">
				<div id="settingsHeader">
					<img src="https://loading.io/spinners/gear-set/lg.triple-gears-loading-icon.gif" id="settingsHeaderImage">
					<div id="settingsHeaderText"><b>Settings</b></div>
				</div>
				<div id="settingsBox">
					<div class="settings" onclick="redirect('changeMyPass.php');"><font class="name">Password Change</font></div>
					<div class="settings" onclick="redirect('changeMyName.php');"><font class="name">Name Change</font></div>
					<div class="settings" onclick="redirect('changeMyEmail.php');"><font class="name">Email Change</font></div>
					<div class="settings" onclick="redirect('changeMyProfPic.php');"><font class="name">Profile Picture Change</font></div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
		</script>
	</body>
</html>