<?php

/* 
  Write a PHP code to  create and store array in $nutrition, the value that is stored for the fat content should be updated and add a new element e.g. fiber and write those values out to the page.
*/

$nutrition = array(
  "fat" => "0.2g",
  "sugar" => "14g",
  "salt" => "0.01g"
);

$nutrition["fat"] = "0.5g";
$nutrition["fiber"] = "1.2g";

?>
<!DOCTYPE html>
<html>

<head>
  <title>Updating Arrays</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Nutrition (per 100g)</h2>
  <?php
  foreach ($nutrition as $key => $value) {
    echo "<p>" . $key . ": " . $value . "</p>";
  }
  ?>

</body>

</html>