<?php
include "koneksi.php";
$query = "SELECT * FROM barang";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_all($hasil, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <table class="table" border="1">
        <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Id_barang</th>
            <th>Nama_Barang</th>
            <th>Jumlah</th>
            <th>Kondisi</th>
            <th>Stok_Barang</th>
            <th>Lokasi</th>
        </tr>
        <?php foreach ($data as $d => $nilai): ?>
        <tbody>
        <tr>
            <td><?=  $d + 1; ?></td>
            <td><?= $nilai['id_barang']; ?></td>
            <td><?= $nilai['nama_barang']; ?></td>
            <td><?= $nilai['jumlah']; ?></td>
            <td><?= $nilai['kondisi']; ?></td>
            <td><?= $nilai['stok_barang']; ?></td>
            <td><?= $nilai['lokasi']; ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
        </thead>
    </table>
</body>
</html>