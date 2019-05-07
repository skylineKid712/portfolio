<?php

  //Connect to database and import header
  include_once("dbconfig.php");
  include_once("header.php");
?>

<div class = header>
  <h1>
    Compose Tweet
  </h1>
  <?= $_SESSION['username'] ?> 
	<?//= $_SESSION['lastname'] ?>
</div>
<br>
<!--create form-->
<div class = "center">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input disabled  maxlength="3" size="3" value="140" id="counter">
    <textarea rows = 4 cols = 50 autofocus placeholder = "What's up?" maxlength = "140" onkeyup="textCounter(this,'counter',140);" name = "text"></textarea><br>
    <input type = "submit" name = "tweet" value = "Tweet"><br>
  </form>
</div>

<?php
  //import crud class
	include_once("class.crud.php");
	if (isset($_POST["tweet"]))
	{
		//Connect to database
		include_once("dbconfig.php");
    
    //Create and assign value to tweet variable
    if (isset($_POST["text"]))
    {
      $tweet = $crud->test_input($_POST["text"]);
    }
    else
    {
      $tweet = "I didn't fill in the text box hur-durr";
    }
    if (isset ($_SESSION['loggedin']))
    {
      $username = $_SESSION["username"];
    }
    else
    {
      $username = "harambe";  
    }
    
    //call store_tweet function
    $crud->store_tweet($tweet, $username);
    
  }
  
?>

<!--Word count script-->
<script>
function textCounter(field,field2,maxlimit)
{
  var countfield = document.getElementById(field2);
  if ( field.value.length > maxlimit ) 
  {
    field.value = field.value.substring( 0, maxlimit );
    return false;
  } 
  else 
  {
    countfield.value = maxlimit - field.value.length;
  }
}
</script>
<?php 
  //import footer
  include_once("footer.php");
?>