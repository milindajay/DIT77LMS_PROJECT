// Example JavaScript to handle search functionality
document.getElementById('search').addEventListener('input', function (e) {
    let searchValue = e.target.value.toLowerCase();
    let rows = document.querySelectorAll('table tbody tr');

    rows.forEach(function (row) {
        let name = row.cells[1].textContent.toLowerCase();
        if (name.includes(searchValue)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
