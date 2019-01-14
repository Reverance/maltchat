<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded" style="width: 100%; z-index: 999; margin-top: 0;">
  <a class="navbar-brand" href="#">MaltChat</a>
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class=<?php echo $a ?> href="../Index/home.php">Home</a>
    </li>
    <li class="nav-item">
      <a class=<?php echo $b ?> href="../Chat">Chat</a>
    </li>
    <li class="nav-item">
      <a class=<?php echo $c ?> href="../Online">Online</a>
    </li>
    <li class="nav-item">
      <a class=<?php echo $d ?> href="../Profile">Profile</a>
    </li>
    <li class="nav-item">
      <a class=<?php echo $e ?> href="../Videos">Videos</a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class=<?php echo $f ?> href="../Settings">Settings</a>
    </li>
    <li class="navbar-item">
      <a class="nav-link" href="#" onclick="logout();">Logout</a>
    </li>
  </ul>
</nav>

<script type="text/javascript">
  function logout() {
    window.location.replace("../Login/logout.php");
  }
</script>