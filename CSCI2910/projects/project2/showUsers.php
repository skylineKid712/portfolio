<?php
	//Connect to database and import header
	include_once("dbconfig.php");
	include_once("header.php");
	
	//Create query to show all users
	$myQuery = "select * from user";
	$results = $DB_con->query($myQuery);
	$results->execute();
	
	//Display users in a table
?>
	<link href="//cdn.muicss.com/mui-0.9.5/css/mui.min.css" rel="stylesheet" type="text/css" />
	<script src="//cdn.muicss.com/mui-0.9.5/js/mui.min.js"></script>

	<!-- Compiled and minified CSS
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

   Compiled and minified JavaScript
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
	 -->
	
	<div class = "header">
		<h1>
			Users
		</h1>
	</div>

	<table class="mui-table" >
	<tr><th>Username</th><th>First Name</th><th>Last Name</th><th>Password</th><th>Email</th></tr>
<?php
		while($row = $results->fetch())
		{
			echo "<tr><td><form name = profile method = 'get' action = 'showTweets.php'> 
											<input type = 'submit' name = 'username' value = " . $row["username"] . 
											"></form></td>";
			echo "<td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td>";
			echo "<td>" . $row["password"] . "</td><td>" . $row["email"] . "</td></tr>";
		}
?>
	</table>

<?php
	//import footer
	include_once("footer.php");

?>