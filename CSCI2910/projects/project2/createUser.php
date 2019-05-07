<?php
	
	//Connect to databse and import header
	include_once("header.php");
?>

	<div class = "header">
		<h1>Register</h1>
	</div>
	<!--Create form-->
	<div class = card>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<p>First Name:<br>
			<input type = "text" name = "firstname"></p>
			<p>Last Name:<br>
			<input type = "text" name = "lastname"></p>
			<p>Username:<br>
			<input type = "text" name = "username"></p>
			<p>Password:<br>
			<input type = "password" name = "pwd"></p>
			<p>Email:<br>
			<input type = "text" name = "email"></p>
			<p><input type = "submit" name = "createUser" value = "Register"></p>
		</form>
	</div>
	
	</body>
</html>

<?php
	//import crud class
	include_once("class.crud.php");
	if (isset($_POST["createUser"]))
	{
		//Connect to database
		include_once("dbconfig.php");
		//create and assign values to variables
		if (isset($_POST["username"]))
		{
			$userName = $crud->test_input($_POST["username"]);
		}
		else
		{
			$userName = "harambe";
		}
	
		if (isset($_POST["firstname"]))
		{
			$firstname = $crud->test_input($_POST["firstname"]);
		}
		else
		{
			$firstname = "Usey";
		}
		
		if (isset($_POST["pwd"]))
		{
			$password = md5($crud->test_input($_POST["pwd"]));
		}
		else
		{
			$password = md5("password");
		}
	
		if (isset($_POST["lastname"]))
		{
			$lastname = $crud->test_input($_POST['lastname']);
		}
		else
		{
			$lastname = "McUserface";
		}
		
		if (isset($_POST["email"]))
		{
			$email = $crud->test_input($_POST["email"]);
		}
		else
		{
			$email = "deafult@domain.com";
		}
		
		//call function to insert values into table
		$crud->create($userName,$password,$firstname,$lastname,$email);
	}

	
	//import footer
	include_once("footer.php");

?>