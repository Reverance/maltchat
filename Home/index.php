<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: ../Login/logout.php");
}
$a = 'class="active"';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		<script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="overlay"></div>
		<?php include "../Navbar/navbar.php" ?>
		<br>
		<div id="container">
			<font style="text-align: center; color: #000;"><b>Welcome <?php echo $_SESSION['name']; ?></b></font>
		</div>
	</body>
</html>