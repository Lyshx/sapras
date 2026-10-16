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
    <title>Daftar Siswa</title>
    <!-- Bootstrap 5 CSS -->                
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .main-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            border: none;
        }

        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
        }

        .table thead {
            background-color: #1e293b;
            color: #ffffff;
        }

        .table th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 14px 16px;
            vertical-align: middle;
        }

        .table td {
            padding: 12px 16px;
            vertical-align: middle;
            color: #334155;
            font-size: 0.95rem;
        }

        .btn-action {
            border-radius: 6px;
            padding: 5px 10px;
            font-size: 0.85rem;
            transition: all 0.2s ease;
        }

        .btn-action:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <table class="table" border="1">
        <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>nis</th>
            <th>nama_siswa</th>
            <th>kelas</th>
            <th>jenis_kelamin</th>
            <th>jurusan</th>
            <th>no_hp</th>
        </tr>
        <?php foreach ($data as $d => $nilai): ?>
        <tbody>
        <tr>
            <td><?=  $d + 1; ?></td>
            <td><?= $nilai['nis']; ?></td>
            <td><?= $nilai['nama_siswa']; ?></td>
            <td><?= $nilai['kelas']; ?></td>
            <td><?= $nilai['jenis_kelamin']; ?></td>
            <td><?= $nilai['jurusan']; ?></td>
            <td><?= $nilai['no_hp']; ?></td>
        <td>
                <a href="edit_siswa.php?nis=<?= $nilai['nis']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="hapus_siswa.php?nis=<?= $nilai['nis']; ?>" class="btn btn-danger btn-sm">Hapus</a>
        </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
        </thead>
    </table>

<div class="container py-5">
    <div class="card main-card p-4">
        <!-- Header & Tambah Data -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold text-dark m-0">Daftar Data Siswa</h3>
                <p class="text-muted small m-0">Kelola data seluruh siswa tersimpan</p>
            </div>
            <a href="tambah_siswa.php" class="btn btn-primary fw-medium px-3 py-2">
                <i class="bi bi-plus-lg me-1"></i> Tambah Siswa
            </a>
        </div>

        <!-- Tabel Data -->
        <div class="table-responsive">
            <table class="table table-hover table-borderless align-middle mb-0">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">L/P</th>
                        <th>Jurusan</th>
                        <th>No. HP</th>
                        <th class="text-center" style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data)): ?>
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">Belum ada data siswa yang tersimpan.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($data as $index => $nilai): ?>
                        <tr>
                            <td class="text-center fw-bold text-muted"><?= $index + 1; ?></td>
                            <td><span class="badge bg-light text-dark border"><?= htmlspecialchars($nilai['nis']); ?></span></td>
                            <td class="fw-semibold text-dark"><?= htmlspecialchars($nilai['nama_siswa']); ?></td>
                            <td class="text-center"><?= htmlspecialchars($nilai['kelas']); ?></td>
                            <td class="text-center">
                                <?php 
                                    $jk = strtoupper($nilai['jenis_kelamin']);
                                    if ($jk == 'L' || $jk == 'LAKI-LAKI') {
                                        echo '<span class="badge bg-primary-subtle text-primary border border-primary-subtle">L</span>';
                                    } elseif ($jk == 'P' || $jk == 'PEREMPUAN') {
                                        echo '<span class="badge bg-danger-subtle text-danger border border-danger-subtle">P</span>';
                                    } else {
                                        echo htmlspecialchars($nilai['jenis_kelamin']);
                                    }
                                ?>
                            </td>
                            <td><?= htmlspecialchars($nilai['jurusan']); ?></td>
                            <td>
                                <i class="bi bi-telephone text-muted me-1"></i><?= htmlspecialchars($nilai['no_hp']); ?>
                            </td>
                            <td class="text-center">
                                <a href="edit_siswa.php?nis=<?= urlencode($nilai['nis']); ?>" class="btn btn-warning btn-action me-1 text-white" title="Edit Data">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="hapus_siswa.php?nis=<?= urlencode($nilai['nis']); ?>" class="btn btn-danger btn-action" title="Hapus Data" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?');">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>php
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
    <title>Daftar Siswa</title>
    <!-- Bootstrap 5 CSS -->                
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .main-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            border: none;
        }

        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
        }

        .table thead {
            background-color: #1e293b;
            color: #ffffff;
        }

        .table th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 14px 16px;
            vertical-align: middle;
        }

        .table td {
            padding: 12px 16px;
            vertical-align: middle;
            color: #334155;
            font-size: 0.95rem;
        }

        .btn-action {
            border-radius: 6px;
            padding: 5px 10px;
            font-size: 0.85rem;
            transition: all 0.2s ease;
        }

        .btn-action:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <table class="table" border="1">
        <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>nis</th>
            <th>nama_siswa</th>
            <th>kelas</th>
            <th>jenis_kelamin</th>
            <th>jurusan</th>
            <th>no_hp</th>
        </tr>
        <?php foreach ($data as $d => $nilai): ?>
        <tbody>
        <tr>
            <td><?=  $d + 1; ?></td>
            <td><?= $nilai['nis']; ?></td>
            <td><?= $nilai['nama_siswa']; ?></td>
            <td><?= $nilai['kelas']; ?></td>
            <td><?= $nilai['jenis_kelamin']; ?></td>
            <td><?= $nilai['jurusan']; ?></td>
            <td><?= $nilai['no_hp']; ?></td>
        <td>
                <a href="edit_siswa.php?nis=<?= $nilai['nis']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="hapus_siswa.php?nis=<?= $nilai['nis']; ?>" class="btn btn-danger btn-sm">Hapus</a>
        </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
        </thead>
    </table>

