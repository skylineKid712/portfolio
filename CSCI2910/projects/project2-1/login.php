<?php
//Credit John McMeen
/********************************* Basic Login Page ***********************************
 * We want to:
 * - Create a login page containing userid, password, and submit inputs
 * - After client clicks submit, check database for userid and password
 * - If valid userid/password, log them in and check id for level in  order to 
 *   determine page to present
 * - If invalid userid/password, post error and return to login page
 * - If user is alread logged in, present the appropriate page
 * - When user logs out, log them out and present "goodbye" page
 * 
 * Implementation:
 * - Use a session variable, $_SESSION['loggedin'], to determine whether someone is 
 *   logged in
 * - Use a session for first name, $_SESSION['firstname'], to store user's first name
 * - Use a session for last name, $_SESSION['lastname'], to store user's last name
*************************************************************************************/

/***************************** IMPORT HEADER *******************************/
	include_once("header.php");
	include_once("dbconfig.php");
/************************** HANDLING CLIENT LOGIN ATTEMPT ***************************/
	if((isset($_POST['userid']))
		&&(isset($_POST['password']))
		&&(isset($_POST['loginbutton'])))
	{
		// Begin by attempting to connect to the database containing the users
		try
		{
			include_once("dbconfig.php");
		}
		catch (Exception $error) {  //If attempt failed, send error
			die("Connection to user database failed: " . $error->getMessage());
		}
		
		// Now, let's try to access the database table containing the users
		try
		{
			$query = "SELECT * FROM user WHERE username = :user and password = :pw";
			$statement = $DB_con -> prepare($query);
			$statement -> execute(array(
				'user' => $_POST['userid'], 
				'pw' => md5($_POST['password']))
			);
			if ($statement -> rowCount() == 1)
			{
				$_SESSION['loggedin']=TRUE;
				// Get the user details from the SINGLE returned database row
				$row = $statement -> fetch();
				$_SESSION['username'] = $row['username'];
				$_SESSION['firstname'] = $row['firstname'];
				$_SESSION['lastname'] = $row['lastname'];
			}
			else
				echo("<h1>Invalid userid or password.</h1>");		

			// Close the statement and the database
			$statement = null;
			
		}
		catch (Exception $error) 
		{
			echo "Error occurred accessing user privileges: " . $error->getMessage();
		}
	}

/*********************** PRESENTING CLIENT WITH LOGIN SCREEN ************************/
	if(!isset($_SESSION['loggedin']))
	{
?>	
		<div class = "header">
			<h1>
				YouTwitFace
			</h1>	
		</div>
		<div class = card>
			<form name='login' method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
				<p>
					User name:<br> 
					<input type='text' name='userid' style='width:50%;' autofocus />
				</p>
				<p>
					Password:<br>
					<input type='password' name='password' style='width:50%;'/>
				</p>
				<p>
					<input type='submit' name='loginbutton' value='Log in' />
				</p>
			</form>
		</div>	
<?php
	}

/****************** PRESENTING LOGGED IN CLIENT WITH TWEETS PAGE *******************/
	if(isset($_SESSION['loggedin']))
	{
		$username = $_SESSION['username'];
?>
<!-- Place HTML here for the client page -->
	<div class = "header">
		<h1>
			Welcome to YouTwitFace, 
			<?= $_SESSION['firstname'] ?> 
			<?= $_SESSION['lastname'] ?>!
		</h1>
	</div>

	<form name = "profile" method = "get" action = showTweets.php>
		<button type = "submit" value = "<?= $username?>" name = "username" style = "float: right;">Profile</button>	
	</form>	

	<form name='logout' method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>' >
			<input type='submit' value='Logout' name='logout'>
	</form>
	
	
		
		<!--create form-->
		<div class = "center">
  		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    		<input disabled  maxlength="3" size="3" value="140" id="counter">
    		<textarea rows = 4 cols = 50 placeholder = "What's up?" maxlength = "140" onkeyup="textCounter(this,'counter',140);" name = "text" style='width:50%;'></textarea><br>
    		<input type = "submit" name = "tweet" value = "Tweet"><br>
  		</form>
		</div>
			
		<?php
  //import crud class
	include_once("class.crud.php");
	
	 
	if (isset($_POST["tweet"]))
	{ 
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
	 
	//Create query to show all tweets
	$tweetQuery = "SELECT * FROM tweets ORDER BY time_created DESC";
	$stmt = $DB_con->query($tweetQuery);
	$stmt->execute();
	
	while($row = $stmt->fetch())
	{
		echo "<div class = 'card'>" . "<p>" . $row["tweet"] . "</p>" .
							"<form name = profile method = 'get' action = 'showTweets.php'> 
								<input type = 'submit' name = 'username' style = 'clear: both; float: center;' value = " . $row["user_id"] . 
							"></form>"
					. "<p>" . $row["time_created"] . "</p>" . "</div>";
	}
	
	$DB_con = null;
	$stmt = null;
	
	}

	//import header and footer
	//include_once("header.php");
	include_once("footer.php");
?>


