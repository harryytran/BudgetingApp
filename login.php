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
        <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
            <p style="color: green;">Account created successfully. Please log in.</p>
        <?php endif; ?>
        <form>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" onclick="location.href='index.php'">Login</button>
        </form>
        <p>Don't have an account? <a href="add_user.php">Add New User</a></p>
    </div>
</body>
</html>