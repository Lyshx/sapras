<?php
include "koneksi.php";

$id_barang_param = $_GET['id_barang'] ?? $_POST['id_barang'] ?? '';

if (isset($_POST['submit'])) {
    $id_barang   = mysqli_real_escape_string($koneksi, $_POST['id_barang']);
    $nama_barang = mysqli_real_escape_string($koneksi, $_POST['nama_barang']);
    $jumlah      = mysqli_real_escape_string($koneksi, $_POST['jumlah']);
    $kondisi     = mysqli_real_escape_string($koneksi, $_POST['kondisi']);
    $stok_barang = mysqli_real_escape_string($koneksi, $_POST['stok_barang']);
    $lokasi      = mysqli_real_escape_string($koneksi, $_POST['lokasi']);

    $query = "UPDATE barang SET 
                nama_barang = '$nama_barang', 
                jumlah = '$jumlah', 
                kondisi = '$kondisi', 
                stok_barang = '$stok_barang', 
                lokasi = '$lokasi' 
              WHERE id_barang = '$id_barang'";

    if (mysqli_query($koneksi, $query)) {
        header("Location: tampil_barang.php");
        exit;
    } else {
        $error = "Gagal memperbarui data: " . mysqli_error($koneksi);
    }
}

// Ambil data barang berdasarkan ID
$query_lama = "SELECT * FROM barang WHERE id_barang = '$id_barang_param'";
$hasil_lama = mysqli_query($koneksi, $query_lama);
$lama       = mysqli_fetch_assoc($hasil_lama);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Barang</title>
    <!-- FontAwesome untuk Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- CSS Internal (Satu File) -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f4f7fe;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .update-card {
            background: #ffffff;
            padding: 35px 40px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 550px;
        }

        .update-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .update-header h2 {
            color: #2b3674;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .update-header h2 i {
            color: #4318ff;
        }

        .update-header p {
            color: #707ebe;
            font-size: 14px;
        }

        .update-form {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row .form-group {
            flex: 1;
        }

        label {
            font-size: 13px;
            font-weight: 500;
            color: #2b3674;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        label i {
            color: #4318ff;
            font-size: 12px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e0e5f2;
            border-radius: 10px;
            font-size: 14px;
            color: #2b3674;
            background-color: #ffffff;
            transition: all 0.3s ease;
            outline: none;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #4318ff;
            box-shadow: 0 0 0 4px rgba(67, 24, 255, 0.1);
        }

        .input-readonly {
            background-color: #f4f7fe !important;
            color: #8f9bba !important;
            cursor: not-allowed;
        }

        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 10px;
        }

        .btn {
            flex: 1;
            padding: 12px 20px;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background-color: #4318ff;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #3311cc;
        }

        .btn-secondary {
            background-color: #f4f7fe;
            color: #2b3674;
        }

        .btn-secondary:hover {
            background-color: #e2e8f0;
        }

        .btn-zoom {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-zoom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(67, 24, 255, 0.2);
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .alert-danger {
            background-color: #ffe5e5;
            color: #e53935;
            border: 1px solid #ffcdd2;
        }

        @media (max-width: 480px) {
            .form-row {
                flex-direction: column;
            }
            .button-group {
                flex-direction: column;
            }
            .update-card {
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>

    <div class="update-card">
        <div class="update-header">
            <h2><i class="fa-solid fa-boxes-stacked"></i> Update Data Barang</h2>
            <p>Mohon lengkapi formulir di bawah ini untuk mengupdate data barang.</p>
        </div>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" class="update-form">
            <div class="form-group">
                <label><i class="fa-solid fa-barcode"></i> ID Barang</label>
                <input type="text" name="id_barang" value="<?php echo htmlspecialchars($lama['id_barang'] ?? ''); ?>" readonly class="input-readonly">
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-box"></i> Nama Barang</label>
                <input type="text" name="nama_barang" value="<?php echo htmlspecialchars($lama['nama_barang'] ?? ''); ?>" placeholder="Masukkan Nama Barang" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label><i class="fa-solid fa-layer-group"></i> Jumlah</label>
                    <input type="number" name="jumlah" value="<?php echo htmlspecialchars($lama['jumlah'] ?? ''); ?>" placeholder="0" required>
                </div>
                <div class="form-group">
                    <label><i class="fa-solid fa-cubes"></i> Stok Barang</label>
                    <input type="number" name="stok_barang" value="<?php echo htmlspecialchars($lama['stok_barang'] ?? ''); ?>" placeholder="0" required>
                </div>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-notes-medical"></i> Kondisi</label>
                <input type="text" name="kondisi" value="<?php echo htmlspecialchars($lama['kondisi'] ?? ''); ?>" placeholder="Contoh: Baik / Rusak Ringan" required>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-location-dot"></i> Lokasi</label>
                <input type="text" name="lokasi" value="<?php echo htmlspecialchars($lama['lokasi'] ?? ''); ?>" placeholder="Masukkan Lokasi Penyimpanan" required>
            </div>

            <div class="button-group">
                <button type="submit" name="submit" class="btn btn-primary btn-zoom">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                </button>
                <a href="tampil_barang.php" class="btn btn-secondary btn-zoom">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>

</body>
</html>