<?php
session_start();
$name = $_SESSION['name'];
if (!isset($_SESSION['id'])) {
	header("Location: login.php");
}
include 'inc/flog.check.inc.php';

$g = '"nav-link active"';
$b = '"nav-link"';
$c = '"nav-link"';
$d = '"nav-link"';
$e = '"nav-link"';
$f = '"nav-link"';
$a = '"nav-link"';
$h = '"nav-link"';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Settings</title>
		<link rel="stylesheet" type="text/css" href="css/set.css">
    	<link rel="stylesheet" type="text/css" href="css/nom.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>
  </head>
  <body style="background-color: black">
    <?php include '../Navbar/navbar.php'; ?><br><br>
		<div class="bod" style="margin: auto; text-align: center;">
			<a href="Psc/psc.set.php"><button class="buttons">Password Change</button></a>
			<br><br>
			<a href="Igc/igc.set.php"><button class="buttons">Image Change</button></a>
			<br><br>
			<a href="Bio/bio.set.php"><button class="buttons">Edit Bio</button></a>
			<?php
			if ($_SESSION['pwr']<=2) {
        echo '
      <br><br>
      <a href="Cch/cch.inc.php"><button style="background-color: red;" class="buttons">Clear Global Chat</button></a>';
        echo '
      <br><br>
      <a href="Prv.Cch/prv.cch.inc.php"><button style="background-color: red;" class="buttons">Clear All Private Chats</button></a>';
        echo '
      <br><br>
      <a href="Ver/ver.set.php"><button style="background-color: red;" class="buttons">Verify Accounts</button></a>';
        echo '
      <br><br>
      <a href="Mac/mac.set.php"><button style="background-color: red;" class="buttons">Manage Accounts</button></a>';
			}
			?>
		</div>
	</body>
</html>