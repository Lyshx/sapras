<?php
include "koneksi.php";

// Tangkap id_barang dari URL (GET)
$id_barang = $_GET['id_barang'] ?? null;

// Jika id_barang tidak ada di URL, kembalikan ke index.php
if (!$id_barang) {
    header("Location: index.php");
    exit;
}

// Proses UPDATE saat form disubmit
if (isset($_POST['submit'])) {
    $nama_barang = mysqli_real_escape_string($koneksi, $_POST['nama_barang']);
    $jumlah      = mysqli_real_escape_string($koneksi, $_POST['jumlah']);
    $kondisi     = mysqli_real_escape_string($koneksi, $_POST['kondisi']);
    $stok_barang = mysqli_real_escape_string($koneksi, $_POST['stok_barang']);
    $lokasi      = mysqli_real_escape_string($koneksi, $_POST['lokasi']);

    $query = "UPDATE barang SET 
                nama_barang = '$nama_barang', 
                jumlah      = '$jumlah', 
                kondisi     = '$kondisi', 
                stok_barang = '$stok_barang', 
                lokasi      = '$lokasi' 
              WHERE id_barang = '$id_barang'";

    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($koneksi);
    }
}

// Ambil data lama berdasarkan id_barang
$query_lama = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
$hasil_lama = mysqli_query($koneksi, $query_lama);
$data       = mysqli_fetch_assoc($hasil_lama);

// Jika data tidak ditemukan di database
if (!$data) {
    echo "Data barang tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" style="margin-top: 50px;">
        <h2>Form Edit Barang (ID: <?= htmlspecialchars($data['id_barang']); ?>)</h2>
        
        <form action="update_barang.php?id_barang=<?= urlencode($id_barang); ?>" method="POST">
            <label for="id_barang">ID Barang (Tidak dapat diubah)</label>
            <input type="text" id="id_barang" name="id_barang" value="<?= htmlspecialchars($data['id_barang']); ?>" disabled>

            <label for="nama_barang">Nama Barang</label>
            <input type="text" id="nama_barang" name="nama_barang" value="<?= htmlspecialchars($data['nama_barang']); ?>" required>

            <label for="jumlah">Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" value="<?= htmlspecialchars($data['jumlah']); ?>" required>

            <label for="kondisi">Kondisi</label>
            <input type="text" id="kondisi" name="kondisi" value="<?= htmlspecialchars($data['kondisi']); ?>" required>

            <label for="stok_barang">Stok Barang</label>
            <input type="number" id="stok_barang" name="stok_barang" value="<?= htmlspecialchars($data['stok_barang']); ?>" required>

            <label for="lokasi">Lokasi</label>
            <input type="text" id="lokasi" name="lokasi" value="<?= htmlspecialchars($data['lokasi']); ?>" required>

            <button type="submit" name="submit">Update Data</button>
            <a href="index.php" style="display:inline-block; margin-top:10px; text-align:center; color:#2563eb;">Batal</a>
        </form>
    </div>
</body>
</html>