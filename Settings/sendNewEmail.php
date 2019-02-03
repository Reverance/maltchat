<?php

session_start();
include '../db/maindb.conn.php';
require_once "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!isset($_SESSION['id'])) {
  die("0");
}

$id = $_SESSION['id'];
$newE = strip_tags($_POST['newE']);
$conE = strip_tags($_POST['conE']);
$verif = mt_rand( 10000000, 99999999);
$sql = "UPDATE users SET email='$newE',power='$verif' WHERE id='$id'";

if ($newE != $conE) {
	die('1');
}

$result = mysqli_query($mainDBConn,$sql);

$name = $_SESSION['name'];
$email = $newE;

$mail = new PHPMailer;

$mail->From = "no-reply@maltchat.tk";
$mail->FromName = "MaltChat";

$mail->addAddress($email, $name);

$mail->isHTML(true);
$mail->isSMTP();

$mail->Subject = "MaltChat Email Verification";
$mail->Body = "Hi,<br><br>It seems you changed your email for MaltChat,<br>Here is your verification link:<br>http://www.maltchat.tk/New/Login/verif.php?uid=$uid&verif=$verif<br><br>Have Fun Chatting!<br>Maltchat Admin<br>";
$mail->AltBody = "Hi,<br><br>It seems you changed your email for MaltChat,<br>Here is your verification link:<br>http://www.maltchat.tk/New/Login/verif.php?uid=$uid&verif=$verif<br><br>Have Fun Chatting!<br>Maltchat Admin<br>";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
	die('100');
}

?>