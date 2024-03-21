<?php include 'includes/header.php'; ?>

<?php
/* Write PHP Code here  
Overall idea here is to check if a form has been submitted


Step 1: Use if statement to check $_SERVER superglobal array to see if the key called
REQUEST_METHOD has a value of POST

Step 2: If it does, the search form has to be sent via HTTP POST, 
and a message should be displayed like this:
  "You searched for ..."  (replace ... with term user searched for)

Step 3: Otherwise, simply display the form

*/

?>

<form method="post">
  <p>Name: <input type="text" name="name"></p>
  <p>Age: <input type="text" name="age"></p>
  <p>Email: <input type="text" name="email"></p>
  <p>Password: <input type="password" name="pwd"></p>
  <p>Bio: <textarea name="bio"></textarea></p>
  <p>Contact preference:
    <select name="preferences">
      <option value="email">Email</option>
      <option value="phone">Phone</option>
    </select>
  </p>
  <p>Rating:
    1 <input type="radio" name="rating" value="1">
    2 <input type="radio" name="rating" value="2">
    3 <input type="radio" name="rating" value="3"></p>
  <p><input type="checkbox" name="terms" value="true">
    I agree to the terms and conditions.</p>
  <p><input type="submit" value="Save"></p>
</form>



<?php include 'includes/footer.php'; ?>