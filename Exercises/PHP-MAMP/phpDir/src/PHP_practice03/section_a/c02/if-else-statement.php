<?php
/*
Create a simple if else statement to check if candy is in stock or not. If candy is not in stock, then print the message “Sold Out”; if it is available in stock, print the message “In Stock.”
*/
$candyInStock = true;
?>
<!DOCTYPE html>
<html>

<head>
  <title>if else Statement</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Chocolate</h2>
  <h2>Is chocolate in stock?</h3>
    <?php
    /* Write your code here */
    if ($candyInStock) {
      echo "<p>In Stock</p>";
    } else {
      echo "<p>Sold Out</p>";
    }
    ?>
</body>

</html>