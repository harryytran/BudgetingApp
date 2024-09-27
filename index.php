<?php
session_start();
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//     header('Location: login.php');
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budgeting App</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Budgeting App</h1>
        <button class="home-btn" onclick="location.href='index.php'">Home</button>
    </header>
    <div class="container">
        <button onclick="location.href='monthly_report.php'">Monthly Report</button>
        <button onclick="location.href='add_transaction.php'">Add Transaction</button>
        <button onclick="location.href='daily_tip.php'">Daily Tip</button>
        <button onclick="location.href='goals.php'">Goals</button>
        <button onclick="location.href='logout.php'">Logout</button>
    </div>
</body>
</html>
