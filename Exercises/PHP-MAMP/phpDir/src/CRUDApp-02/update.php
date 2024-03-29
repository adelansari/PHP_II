<?php include 'db.php';

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Query failed');
}
?>

<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];

    //Update the records in db
    $query = "UPDATE users SET ";
    $query .= "username = '$username', ";
    $query .= "password = '$password' ";
    $query .= "WHERE id = $id";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Update query failed" . mysqli_error($conn));
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP CRUD App</title>
</head>

<body>
    <form action="update.php" method="post">
        <?php
        while ($row = mysqli_fetch_assoc($result)) : ?>
            <input type="text" name="username" value='<?= $row["username"] ?>'>
            <input type="text" name="password" value='<?= $row["password"] ?>'>
            <select name="id" id="">
                <option value='$id'><?= $row["id"] ?></option>
            </select>
        <?php endwhile; ?>


        <input type="submit" name="submit" value="UPDATE">

    </form>


</body>

</html>