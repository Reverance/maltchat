<?php

echo "error contact admin";

session_start();
include "../db/maindb.conn.php";

$id = $_SESSION['id'];
$sql = "UPDATE users SET online=0 WHERE id='$id'";
$result = mysqli_query($mainDBConn, $sql);

session_destroy();
header("Location: ../index.php");

?>