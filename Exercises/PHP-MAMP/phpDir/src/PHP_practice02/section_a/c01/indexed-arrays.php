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
  <h2>Using foreach loop</h2>
  <?php
  foreach ($best_sellers as $key => $value) {
    if ($key < 3) {
      $orderList = $key + 1;
      echo "<p>$orderList. $value</p>";
    }
  }
  ?>

  <h2>Using ordered list</h2>
  <ol>
    <?php
    for ($i = 0; $i < 3; $i++) {
      echo "<li>$best_sellers[$i]</li>";
    }
    ?>
  </ol>
</body>

</html>