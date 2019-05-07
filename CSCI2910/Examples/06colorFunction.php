<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Using Functions to Generate RGB Colors</title>
	</head>
	
	<?
		function redBackground()
		{
			$styleString = "background-color: rgb(255,0,0);opacity: 1.0;";
			echo $styleString;
		}

		function blueBackground()
		{
			?>background-color: rgb(0,0,255);opacity: 1.0;<?
		}

		function getStyleStringForCyanBackground()
		{
			$styleString = "background-color: rgb(0,255,255);opacity: 1.0;";
			return $styleString;
		}

		// convertFloatColorToEightBitInt() receives a float from 0.0 to 1.0
		// representing the amount of color and converts it to an integer
		// from 0 to 255.  (Values outside of range are set either to 0 or
		// 255 depending on sign.)
		function convertFloatColorToEightBitInt($color)
		{
			$returnedInt = 0;
			if((is_float($color)) && ($color > 0))
			{
				$returnedInt = (int)$color * 255;
				if($returnedInt > 255) $returnedInt = 255;
			}
			return $returnedInt;
		}

		function getStyleStringForRedGreenBlueAndAlpha($red, $green, $blue, $alpha)
		{
			$redInt = convertFloatColorToEightBitInt($red);
			$greenInt = convertFloatColorToEightBitInt($green);
			$blueInt = convertFloatColorToEightBitInt($blue);
			$cleanedAlpha = 1.0;
			if(is_float($alpha) && ($alpha >= 0.0) && ($alpha <= 1.0))
				$cleanedAlpha = $alpha;
			$styleString = "background-color: rgb($redInt,$greenInt,$blueInt);opacity: $cleanedAlpha;";
			return $styleString;
		}

	?>
	
	
	<body>
		<h1 style='background-color: rgb(0,255,0);opacity: 1.0;'>Defining style with text string</h1>
		<h1 style='<? redBackground(); ?>'>Defining style using text outputted by a function</h1>
		<h1 style='<? blueBackground(); ?>'>Defining style using embedded HTML in a function</h1>
		<h1 style='<? echo getStyleStringForCyanBackground(); ?>'>Defining style using text returned by a function</h1>
		<h1 style='<? echo getStyleStringForRedGreenBlueAndAlpha(1.0, 0.0, 1.0, 0.5); ?>'>Defining style using function with parameters</h1>
	</body>
</html>