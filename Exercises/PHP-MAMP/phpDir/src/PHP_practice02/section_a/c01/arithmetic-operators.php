<?php

/* 
  Write a PHP code to calculate the cost of an order. Let us say there are three candy items, and the cost of per pack is $5. Calculate the subtotal with tax of 20% and total amount
*/

$costPerPack = 5;
$numberOfPacks = 3;
$subtotal = $costPerPack * $numberOfPacks;
$tax = $subtotal * 0.20;
$total = $subtotal + $tax;

?>
<!DOCTYPE html>
<html>

<head>
  <title>Mathematical Operators</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Shopping Cart</h2>
  <p>Cost per pack: $<?= $costPerPack; ?></p>
  <p>Number of Candy items: <?= $numberOfPacks; ?></p>
  <p>Subtotal: $<?= $subtotal; ?></p>
  <p>Tax: $<?= $tax; ?> (20% of $<?= $subtotal; ?>)</p>
  <p>Total: $<?= $total; ?></p>

</body>

</html>