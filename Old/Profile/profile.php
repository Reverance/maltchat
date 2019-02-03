<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: ../Login/inc/lgt.inc.php");
} else {
	if (!isset($_GET['prof'])) {
		$profile = $_SESSION['name'];
		$img = $_SESSION['icn'];
		$id = $_SESSION['id'];
	} else {
		$profile = $_GET['prof'];

		include '../DB/db.inc.php';
		$sql = "SELECT * FROM users WHERE name='$profile'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$img = $row['profPic'];
		$id = $row['id'];
	}
}
include '../Check/check.php';
$d = '"nav-link active"';
$b = '"nav-link"';
$c = '"nav-link"';
$a = '"nav-link"';
$e = '"nav-link"';
$f = '"nav-link"';
$g = '"nav-link"';
$h = '"nav-link"';
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $profile;?>'s Profile</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/pfl.css">
    <link rel="stylesheet" type="text/css" href="css/nom.css">
  </head>
  <body style="background-color: black">
    <?php include '../Navbar/navbar.php'; ?>
		<br><br>
		<div class="profile" style="background-color: #004fa5;"><br>
			<div class="head" style="background-color: #007BFF;">
				<div class="image" style="background-color: #007BFF;">
					<?php echo '<img src="'.$img.'" class="imgforprofile" style=" background-color: #6400ff;" >'; ?>
				</div>
				<div class="title" style="background-color: #007BFF;">
					<?php

					echo "<h1><b>  ".$profile."'s Profile Page</b></h1>";

					?>
				</div>
			</div><br>
			<div class="body">
				<div class="bio" style="background-color: #007BFF;">
					<p style="margin-left: 10px;">
					<?php

						include '../DB/db.inc.php';
						$sql = "SELECT * FROM users WHERE name='$profile'";
						$result = mysqli_query($conn, $sql);
						if ($row = mysqli_fetch_assoc($result)) {
							$bio = $row['bio'];
							echo "  ".$bio;
						} else {
							echo "Error, cannot Load Bio, Contact Admin";
						}

					?><br>
					</p>
				</div>
			</div>
			<br>
		</div>
	<br>
</body>
</html>