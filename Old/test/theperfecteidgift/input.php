<!DOCTYPE html>
<html>
<head>
	<title>index</title>
</head>
<body>

<br>

<form action="inpt.inc.php" method="POST" name="frm">
	<label>Option 1</label><br>
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
	<label>Option 2</label><br>
	<select name="option2">
		<option onclick="unblock2();" value="0">Select Option</option>
		<option onclick="block2();" id="ztt" value="1">00 < Age < 10</option>
		<option onclick="block2();" id="ttt" value="2">10 < Age < 20</option>
		<option onclick="unblock2();" value="3">20 < Age < 40</option>
		<option onclick="unblock2();" value="4">40 < Age</option>
	</select>
	<br><br>
	<label>Option 3</label><br>
	<select name="option3">
		<option value="0">Select Option</option>
		<option value="1">Less Than £10</option>
		<option value="2">Less Than £25</option>
		<option value="3">Less Than £50</option>
		<option value="5">Less Than £80</option>
		<option value="5">No Limit</option>
	</select>
	<br><br>
	<label>Link 1</label><br>
	<input type="text" name="linka"><br>
	<label>Link 2</label><br>
	<input type="text" name="linkb"><br>
	<label>Link 3</label><br>
	<input type="text" name="linkc"><br>
	<label>Link 4</label><br>
	<input type="text" name="linkd"><br>
	<label>Link 5</label><br>
	<input type="text" name="linke"><br>
	<label>Link 6</label><br>
	<input type="text" name="linkf"><br>
	<button type="submit" value="Submit" onclick="return val();">Submit</button>
</form>


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