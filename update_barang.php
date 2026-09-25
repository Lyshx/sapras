<?php
include "koneksi.php";

// 1. Ambil id_barang dari URL (saat pertama kali halaman dibuka)
$id_barang = $_GET['id_barang'] ?? null;

// 2. Jika Form Disubmit (Tombol Update diklik)
if (isset($_POST['submit'])) {
    // Tangkap id_barang dari input hidden
    $id_barang   = $_POST['id_barang_hidden'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah      = $_POST['jumlah'];
    $kondisi     = $_POST['kondisi'];
    $stok_barang = $_POST['stok_barang'];
    $lokasi      = $_POST['lokasi'];

    // Query UPDATE yang valid dan terhubung ke database
    $query = "UPDATE barang SET 
                nama_barang = '$nama_barang', 
                jumlah      = '$jumlah', 
                kondisi     = '$kondisi', 
                stok_barang = '$stok_barang', 
                lokasi      = '$lokasi' 
              WHERE id_barang = '$id_barang'";

    $execute = mysqli_query($koneksi, $query);

    if ($execute) {
        // Jika berhasil, kembali ke tabel data barang
        header("Location: tampil_barang.php");
        exit;
    } else {
        // Jika gagal, tampilkan pesan error mysql
        echo "Gagal mengupdate database: " . mysqli_error($koneksi);
    }
}

// 3. Ambil data lama untuk ditampilkan di dalam form
$data = null;
if ($id_barang) {
    $query_lama = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
    $hasil_lama = mysqli_query($koneksi, $query_lama);
    if ($hasil_lama && mysqli_num_rows($hasil_lama) > 0) {
        $data = mysqli_fetch_assoc($hasil_lama);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Barang</title>
</head>
<body>
    <h2>Form Update Barang</h2>

    <?php if ($data): ?>
    <form action="update_barang.php" method="POST">
        <!-- Input hidden agar id_barang tetap terkirim saat form disubmit -->
        <input type="hidden" name="id_barang_hidden" value="<?= $data['id_barang']; ?>">

        <label>ID Barang (Tidak dapat diubah):</label><br>
        <input type="text" value="<?= $data['id_barang']; ?>" disabled><br><br>

        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" value="<?= $data['nama_barang']; ?>" required><br><br>

        <label>Jumlah:</label><br>
        <input type="text" name="jumlah" value="<?= $data['jumlah']; ?>" required><br><br>

        <label>Kondisi:</label><br>
        <input type="text" name="kondisi" value="<?= $data['kondisi']; ?>" required><br><br>

        <label>Stok Barang:</label><br>
        <input type="text" name="stok_barang" value="<?= $data['stok_barang']; ?>" required><br><br>

        <label>Lokasi:</label><br>
        <input type="text" name="lokasi" value="<?= $data['lokasi']; ?>" required><br><br>

        <button type="submit" name="submit">Update Data</button>
        <a href="tampil_barang.php">Batal</a>
    </form>
    <?php else: ?>
        <p style="color: red;">Data barang tidak ditemukan atau ID tidak valid!</p>
        <a href="tampil_barang.php">Kembali ke Tabel Barang</a>
    <?php endif; ?>
</body>
</html>