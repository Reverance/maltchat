<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: ../Login/logout.php");
}
$e = 'class="active"';
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
		<br>
		<div id="container">
			<?php include "../Navbar/navbar.php" ?>
			<div id="box">
				<form action="#" onsubmit="loadVideo(); return false;">
					<input type="text" id="url" placeholder="E.g. https://www.youtube.com/watch?v=HuIb3XTQVJw">
				</form>
				<div id="video"><iframe src="https://www.youtube.com/embed?max-results=1&showinfo=0&rel=0&listType=user_uploads&list=PewDiePie" style="width: 100%; height:100%;"></iframe></div>
			</div>
		</div>
		<script type="text/javascript">
			function loadVideo() {
				var url = $("#url").val();
				console.log(url);
				if (url == "") {
					$("#video").html('<iframe src="https://www.youtube.com/embed?max-results=1&showinfo=0&rel=0&listType=user_uploads&list=PewDiePie" style="width: 100%; height:100%;"></iframe>');
					$("#url").val("Error; url invalid try again");
				}
				$.post("videoLoad.php",{url:url},function(data){
					$("#video").html(data);
				});
			}
		</script>
	</body>
</html>