<?php
	$db = new PDO("mysql:host=localhost;dbname=mcmeen", "mcmeen", "12345");
	$myQuery = "select * from movie";
	$results = $db->query($myQuery);
?>
<html>
	<head>
		<title>DB Example</title>
	</head>
	<body>
		<table cellSpacing="2" cellPadding="6" align="center" border="1">
		<tr>
			<td colspan="6">
				<h3 align="center">Retrieving all movies using PDO Query</h3>
			</td>
		</tr>

		<tr>
			<td align="center">Title</td>
			<td align="center">Studio</td>
			<td align="center">Rating</td>
			<td align="center">Publication Year</td>
			<td align="center">IMDB Rating</td>
			<td align="center">Run Time</td>
		</tr>
			
		<?php foreach ($results as $row) 
			{ 
			?>
				<tr>
					<td><?php echo $row['title']; ?></td>
					<td><?php echo $row['studio']; ?></td>
					<td><?php echo $row['rating']; ?></td>
					<td><?php echo $row['pub_year']; ?></td>
					<td><?php echo $row['imdb_rating']; ?></td>
					<td><?php echo $row['run_time']; ?></td>
				</tr>
			<?php 
			} 
		?>
		</table>
		
		<br>
		
		<?php
		$year = 1984;
		
		$myQuery = "select * from movie where pub_year < :year";
		$statement = $db->prepare($myQuery);
		$statement->bindparam(":year", $year);
		$statement->execute();
		
		//Optional array binding
		//$statement->execute(array(":year" => $year));
		
		?>
		
	  <table cellSpacing="2" cellPadding="6" align="center" border="1">
		<tr>
			<td colspan="6">
				<h3 align="center">Retrieving all movies older than <? echo $year ?> using PDO Prepared Statements</h3>
			</td>
		</tr>

		<tr>
			<td align="center">Title</td>
			<td align="center">Studio</td>
			<td align="center">Rating</td>
			<td align="center">Publication Year</td>
			<td align="center">IMDB Rating</td>
			<td align="center">Run Time</td>
		</tr>
			
		<?php while ($row = $statement->fetch()) 
			{ 
			?>
				<tr>
					<td><?php echo $row['title']; ?></td>
					<td><?php echo $row['studio']; ?></td>
					<td><?php echo $row['rating']; ?></td>
					<td><?php echo $row['pub_year']; ?></td>
					<td><?php echo $row['imdb_rating']; ?></td>
					<td><?php echo $row['run_time']; ?></td>
				</tr>
			<?php 
			} 
		?>
		</table>
	</body>
</html>
