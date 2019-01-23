<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: ../Login/logout.php");
}
$b = 'class="active"';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Global</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		<script src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
			google.load("jquery", "1.3.2");
		</script>
	</head>
	<body>
		<?php include "../Navbar/navbar.php" ?>
		<br>
		<div id="container">
			<div id="overlay"></div>
			<div id="box">
				<div id="messageHeader">
					<h1 id="messageHeaderText"><b>Global</b></h1>
				</div>
				<div id="messageBox"></div>
				<form action="#" onsubmit="sendMessage();return false;" id="messageForm">
					<input type="text" id="message" placeholder="Type a message..." maxlength="255">
				</form>
			</div>
		</div>
		<script type="text/javascript">
			function sendMessage() {
				if ($('#message').val() == "") {
					console.log("no text");
				} else {
					$.post("sendMessage.php", {id:<?php echo $_SESSION['id']; ?>,message:$('#message').val()}, function(data) {
					});
				}
			}
		</script>
	</body>
</html>