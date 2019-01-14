<?php

session_start();
include '../db/maindb.conn.php';
require_once "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];
$email = $_POST['email'];
$name = $_POST['name'];

$uid = strip_tags($uid);
$uid = preg_replace("/[^a-zA-Z]/", "", $uid);
if ($uid == "") {
	die('1');
}
$pwd = hash('sha256',$pwd);
$name = strip_tags($name);
$name = preg_replace("/[^a-zA-Z]/", "", $name);
if ($name == "") {
	die('2');
}
$email = strip_tags($email);
if ($email == "") {
	die('3');
}
$verif = mt_rand( 10000000, 99999999);

$sql0 = "SELECT * FROM users WHERE uid='$uid'";
$sql1 = "SELECT * FROM users WHERE name='$name'";
$sql2 = "SELECT * FROM users WHERE email='$email'";
$sql3 = "INSERT INTO users (uid,pwd,name,email,power) VALUES ('$uid','$pwd','$name','$email','$verif')";


if (!$result0 = mysqli_query($mainDBConn, $sql0)) {
	die('4');
} else {
	if ($row0 = mysqli_fetch_assoc($result0)) {
		die('5');
	}
}

if (!$result1 = mysqli_query($mainDBConn, $sql1)) {
	die('4');
} else {
	if ($row1 = mysqli_fetch_assoc($result1)) {
		die('6');
	}
}

if (!$result2 = mysqli_query($mainDBConn, $sql2)) {
	die('4');
} else {
	if ($row2 = mysqli_fetch_assoc($result2)) {
		die('7');
	}
}

if (!$result3 = mysqli_query($mainDBConn, $sql3)) {
	die('4');
}



$mail = new PHPMailer;

$mail->From = "no-reply@maltchat.tk";
$mail->FromName = "MaltChat";

$mail->addAddress($email, $name);

$mail->isHTML(true);
$mail->isSMTP();

$mail->Subject = "MaltChat Account Verification";
$mail->Body = "Hi,<br><br>It seems you signed up for MaltChat,<br>Here is your verification link:<br>http://www.maltchat.tk/New/Login/verif.php?uid=$uid&verif=$verif<br><br>Have Fun Chatting!<br>Maltchat Admin<br>";
$mail->AltBody = "Hi,<br><br>It seems you signed up for MaltChat,<br>Here is your verification link:<br>http://www.maltchat.tk/New/Login/verif.php?uid=$uid&verif=$verif<br><br>Have Fun Chatting!<br>Maltchat Admin<br>";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    die('100');
}