<?php

/* 
  Write a PHP code to compare and check if the quantity wanted is less than or equal to quantity in stock. If the user can buy based on comparison and if value is true, page should show 1 and if false, the page should show nothing.
*/

$quantityWanted = 5;

// if stock is more than wanted quantity, user can buy
$quantityInStockA = 8;
$canBuy = $quantityWanted <= $quantityInStockA;


// if stock is less than wanted quantity, user can't buy
$quantityInStockB = 3;
$cannotBuy = $quantityWanted <= $quantityInStockB;

?>
<!DOCTYPE html>
<html>

<head>
  <title>Comparison Operators</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Shopping Cart</h2>
  <h3>Scenario A: When user can buy</h3>
  <p>Quantity in stock: <?= $quantityInStockA; ?></p>
  <p>Quantity wanted: <?= $quantityWanted; ?></p>
  <p>Can buy: <?= $canBuy; ?></p>

  <h3>Scenario B: When user can't buy</h3>
  <p>Quantity in stock: <?= $quantityInStockA; ?></p>
  <p>Quantity wanted: <?= $quantityWanted; ?></p>
  <p>cannotBuy: <?= $cannotBuy; ?></p>






</body>

</html>