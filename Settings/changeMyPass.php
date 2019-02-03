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
			function updatePass() {
				oldP = $('#oldP').val();
				newP = $('#newP').val();
				conP = $('#conP').val();
				$.post("sendNewPass.php",{oldP:oldP,newP:newP,conP:conP}, function(data) {
					if (data == '1') {
						alert("Old Password Is Incorrect");
					} else if (data == '2') {
						alert("Passwords Do Not Match");
					} else if (data == '100') {
						redirect('../Settings');
					}
				});
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
					<div id="settingsHeaderText"><b>Password Change</b></div>
					<img onclick="updatePass();" src="https://png.pngtree.com/svg/20170505/submit_1323300.png" id="settingsHeaderImage2">
				</div>
				<div id="settingsBox">
					<br><input type="Password" id="oldP" placeholder="Old Password">
					<br><br><input type="Password" id="newP" placeholder="New Password">
					<br><br><input type="Password" id="conP" placeholder="Confirm Password">
				</div>
			</div>
		</div>
		<script type="text/javascript">
		</script>
	</body>
</html>