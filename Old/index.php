<?php

	session_start();
	if(isset($_SESSION['id'])) {
		header("Location: /Index/home.php");
	} else {
		header("Location: /Login/newlog.php");
	}

?>