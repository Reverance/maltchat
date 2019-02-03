<style>
  #header {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #c14b4b;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 10vh;
    z-index: 950;
    font-size: 7.5vh;
  }

  #item {
    float: left;
    height: 10vh;
    font-size: 7.5vh;
    padding-top: 0;
  }

  #item a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    height: 10vh;
    font-size: 7.5vh;
    padding-left: 1vw;
    padding-right: 1vw;
    padding-top: 0;
  }

  #item a:hover:not(.active) {
    background-color: #d63333;
  }

  .active {
    background-color: #662525;
  }

  @media (max-height: 430px) {body{overflow-y: auto;}#header{height: 43px;}#item a{font-size: 32.25px;height: 43px;}}/*
  @media (max-width: 185vh) {body{overflow-x: auto;}#header{width: 185vh;}#item a{padding-left: 11px; padding-right: 11px;}}*/
  @media (max-width: 790px) {body{overflow-x: auto;}#header{width: 790px; height: 42.9997px;}#item a{font-size: 32.25px;padding-left: 7.9px; padding-right: 7.9px;}}
  @media (max-width: 183.7vh) and (min-width: 791px) {#header{height: 5.443vw;}#item a{font-size: 4.0823vw;height: 5.443vw;}}


</style>

<ul id="header">
  <li id="item"><a href="../Home" <?php echo $a ?>>Home</a></li>
  <li id="item"><a href="../Chats" <?php echo $b ?>>Chats</a></li>
  <li id="item"><a href="../Online" <?php echo $c ?>>Online</a></li>
  <li id="item"><a href="../Videos" <?php echo $e ?>>Videos</a></li>
  <li id="item" style="float: right;"><a href="#" onclick="logout();">Logout</a></li>
  <li id="item" style="float: right;"><a href="../Settings" <?php echo $f ?>>Settings</a></li>
  <li id="item" style="float: right;"><a href="../Profile" <?php echo $d ?>>Profile</a></li>
</ul>

<script type="text/javascript">
  function logout() {
    window.location.replace("../Login/logout.php");
  }
</script>