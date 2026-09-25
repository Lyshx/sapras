<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['barang'])) {
    $_SESSION['barang'] = [
        [
            "id_barang" => "BRG001",
            "nama_barang" => "Infocus Epson Model X400",
            "jumlah" => "1",
            "kondisi" => "Baik",
            "stok_barang" => "5",
            "lokasi" => "Lab Komputer",
            "status" => "Dipinjam"
        ],
        [
            "id_barang" => "BRG002",
            "nama_barang" => "Set Alat Pel & Ember",
            "jumlah" => "2",
            "kondisi" => "Baik",
            "stok_barang" => "8",
            "lokasi" => "Gudang Sarpras",
            "status" => "Dikembalikan"
        ]
    ];
    
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $id_barang = htmlspecialchars($_POST['id_barang']);
    $nama_barang = htmlspecialchars($_POST['nama_barang']);
    $jumlah = htmlspecialchars($_POST['jumlah']);
    $kondisi = htmlspecialchars($_POST['kondisi']);
    $stok_barang = htmlspecialchars($_POST['stok_barang']);
    $lokasi = htmlspecialchars($_POST['lokasi']);
    $status = isset($_POST['status']) ? htmlspecialchars($_POST['status']) : 'Dipinjam';

    $_SESSION['barang'][] = [
        "id_barang" => $id_barang,
        "nama_barang" => $nama_barang,
        "jumlah" => $jumlah,
        "kondisi" => $kondisi,
        "stok_barang" => $stok_barang,
        "lokasi" => $lokasi,
        "status" => $status
    ];
    
    header("Location: index.php#daftar-peminjaman");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Sarpras - SMK 1 Maja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>SMK Negeri 1 Maja</h1>
    </header>

    <nav>
        <button class="nav-toggle" id="navToggle">&#9776;</button>
        <div class="nav-links" id="navLinks">
            <a href="#beranda">Kegunaan</a>
            <a href="#staff">Staff Sarpras</a>
            <a href="#inventaris">Daftar Alat</a>
            <a href="#peminjaman">Form Peminjaman</a>
            <a href="#daftar-peminjaman">Data Peminjaman</a>
        </div>
    </nav>

    <div class="hero-banner">
        <h2>Sistem Informasi Sarpras</h2>
        <p>Layanan integrasi sarana belajar & fasilitas sekolah secara cepat dan transparan.</p>
    </div>

    <div class="container">
        
        <!-- Kegunaan Sarpras -->
        <section id="beranda">
            <section id="beranda" style="text-align: center;">
            <h2>Kegunaan Sarpras di SMK 1 Maja</h2>
            <p>Divisi Sarana dan Prasarana (Sarpras) SMK 1 Maja memegang peranan krusial dalam menyediakan, memelihara, serta mengoptimalkan seluruh aset sekolah. Mulai dari penyediaan perangkat penunjang digital pembelajaran hingga kebersihan area kampus sekolah, Sarpras hadir untuk memastikan proses belajar-mengajar berlangsung aman dan nyaman.</p>
            </section>
        </section>

        <!-- Staff Sarpras -->
        <section id="staff">
            <h2>Daftar Staff Sarpras</h2>
            <div class="staff-grid">
                <div class="staff-card">
                    <img src="https://i.pravatar.cc/150?img=11" alt="Budi Priatna, M.T">
                    <h3>Budi Priatna, M.T</h3>
                    <p>Wakasek Bidang Sarpras</p>
                </div>
                <div class="staff-card">
                    <img src="https://i.pravatar.cc/150?img=60" alt="Dede Ibrahim">
                    <h3>Dede Ibrahim</h3>
                    <p>Staff Sarpras Bidang Teknisi</p>
                </div>
                <div class="staff-card">
                    <img src="https://i.pravatar.cc/150?img=47" alt="Lala Kusmala, S.Pd">
                    <h3>Lala Kusmala, S.Pd</h3>
                    <p>Staff Sarpras Bidang Lingkungan</p>
                </div>
                <div class="staff-card">
                    <img src="https://i.pravatar.cc/150?img=12" alt="Agus Santosa, S.T. M.T">
                    <h3>Agus Santosa, S.T. M.T</h3>
                    <p>Staff Sarpras Bidang Jaringan</p>    
                </div>
                <div class="staff-card">
                    <img src="https://i.pravatar.cc/150?img=13" alt="Ade Ali Ridwan, S. Pd">
                    <h3>Ade Ali Ridwan, S. Pd</h3>
                    <p>Staff Sarpras Bidang Aset</p>    
                </div>
                <div class="staff-card">
                    <img src="https://i.pravatar.cc/150?img=14" alt="Nanda Juanda Dipura Atmaja, S. Kom">
                    <h3>Nanda Juanda Dipura Atmaja, S. Kom</h3>
                    <p>Staff Sarpras Bidang Aset</p>    
                </div>
            </div>
        </section>

        <!-- Kartu Visual Inventaris -->
        <section id="inventaris">
            <h2>Peralatan Utama (Infocus)</h2>
            <div class="inventory-grid">
                <div class="inventory-card">
                    <img src="proyektor.jpg" alt="Infocus Proyektor">
                    <div>
                        <h4>Infocus Epson X400</h4>
                        <p>Stok: 5 Unit (Tersedia)</p>
                    </div>
                </div>
                <div class="inventory-card">
                    <img src="alat-kebersihan.jpg" alt="Alat Kebersihan">
                    <div>
                        <h4>Set Alat kebersihan</h4>
                        <p>Stok: 8 Set (Tersedia)</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Form Peminjaman -->
        <section id="peminjaman">
            <h2>Form Pengajuan Peminjaman</h2>
            <form action="index.php" method="POST" id="formPeminjaman">
                <label for="id_barang">ID Barang</label>
                <input type="text" id="id_barang" name="id_barang" placeholder="Masukkan ID barang" required>

                <label for="nama_barang">Nama Barang</label>
                <input type="text" id="nama_barang" name="nama_barang" placeholder="Masukkan nama barang" required>

                <label for="jumlah">Jumlah</label>
                <input type="number" id="jumlah" name="jumlah" placeholder="Masukkan jumlah" required>

                <label for="kondisi">Kondisi</label>
                <input type="text" id="kondisi" name="kondisi" placeholder="Masukkan kondisi" required>

                <label for="stok_barang">Stok Barang</label>
                <input type="number" id="stok_barang" name="stok_barang" placeholder="Masukkan stok barang" required>

                <label for="lokasi">Lokasi</label>
                <input type="text" id="lokasi" name="lokasi" placeholder="Masukkan lokasi" required>

                <button type="submit" name="submit">Simpan</button>
            </form>
        </section>

        <!-- Daftar Peminjaman -->
        <section id="daftar-peminjaman">
            <h2>Daftar Peminjaman Aktif</h2>
            <input type="text" id="searchPeminjaman" class="search-box" placeholder="Cari nama peminjam atau nama barang secara instan...">
            
            <table id="tabelPeminjaman">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Kondisi</th>
                        <th>Stok Barang</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach ($_SESSION['barang'] as $row): 
                        $status = isset($row['status']) ? $row['status'] : 'Dipinjam';
                        $badgeClass = ($status == 'Dipinjam') ? 'badge-dipinjam' : 'badge-dikembalikan';
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['id_barang'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($row['nama_barang'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($row['jumlah'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($row['kondisi'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($row['stok_barang'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($row['lokasi'] ?? '-'); ?></td>
                        <td><span class="badge <?= $badgeClass; ?>"><?= htmlspecialchars($status); ?></span></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

    </div>

    <footer>
        <p>&copy; 2026 SMK Negeri 1 Maja — Tim Sarana dan Prasarana</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>