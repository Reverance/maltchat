<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: ../Login/logout.php");
}
$d = 'class="active"';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = $_SESSION['id'];
}
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
			
			function loadBio() {

				window.id = <?php echo $id; ?>;
				
				$.post("getProfile.php",{id:id}, function(data) {
					array = JSON.parse(data);
					bio = array[7];
					$('textarea').val(bio);
				}); // GET PROFILE DATA

			}

			function updateBio() {
				newBio = $('textarea').val();
				$.post("sendNewBio.php",{id:id,bio:newBio}, function(data) {
					redirect('../Profile');
				});
			}
		</script>
	</head>
	<body>
		<div id="overlay"></div>
		<?php include "../Navbar/navbar.php" ?>
		<br>
		<div id="container">
			<div id="box">
				<div id="profileHeader">
					<div id="profileHeaderText">Edit My Bio</div>
					<img onclick="updateBio();" src="https://png.pngtree.com/svg/20170505/submit_1323300.png" id="profileHeaderImage2">
				</div>
				<div id="profileBox">
					<div id="profileBoxBio">
						<textarea style="width: 90%; height: 90%; position: absolute; top: 5%; left: 5%; resize: none; background-color: #662525; color: #fff; border: none; padding: 5px;" maxlength="255"></textarea>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				loadBio();
			});
		</script>
	</body>
</html>