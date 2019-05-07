<?php
	//import header, db connection, and crud class
  include_once("header.php");
  include_once("dbconfig.php");
	include_once("class.crud.php");
  
	$user = $_GET["username"];

  //Create query to show all tweets
	$tweetQuery = "SELECT * FROM tweets WHERE user_id = '$user' ORDER BY time_created DESC";
	$stmt = $DB_con->query($tweetQuery);
	$stmt->execute();

?>
<!-- Display header -->
<div class = "header">
	<h1>
		YouTwitFace
	</h1>
	<?php echo $user . "'s tweets"?>
</div>

<!-- Home button -->
<form name = "profile" action = login.php>
		<input type = "submit" value = "Home" name = "profile" style="float: right;">	
</form>

<!-- Follow button -->
<form name = "follow" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<input type = "submit" value = "Follow" name = "follow">
</form>


<?php
	//show user's tweets if any exist. Otherwise display error message
	if (empty($stmt))
	{
		echo "<div class = 'card'> User has no tweets </div>";
	}
	else
	{
		while($row = $stmt->fetch())
		{
			echo "<div class = 'card'>" . "<p>" . $row["tweet"] . "</p>" . "<p>" . $row["user_id"] . "</p>" . "<p>" . $row["time_created"] . "</p>" . "</div>";
		}
	}
	
	//import footer
  include_once("footer.php");
?>