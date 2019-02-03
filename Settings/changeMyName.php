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
			function updateName() {
				name = $('#name').val();
				$.post("sendNewName.php",{name:name}, function(data) {
					if (data == '1') {
						alert("Cannot Use Admin In Name!");
					} else {
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
					<div id="settingsHeaderText"><b>Name Change</b></div>
					<img onclick="updateName();" src="https://png.pngtree.com/svg/20170505/submit_1323300.png" id="settingsHeaderImage2">
				</div>
				<div id="settingsBox">
					<br><input type="text" id="name" placeholder="Enter a new name...">
				</div>
			</div>
		</div>
		<script type="text/javascript">
		</script>
	</body>
</html>