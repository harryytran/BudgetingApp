<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Hasher</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Password Hasher</h1>
        <form method="post">
            <input type="text" name="password" placeholder="Enter password" required>
            <button type="submit">Hash Password</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = $_POST['password'];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            echo "<p>Hashed Password: <strong>$hashed_password</strong></p>";
        }
        ?>
    </div>
</body>
</html>
