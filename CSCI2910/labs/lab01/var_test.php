<?php
	          $myArray = array ();
            $myArray[] = "-2 ducks"; 
	          $myArray[] = "a minion"; 
	          $myArray[] = false;
	          $myArray[] = NULL; 
	          $myArray[] = -128.34; 
	          $myArray[] = 0.0;
	          $myArray[] = ""; 
	          $myArray[] = 42; 
	          $myArray[] = -12;
	          $myArray[] = array ("300", "The Avengers");
            
            function createRow ($var)
            {
               ?>
                  <tr>
                      <td><?php echo $var; ?></td>
                      <td><?php echo gettype ($var); ?></td>
                      <td><?php echo (bool)$var; ?></td>
                      <td><?php echo (int)$var; ?></td>
                      <td><?php echo (float)$var; ?></td>
                      <td><?php echo (string)$var; ?></td>
                      <td><?php echo var_dump($var); ?></td>
                      <td><?php echo is_int($var) ? dechex($var) : ""; ?></td>
                  </tr>
            
               <?php    
            }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset='UTF-8'>
    <title>Variable Test</title>
  </head>
  <body>
       <table border='1'> 
         <thead>
            <tr>
              <th style='text-align:center'>Initial Value</th>
              <th style='text-align:center'>Initial Type</th> 
              <th style='text-align:center'>Cast to bool</th> 
              <th style='text-align:center'>Cast to int</th> 
              <th style='text-align:center'>Cast to float</th>
              <th style='text-align:center'>Cast to string</th> 
              <th style='text-align:center'>Variable info</th> 
              <th style='text-align:center'>Int as hex</th>
            </tr>
         </thead>
         
         <?php
            foreach($myArray as $value)
            {
              createRow($value);
            }
         ?>
 

  </body>
</html>
