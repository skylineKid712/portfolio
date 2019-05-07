<?php
	session_start();

  header("Cache-Control: no-cache, must-revalidate");
	

		//header("Location: login.php");

	
	if(isset($_POST['logout']))
	{
		$_SESSION = array();
		session_destroy();
	
?>
	
	<div class = header>
			<h1>Thank you for visiting.</h1>
		</div>
<?php
	}
?>

<!DOCTYPE html>
<head>
	<meta charset = "utf-8" />
	<title>YouTwitFace</title>
	<link rel="shortcut icon" href="myfavicon.ico" type="image/x-icon">
  <link rel="icon" href="myfavicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
	<link rel="stylesheet" type="text/css" href="project2.css">
	<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; minimum-scale=1.0; user-scalable=yes; width=device-width" />
	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#2196F3">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#2196F3">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#2196F3">
	<script>var _bftn_options = { theme: 'glitch' };</script><script src="https://widget.battleforthenet.com/widget.js" async></script>
</head>	
<body>
  
