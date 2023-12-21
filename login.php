<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = preg_replace("/[^a-zA-Z0-9]/", "", $_POST["username"]);
    $password = $_POST["password"];

    if (file_exists("users/$username.txt") && password_verify($password, file_get_contents("users/$username.txt"))) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        echo "Invalid username or password";
    }
}
?>
