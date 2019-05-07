<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Conforming XHTML 1.1 Template</title>
	</head>
	<body>
		<h1 style='text-align:center;'>Quote for the day, 
		<?php 
			// You should set the default timezone
// before using date() function
			date_default_timezone_set('UTC');
			echo date("F j, Y"); 
		?></h1>
	</body>
</html>
