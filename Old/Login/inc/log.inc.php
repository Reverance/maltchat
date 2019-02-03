<?php

session_start();
include '../../DB/db.inc.php';

// $options = array(
//     'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
//     'cost' => 12,
//   );

$useruid = $_GET['uid'];
$userpwd = $_GET['pwd'];
$rem = $_GET['rem'];
$useruid = preg_replace('/[^\p{L}\p{N}\s]/u', '', $useruid);



if ($useruid != "") {
	$hashedPWD = hash('sha256', $userpwd);



	$sql0 = "SELECT * FROM users WHERE uid='$useruid' AND pwd='$hashedPWD'";
	$sql1 = "UPDATE users SET online=1 WHERE uid='$useruid'";
	$sql2 = "UPDATE users SET flog=0 WHERE uid='$useruid'";

	$result = mysqli_query($conn, $sql0);

	if (!$row = mysqli_fetch_assoc($result)) {
		$_SESSION['wrong'] = "Incorrect Details";
		echo $useruid;
		echo $hashedPWD;
		// echo $hashedPWD;
		header("Location: ../newlog.php");
	} else {
		if ($row['power'] < 4) {
			if ($result1 = mysqli_query($conn, $sql1)) {
				if ($row['bcheck'] == "0") {
					if ($row['flog'] == 1) {
						if ($result2 = mysqli_query($conn, $sql2)) {
							echo "work";
						} else {
							$_SESSION['wrong'] = "Error Contact Admin";
							header("Location: ../newlog.php");
						}
					}
					session_destroy();
					session_start();
					$_SESSION['id'] = $row['id'];
					$_SESSION['uid'] = $row['uid'];
					$_SESSION['pwd'] = $row['pwd'];
					$_SESSION['name'] = $row['name'];
					$_SESSION['pwr'] = $row['power'];
					$_SESSION['icn'] = $row['profPic'];
					header("Location: ../../Index/home.php");
				} else {
					$_SESSION['wrong'] = $row['bcheck'];
					header("Location: ../newlog.php");
				}
			} else {
				$_SESSION['wrong'] = "Error Contact Admin";
				header("Location: ../newlog.php");
			}
		} else {
			$_SESSION['wrong'] = "Not Verified";
			header("Location: ../newlog.php");
		}
	}
}