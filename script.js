document.addEventListener("DOMContentLoaded", () => {document.addEventListener("DOMContentLoaded", () => {
    // 1. Fitur Search Filter Real-Time pada Tabel Peminjaman
    const searchInput = document.getElementById("searchPeminjaman");
    if (searchInput) {
        searchInput.addEventListener("keyup", function () {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll("#tabelPeminjaman tbody tr");

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? "" : "none";
            });
        });
    }

    // 2. Smooth Scroll Navigasi
    document.querySelectorAll('nav a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            document.querySelector(targetId).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});});