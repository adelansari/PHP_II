<?php

/* 
  Write a PHP code to contcatenate greeting e.g. “Thank you” to customer who bought his candy order. Customer name can be anything for example “Mr. James”. The page should show:
  Mr. James’s Order
  Thank you, Mr. James
*/

$customerName = "Mr. James";
$greeting = "Thank you, "

?>
<!DOCTYPE html>
<html>

<head>
  <title>String Operator</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <p><?= $customerName; ?>'s Order</p>
  <p><?= $greeting . $customerName; ?></p>

</body>

</html>