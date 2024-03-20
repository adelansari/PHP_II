<?php

/* 
  Write a PHP code to  create and store array for $best_sellers where it holds list of best-selling items  but display only three best-selling items on the page. The list of best-sellers could be e.g. Chocolate, Mints, Fudge, Bubble gum, Toffee, Jelly Beans etc
*/

$best_sellers = array(
  "Chocolate",
  "Mints",
  "Fudge",
  "Bubble gum",
  "Toffee",
  "Jelly Beans"
);


?>
<!DOCTYPE html>
<html>

<head>
  <title>Indexed Arrays</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Best Sellers</h2>
  <?php
  foreach ($best_sellers as $key => $value) {
    if ($key < 3) {
      echo "<p>" . ($key + 1) . ". " . $value . "</p>";
    }
  }
  ?>





</body>

</html>