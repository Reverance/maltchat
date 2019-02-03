<?php
$a = '"nav-link"';
$b = '"nav-link"';
$c = '"nav-link"';
$d = '"nav-link"';
$e = '"nav-link"';
$f = '"nav-link"';
$g = '"nav-link"';
$h = '"nav-link active"';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Javascript Games</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>
<style>
html {
    height: 90%;
}
body {
    background-color: #000;
    color: #fff;
    text-align: center;
    height: 100%;
}
h1 {
    font-size: 250%;
}
button {
    width: 80%;
    text-align: center;
    height: 10%;
    font-size: 150%;
    background-color: #fff;
    border: none;
    color: #000;
}
button:hover {
    background-color: #888888;
    color: #fff;
    cursor: pointer;
    border: 3px solid #fff;
}
</style>
</head>
<body>
<?php include '../Navbar/navbar.php'; ?>
<br><br>
<H1>ALL GAMES</H1><br><h4><i>All Rights Reserved © MaltChat 2018</i></h4>
<a href="page1.php"><button>SNAKE</button></a>
<br><br>
<a href="page2.php"><button>FLAPPY BIRD</button></a>
<br><br>
<a href="page3.php"><button>BLOCK RUN</button></a>
<br><br>
<a href="page4.php"><button>TANKZ</button></a>
<br><br>
<a href="page5.php"><button>CONNECT 4</button></a>
<br><br>
<a href="page6.php"><button>NAME</button></a>
</body>
</html>