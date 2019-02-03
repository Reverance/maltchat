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
			function updateProfPic() {
				url = $('#url').val();
				$.post("sendNewProfPic.php",{url:url}, function(data) {
					redirect('../Settings');
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
					<div id="settingsHeaderText"><b>Profile Picture Change</b></div>
					<img onclick="updateProfPic();" src="https://png.pngtree.com/svg/20170505/submit_1323300.png" id="settingsHeaderImage2">
				</div>
				<div id="settingsBox">
					<br><input type="text" id="url" placeholder="Enter a new url... (must be https)">
				</div>
			</div>
		</div>
		<script type="text/javascript">
		</script>
	</body>
</html>