<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<style type="text/css">

body,html {
	height: 100%;
	width: 100%;
	overflow: hidden;
}

#body {
	height: 100%;
	width: 100%;
	overflow: hidden;
}

#left {
	height: 100%;
	width: 25%;
	position: fixed;
	top: 0;
	left: 0;
	background-color: #3d65a5;
}

#search {
	width: 100%;
	height: 5%;
	background-color: white;
}

.chatBut {
	width: 100%;
	height: 5%;
	background-color: white;
	margin-top: 5px;
}

#right {
	height: 100%;
	width: 75%;
	position: fixed;
	top: 0;
	right: 0;
	background-color: black;
}
</style>
<body>
<div id="body">
	<div id="left">
		<i class="fa fa-search" style="position: absolute; top: 0; left: 0; font-size:200%;"></i>
		<input type="text" name="searchGroups" style="width: 100%; font-size: 140%; padding-left: 6%;">
		<a><div class="chatBut">
			<h1>Global</h1>
		</div></a>
	</div>
	<div id="right">
		
	</div>
</div>
</body>
<script type="text/javascript">
	
</script>
</html>