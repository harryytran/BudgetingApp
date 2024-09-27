<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Report</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header>
        <h1>Monthly Report</h1>
        <button class="home-btn" onclick="location.href='index.php'">Home</button>
    </header>
    <div class="container">
        <div class="left">
            <canvas id="expenseChart" width="200" height="200"></canvas>
        </div>
        <div class="right">
            <div class="status" onclick="showDetails('Rent')">Rent: <span id="rent">$0</span></div>
            <div class="status" onclick="showDetails('Car Payment')">Car Payment: <span id="car-payment">$0</span></div>
            <div class="status" onclick="showDetails('Food')">Food: <span id="food">$0</span></div>
            <div class="status" onclick="showDetails('Fun')">Fun: <span id="fun">$0</span></div>
            <button onclick="location.href='recommendations.php'">Recommendations</button>
        </div>
    </div>
    <script src="js/chart.js"></script>
</body>
</html>
