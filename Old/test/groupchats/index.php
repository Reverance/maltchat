<!DOCTYPE html>
<html>
<head>
	<title>Group Chats</title>
</head>
<body><br>
<?php
session_start();
include 'db.php';
$pname = "user";
$_SESSION['name'] = $pname;
$sql = "SELECT * FROM glist WHERE p1='$pname' OR p2='$pname' OR p3='$pname' OR p4='$pname' OR p5='$pname' OR p6='$pname' OR p7='$pname' OR p8='$pname'";
$result = mysqli_query($link, $sql);
$a = 0;
while ($row = mysqli_fetch_row($result)) {
	$a++;
	echo "Group ".$a." - <a href='chat.php?gname=".$row['1']."'> Open Group </a>- ".$row['1'];
	echo "<br><br>";
}
?>
</body>
</html>