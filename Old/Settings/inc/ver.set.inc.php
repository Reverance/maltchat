<?php

session_start();
include 'db.inc.php';

$sql = "SELECT * FROM users WHERE power=4";

if ($result = mysqli_query($conn, $sql)) {
	while ($row = mysqli_fetch_row($result)) {
		echo "<h3 class='users'>
		 ".$row['0']." - ".$row['1']." - ".$row['3']." 
		 <a href='../inc/ver.del.inc.php?id=".$row['0']."'> 
		 <button class='buttonuser'> 
		 Delete
		 </button>
		 </a>
		 <a href='../inc/ver.inc.php?id=".$row['0']."'> 
		 <button class='buttonuser'> 
		 Verify
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