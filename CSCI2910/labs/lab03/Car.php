<?php

  include_once("carClass.php");

  function outputRow ($carArray)
  {
    echo "<tr><td>" . $carArray->getRank() . "</td><td>" . $carArray->getYear() . "</td><td>" . $carArray->getMake() . "</td><td>" . $carArray->getModel() . "</td></tr>\n";
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
          $tempArray = explode(",", $value);
          $carArray[] = new Car ($tempArray[0], $tempArray[1], $tempArray[2], $tempArray[3]);
        }
     ?>
    
    <h2>Table of Cars</h2>
    <table border = '1'>
      <?php
        foreach ($carArray as $value)
        {
          outputRow($value);
        }
      ?>
    </table>
    
    <h2>Table of Cars Sorted by Make</h2>
    <table border = '1';>
      <?php
        $make= array();
        foreach ($carArray as $key => $car)
        {
          $make[$key] = $carArray[2];    // Index 2points to make in 
        }
      
        array_multisort($make, SORT_ASC, $carArray);
      
        foreach ($carArray as $value)
        {
          outputRow($value);
        }
      ?>
    </table>
  </body>
  
</html>