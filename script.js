document.addEventListener("DOMContentLoaded", () => {
    // 1. Toggle Menu Hamburger (Mobile)
    const navToggle = document.getElementById("navToggle");
    const navLinks = document.getElementById("navLinks");
    if (navToggle && navLinks) {
        navToggle.addEventListener("click", () => navLinks.classList.toggle("active"));
    }

    // 2. Smooth Scroll Navigasi (hanya untuk link #anchor) & tutup menu mobile
    document.querySelectorAll('.nav-links a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (!targetId || !targetId.startsWith('#')) return;
            e.preventDefault();
            if (navLinks) navLinks.classList.remove("active");
            const targetElement = document.querySelector(targetId);
            if (targetElement) targetElement.scrollIntoView({ behavior: 'smooth' });
        });
    });

    // 3. Search Filter Real-Time pada Tabel Peminjaman
    const searchInput = document.getElementById("searchPeminjaman");
    if (searchInput) {
        searchInput.addEventListener("keyup", function () {
            const filter = this.value.toLowerCase();
            document.querySelectorAll("#tabelPeminjaman tbody tr").forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(filter) ? "" : "none";
            });
        });
    }
});
