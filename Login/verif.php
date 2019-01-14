<?php

include '../db/maindb.conn.php';
require_once "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$uid = $_GET['uid'];
$verif = $_GET['verif'];


$uid = strip_tags($uid);
$uid = preg_replace("/[^a-zA-Z]/", "", $uid);
if ($uid == "") {
	$message = "No Valid UID Recieved";
}
$verif = strip_tags($verif);
if ($verif == "") {
	$message = "No Valid Verification Code Recieved";
}

$sql0 = "SELECT * FROM users WHERE uid='$uid' AND power='$verif'";
$sql1 = "UPDATE users SET power='3' WHERE uid='$uid' AND power='$verif'";

if (!$result0 = mysqli_query($mainDBConn, $sql0)) {
	$message = "Error 1, Server Error Contact Admin";
} else {
	if (!$row = mysqli_fetch_assoc($result0)) {

	} else {

		if (!$result1 = mysqli_query($mainDBConn,$sql1)) {
			$message = "Error 2, Server Error Contact Admin";
		} else {

			$email = $row['email'];
			$name = $row['name'];
			
			$mail = new PHPMailer;

			$mail->From = "no-reply@maltchat.tk";
			$mail->FromName = "MaltChat";

			$mail->addAddress($email, $name);

			$mail->isHTML(true);
			$mail->isSMTP();

			$mail->Subject = "MaltChat Account Verified";
			$mail->Body = "Hi,<br><br>Welcome To Maltcat!<br>You Have Been Verified And Can Now Log In<br><br>Have Fun Chatting!<br>Maltchat Admin<br>";
			$mail->AltBody = "Hi,<br><br>Welcome To Maltcat!<br>You Have Been Verified And Can Now Log In<br><br>Have Fun Chatting!<br>Maltchat Admin<br>";

			if(!$mail->send()) 
			{
			    echo "Mailer Error: " . $mail->ErrorInfo;
			} 
			else 
			{
				$message = "Success<br><a href='../Login'>Login</a>";
				header("Location: ../Login");
			}

		}

	}
}




echo "<br>".$message;

?>