<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: ../Login/logout.php");
}
$c = 'class="active"';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		<script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script type="text/javascript">

			function reveal(id) {
				text = "#extra" + id;
				$(text).toggle();
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

			function printOnline(array) {

				user = <?php echo $_SESSION['id']; ?>;
				console.log("A");

				if (user != array[0]) {

					if (array[2] == 1 || array[2] == 2) {
						divText = "<a href='../Profile/?id=" + array[0] + "'><div id='online" + array[0] + "' class='online mod'><img src='" + array[3] + "' style='width:25px;'><b class='name'>" + array[1] + "</b><div id='extra" + array[0] + "' class='extra'>Logged in on" + array[4] + "</div></div></a>";
					} else {
						divText = "<a href='../Profile/?id=" + array[0] + "'><div id='online" + array[0] + "' class='online'><img src='" + array[3] + "' style='width:25px;'><b class='name'>" + array[1] + "</b><div id='extra" + array[0] + "' class='extra'>Last logged in on" + array[4] + "</div></div></a>";
					}

					$('#onlineBoxTop').append(divText);
				}
				
			}

			function deleteUser(id) {

				divId = '#online' + id;
				$(divId).remove();

			}

			function printOffline(array) {

				user = <?php echo $_SESSION['id']; ?>;
				console.log("B");

				if (user != array[0]) {

					if (array[2] == 1 || array[2] == 2) {
						divText = "<a href='../Profile/?id=" + array[0] + "'><div id='online" + array[0] + "' class='online mod'><img src='" + array[3] + "' style='width:25px;'><b class='name'>" + array[1] + "</b><div id='extra" + array[0] + "' class='extra'>Logged in on " + array[4] + "</div></div></a>";
					} else {
						divText = "<a href='../Profile/?id=" + array[0] + "'><div id='online" + array[0] + "' class='online'><img src='" + array[3] + "' style='width:25px;'><b class='name'>" + array[1] + "</b><div id='extra" + array[0] + "' class='extra'>Last logged in on " + array[4] + "</div></div></a>";
					}

					$('#onlineBoxBottom').append(divText);
				}
				
			}

			function updateOnline() {

				$.post("getOnline.php",{id:<?php echo $_SESSION['id']; ?>,target:"all"}, function(data) {
					window.vara = JSON.parse(data);
				}); // GET ALL USERS

				$.post("getOnline.php",{id:<?php echo $_SESSION['id']; ?>,target:"id"}, function(data) {
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

				for (var i = 0; i < window.varb[0].length; i++) {
					index = contains.call(window.var2[0], window.varb[0][i]);
					if (index == false) {
						deleteUser(vara[0][i][0]);
						printOnline(vara[0][i]);
						console.log("D");
					}
				} // SEARCH FOR MISSING USERS


				window.var[0] = window.vara[0];
				window.var2[0] = window.varb[0];

			}

			function loadUsers(array) {

				$.post("getOnline.php",{id:<?php echo $_SESSION['id']; ?>,target:"all"}, function(data) {
					author = <?php echo $_SESSION['id']; ?>;
					array = JSON.parse(data);
					for (var i = 0; i < array[0].length; i++) {
						printOnline(array[0][i]);
					}
					for (var i = 0; i < array[1].length; i++) {
						printOffline(array[1][i]);
					}
					window.var = JSON.parse(data);
				}); // GET ALL USERS

				$.post("getOnline.php",{id:<?php echo $_SESSION['id']; ?>,target:"id"}, function(data) {
					window.var2 = JSON.parse(data);
				});// GET ALL USER IDS

			}

		</script>
	</head>
	<body>
		<?php include "../Navbar/navbar.php" ?>
		<br>
		<div id="container">
			<div id="overlay"></div>
			<div id="box">
				<div id="onlineHeader">
					<img src="https://img.icons8.com/windows/1600/tv-on.png" id="onlineHeaderImage">
					<div id="onlineHeaderText"><b>Users</b></div>
				</div>
				<div id="onlineBox">
					<div id="onlineBoxTop">
						<h1 class="onlineBreaker">Online</h1>
					</div>
					<div id="onlineBoxBottom">
						<h1 class="onlineBreaker">Offline</h1>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				loadUsers();
				setInterval(function(){
					updateOnline();
				},1000);
			});
		</script>
	</body>
</html>