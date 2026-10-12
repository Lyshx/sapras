<?php
include "koneksi.php";
$query = "SELECT * FROM barang";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_all($hasil, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-3">Daftar Barang</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Stok Barang</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $d => $nilai): ?>
                <tr>
                    <td><?= $d + 1; ?></td>
                    <td><?= $nilai['id_barang']; ?></td>
                    <td><?= $nilai['nama_barang']; ?></td>
                    <td><?= $nilai['jumlah']; ?></td>
                    <td><?= $nilai['kondisi']; ?></td>
                    <td><?= $nilai['stok_barang']; ?></td>
                    <td><?= $nilai['lokasi']; ?></td>
                    <td>
                        <a href="edit_barang.php?id=<?= $nilai['id_barang']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus_barang.php?id=<?= $nilai['id_barang']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>