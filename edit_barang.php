<?php
include "koneksi.php";
$nip =$_GET['id_barang'] ?? $_POST['id_barang'] ?? '';
// var_dump($nip);
if (isset($_POST['submit'])) {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jenis_kelamin'];
    $kondisi = $_POST['jabatan'];
    $stok_barang = $_POST['stok_barang'];
    $lokasi = $_POST['lokasi'];

    $query = "UPDATE barang SET id_barang = '$id_barang', nama_barang = '$nama_barang', jumlah = '$jumlah', kondisi = '$kondisi', stok_barang = '$stok_barang', lokasi = '$lokasi' where id_barang ='$id_barang'";
    mysqli_query($koneksi, $query);
    header("Location:tampil_barang.php");
    exit;
}
    $query_lama = "SELECT * FROM barang WHERE id_barang ='$nip'";
    $hasil_lama = mysqli_query($koneksi, $query_lama);
    $lama = mysqli_fetch_assoc($hasil_lama);
   // var_dump($lama);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data barang</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="update-card">
        <div class="update-header">
            <h2><i class="fa-solid fa-user-edit"></i> Update Data barang</h2>
            <p>Mohon lengkapi formulir di bawah ini untuk mengupdate data barang.</p>
        </div>
    <form action="" method="POST">
    <!-- Menggunakan isset/null coalescing agar tidak mencetak warning di value -->
    <input type="text" name="id_barang" value="<?php echo $lama['id_barang'] ?? ''; ?>" readonly placeholder="ID Barang">
    <input type="text" name="nama_barang" value="<?php echo $lama['nama_barang'] ?? ''; ?>" placeholder="Nama Barang">
    <input type="number" name="jumlah" value="<?php echo $lama['jumlah'] ?? ''; ?>" placeholder="Jumlah">
    <input type="text" name="kondisi" value="<?php echo $lama['kondisi'] ?? ''; ?>" placeholder="Kondisi">
    <input type="number" name="stok_barang" value="<?php echo $lama['stok_barang'] ?? ''; ?>" placeholder="Stok Barang">
    <input type="text" name="lokasi" value="<?php echo $lama['lokasi'] ?? ''; ?>" placeholder="Lokasi">

    <button type="submit" name="submit" class="btn-zoom">Update</button>
    <a href="index.php" class="btn-back" class="btn-zoom">Kembali</a>
</form>
</body>
</html>