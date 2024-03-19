<?php

/* 
  Write a PHP code to update a value in a variable so that the cost of candy per pack is shown and the initial name variable is changed to something else. For example, if initial name is “Guest”, you can update it to “Your Name”
*/

$name = "Guest";
$price = 1.50;

if ($name == "Guest") {
  $name = "Adel";
  $price = 2.00;
}


?>
<!DOCTYPE html>
<html>

<head>
  <title>Updating Variables</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Welcome <?php echo $name; ?>!</h2>
  <p>The cost of the candy is <?php echo $price; ?> per pack.</p>

</body>

</html>