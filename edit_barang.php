<?php
require_once 'auth.php';
wajib_admin();
include "koneksi.php";
$nip = $_GET['id'] ?? $_GET['id_barang'] ?? $_POST['id_barang'] ?? '';

if (isset($_POST['submit'])) {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $kondisi = $_POST['kondisi'];
    $stok_barang = $_POST['stok'];
    $lokasi = $_POST['lokasi'];

    $stmt = mysqli_prepare($koneksi, "UPDATE barang SET nama_barang=?, jumlah=?, kondisi=?, stok_barang=?, lokasi=? WHERE id_barang=?");
    mysqli_stmt_bind_param($stmt, "ssssss", $nama_barang, $jumlah, $kondisi, $stok_barang, $lokasi, $id_barang);
    mysqli_stmt_execute($stmt);
    header("Location: tampil_barang.php");
    exit;
}
$stmt = mysqli_prepare($koneksi, "SELECT * FROM barang WHERE id_barang = ?");
mysqli_stmt_bind_param($stmt, "s", $nip);
mysqli_stmt_execute($stmt);
$lama = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
?>  
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Barang</title>
    <!-- FontAwesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        input[type="date"],
        input[type="time"] {
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
        input[type="date"]:focus,
        input[type="time"]:focus {
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
            border: 1px solid #e0e5f2;
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

        @media (max-width: 480px) {
            .button-group {
                flex-direction: column;
            }
            .update-card {
                padding: 25px 20px;
            }
        }
    </style>
    <link rel="stylesheet" href="responsive.css">
</head>
<body class="edit-form-page">

    <div class="update-card">
        <div class="update-header">
            <h2><i class="fa-solid fa-box-open"></i> Update Data Barang</h2>
            <p>Mohon lengkapi formulir di bawah ini untuk mengupdate data barang.</p>
        </div>

        <form action="" method="POST" class="update-form">
            <div class="form-group">
                <label><i class="fa-solid fa-id-card"></i> ID Barang</label>
                <input type="text" name="id_barang" class="input-readonly" value="<?php echo $lama['id_barang'] ?? ''; ?>" readonly placeholder="ID Barang">
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-calendar-day"></i> Nama Barang</label>
                <input type="text" name="nama_barang" value="<?php echo $lama['nama_barang'] ?? ''; ?>" placeholder="Masukkan Nama Barang">
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-calendar-alt"></i> Jumlah</label>
                <input type="number" name="jumlah" value="<?php echo $lama['jumlah'] ?? ''; ?>" placeholder="Masukkan Jumlah">
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-clock"></i> Kondisi</label>
                <input type="text" name="kondisi" value="<?php echo $lama['kondisi'] ?? ''; ?>" placeholder="Masukkan Kondisi">
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-clock-rotate-left"></i> Stok</label>
                <input type="number" name="stok" value="<?php echo $lama['stok_barang'] ?? ''; ?>" placeholder="Masukkan Stok">
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-clock-rotate-left"></i> Lokasi</label>
                <input type="text" name="lokasi" value="<?php echo $lama['lokasi'] ?? ''; ?>" placeholder="Masukkan Lokasi">
            </div>


            <div class="button-group">
                <button type="submit" name="submit" class="btn btn-primary btn-zoom">
                    <i class="fa-solid fa-save"></i> Update
                </button>
                <a href="tampil_barang.php" class="btn btn-secondary btn-zoom">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>

</body>
</html>