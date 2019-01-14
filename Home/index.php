<?php
session_start();
include '../Check/check.php';
$name = $_SESSION['name'];
if (!isset($_SESSION['id'])) {
  header("Location: ../Login/inc/lgt.inc.php");
}
$a = '"nav-link active"';
$b = '"nav-link"';
$c = '"nav-link"';
$d = '"nav-link"';
$e = '"nav-link"';
$f = '"nav-link"';
$g = '"nav-link"';
$h = '"nav-link"';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		<script src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
			google.load("jquery", "1.3.2");
		</script>
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