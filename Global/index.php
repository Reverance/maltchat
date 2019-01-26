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
	<body onload="getMessage(); scrollDown();">
		<?php include "../Navbar/navbar.php" ?>
		<br>
		<div id="container">
			<div id="overlay"></div>
			<div id="box">
				<div id="messageHeader">
					<img src="https://cdn1.iconfinder.com/data/icons/office-and-employment-vol-2/32/599_earth_global_globe_international_map_planet_world-512.png" id="messageHeaderImage">
					<div id="messageHeaderText"><b>Global</b></div>
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
						console.log(data);
						if (data == 1) {
							alert("ERROR; SERVER REFUSED; CODE 001\nCONTACT ADMIN");
						} else if (data == 100) {
							$('#message').val("");
							getMessage();
							$("#messageBox").scrollTop($("#messageBox")[0].scrollHeight);
						} else {
							alert("ERROR; SERVER REFUSED; CODE UNKNOWN\nCONTACT ADMIN");
						}
					});
				}

			}
			function getMessage() {

				$("#messageBox").load("getMessage.php");

			}
			function scrollDown() {
				setTimeout(
				  function() 
				  {
					$("#messageBox").scrollTop($("#messageBox")[0].scrollHeight);
				  }, 5000);
			}
			
			 $(document).ready(function(){
			 	window.setInterval(function(){
			 		getMessage();
					$("#messageBox").scrollTop($("#messageBox")[0].scrollHeight);
			 	}, 500);
			 });
		</script>
	</body>
</html>