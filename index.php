<?php

	session_start();

	if (isset($_SESSION['id'])) {
		header("Location: Home");
	} else {
		header("Location: Login");
	}

?>