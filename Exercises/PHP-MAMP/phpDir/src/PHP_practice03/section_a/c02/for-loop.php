<?php
/*
  Create a simple for loop to find the prices of multiple candy packs. Let us assume one pack of candy costs $1.99. How much did ten packs cost? Display each pack's costs on the web page.
*/
$price = 1.99;
$packs = 10;
?>
<!DOCTYPE html>
<html>

<head>
  <title>for Loop</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Prices for Multiple Packs</h2>
  <h2>Method A</h2>
  <?php for ($counter = 1; $counter <= $packs; $counter++) : ?>
    <p>Price for <?php echo $counter; ?> pack(s): $<?php echo number_format($price * $counter, 2); ?></p>
  <?php endfor; ?>

  <!-- Alternative way: -->
  <h2>Method B</h2>
  <p>
    <?php
    /* Write your code here */
    for ($counter = 1; $counter <= $packs; $counter++) {
      echo "<p>Price for $counter pack(s): $" . number_format($price * $counter, 2) . "</p>";
    }
    ?>
  </p>
</body>

</html>