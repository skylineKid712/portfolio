<!DOCTYPE html>
<html>
  <head>
    <meta charset='UTF-8'>
    <title>Project 1</title>
    <!-- Project 1 by Gary Whitney-->

    <style>
      .error {color: #FF0000;}
    </style>
    
  </head>
  <body>
    
    <!-- Begin php script-->
    <!-- from w3schools -->
    <?php
        //php code is from W3 schools other than code pertaining to age, color, and pet 
        // define variables and set to empty values
        $nameErr = $ageErr = $colorErr = $petsErr = $genderErr = "";
        $name = $age = $color = $gender = $pets = $comment = "";
    
        if ($_SERVER["REQUEST_METHOD"] == "GET") 
        {
          if (empty($_GET["name"])) {
          $nameErr = "Name is required";
        } 
        else 
        {
          $name = test_input($_GET["name"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
          {
            $nameErr = "Only letters and white space allowed"; 
          }
        }
        
        if (empty($_GET["age"])) 
        {
          $ageErr = "Age is required";
        } 
        else 
        {
          $age = test_input($_GET["age"]);
          // check if age input is valid
          if (!is_int($age))
          {
            $ageErr = "Invalid age format"; 
          }
          /*if ($age <= 0 || $age > 110)
          {
            $ageErr = "Invalid age";
          }*/
        }
          
        if (empty($_GET["color"])) 
        {
          $colorErr = "Color is required";
        } 
        else 
        {
          $color = test_input($_GET["color"]);
        }
      
        if (empty($_GET["comment"])) 
        {
          $comment = "";
        } 
        else 
        {
          $comment = test_input($_GET["comment"]);
        }
      
        if (empty($_GET["gender"])) 
        {
          $genderErr = "Gender is required";
        } 
        else 
        {
          $gender = test_input($_GET["gender"]);
        }
      }
      
      function test_input($data) 
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>
    
    <br>
    <br>
    <center>
    <span class="error">* Required Field</span>
    
    <!-- Begin form -->
    <form method = "get" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
     
      <p>Name: <input type = "text" name = "name" value = "<?php echo $name;?>"><span class = "error"> * <?php echo $nameErr;?></span></p>
      <p>Age: <input type = "text" age = "age" value = "<?php echo $age;?>"><span class="error"> * <?php echo $ageErr;?></span></p>
      <p>Favorite Color: <select name = "colors">
          <option value = ""></option>
          <option <?php if (isset($color) && $color == "blue") echo 'selected="selected"';?> value = "blue" </option>Blue</option>
          <option <?php if (isset($color) && $color == "red") echo 'selected="selected"';?>value = "red">Red</option>
          <option <?php if (isset($color) && $color == "orange") echo 'selected="selected"';?>value = "orange">Orange</option>
          <option <?php if (isset($color) && $color == "green") echo 'selected="selected"';?>value = "green">Green</option>
        </select> 
        <span class="error">* <?php echo $colorErr;?></span></p>
      <p>Gender: 
            <input type = "radio" name = "gender" <?php if (isset($gender) && $gender == "male") echo "checked";?> value = "male"> Male
            <input type= "radio" name = "gender" <?php if (isset($gender) && $gender == "female") echo "checked";?> value = "female"> Female
            <span class="error">* <?php echo $genderErr;?></span>
      </p>
      <p>Pets Owned: 
            <input type = "checkbox" name = "pet" <?php if (isset($pet) && $pet == "dog") echo 'checked="checked" ';?> value = "dog"> Dog
            <input type = "checkbox" name = "pet" <?php if (isset($pet) && $pet == "cat") echo 'checked="checked" ';?> value = "cat"> Cat
            <input type = "checkbox" name = "pet" <?php if (isset($pet) && $pet == "fish") echo 'checked="checked" ';?> value = "fish"> Fish
      </p>
      <p>Comments:</p>
      <p><textarea rows = 3 cols = 50 <?php echo $comment;?>></textarea></p>
      <p><input type = "submit" name = "submit" value = "Submit"></p>
      
    </form>
  
    <!-- Begin output -->
    <?php 
      echo "Hello " . $name;
      echo "<br>";
      echo "You are " . $age . " years old";
      echo "<br>";
      echo "Your favorite color is " . $color;
      echo "<br>";
      if (isset($pet) && $pet == "dog") echo "You own a dog";
      else echo "You do not own a dog";
      echo "<br>";
      if (isset($pet) && $pet == "cat") echo "You own a cat";
      else echo "You do not own a cat";
      echo "<br>";
      if (isset($pet) && $pet == "fish") echo "You own a fish";
      else echo "You do not own a fish";
      echo "<br>";
      if (isset($comment)) echo "You left the following comment: " . $comment;
      else echo "You did not leave a comment";
    ?>  
  
  
    </center>
  </body>