<?php
include "koneksi.php";
// 1. Koneksi ke Database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "sapras";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// 2. Ambil ID dari URL
if (!isset($_GET['id'])) {
    header("Location: index.php"); 
    exit();
}

$id = $_GET['id'];


$query = "SELECT * FROM barang WHERE id = '$id'"; 
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan!";
    exit();
}

if (isset($_POST['update'])) {
    $id =$_POST['id'];
    $id_barang =$_POST['id_barang'];
    $nama_barang =$_POST['nama_barang'];
    $jumlah =$_POST['jumlah'];
     $kondisi =$_POST['kondisi'];
      $stok_barang =$_POST['stok_barang'];
      $lokasi =$_POST['lokasi'];
    // Query untuk memperbarui data
    $update_query = "UPDATE barang SET id_barang = '$id_barang', nama_barang = '$nama_barang', jumlah = '$jumlah', kondisi = '$kondisi', stok_barang = '$stok_barang', lokasi = '$lokasi' WHERE id = '$id'";
    $execute = mysqli_query($koneksi, $update_query);

    if ($execute) {
        header("Location: index.php?status=success");
        exit();
    } else {
        $error = "Gagal memperbarui data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="email"] { width: 300px; padding: 8px; }
        button { padding: 8px 15px; background-color: #28a745; color: white; border: none; cursor: pointer; }
        .error { color: red; margin-bottom: 15px; }
    </style>
</head>
<body>

    <h2>Edit Data Pengguna</h2>

    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required>
        </div>

        <button type="submit" name="update">Simpan Perubahan</button>
        <a href="index.php">Batal</a>
    </form>

</body>
</html>