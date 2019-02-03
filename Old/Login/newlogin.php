<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/newlogin.css">
</head>
<body style="background-color: #000;">
<div class="login-page">
  <div class="form">
    <form class="register-form" method="POST" action="inc/reg.inc.php">
      <input type="text" placeholder="name" name="name" />
      <input type="text" placeholder="username" name="uid" />
      <input type="password" placeholder="password" name="pwd" />
      <input type="text" placeholder="re-enter password" name="pwd2" />
      <label style="color: #f00;"><b><?php 
      if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
      }
      ?></b></label>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form" method="POST" action="inc/log.inc.php">
      <input type="text" placeholder="username" name="uid" />
      <input type="password" placeholder="password" name="pwd" />
      <label style="color: #f00;"><b><?php 
      if (isset($_SESSION['wrong'])) {
        echo $_SESSION['wrong'];
      }
      ?></b></label>
      <button>login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>
<script src="//static.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
</body>
</html>