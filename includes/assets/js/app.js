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

// Realtime Date adn Time
function updateDateTime() {
    const now = new Date();
    document.getElementById('currentDateTime').textContent = now.toLocaleString();
}
setInterval(updateDateTime, 1000);
updateDateTime();



// Slide bar Slide animation and close button
document.addEventListener("DOMContentLoaded", function () {
    const toggler = document.getElementById("mobileSidebarToggler");
    const sidebar = document.getElementById("mobileSidebar");
    const overlay = document.getElementById("mobileSidebarOverlay");
    const closeBtn = document.getElementById("closeSidebarBtn");
    const body = document.body;

    function toggleSidebar(open) {
        sidebar.classList.toggle("open", open);
        overlay.classList.toggle("d-none", !open);
        body.classList.toggle("sidebar-open", open);
        toggler.innerHTML = open
            ? '<i class="bi bi-x-lg"></i>'
            : '<span class="navbar-toggler-icon"></span>';
    }

    toggler.addEventListener("click", () => {
        const isOpen = sidebar.classList.contains("open");
        toggleSidebar(!isOpen);
    });

    closeBtn.addEventListener("click", () => {
        toggleSidebar(false);
    });

    overlay.addEventListener("click", () => {
        toggleSidebar(false);
    });
});

