<?php
/*
  Create a simple for loop to find prices of multiple higher packs of candy. Let us assume the customer wants 10 packs to 100 packs of candies. How much do 10 to 100 packs cost? Display from 10 packs to 100 packs cost on the web page.
*/

$price = 0.25;
$startPack = 10;
$endPack = 100;


?>
<!DOCTYPE html>
<html>

<head>
  <title>for Loop - Higher Counter</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Prices for Large Orders</h2>
  <h2>Method A</h2>
  <?php for ($startPack; $startPack <= $endPack; $startPack++) : ?>
    <p>Price for <?php echo $startPack; ?> pack(s): $<?php echo number_format($price * $startPack, 2); ?></p>
  <?php endfor; ?>

  <!-- Alternative way: -->
  <h2>Method B</h2>

  <?php
  /* Write your code here */
  for ($startPack; $startPack <= $endPack; $startPack++) {
    echo "<p>Price for $startPack pack(s): $" . number_format($price * $startPack, 2) . "</p>";
  }
  ?>

</body>

</html>