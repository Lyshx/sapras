<?php
include "koneksi.php";
$query = "SELECT * FROM siswa";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_all($hasil, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-3">Daftar Siswa</h2>
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Jenis Kelamin</th>
                    <th>Jurusan</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $d => $nilai): ?>
                <tr>
                    <td><?= $d + 1; ?></td>
                    <td><?= $nilai['nis']; ?></td>
                    <td><?= $nilai['nama_siswa']; ?></td>
                    <td><?= $nilai['kelas']; ?></td>
                    <td><?= $nilai['jenis_kelamin']; ?></td>
                    <td><?= $nilai['jurusan']; ?></td>
                    <td><?= $nilai['no_hp']; ?></td>
                    <td>
                        <!-- Sesuaikan 'nis' di bawah ini dengan nama kolom primary key database jika berbeda -->
                        <a href="edit_siswa.php?nis=<?= $nilai['nis']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus_siswa.php?nis=<?= $nilai['nis']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>