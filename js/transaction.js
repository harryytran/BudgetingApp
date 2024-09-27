document.getElementById('transaction-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const amount = parseFloat(document.getElementById('amount').value);
    let category = document.getElementById('category').value;
    const customCategory = document.getElementById('custom-category').value;

    if (category === 'Custom' && customCategory) {
        category = customCategory;
    }

    if (amount && category) {
        let transactions = JSON.parse(localStorage.getItem('transactions')) || [];
        transactions.push({ amount, category, date: new Date().toLocaleString() });
        localStorage.setItem('transactions', JSON.stringify(transactions));
        alert('Transaction added successfully!');
        window.location.href = 'monthly_report.php';
    }
});

document.getElementById('category').addEventListener('change', function() {
    const customCategoryInput = document.getElementById('custom-category');
    if (this.value === 'Custom') {
        customCategoryInput.style.display = 'block';
    } else {
        customCategoryInput.style.display = 'none';
    }
});
