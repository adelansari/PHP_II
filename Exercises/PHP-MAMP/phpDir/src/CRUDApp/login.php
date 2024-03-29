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
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
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
}

$result = $conn->query("SELECT * FROM users");
?>


<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<div id="toast" class="toast">Some text</div>
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


<script>
    function showToast(message) {
        var toast = document.getElementById("toast");
        toast.innerHTML = message;
        toast.className = "toast show";
        setTimeout(function() {
            toast.className = toast.className.replace("show", "");
        }, 3000);
    }
</script>

<script>
    if (typeof <?php echo json_encode($_SESSION["toastMessage"]); ?> !== 'undefined') {
        showToast(<?php echo json_encode($_SESSION["toastMessage"]); ?>);
        <?php unset($_SESSION["toastMessage"]); ?>
    }
</script>

<?php
$conn->close();
?>