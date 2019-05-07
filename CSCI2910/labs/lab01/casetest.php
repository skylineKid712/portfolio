<?php

  //keywords are not case sensitive
  echo "Hello World"."<br>";
  ECHO "Hello World"."<br>";

  //variables are case sensitive
  $a = 5;
  echo $a."<br>";
  echo $A;
  
  //constants are case sensitive
  define ("PI", 3.14);
  echo  constant("PI")."<br>";
  echo  constant("pi")."<br>";
  
  //functions are not case sensitive
  myFunction();
  MYFUNCTION();
  mYfUnCtIoN();



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset='UTF-8'>
    <title>Case Test</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
  </head>
  <body>
     
  </body>
  
</html>