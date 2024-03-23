<?php include 'includes/header.php'; ?>

<?php
/* Write your PHP code here
Overall idea here is to instead of POST in prev. practice 
how would you do this with HTTP GET

Step 1: Use null-coalescing operator to check if $_GET superglobal array 
has a value for the key sent. If it does, you can store its value in some variable
If it does not, it should store a blank string. 

Step 2: Using if condition, you can check the value in variable is search. 
If it is, the form should be then sent via HTTP GET and the search term is displayed. 
  "You searched for ..."  (replace ... with term user searched for)

Step 3: Otherwise, simply display the form

*/
?>

<?php if (isset($_GET['search'])) :
  $searchTerm = $_GET['search'] ?? ''; ?>
  <p>You searched for <?= htmlspecialchars($searchTerm) ?></p>
  <input onclick="window.history.back()" type="submit" value="Go back">
<?php else : ?>
  <form method="get">
    <p>Search: <input type="text" name="search"></p>
    <p><input type="submit" value="Search"></p>
  </form>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>