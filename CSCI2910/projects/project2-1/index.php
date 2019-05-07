<?php
  //import header
  include_once("header.php");
?>

<div class = "header">
  <h1>
    YouTwitFace
  </h1>
  
  <!-- Link to create user -->
  <form action = "createUser.php">
    <input type = "submit" value = "Register">
  </form>
  
  <!-- Link to login page -->
  <form action = "login.php">
    <input type = "submit" value = "Login">
  </form>
  
</div>

<?php
  //import footer
  include_once("footer.php");
?>