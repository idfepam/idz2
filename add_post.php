<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post = strip_tags($_POST["post"]);
    $filename = "posts/" . $_SESSION['username'] . "_" . time() . ".txt";
    file_put_contents($filename, $post);
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add a record</title>
</head>
<body>
    <h2>Add a record</h2>
    <form action="add_post.php" method="post">
        <textarea name="post"></textarea><br>
        <input type="submit" value="Add">
    </form>
</body>
</html>
