<?php

/* 
  Write a PHP code to display name and favorites candy using echo shorthand. 
*/

$name = "Adel";
$candy = ["Toffee", "Mints", "Fudge"];
$candy_string = implode(", ", $candy);




?>
<!DOCTYPE html>
<html>

<head>
  <title>Echo Shorthand</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Welcome <?= $name; ?></h2>
  <p>Your favorite candy is: <?= $candy_string; ?></p>

</body>

</html>