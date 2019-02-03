<?php

session_start();
include 'db.php';

if (isset($_GET['gname'])) {
	$gname = $_GET['gname'];
} else {
	header("Location: index.php");
}

$sql = "SELECT * FROM glist WHERE gName='$gname'";
$result = mysqli_query($link, $sql);
if ($row = mysqli_fetch_assoc($result)) {
	if ($row['p1'] == $_SESSION['name']) {
		echo "";
	} elseif ($row['p2'] == $_SESSION['name']) {
		echo "";
	} elseif ($row['p3'] == $_SESSION['name']) {
		echo "";
	} elseif ($row['p4'] == $_SESSION['name']) {
		echo "";
	} elseif ($row['p5'] == $_SESSION['name']) {
		echo "";
	} elseif ($row['p6'] == $_SESSION['name']) {
		echo "";
	} elseif ($row['p7'] == $_SESSION['name']) {
		echo "";
	} elseif ($row['p8'] == $_SESSION['name']) {
		echo "";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
</head>
<body>
	<form action=<?php echo 'sendmessage.php?g='.$_GET['gname']; ?> method="POST">
		<input type="text" name="mes">
	</form>
<?php

$sql1 = "SELECT * FROM gme WHERE mGroup='$gname' ORDER BY mTime DESC";

$result1 = mysqli_query($link, $sql1);

while ($row1 = mysqli_fetch_row($result1)) {

	echo $row1['3'].":<br> ".$row1['2']."<br>>".$row1['4'];
	echo "<br><br>";

}

?>
</body>
</html>