<?php

/* Write PHP code here 

Step 1: Initialize two variables for password and message.

Step 2: Write a custom function to check password rules

Step 3: Use if statement to check basic expressions each representing true and false
Take a look, mb_strlen() to check if value contains 8 or more characters
Take a look preg_match, https://www.php.net/manual/en/function.preg-match.php

Hint: /[A-Z]/ checks uppercase characters
/[a-z]/ checks lowercase characters
/[0-9]/ checks numbers

Step 4:  If the form is submitted, password can be collected from $_POST superglobal

Step 5: The valid password can be checked by calling custom function 
and the result can be stored in some variable e.g. $valid

Step 6: Display the results. You may use ternary operator here to check if $valid variable holds true,
If so, $message holds success message otherwise, it holds an error message. 

Step 7: Message can be for example "Password is valid" or if not string
"Password is not strong enough."

*/

// Write your code here

session_start();

// step 1
$password = '';
$message = '';

// step 2
function isValidPassword($password)
{
    // step 3
    $hasRequiredLength = mb_strlen($password) >= 8;
    $hasUppercaseLetter = preg_match('/[A-Z]/', $password);
    $hasLowercaseLetter = preg_match('/[a-z]/', $password);
    $hasNumber = preg_match('/[0-9]/', $password);

    if ($hasRequiredLength && $hasUppercaseLetter && $hasLowercaseLetter && $hasNumber) {
        return true;
    } else {
        return false;
    }
}

// step 4
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';

    // Step 5
    $valid = isValidPassword($password);

    // Step 6 & 7
    $message = $valid ? 'Password is valid' : 'Password is not strong enough.';

    // Store data in session
    $_SESSION['message'] = $message;

    // Redirect to the same page
    header('Location: validate-password.php');
    exit;
}

// Retrieve data from session
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

<?php include 'includes/header.php'; ?>

<div class="container">
    <h2>Validate Password</h2>
    <form method="post">
        <p>Password: <input type="password" name="password"></p>
        <p><input type="submit" value="Submit"></p>
    </form>

    <?php if (!empty($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>