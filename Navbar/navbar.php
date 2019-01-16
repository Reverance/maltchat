<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded" style="width: 100%; z-index: 999; margin-top: 0;">
  <a class="navbar-brand" href="../Home">MaltChat</a>
  <ul class="navbar-nav mr-auto">
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
 -->

<style>
  ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #c14b4b;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 950;
  }

  li {
    float: left;
  }

  li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }

  li a:hover:not(.active) {
    background-color: #d63333;
  }

  .active {
    background-color: #662525;
  }
</style>

<ul>
  <li><a href="../Home" <?php echo $a ?>>Home</a></li>
  <li><a href="../Chat" <?php echo $b ?>>Chat</a></li>
  <li><a href="../Online" <?php echo $c ?>>Online</a></li>
  <li><a href="../Profile" <?php echo $d ?>>Profile</a></li>
  <li><a href="../Videos" <?php echo $e ?>>Videos</a></li>
  <li style="float: right;"><a href="#" onclick="logout();">Logout</a></li>
  <li style="float: right;"><a href="../Settings" <?php echo $f ?>>Settings</a></li>
</ul>

<script type="text/javascript">
  function logout() {
    window.location.replace("../Login/logout.php");
  }
</script>