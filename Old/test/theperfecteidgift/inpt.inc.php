<?php

include 'db.inc.php';

$opa = $_POST['option1'];
echo $opa."<br>";
$opb = $_POST['option2'];
echo $opb."<br>";
$opc = $_POST['option3'];
echo $opc."<br>";

$sql = "SELECT * FROM list WHERE opa='$opa' AND opb='$opb' AND opc='$opc'";
if ($result = mysqli_query($link, $sql)) {	
	if ($row = mysqli_fetch_assoc($result)) {
		$linkk = $row['link'];
		$al = $_POST['linka'];
		echo $al."<br>";
		if ($al == "") {
			$al = "N/A";
		}
		$bl = $_POST['linkb'];
		echo $bl."<br>";
		if ($bl == "") {
			$bl = "N/A";
		}
		$cl = $_POST['linkc'];
		echo $cl."<br>";
		if ($cl == "") {
			$cl = "N/A";
		}
		$dl = $_POST['linkd'];
		echo $dl."<br>";
		if ($dl == "") {
			$dl = "N/A";
		}
		$el = $_POST['linke'];
		echo $el."<br>";
		if ($el == "") {
			$el = "N/A";
		}
		$fl = $_POST['linkf'];
		echo $fl."<br>";
		if ($fl == "") {
			$fl = "N/A";
		}
	} else {
		echo "Sorry There Are No Products With This Listing Try Again";
	}
} else {
	echo "Error Contact Server";
}

$sql2 = "UPDATE list2 SET a='$al', b='$bl', c='$cl', d='$dl', e='$el', f='$fl' WHERE LINK='$linkk'";
if ($result2 = mysqli_query($link, $sql2)) {
	header("Location: input.php");
}