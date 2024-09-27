document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('expenseChart').getContext('2d');
    const transactions = JSON.parse(localStorage.getItem('transactions')) || [];

    const categories = transactions.reduce((acc, transaction) => {
        acc[transaction.category] = (acc[transaction.category] || 0) + transaction.amount;
        return acc;
    }, {});

    const data = {
        labels: Object.keys(categories),
        datasets: [{
            data: Object.values(categories),
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
            hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40']
        }]
    };

    const options = {
        animation: {
            animateScale: true
        }
    };

    new Chart(ctx, {
        type: 'pie',
        data: data,
        options: options
    });

    document.querySelectorAll('.status').forEach(status => {
        const category = status.textContent.split(':')[0];
        status.querySelector('span').textContent = `$${categories[category] || 0}`;
    });
});

function showDetails(category) {
    const transactions = JSON.parse(localStorage.getItem('transactions')) || [];
    const details = transactions.filter(transaction => transaction.category === category)
        .map(transaction => `${transaction.date}: $${transaction.amount}`)
        .join('\n');
    alert(`Details for ${category}:\n${details}`);
}
