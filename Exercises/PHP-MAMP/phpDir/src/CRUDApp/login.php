<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<?php
$servername = "db";
$dbUsername = "root";
$dbPassword = "lionPass";
$dbname = "loginapp";

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["password"])) {
    $formUsername = $_POST["username"];
    $formPassword = $_POST["password"];

    // Insert records
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("ss", $formUsername, $formPassword);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Select records
$sql = "SELECT id, username, password FROM users";
$result = $conn->query($sql);

?>


<?php

// Check if delete action is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_id"])) {
    $id = $_POST["delete_id"];

    // Delete record
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("i", $id);

    if ($stmt->execute() === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Check if edit action is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_id"])) {
    $id = $_POST["edit_id"];
    $username = $_POST["edit_username"];
    $password = $_POST["edit_password"];

    // Update record
    $sql = "UPDATE users SET username = ?, password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("ssi", $username, $password, $id);

    if ($stmt->execute() === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<form action="login.php" method="post">
    <label for="username">Username</label>
    <input type="text" name="username">
    <label for="password">Password</label>
    <input type="password" name="password">
    <input type="submit" name="submit" value="Submit">
</form>

<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
        <th class="actions">Actions</th>
    </tr>
    <?php if ($result->num_rows > 0) : ?>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["username"] ?></td>
                <td><?= $row["password"] ?></td>
                <td class='actions'>
                    <form method='post' style='display: inline-block;'>
                        <input type='hidden' name='edit_id' value='<?= $row["id"] ?>'>
                        <input type='text' name='edit_username' value='<?= $row["username"] ?>'>
                        <input type='text' name='edit_password' value='<?= $row["password"] ?>'>
                        <button type='submit'>Edit</button>
                    </form>
                    <form method='post' style='display: inline-block;'>
                        <input type='hidden' name='delete_id' value='<?= $row["id"] ?>'>
                        <button type='submit'>Delete</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else : ?>
        <tr>
            <td colspan='4'>0 results</td>
        </tr>
    <?php endif; ?>
</table>

<?php
$conn->close();
?>