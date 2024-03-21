<?php
/*
  Create a simple switch statement to get 20% off chocolates on Monday and 20% off mints on Tuesday, and in all other cases, it should show “Buy three packs, get one free.
*/
$discounts = array(
  "Monday" => "20% off chocolates",
  "Tuesday" => "20% off mints",
  "Other days" => "Buy three packs, get one free"
);

$candy = "chocolate";
$day = "Thursday";

switch ($day) {
  case "Monday":
  case "Tuesday":
    $discount = $discounts[$day];
    break;
  default:
    $discount = $discounts["Other days"];
    break;
}

// OR
// $discount = isset($discounts[$day]) ? $discounts[$day] : $discounts["Other days"];

?>
<!DOCTYPE html>
<html>

<head>
  <title>switch Statement</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Chocolate Discount:</h2>
  <h2>Monday: <?php echo $discounts["Monday"]; ?></h2>
  <h2>Tuesday: <?php echo $discounts["Tuesday"]; ?></h2>
  <h2>Rest of the days: <?php echo $discounts["Other days"]; ?></h2>

  <?php
  echo "<p>Today's offer for \"$candy\" is: $discount</p>";
  ?>

  <?php
  /* Write your code here */
  echo "<p>\"$candy\" is $discount</p>";
  ?>
</body>

</html>