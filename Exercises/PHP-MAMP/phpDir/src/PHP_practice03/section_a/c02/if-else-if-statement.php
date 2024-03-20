<?php
/*
  Create a simple if else if statement to check if candy is in the stock or is coming soon or sold out. If candy is not in stock then print message “Sold Out”, if it is available in stock, print message “In Stock”
*/
$candy = "Chocolate";
$stock = "In Stock";

?>
<!DOCTYPE html>
<html>

<head>
  <title>if else if Statement</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Chocolate</h2>

  <!-- Method A -->
  <h2>Method A</h2>
  <?php if ($stock == "In Stock" || $stock == "Coming Soon") : ?>
    <p><?= "\"$candy\" is $stock"; ?></p>

  <?php else : ?>
    <p><?= "\"$candy\" is Sold Out"; ?></p>

  <?php endif; ?>


  <!-- Method B -->
  <h2>Method B</h2>
  <?php
  $message = "\"$candy\" is ";
  $message .= ($stock == "In Stock" || $stock == "Coming Soon") ? $stock : "Sold Out";
  ?>
  <p><?= $message; ?></p>


  <!-- Method C -->
  <h2>Method C</h2>
  <?php
  echo "
  <p>\"$candy\" is " . ($stock == "In Stock" ? $stock : ($stock == "Coming Soon" ? $stock : "Sold Out")) . "</p>";
  ?>
</body>

</html>