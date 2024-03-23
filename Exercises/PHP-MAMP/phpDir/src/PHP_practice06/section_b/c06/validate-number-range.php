<?php
/* Write PHP Code here

Step 1: Initialize two variables with empty strings

Step 2: Write custom fuction to check 
if any given value between 0 to 100 is a number

Step 3: Check if the form has been submitted. If it has,
     collect age from the $_POST superglobal array.
  The data comes from a text input, so a value will always be sent for it
  when the form is submitted.

Step 4: Call the custom function to check if the value user submitted falls between
range 16 and 65. You may store boolean value as return type in function to check if the number is valid. 

Step 5: Check if condition is valid, if it is you can display
    "Age is valid" else "You must be 16-65 years old"

*/
?>

<!-- Write PHP Code here -->

<?php
// step 1
$age = '';
$message = '';

// step 2
function isNumberInRange($number, $min, $max)
{
  return is_numeric($number) && $number >= $min && $number <= $max;
}

// step 3
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $age = $_POST['age'] ?? '';

  // step 4 and 5
  if (isNumberInRange($age, 0, 100)) {
    if ($age >= 16 && $age <= 65) {
      $message = 'Age is valid';
    } else {
      $message = 'You must be 16-65 years old';
    }
  } else {
    $message = 'You must enter a number between 0 and 100';
  }
}
?>

<?php include 'includes/header.php'; ?>

<form method="post">
  <p>Age: <input type="text" name="age" value="<?= htmlspecialchars($age) ?>"></p>
  <p><input type="submit" value="Submit"></p>
</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
  <p><?= $message ?></p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>