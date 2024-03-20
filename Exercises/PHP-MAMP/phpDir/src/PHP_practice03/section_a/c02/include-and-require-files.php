<?php
/*
    Write a PHP Code to include header.php and footer.php and check the candy stock. Let us assume you have 25 stock of candy, so check if you have “Good availability”, you have “low stock”, or you are running “Out of stock.”

    footer and header files are inside includes folder in the same directory.
*/
include 'includes/header.php';
include 'includes/footer.php';
$stock = 25;
?>


<h2>Chocolate</h2>
<?php
/* Write your code here */
if ($stock >= 20) {
    echo "<p>Good availability - $stock left</p>";
} elseif ($stock >= 10) {
    echo "<p>Low stock - $stock left</p>";
} else {
    echo "<p>Out of stock</p>";
}
?>