<div class="container py-5">
    <div class="card main-card p-4">
        <!-- Header & Tambah Data -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold text-dark m-0">Daftar Data Siswa</h3>
                <p class="text-muted small m-0">Kelola data seluruh siswa tersimpan</p>
            </div>
            <a href="tambah_siswa.php" class="btn btn-primary fw-medium px-3 py-2">
                <i class="bi bi-plus-lg me-1"></i> Tambah Siswa
            </a>
        </div>

        <!-- Tabel Data -->
        <div class="table-responsive">
            <table class="table table-hover table-borderless align-middle mb-0">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">L/P</th>
                        <th>Jurusan</th>
                        <th>No. HP</th>
                        <th class="text-center" style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data)): ?>
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">Belum ada data siswa yang tersimpan.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($data as $index => $nilai): ?>
                        <tr>
                            <td class="text-center fw-bold text-muted"><?= $index + 1; ?></td>
                            <td><span class="badge bg-light text-dark border"><?= htmlspecialchars($nilai['nis']); ?></span></td>
                            <td class="fw-semibold text-dark"><?= htmlspecialchars($nilai['nama_siswa']); ?></td>
                            <td class="text-center"><?= htmlspecialchars($nilai['kelas']); ?></td>
                            <td class="text-center">
                                <?php 
                                    $jk = strtoupper($nilai['jenis_kelamin']);
                                    if ($jk == 'L' || $jk == 'LAKI-LAKI') {
                                        echo '<span class="badge bg-primary-subtle text-primary border border-primary-subtle">L</span>';
                                    } elseif ($jk == 'P' || $jk == 'PEREMPUAN') {
                                        echo '<span class="badge bg-danger-subtle text-danger border border-danger-subtle">P</span>';
                                    } else {
                                        echo htmlspecialchars($nilai['jenis_kelamin']);
                                    }
                                ?>
                            </td>
                            <td><?= htmlspecialchars($nilai['jurusan']); ?></td>
                            <td>
                                <i class="bi bi-telephone text-muted me-1"></i><?= htmlspecialchars($nilai['no_hp']); ?>
                            </td>
                            <td class="text-center">
                                <a href="edit_siswa.php?nis=<?= urlencode($nilai['nis']); ?>" class="btn btn-warning btn-action me-1 text-white" title="Edit Data">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="hapus_siswa.php?nis=<?= urlencode($nilai['nis']); ?>" class="btn btn-danger btn-action" title="Hapus Data" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?');">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>