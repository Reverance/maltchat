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
	} else {
		$linkk = "Sorry There Are No Products With This Listing Try Again";
	}
} else {
	$linkk = "Error Contact Server";
}
header("Location: index.php?link=".$linkk);
