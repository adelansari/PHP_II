<?php
session_start();
require_once 'db.php';

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

$rows = array();
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
