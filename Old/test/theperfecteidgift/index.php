<!DOCTYPE html>
<html>
<head>
	<title>index</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<h1>The Perfect Eid Gift</h1>

<form action="surv.inc.php" method="POST" name="frm" class="frm">
	<div class="greenbod">
		<b><label>Who Are You Purchasing This Eid Gift For?</label></b><br>
		<select name="option1">
			<option onclick="unblock();" value="0">Select Option</option>
			<option onclick="block();" id="mom" value="1">Mother</option>
			<option onclick="block();" id="dad" value="2">Father</option>
			<option onclick="unblock();" value="3">Partner (Male)</option>
			<option onclick="unblock();" value="4">Partner (Female)</option>
			<option onclick="unblock();" value="5">Friend (Male)</option>
			<option onclick="unblock();" value="6">Friend (Female)</option>
			<option onclick="unblock();" value="7">Brother</option>
			<option onclick="unblock();" value="8">Sister</option>
			<option onclick="unblock();" value="9">Daughter</option>
			<option onclick="unblock();" value="10">Son</option>
			<option onclick="unblock();" value="11">Nephew</option>
			<option onclick="unblock();" value="12">Neice</option>
			<option onclick="block();" id="gma" value="13">Grandmother</option>
			<option onclick="block();" id="gda" value="14">Grandfather</option>
			<option onclick="unblock();" value="15">Uncle</option>
			<option onclick="unblock();" value="16">Auntie</option>
			<option onclick="unblock();" value="17">Cousin (Male)</option>
			<option onclick="unblock();" value="18">Cousin (Female)</option>
		</select>
		<br><br>
		<B><label>How Old Are They?</label></B><br>
		<select name="option2">
			<option onclick="unblock2();" value="0">Select Option</option>
			<option onclick="block2();" id="ztt" value="1">00 < Age < 10</option>
			<option onclick="block2();" id="ttt" value="2">10 < Age < 20</option>
			<option onclick="unblock2();" value="3">20 < Age < 40</option>
			<option onclick="unblock2();" value="4">40 < Age</option>
		</select>
		<br><br>
		<B><label>How Much Does This Person Mean To You?</label></B><br>
		<select name="option3">
			<option value="0">Select Option</option>
			<option value="1">Less Than £10</option>
			<option value="2">Less Than £25</option>
			<option value="3">Less Than £50</option>
			<option value="5">Less Than £80</option>
			<option value="5">No Limit</option>
		</select>
		<br><br>
		<button type="submit" value="Submit" onclick="return val();">Submit</button>
	</div>
</form>
<div class="greenbod">
<br><br>
<h4 class="links">
	<?php
	include 'db.inc.php';
	if (isset($_GET['link'])) {
		$linkk = $_GET['link'];
		$sql = "SELECT * FROM list2 WHERE link='$linkk'";
		$result = mysqli_query($link, $sql);
		if ($row = mysqli_fetch_assoc($result)) {
			$a = $row['a'];
			$b = $row['b'];
			$c = $row['c'];
			$d = $row['d'];
			$e = $row['e'];
			$f = $row['f'];
			$linkkk = "<br> TPEG 1 - ".$a."<br> TPEG 2 - ".$b."<br> TPEG 3 - ".$c."<br> TPEG 4 - ".$d."<br> TPEG 5 - ".$e."<br> TPEG 6 - ".$f;
		} else {
			$linkkk = "<br>No gifts Available";
		}
		echo $linkkk;
	} else {
		echo "<h2>Select Some Options!!!</h2>";
	}
	?>
</h4>
</div>
</body>
<script type="text/javascript">
	var ztt = document.getElementById("ztt");
	var ttt = document.getElementById("ttt");
	var mom = document.getElementById("mom");
	var dad = document.getElementById("dad");
	var gma = document.getElementById("gma");
	var gda = document.getElementById("gda");
	function val() {
		if (frm.option1.selectedIndex==0) {
			alert('Please Select Who You Are Buying This Gift For');
			frm.option1.focus();
			return false;
		}
		if (frm.option2.selectedIndex==0) {
			alert('Please Select How Old This Person Is');
			frm.option2.focus();
			return false;
		}
		if (frm.option3.selectedIndex==0) {
			alert('Please Select How Much This Person Means To You');
			frm.option3.focus();
			return false;
		}
	}
	function block() {
		ztt.style.display = "none";
		ttt.style.display = "none";
	}
	function block2() {
		mom.style.display = "none";
		dad.style.display = "none";
		gma.style.display = "none";
		gda.style.display = "none";
	}
	function unblock() {
		ztt.style.display = "block";
		ttt.style.display = "block";
	}
	function unblock2() {
		mom.style.display = "block";
		dad.style.display = "block";
		gma.style.display = "block";
		gda.style.display = "block";
	}
</script>
</html>