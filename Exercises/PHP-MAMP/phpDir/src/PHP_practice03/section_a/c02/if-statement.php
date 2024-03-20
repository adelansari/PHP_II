<?php
/* Create a simple if statement to greet user if the name is not empty. */
$name = 'Adel';
?>
<!DOCTYPE html>
<html>

<head>
  <title>if Statement</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<h1>The Candy Store</h1>
<?php
/* Write your code here */
if ($name != '') {
  echo "<p>Welcome, $name!</p>";
}
?>
</body>

</html>