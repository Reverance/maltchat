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
		<script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script type="text/javascript">

			var contains = function(needle) {
			    // Per spec, the way to identify NaN is that it is not equal to itself
			    var findNaN = needle !== needle;
			    var indexOf;

			    if(!findNaN && typeof Array.prototype.indexOf === 'function') {
			        indexOf = Array.prototype.indexOf;
			    } else {
			        indexOf = function(needle) {
			            var i = -1, index = -1;

			            for(i = 0; i < this.length; i++) {
			                var item = this[i];

			                if((findNaN && item !== item) || item === needle) {
			                    index = i;
			                    break;
			                }
			            }

			            return index;
			        };
			    }

			    return indexOf.call(this, needle) > -1;
			};

			function sendMessage() {

				if ($('#messageInput').val() == "") {
					console.log("no text");
				} else {
					$.post("sendMessage.php", {id:<?php echo $_SESSION['id']; ?>,message:$('#messageInput').val()}, function(data) {
						console.log(data);
						if (data == 1) {
							alert("ERROR; SERVER REFUSED; CODE 001\nCONTACT ADMIN");
						} else if (data == 100) {
							$('#messageInput').val("");
							updateMessages();
							$("#messageBox").scrollTop($("#messageBox")[0].scrollHeight);
						} else {
							alert("ERROR; SERVER REFUSED; CODE UNKNOWN\nCONTACT ADMIN");
						}
					});
				}

			}

			function printMessage(array) {

				author = <?php echo $_SESSION['id']; ?>;

				if (author != array[1]) {
					divText = "<div id='message" + array[0] + "' class='message'><img src='" + array[5] + "' style='width:25px;'><b class='name'>" + array[2] + "</b><br><font class='text'>" + array[3] + "<br></font><font class='time'>" + array[4] + "<br></font></div>";
				} else {
					divText = "<div id='message" + array[0] + "' class='myMessage'><font class='text'>" + array[3] + "<br></font><font class='time'>" + array[4] + "<br></font></div>";
				}
				$('#messageBox').append(divText);
				scrollDown();

			}

			function deleteMessage(id) {
				divId = '#message' + id;
				$(divId).remove();
			}

			function updateMessages() {

				$.post("getMessage.php",{id:<?php echo $_SESSION['id']; ?>,target:"all"}, function(data) {
					window.vara = JSON.parse(data);
				}); // GET ALL MESSAGES

				$.post("getMessage.php",{id:<?php echo $_SESSION['id']; ?>,target:"id"}, function(data) {
					window.varb = JSON.parse(data);
				}); // GET ALL MESSAGE IDS

				for (var i = 0; i < window.varb.length; i++) {
					index = contains.call(window.var2, window.varb[i]);
					if (index == false) {
						printMessage(vara[i]);
					}
				} // SEARCH FOR MISSING MESSAGES

				for (var i = 0; i < window.var2.length; i++) {
					index = contains.call(window.varb, window.var2[i]);
					if (index == false) {
						deleteMessage(window.var2[i]);
					}
				} // SEARCH FOR DELETED MESSAGES				

				window.var = window.vara;
				window.var2 = window.varb;

			}

			function printMessages(array) {

				$.post("getMessage.php",{id:<?php echo $_SESSION['id']; ?>,target:"all"}, function(data) {
					author = <?php echo $_SESSION['id']; ?>;
					array = JSON.parse(data);
					for (var i = 0; i < array.length; i++) {
						printMessage(array[i]);
					}
					window.var = JSON.parse(data);
					scrollDown();
				}); // GET ALL MESSAGES

				$.post("getMessage.php",{id:<?php echo $_SESSION['id']; ?>,target:"id"}, function(data) {
					window.var2 = JSON.parse(data);
				});// GET ALL MESSAGE IDS

			}

			function scrollDown() {
				setTimeout(function() 
				  {
					$("#messageBox").scrollTop($("#messageBox")[0].scrollHeight);
				  }, 1000); //SCROLL DOWN AFTER 5 SECS
			}

		</script>
	</head>
	<body>
		<?php include "../Navbar/navbar.php" ?>
		<br>
		<div id="container">
			<div id="overlay"></div>
			<div id="box">
				<div id="messageHeader">
					<img src="https://cdn1.iconfinder.com/data/icons/office-and-employment-vol-2/32/599_earth_global_globe_international_map_planet_world-512.png" id="messageHeaderImage">
					<div id="messageHeaderText"><b>Global</b></div>
				</div>
				<div id="messageBox">
				</div>
				<form action="#" onsubmit="sendMessage();return false;" id="messageForm">
					<input type="text" id="messageInput" placeholder="Type a message..." maxlength="255">
				</form>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				printMessages();
				scrollDown();
				setInterval(function(){
					updateMessages();
				},1000);
				
			});
		</script>
	</body>
</html>