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

  @media (max-height: 520px) {li a{height:100%;}ul{height:10%;}}

</style>

<ul>
  <li><a href="../Home" <?php echo $a ?>>Home</a></li>
  <li><a href="../Global" <?php echo $b ?>>Global</a></li>
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