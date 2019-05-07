<!DOCTYPE html>
<html>
  <head>
    <meta charset='UTF-8'>
    <title>Requested Movies</title>
    <!-- movieFetch by Gary Whitney-->
    
  </head>
  <body>
    <?php 
      //create and initiate variables
      $acceptableValuesOB = array("title", "studio", "rating", "year of publication", "IMDB rating", "run time");
      $acceptableValuesL = array(1, 5, 10, 25, 50, 75, 100);
   
      if (in_array($_GET["orderBy"], $acceptableValuesOB))
          $ob = $_GET["orderBy"];
      else
          $ob = "title";
      
      if (in_array($_GET["returnLimit"], $acceptableValuesL))
          $limit = $_GET["returnLimit"];
      else
          $limit = 5;
      
      if ($_GET["minimumYear"] >= 1935 && $_GET["maximumYear"] <= 2016)
      {
        $minYear = $_GET["minimumYear"];
        $maxYear = $_GET["maximumYear"];
      }
      else
      {
        $minYear = 1935;
        $maxYear = 2016;
      }
      
      //access database and create query
      $db = new PDO ("mysql:host=localhost;dbname=mcmeen", "mcmeen", "12345");
      $myQuery = "select * from movie";
      $results = $db->query($myQuery);
    
      $myQuery .= " where pub_year between $minYear and $maxYear order by $ob limit $limit;";
      //print_r($myQuery);
      $statement = $db->prepare($myQuery);
      $statement->execute();
      
      //create table
      echo "<table border = '1'>";
      echo "<tr><th>Title </th><th>Studio</th><th>Rating</th><th>Publication Year</th><th>IMDB Rating</th><th>Run Time</th></tr>";
      
      //while statement to fill table
      while ($row = $statement-> fetch())
      {
        echo "<tr><td>" . $row["title"] . "</td><td>" . $row["studio"] . "</td><td>" . $row["rating"] . "</td><td>" . $row["pub_year"] . "</td><td>" 
             . $row["imdb_rating"] . "</td><td>" . $row["run_time"] . "</td></tr>";
      }
    
      echo "</table>";
    ?>
    
  </body>