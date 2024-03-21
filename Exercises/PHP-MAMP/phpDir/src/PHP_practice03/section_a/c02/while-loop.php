<?php
/*
  Create a simple while loop to find prices for multiple packs of candy. For example, if one pack costs $1.99 how much would 5 pack costs? Display the prices for all 5 packs of candy.
*/
$price = 1.99;
$packs = 5;
$counter = 1;
?>
<!DOCTYPE html>
<html>

<head>
  <title>while Loop</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Prices for Multiple Packs</h2>

  <h2>Method B</h2>
  <?php while ($counter <= $packs) : ?>
    <p>Price for <?php echo $counter; ?> pack(s): $<?= $price * $counter++ ?></p>
  <?php endwhile; ?>

  <!-- Alternative Approuch: -->
  <h2>Method A</h2>
  <p>
    <?php
    /* Write your code here */
    while ($counter <= $packs) {
      echo "Price for $counter pack(s): $" . $price * $counter . "<br>";
      $counter++;
    }
    ?>
  </p>

</body>

</html>