<?php

session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/log.css">
    	<link rel="stylesheet" type="text/css" href="css/nom.css">
	</head>
	<body><br>
		<div class="login">
		  <div class="imgcontainer"><br>
		    <h1>dark_Restore</h1>
		  </div>
		  <br>
		  <form action="inc/log.inc.php" method="POST" id="lform">
		    <div class="container">
		      <label><b>Username</b></label>
		      <input type="text" placeholder="Enter Username" name="uid" required>

		      <label><b>Password</b></label>
		      <input type="password" placeholder="Enter Password" name="pwd" required>
		      <label style="color: #f00;"><?php

		      if (isset($_SESSION['wrong'])) {
		      	echo $_SESSION['wrong'];
		      }

		      ?></label>
		      <button type="submit" onclick="check()"><b>Login</b></button>

		      <br>
		      <hr>
		      <p style="float: left;">Don't Have An Account?</p>
		      <a href="register.php"><p style="float: right;">Register Here</p></a>
		      <br><br>

		    </div>
		  </form>
		</div>
	</body>
</html>