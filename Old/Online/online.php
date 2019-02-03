<?php
session_start();
$name = $_SESSION['name'];
if (!isset($_SESSION['id'])) {
	header("Location: ../Login/inc/lgt.inc.php");
}
include '../Check/check.php';
$c = '"nav-link active"';
$b = '"nav-link"';
$a = '"nav-link"';
$d = '"nav-link"';
$e = '"nav-link"';
$f = '"nav-link"';
$g = '"nav-link"';
$h = '"nav-link"';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/onl.css">
  </head>
  <body style="background-color: black">
    <?php include '../Navbar/navbar.php'; ?>
    <br><br>
    <div class="body" id="body" style="background-color: #004fa5;">
        <?php
        include 'inc/onl.inc.php';
        ?>
    </div><br>
  </body>
</html>