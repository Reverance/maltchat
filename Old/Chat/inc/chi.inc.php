<?php 


session_start();
include '../../DB/db.inc.php';


$sql0 = "SELECT * FROM comments ORDER BY id DESC";
$sql1 = "SELECT * FROM users WHERE 'id'='$id'";


if ($result = mysqli_query($conn,$sql0)){

	while ($row = mysqli_fetch_row($result)) {

		//vars for chat message
		$nm = $row['2']; //name
		$msg = $row['4']; //message
		$tim = $row['5']; //timestamp
		$im = $row['3']; //icon=

		if ($msg == $_SESSION['premsg']) {
			if ($nm == $_SESSION['prenm']) {
				$check = 0;
			} else {
				$check = 1;
			}
		} else {
			$check = 1;
		}

		$_SESSION['premsg'] = $msg;
		$_SESSION['prenm'] = $nm;

		if ($check == 1) {	

			if ($row['1']==$_SESSION['id']) {

				$im = $_SESSION['icn']; //icon
				$message = "<li class='self'><div class='msg'><div class='avatar'><img src='$im' draggable='false'/>  <a href='../profile.php?prof=$nm'><p><b>Me:</b></p></a></div><p>$msg</p><time>$tim</time></div></li>"; // final text

			} else if ($row['1'] == 1) {

				$message = "<li class='other'><div class='msg' style='background-color: #f00;'><div class='avatar'><img src='$im' draggable='false'/>  <a href='../profile.php?prof=$nm'><p><b>$nm:</b></p></a></div><p>$msg</p><time>$tim</time></div></li>";// final text

			} else {

				if (isset($_SESSION['muted'])) { //mute check

					$muted = $_SESSION['muted'];
					$counter = 0;

					while ($counter < count($muted)) {

						$value = $muted[$counter];
						$matchvalue = $row['1'];

						if ($value == $matchvalue) {

							$counter = count($muted) + 5;
							$message = "";// final text

						} else {

							$message = "<li class='other'><div class='msg'><div class='avatar'><img src='$im' draggable='false'/>  <a href='../profile.php?prof=$nm'><p><b>$nm:</b></p></a></div><p>$msg</p><time>$tim</time></div></li>";// final text

						}

						$counter = $counter + 1;

					}

				} else {

					$message = "<li class='other'><div class='msg'><div class='avatar'><img src='$im' draggable='false'/>  <a href='../profile.php?prof=$nm'><p><b>$nm:</b></p></a></div><p>$msg</p><time>$tim</time></div></li>";// final text

				}

			}

			echo $message;
		}
	}

} else {

	echo "Failed";

}

mysqli_close($conn);

?>
<!--
						DO NOT DELETE -> VITAL BACKUP IN CASE OF EMERGENCY


						EXTRA INFO IGNORE UNLESS NEEDED=

						Standard User

						echo "<li class='other'>";
						$nm = $row['2'];
						$im = $row['3'];
						echo "<div class='msg'>";
						$msg = $row['4'];
						echo "<div class='avatar'><img src='$im' draggable='false'/>  <p><b>$nm:</b></p></div>";
						echo "<p>$msg</p>";
						$tim = $row['5'];
						echo "<time>$tim</time>";
						echo "</div>";
						echo "</li>";

						$message = "<li class='other'><div class='msg'><div class='avatar'><img src='$im' draggable='false'/>  <p><b>$nm:</b></p></div><p>$msg</p><time>$tim</time></div></li>";

						Admin / High Class Mod

						echo "<li class='other'>";
						echo "<div class='msg' style='background-color: #f00;'>";
						echo "<div class='avatar'><img src='$im' draggable='false'/>  <p>  <b>$nm:</b></p></div>";
						echo "<p>$msg</p>";
						echo "<time>$tim</time>";
						echo "</div>";
						echo "</li>";

						$message = "<li class='other'><div class='msg' style='background-color: #f00;'><div class='avatar'><img src='$im' draggable='false'/>  <p><b>$nm:</b></p></div><p>$msg</p><time>$tim</time></div></li>";

						Self User

						echo "<li class='self'>";
						echo "<div class='msg'>";
						echo "<div class='avatar'><img src='$im' draggable='false'/>  <p><b>Me:</b></p></div>";
						echo "<p>$msg</p>";
						echo "<time>$tim</time>";
						echo "</div>";
						echo "</li>";

						$message = "<li class='self'><div class='msg'><div class='avatar'><img src='$im' draggable='false'/>  <p><b>Me:</b></p></div><p>$msg</p><time>$tim</time></div></li>";

						Else With MUTE

						else {
							//$result1 = mysqli_query($conn,$sql1);
							//while ($row = mysqli_fetch_row($result);)
							if (isset($_SESSION['muted'])) {
								$muted = $_SESSION['muted'];
								$counter = 0;
								//echo "<p style='color: white;'>".count($muted)."</p><br>";
								while ($counter < count($muted)) {
									//echo '<p style="color: white;">counter: '.$counter.'<br>';
									$value = $muted[$counter];
									//echo 'list value: '.$value.'<br>';
									$matchvalue = $row['1'];
									//echo 'the value to be matched'.$matchvalue.'<br></p>';
									if ($value == $matchvalue) {
										$counter = count($muted) + 5;
										$message = "";
									} else {
										ELSE MESSAGE -> OTHER MESSAGE
									}
									$counter = $counter + 1;
								}
								echo $message;
							} else {

								ELSE MESSAGE -> OTHER MESSAGE

							}
						}-->