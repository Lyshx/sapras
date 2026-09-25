<?php
include "koneksi.php";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = (int)$_GET['id'];

$query = "SELECT * FROM barang WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan!";
    exit();
}

if (isset($_POST['update'])) {
    $id = (int)$_POST['id'];
    $id_barang = trim($_POST['id_barang']);
    $nama_barang = trim($_POST['nama_barang']);
    $jumlah = trim($_POST['jumlah']);
    $kondisi = trim($_POST['kondisi']);
    $stok_barang = trim($_POST['stok_barang']);
    $lokasi = trim($_POST['lokasi']);

    $update_query = "UPDATE barang SET id_barang = ?, nama_barang = ?, jumlah = ?, kondisi = ?, stok_barang = ?, lokasi = ? WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $update_query);
    mysqli_stmt_bind_param($stmt, "sssssi", $id_barang, $nama_barang, $jumlah, $kondisi, $stok_barang, $lokasi, $id);

    if (mysqli_stmt_execute($stmt)) {
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
    <title>Edit Data Barang</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"] { width: 300px; padding: 8px; }
        button { padding: 8px 15px; background-color: #28a745; color: white; border: none; cursor: pointer; }
        .error { color: red; margin-bottom: 15px; }
        a { text-decoration: none; color: #333; }
    </style>
</head>
<body>

    <h2>Edit Data Barang</h2>

    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">

        <div class="form-group">
            <label for="id_barang">ID Barang:</label>
            <input type="text" id="id_barang" name="id_barang" value="<?php echo htmlspecialchars($data['id_barang']); ?>" required>
        </div>

        <div class="form-group">
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" id="nama_barang" name="nama_barang" value="<?php echo htmlspecialchars($data['nama_barang']); ?>" required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="text" id="jumlah" name="jumlah" value="<?php echo htmlspecialchars($data['jumlah']); ?>" required>
        </div>

        <div class="form-group">
            <label for="kondisi">Kondisi:</label>
            <input type="text" id="kondisi" name="kondisi" value="<?php echo htmlspecialchars($data['kondisi']); ?>" required>
        </div>

        <div class="form-group">
            <label for="stok_barang">Stok Barang:</label>
            <input type="text" id="stok_barang" name="stok_barang" value="<?php echo htmlspecialchars($data['stok_barang']); ?>" required>
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi:</label>
            <input type="text" id="lokasi" name="lokasi" value="<?php echo htmlspecialchars($data['lokasi']); ?>" required>
        </div>

        <button type="submit" name="update">Simpan Perubahan</button>
        <a href="index.php">Batal</a>
    </form>

</body>
</html>