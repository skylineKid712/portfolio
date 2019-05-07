<?php
  function outputRow ($carArray)
  {
    echo "<tr><td>$carArray[0]</td><td>$carArray[1]</td><td>$carArray[2]</td><td>$carArray[3]</td></tr>\n";
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset='UTF-8'>
    <title>Cars</title>
  </head>
  <body>
     <?php
        $cars = file ("Cars.csv");
     ?>
        <h2>Raw File Output</h2>
     <?php
        foreach ($cars as $value)
        {
          echo "<p>$value</p>\n";
          $arrayOfCarArrays[] = explode(",", $value);
        }
     ?>
    
    <h2>Table of Cars</h2>
    <table border = '1'>
      <?php
        foreach ($arrayOfCarArrays as $value)
        {
          outputRow($value);
        }
      ?>
    </table>
    
    <h2>Table of Cars Sorted by Make</h2>
    <table border = '1';>
      <?php
        $make= array();
        foreach ($arrayOfCarArrays as $key => $car)
        {
          $make[$key] = $car[2];    // Index 2points to make in 
        }
      
        array_multisort($make, SORT_ASC, $arrayOfCarArrays);
      
        foreach ($arrayOfCarArrays as $value)
        {
          outputRow($value);
        }
      ?>
    </table>
  </body>
  
</html>