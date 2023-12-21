<?php
session_start();

if (isset($_SESSION['username'])) {
    echo "<h1>Вітаємо, " . htmlspecialchars($_SESSION['username']) . "</h1>";
    echo "<a href='add_post.php'>Add a record</a><br>";
    echo "<a href='logout.php'>Вийти</a><br>";

    $files = glob("posts/" . $_SESSION['username'] . "_*.txt");
    foreach ($files as $file) {
        echo "<div>";
        echo htmlspecialchars(file_get_contents($file));
        echo "</div><hr>";
    }
} else {
    echo "<h1>Блог</h1>";
    echo "<a href='registers.html'>Registration</a> | <a href='login.html'>Login</a>";
}
?>
