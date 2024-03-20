<?php

/* 
  Write a PHP code to store indexed arrays in an array or multidimentional array with variable called $offers. Each element in the array stores associated array holding name, price, and stock level of an item that is on offer. Print out the name,price and stock of all the products.
*/

$offers = array(
  array(
    "name" => "Lollipop",
    "price" => 0.3,
    "stock" => 100
  ),
  array(
    "name" => "Toffee",
    "price" => 0.4,
    "stock" => 50
  ),
  array(
    "name" => "Candy Cane",
    "price" => 0.5,
    "stock" => 30
  )
);

?>
<!DOCTYPE html>
<html>

<head>
  <title>Multidimensional Arrays</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Offers</h2>
  <?php
  foreach ($offers as $offer) {
    echo "<p> {$offer['name']} - €{$offer['price']} - {$offer['stock']} in stock</p>";
  }
  ?>

</body>

</html>