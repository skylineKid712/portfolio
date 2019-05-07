<?php
//Credit John McMeen

//import header
include_once("header.php");

class crud
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	
	//function to create user from user input
	public function create($uname,$pwd,$fname,$lname,$email)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO user(username,password,firstname,lastname,email) VALUES(?, ?, ?, ?, ?)");
			$stmt->bindparam(1, $uname);
			$stmt->bindparam(2, $pwd);
			$stmt->bindparam(3, $fname);
			$stmt->bindparam(4, $lname);
			$stmt->bindparam(5, $email);
			
			//execute the prepared statement		
			$stmt->execute();
				
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}
	
	
	//function to clean input
	public function test_input($data) 
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
	
	//function to store tweet
	public function store_tweet($twt, $username)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO tweets (tweet, user_id, time_created) VALUES (?, ?, NOW())");
			$stmt->bindparam(1, $twt);
			$stmt->bindparam(2, $username);
			
			//execute prepared statement
			$stmt->execute();
			
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	//Obtain information from $_POST
	/*$follows = $_POST["follows"];
	$user1 = $_POST["user1"];
	$user2 = $_POST["user2"];*/

	//function to store likes
	public function follow($follows, $user1, $user2)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO follows VALUES (?, ?, ?)");
			$stmt->bindparam(1, $follows);
			$stmt->bindparam(2, $user1);
			$stmt->bindparam(3, $user2);
			
			//execute prepared statement
			$stmt->execute();
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
}
