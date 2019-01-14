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
		<div class="login-page">
			<div class="form">
				<form class="register-form" onsubmit="register();return false;">
					<input type="text" id="Ruid" placeholder="username"/>
					<input type="password" id="Rpwd" placeholder="password"/>
					<input type="text" id="Rname" placeholder="name"/>
					<input type="text" id="Remail" placeholder="email address"/>
					<button>create</button>
					<p class="message"><b></b></p>
					<p class="message">Already registered? <a href="#login">Sign In</a></p>
				</form>
				<form class="login-form" onsubmit="login();return false;">
					<input type="text" id="Luid" placeholder="username"/>
					<input type="password" id="Lpwd" placeholder="password"/>
					<button>login</button>
					<p class="message"><b></b></p>
					<p class="message">Not registered? <a href="#register">Create an account</a></p>
				</form>
			</div>
		</div>
		<script type="text/javascript">
			$('.message a').click(function(){
				$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
			});
			function login() {
				var uid = $('#Luid').val();
				var pwd = $('#Lpwd').val();
				if (uid == '') {
					$('.message b').html('No Username Given');
				} else if (pwd == '') {
					$('.message b').html('No Password Given');
				} else {
					$.post("doLogin.php", {uid:uid,pwd:pwd}, function(data) {
						if (data == 1) {
							$('.message b').html('No Valid Username Given');
						} else if (data == 2) {
							$('.message b').html('Server Error; Contact Admin');
						} else if (data == 3) {
							$('.message b').html('Username Or Password Incorrect');
						} else if (data == 4) {
							$('.message b').html('Your Account Has Been Banned');
						} else if (data == 5) {
							$('.message b').html('You Must Verify Your Account, Cannot See The Email? Check Spam');
						} else if (data == 100) {
							$('.message b').html('<font style="color:#00ff00;">You Have Been Logged In Successfully</font>');
							window.setTimeout(window.location.replace("../index.php"),1000);
						} else {
							$('.message b').html('error: ' + data);
						}
					});
				}
			}
			function register() {
				var uid = $('#Ruid').val();
				var pwd = $('#Rpwd').val();
				var name = $('#Rname').val();
				var email = $('#Remail').val();
				if (uid == '') {
					$('.message b').html('No Username Given');
				} else if (pwd == '') {
					$('.message b').html('No Password Given');
				} else if (name == '') {
					$('.message b').html('No Name Given');
				} else if (email == '') {
					$('.message b').html('No Email Given');
				} else {
					$.post("doRegister.php", {uid:uid,pwd:pwd,name:name,email:email}, function(data) {
						if (data == 1) {
							$('.message b').html('No Valid Username Given');
						} else if (data == 2) {
							$('.message b').html('No Valid Name Given');
						} else if (data == 3) {
							$('.message b').html('No Valid Email Given');
						} else if (data == 4) {
							$('.message b').html('Server Error Contact Admin');
						} else if (data == 5) {
							$('.message b').html('Username Taken');
						} else if (data == 6) {
							$('.message b').html('Name Taken');
						} else if (data == 7) {
							$('.message b').html('Email Taken');
						} else if (data == 100) {
							$('.message b').html('<font style="color:#00ff00;">Account Registered, Verify Account</font>');
						} else {
							$('.message b').html('error: ' + data);
						}
					});
				}
			}
		</script>
	</body>
</html>