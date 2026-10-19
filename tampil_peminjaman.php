<?php
include "koneksi.php";
$query = "SELECT * FROM peminjaman";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_all($hasil, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peminjaman</title>
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
            <th>id_peminjam</th>
            <th>hari</th>
            <th>tanggal</th>
            <th>jam_pinjam</th>
            <th>jam_selesai</th>
        </tr>
        <?php foreach ($data as $d => $nilai): ?>
        <tbody>
        <tr>
            <td><?=  $d + 1; ?></td>
            <td><?= $nilai['id_peminjam']; ?></td>
            <td><?= $nilai['hari']; ?></td>
            <td><?= $nilai['tanggal']; ?></td>
            <td><?= $nilai['jam_pinjam']; ?></td>
            <td><?= $nilai['jam_selesai']; ?></td>
        <td>
                <a href="edit_peminjaman.php?id_peminjam=<?= $nilai['id_peminjam']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="hapus_peminjaman.php?id=<?= $nilai['id_peminjam']; ?>" class="btn btn-danger btn-sm">Hapus</a>
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
                <h3 class="fw-bold text-dark m-0">Daftar Peminjaman</h3>
                <p class="text-muted small m-0">Kelola riwayat dan jadwal peminjaman barang</p>
            </div>
            <a href="tambah_peminjaman.php" class="btn btn-primary fw-medium px-3 py-2">
                <i class="bi bi-plus-lg me-1"></i> Tambah Peminjaman
            </a>
        </div>

        <!-- Tabel Data -->
        <div class="table-responsive">
            <table class="table table-hover table-borderless align-middle mb-0">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">No</th>
                        <th>ID Peminjam</th>
                        <th class="text-center">Hari</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Jam Pinjam</th>
                        <th class="text-center">Jam Selesai</th>
                        <th class="text-center" style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data)): ?>
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Belum ada data peminjaman yang tersimpan.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($data as $index => $nilai): ?>
                        <tr>
                            <td class="text-center fw-bold text-muted"><?= $index + 1; ?></td>
                            <td><span class="badge bg-light text-dark border"><?= htmlspecialchars($nilai['id_peminjam']); ?></span></td>
                            <td class="text-center fw-semibold"><?= htmlspecialchars($nilai['hari']); ?></td>
                            <td class="text-center">
                                <i class="bi bi-calendar-event text-muted me-1"></i><?= htmlspecialchars($nilai['tanggal']); ?>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-info-subtle text-info-emphasis border border-info-subtle">
                                    <i class="bi bi-clock me-1"></i><?= htmlspecialchars($nilai['jam_pinjam']); ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-secondary-subtle text-secondary-emphasis border border-secondary-subtle">
                                    <i class="bi bi-clock-history me-1"></i><?= htmlspecialchars($nilai['jam_selesai']); ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="edit_peminjaman.php?id_peminjam=<?= urlencode($nilai['id_peminjam'] ?? $nilai['id_peminjam']); ?>" class="btn btn-warning btn-action me-1 text-white" title="Edit Data">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="hapus_peminjaman.php?id=<?= urlencode($nilai['id_peminjam'] ?? $nilai['id_peminjam']); ?>" class="btn btn-danger btn-action" title="Hapus Data" onclick="return confirm('Apakah Anda yakin ingin menghapus data peminjaman ini?');">
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