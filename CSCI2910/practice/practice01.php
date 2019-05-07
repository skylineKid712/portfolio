<?php 
  $db = new PDO("mysql:host=localhost;dbname=whitney", "whitney", "12345");
  $myQuery = "select * from pet";
  $results = $db->query($myQuery);
?>

<html>
	<head>
		<title>DB Practice</title>
	</head>
	<body>
  <table border = 1>
    <tr><td colspan="6" align="center">Pets</td></tr>
    <tr><td>Name</td> <td>Owner</td> <td>Species</td> <td>Sex</td> <td>Birth</td> <td>Death</td></tr>
    
    <?php foreach ($results as $row) 
      {
    ?>
          <tr>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['owner']; ?></td>
					<td><?php echo $row['species']; ?></td>
					<td><?php echo $row['sex']; ?></td>
					<td><?php echo $row['birth']; ?></td>
					<td><?php echo $row['death']; ?></td>
				</tr>
    <?php
      }
    ?>
    
  </table>
  </body>
</html>