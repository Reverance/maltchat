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
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		<script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script type="text/javascript">

			function redirect(url) {
				window.location = url;
			}

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

			function printChat(array) {

				user = <?php echo $_SESSION['id']; ?>;
				console.log(array);

				divText = '<div id="chat' + array[0] + '" class="chat" onclick="redirect(' + "'" + '../Chat/?gid=' + array[0] + "'" + ');">	<img src="' + array[1] + '"><font class="name">' + array[2] + '</font></div>';

				console.log(divText);
				$('#chatBox').append(divText);
				
			}

			function deleteChat(id) {

				divId = '#chat' + id;
				$(divId).remove();

			}

			function updateChat() {

				$.post("getChat.php",{id:<?php echo $_SESSION['id']; ?>,target:"all"}, function(data) {
					window.vara = JSON.parse(data);
				}); // GET ALL USERS

				$.post("getChat.php",{id:<?php echo $_SESSION['id']; ?>,target:"id"}, function(data) {
					window.varb = JSON.parse(data);
				}); // GET ALL USER IDS

				for (var i = 0; i < window.varb[1].length; i++) {
					index = contains.call(window.var2[1], window.varb[1][i]);
					if (index == false) {
						deleteUser(vara[1][i][0]);
						printOffline(vara[1][i]);
						console.log("V");
					}
				} // SEARCH FOR MISSING USERS

				window.var[1] = window.vara[1];
				window.var2[1] = window.varb[1];

			}

			function loadChat(array) {

				$.post("getChats.php",{id:<?php echo $_SESSION['id']; ?>}, function(data) {
					author = <?php echo $_SESSION['id']; ?>;
					array = JSON.parse(data);
					for (var i = 0; i < array.length; i++) {
						printChat(array[i]);
					}
					window.var = JSON.parse(data);
				}); // GET ALL USERS

			}

		</script>
	</head>
	<body>
		<?php include "../Navbar/navbar.php" ?>
		<br>
		<div id="container">
			<div id="overlay"></div>
			<div id="box">
				<div id="chatHeader">
					<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/39/Internet-group-chat.svg/2000px-Internet-group-chat.svg.png" id="chatHeaderImage">
					<div id="chatHeaderText"><b>Chats</b></div>
					<a href="makeAChat.php"><img src="http://cdn.onlinewebfonts.com/svg/img_466078.png" id="chatHeaderImage2"></a>
				</div>
				<div id="chatBox">
					<div id="chat0" class="chat" onclick="redirect('../Global');">	<img src="https://cdn1.iconfinder.com/data/icons/office-and-employment-vol-2/32/599_earth_global_globe_international_map_planet_world-512.png"><font class="name">Global</font></div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				loadChat();/*
				setInterval(function(){
					updateChat();
				},1000);*/
			});
		</script>
	</body>
</html>