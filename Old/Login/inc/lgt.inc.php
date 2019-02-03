<?php

echo "error contact admin";

session_start();
include "../../DB/db.inc.php";

$id = $_SESSION['id'];
$sql = "UPDATE users SET online=0 WHERE id='$id'";
$result = mysqli_query($conn, $sql);

session_destroy();
header("Location: ../../index.php");

?>