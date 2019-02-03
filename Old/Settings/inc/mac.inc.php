<?php

session_start();
if (isset($_SESSION['id'])) {
	if ($_SESSION['pwr'] >= 3) {
		header("Location: inc/lgt.inc.php");
	}
} else {
	header("Location: inc/lgt.inc.php");
}
include 'db.inc.php';

if ($_SESSION['pwr']==2) {
	$sql = "SELECT * FROM users WHERE power>2";
} else if ($_SESSION['pwr']==1) {
	$sql = "SELECT * FROM users WHERE power>1";
}


if ($result = mysqli_query($conn, $sql)) {
	while ($row = mysqli_fetch_row($result)) {
		echo "<h3 class='users'>
		 ".$row['0']." - ".$row['1']." - ".$row['3']."
		 <a href='../inc/mac2.set.inc.php?id=".$row['0']."'> 
		 <button class='buttonuser'> 
		 Manage
		 </button>
		 </a>
		 </h3>
		 <h3 class='user'>
		 </h3>";
	}
} else {
	echo "Error 501: Contact Admin";
}

?>