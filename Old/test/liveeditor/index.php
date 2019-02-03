<!DOCTYPE html>
<html>
<head>
	<title>Live Editor</title>
</head>
<style type="text/css">
	.left {
		width: 50%;
		height: 100%;
		position: absolute;
		top: 0;
		left: 0;
	}
	.left button:hover {
		opacity: 0.8;
	}
	.left textarea {
		width: 99%;
		height: 100%;
		top: 0;
		left: 0;
		position: absolute;
	}
	.right {
		width: 50%;
		height: 100%;
		position: absolute;
		top: 0;
		left: 50%;
		border-left: 2px solid #000;
	}
</style>
<body>
	
<div class="left" id="left">
	<textarea name="textarea" onkeyup="code(this.value)" placeholder="Enter Code Here, Do Not Add head,body or html"><?php
		if (isset($_COOKIE['code'])) {
			echo $_COOKIE['code'];
		}
		?></textarea>
</div>
<div class="right" id="right" name="right">
<div id="codee"><?php
if (isset($_COOKIE['code'])) {
	echo $_COOKIE['code'];
}
?></div>
</div>
<script type="text/javascript">
function code(str) {
	document.getElementById("codee").innerHTML = str;
	var code = "code=" + str;
	document.cookie = code;
}
</script>
</body>
</html>