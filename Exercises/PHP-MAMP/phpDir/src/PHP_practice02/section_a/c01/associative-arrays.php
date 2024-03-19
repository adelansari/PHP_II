<?php

/* 
  Write a PHP code to  create and store array in a  variable called $nutrition with fat, sugar and salt and display the contents of Nutrition (per 100G) in percentage
*/

$nutrition = array(
  "fat" => 0.2,
  "sugar" => 0.5,
  "salt" => 0.1
);

?>
<!DOCTYPE html>
<html>

<head>
  <title>Associative Arrays</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Nutrition (per 100g)</h2>
  <p>Fat: <?php echo $nutrition["fat"] * 100; ?>%</p>
  <p>Sugar: <?php echo $nutrition["sugar"] * 100; ?>%</p>
  <p>Salt: <?php echo $nutrition["salt"] * 100; ?>%</p>

</body>

</html>