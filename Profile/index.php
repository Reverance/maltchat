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
			
			function loadProfile() {

				window.id = <?php echo $id; ?>;
				
				$.post("getProfile.php",{id:id}, function(data) {
					array = JSON.parse(data);
					header = "<b>" + array[2] + "</b>";
					image = array[6];
					bio = array[7];
					$('#profileHeaderText').append(header);
					$('#profileHeaderImage').attr('src',image);
					$('#profileBoxBio').append(bio);
				}); // GET PROFILE DATA

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
					<img src="https://cdn2.iconfinder.com/data/icons/rcons-user/32/male-shadow-circle-512.png" id="profileHeaderImage">
					<div id="profileHeaderText"></div>
					<?php if ($id == $_SESSION['id']) { ?>
					<img onclick="redirect('editMyBio.php');" src="https://image.flaticon.com/icons/png/512/84/84380.png" id="profileHeaderImage2">
					<?php } ?>
				</div>
				<div id="profileBox">
					<div id="profileBoxBio"></div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				loadProfile();/*
				setInterval(function(){
					updateProfile();
				},1000);*/
			});
		</script>
	</body>
</html>