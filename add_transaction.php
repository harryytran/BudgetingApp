<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Transaction</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Add Transaction</h1>
        <button class="home-btn" onclick="location.href='index.php'">Home</button>
    </header>
    <div class="container">
        <form id="transaction-form">
            <input type="number" id="amount" placeholder="Amount" required>
            <select id="category" required>
                <option value="" disabled selected>Select Category</option>
                <option value="Rent">Rent</option>
                <option value="Car Payment">Car Payment</option>
                <option value="Food">Food</option>
                <option value="Fun">Fun</option>
                <option value="Custom">Custom</option>
            </select>
            <input type="text" id="custom-category" placeholder="Custom Category" style="display: none;">
            <button type="submit">Add</button>
        </form>
    </div>
    <script src="js/transaction.js"></script>
</body>
</html>
