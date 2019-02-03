<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("Location: ../Login/inc/lgt.inc.php");
}
include '../Check/check.php';
$b = '"nav-link active"';
$a = '"nav-link"';
$c = '"nav-link"';
$d = '"nav-link"';
$e = '"nav-link"';
$f = '"nav-link"';
$g = '"nav-link"';
$h = '"nav-link"';
?>
<!DOCTYPE html>
<html>
	<head>

		<title>Chat</title>
    	
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script type="text/javascript">
			 $(document).ready(function(){
			 	window.setInterval(function(){
			 		$("#messages").load(
			 			<?php
			 			if (isset($_GET['prof'])) {
							echo '"inc/old.chi.inc.php"';
						} else {
							echo '"inc/chi.inc.php"';
						}
			 			?>
			 			);
			 	}, 1);
			 });
		</script>
	    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="css/newchat.css">
		<style type="text/css">
			#toTop {
			  display: none;
			  position: fixed;
			  bottom: 58px;
			  right: 8px;
			  z-index: 99;
			  font-size: 18px;
			  border: none;
			  outline: none;
			  background-color: white;
			  color: white;
			  cursor: pointer;
			  border-radius: 50px;
			  height: 74px;
			  width: 74px;
			}

			#toTop:hover {
			  background-color: #555;
			}

			#toTop > img {
				position: fixed;
			  	bottom: 60px;
			  	right: 10px;
				background-color: #fff;
				border-radius: 50px;
				width: 70px;
				height: 70px;
			}
		</style>
	  </head>
	  <body style="margin: auto;">
		<div class="menu">
            <?php
            include '../Navbar/navbar.php';
            if (isset($_GET['prof'])) {
            	echo '';
            } elseif ($_SESSION['pwr'] <=2) {
            	echo '
            <a href="inc/cch.inc.php"><button class="butt" id="clr" style="width: 100%;"> Clear Chat </button></a>';
            }
            ?>
        </div>
	    <br><br>
    <ol class="chat" id="messages">
    	<?php 
    	if (isset($_GET['prof'])) {
    		include 'inc/old.chi.inc.php';
    	} else {
    		include 'inc/chi.inc.php';
    	}
    	?>
    
    </ol>
    <form action=<?php 

    if (isset($_GET['prof'])) {
    	echo '"inc/prv.cho.inc.php?prof='.$_GET['prof'].'"';
    } else {
    	echo '"inc/cho1.inc.php"';
    }

    ?> method="POST">
    	<input style="background-color: #004fa5;" autocomplete="off" id="newmesin" name="message" class="textarea" type="text" placeholder="Type here!" autofocus/><div class="emojis"></div>
	</form>
	<button onclick="uptotop()" id="toTop" title="Go to top"><img src="images/totop.png"></button>
	<script type="text/javascript">
		window.onscroll = function() {
			scrollFunc();
		}

		function scrollFunc() {
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		        document.getElementById("toTop").style.display = "block";
		    } else {
		        document.getElementById("toTop").style.display = "none";
		    }
		}

		function uptotop() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
	</script>
	</body>
</html>
<?php
/** backup
    		include 'inc/db.inc.php';
    		$sql0 = "SELECT * FROM comments ORDER BY id DESC LIMIT 20";
    		if ($result = mysqli_query($conn,$sql0)){
    			while ($row = mysqli_fetch_row($result)) {
					if ($row['1']==$_SESSION['id']) {
						echo "<li class='self'>";
						$im = $_SESSION['icn'];
						echo "<div class='msg'>";
						$msg = $row['4'];
						echo "<div class='avatar'><img src='$im' draggable='false'/>  <p><b>Me:</b></p></div>";
						echo "<p>$msg</p>";
						$tim = $row['5'];
						echo "<time>$tim</time>";
						echo "</div>";
						echo "</li>";
					} else if ($row['1'] == 1) {
						echo "<li class='other'>";
						$nm = $row['2'];
						$im = $row['3'];
						echo "<div class='msg' style='background-color: #f00;'>";
						$msg = $row['4'];
						echo "<div class='avatar'><img src='$im' draggable='false'/>  <p>  <b>$nm:</b></p></div>";
						echo "<p>$msg</p>";
						$tim = $row['5'];
						echo "<time>$tim</time>";
						echo "</div>";
						echo "</li>";
					} else {
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
									$nm = $row['2'];
									$im = $row['3'];
									$msg = $row['4'];
									$tim = $row['5'];
									$message = "<li class='other'><div class='msg'><div class='avatar'><img src='$im' draggable='false'/>  <p><b>$nm:</b></p></div><p>$msg</p><time>$tim</time></div></li>";
									//echo "no mute";
									/**echo "<li class='other'>";
									echo "<div class='msg'>";
									echo "<div class='avatar'><img src='$im' draggable='false'/>  <p><b>$nm:</b></p></div>";
									echo "<p>$msg</p>";
									echo "<time>$tim</time>";
									echo "</div>";
									echo "</li>";
								}
								$counter = $counter + 1;
							}
							echo $message;
						} else {
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
						}
					}
    			}
    		} else {
    			echo "Failed";
    		}
    		mysqli_close($conn);**/
    	?>