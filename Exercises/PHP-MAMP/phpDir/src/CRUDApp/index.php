<?php
require_once 'login.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="script.js"></script>
    <title>User Management</title>
</head>

<body>
    <div class="container">
        <header>
            <h1>User Management</h1>
        </header>

        <div id="toast" class="toast">Some text</div>
        <form action="index.php" method="post">
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
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td><?= $row["id"] ?></td>
                            <td><?= htmlspecialchars($row["username"]) ?></td>
                            <td data-password="<?= $row["password"] ?>">••••••••</td>
                            <td class='actions'>
                                <i class="material-icons edit-icon" onclick="editRow(this)">edit</i>
                                <i class="material-icons delete-icon" onclick="deleteRow(<?= $row['id'] ?>)">delete</i>
                            </td>
                        </tr>
                    <?php endforeach; ?>
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