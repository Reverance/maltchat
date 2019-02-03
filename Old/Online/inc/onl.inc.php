<?php

echo "<br><h1 style='text-align:centre;'><b>Online</b><br><br></h1>";

session_start();
include 'db.inc.php';

$sql = 'SELECT * FROM users WHERE online=1 AND power<4';
$result = mysqli_query($conn, $sql);

while ($row=mysqli_fetch_row($result)) {
  if ($row['3'] == $_SESSION['name']) {
    echo "";
  } else {
    echo '
      <div style="width: 100%;">
        <div style="width: 30%; float: left;">
          <p> - '.$row['3'].'</p>
        </div>
        <div style="width: 35%; float: left;">
          <a class="text" href="../Chat/newchat.php?prof='.$row['3'].'">
            <button style="background-color: #007BFF; width: 100%; cursor: pointer; border: none; color: #fff;">Chat</button>
          </a>
        </div>
        <div style="width: 35%; float: left;">
          <a class="text" href="../Profile/profile.php?prof='.$row['3'].'">
            <button style="background-color: #0075f4; width: 100%; cursor: pointer; border: none; color: #fff;">View Profile</button>
          </a>
        </div>
      </div>
      <br><br>
    ';
  }
}

echo "<br><h1 style='text-align:centre;'><b>Offline</b><br><br></h1>";

$sql1 = 'SELECT * FROM users WHERE online=0 AND power<4';
$result1 = mysqli_query($conn, $sql1);

while ($row1=mysqli_fetch_row($result1)) {
  echo '
    <div style="width: 100%;">
      <div style="width: 30%; float: left;">
        <p> - '.$row1['3'].'</p>
      </div>
      <div style="width: 35%; float: left;">
        <a class="text" href="../chat.php?prof='.$row1['3'].'">
          <button style="background-color: #007BFF; width: 100%; cursor: pointer; border: none; color: #fff;">Chat</button>
        </a>
      </div>
      <div style="width: 35%; float: left;">
        <a class="text" href="../Profile/profile.php?prof='.$row1['3'].'">
          <button style="background-color: #0075f4; width: 100%; cursor: pointer; border: none; color: #fff;">View Profile</button>
        </a>
      </div>
    </div>
    <br><br>
  ';
}

echo "<br>";

?>