<?php
session_start();

$servername = "db";
$dbUsername = "root";
$dbPassword = "lionPass";
$dbname = "loginapp";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        // $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        // $stmt->bind_param("ss", $_POST["username"], $hashed_password);
        $stmt->bind_param("ss", $_POST["username"], $_POST["password"]);
        $stmt->execute();
        $_SESSION["toastMessage"] = "Data added successfully";
    }

    if (isset($_POST["delete_id"])) {
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $_POST["delete_id"]);
        $stmt->execute();
        $_SESSION["toastMessage"] = "Data deleted successfully";
    }

    if (isset($_POST["edit_id"])) {
        $stmt = $conn->prepare("UPDATE users SET username = ?, password = ? WHERE id = ?");
        $stmt->bind_param("ssi", $_POST["edit_username"], $_POST["edit_password"], $_POST["edit_id"]);
        $stmt->execute();
        $_SESSION["toastMessage"] = "Data edited successfully";
    }

    // Redirect to the same page to prevent form resubmission on refresh
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
}

$result = $conn->query("SELECT * FROM users");
?>

<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="script.js"></script>
</head>

<body>
    <div class="container">
        <header>
            <h1>User Management</h1>
        </header>

        <div id="toast" class="toast">Some text</div>
        <form action="login.php" method="post">
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <input type="submit" name="submit" value="Submit">
        </form>

        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?= $row["id"] ?></td>
                            <td><?= $row["username"] ?></td>
                            <td data-password="<?= $row["password"] ?>">••••••••</td>
                            <td class='actions'>
                                <i class="material-icons edit-icon" onclick="editRow(this)">edit</i>
                                <i class="material-icons delete-icon" onclick="deleteRow(<?= $row['id'] ?>)">delete</i>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else : ?>
                    <tr>
                        <td colspan='4'>0 results</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        setToastMessage(<?php echo json_encode($_SESSION["toastMessage"]); ?>);
        <?php unset($_SESSION["toastMessage"]); ?>
    </script>
</body>

</html>

<?php
$conn->close();
?>