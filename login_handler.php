<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Directly redirect to index.php without any login checks
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="login_handler.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button onclick="location.href='index.php'">Login</button>
        </form>
    </div>
</body>
</html>
