<?php

session_start();
include 'db.php';

$mGroup = $_GET['g'];
$mData = $_POST['mes'];
$mSender = $_SESSION['name'];

$sql = "INSERT INTO gme (mGroup,mData,mSender) VALUES ('$mGroup','$mData','$mSender')";
$row = mysqli_query($link,$sql);

header("Location: chat.php?gname=".$mGroup);

?>