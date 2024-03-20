<?php

/*
Create three functions to generate the values as shown in this table. Price for Toffee is 3, Mints is 2 and Fudge is 8.
  - The first function should look at stock levels and create a message indicating whether or not more stock should be ordered. If the stock is less than 10 no Re-Order necessary.
  - The second function should find the total value of stock for each item that is sold. 
  - And finally the third function should calculate how much tax will be due when all of the remaining stock has been sold.

  Product  Stock  Re-order  Total value  Tax due
  Toffee 12  No $36 $7.2
  Mints 26 No $52 $10.4
  Fudge 8 Yes $32 $6.4
*/

function reOrder($stock)
{
  if ($stock < 10) {
    return "No";
  } else {
    return "Yes";
  }
}

function totalValue($stock, $price)
{
  return $stock * $price;
}

function taxDue($stock, $price)
{
  return $stock * $price * 0.2;
}

$products = [
  "Toffee" => 12,
  "Mints" => 26,
  "Fudge" => 8
];



?>
<!DOCTYPE html>
<html>

<head>
  <title>Basic Functions</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Stock Control</h2>
  <table>
    <tr>
      <th>Product</th>
      <th>Stock</th>
      <th>Re-order</th>
      <th>Total value</th>
      <th>Tax due</th>
    </tr>
    <?php
    /**
     * Write your code here
     */
    ?>
  </table>
</body>

</html>