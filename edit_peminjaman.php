<?php
include "koneksi.php";
$nip = $_GET['id_peminjam'] ?? $_POST['id_peminjam'] ?? '';

if (isset($_POST['submit'])) {
    $id_peminjaman = $_POST['id_peminjam'];
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $jam_pinjam = $_POST['jam_pinjam'];
    $jam_selesai = $_POST['jam_selesai'];

    $query = "UPDATE peminjaman SET hari='$hari', tanggal='$tanggal', jam_pinjam='$jam_pinjam', jam_selesai='$jam_selesai' WHERE id_peminjam='$nip'";
    mysqli_query($koneksi, $query);
    header("Location:tampil_peminjam.php");
    exit;
}

$query_lama = "SELECT * FROM peminjaman WHERE id_peminjam = '$nip'";
$hasil_lama = mysqli_query($koneksi, $query_lama);
$lama = mysqli_fetch_assoc($hasil_lama);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Peminjam</title>
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
</head>
<body>

    <div class="update-card">
        <div class="update-header">
            <h2><i class="fa-solid fa-user-edit"></i> Update Data Peminjaman</h2>
            <p>Mohon lengkapi formulir di bawah ini untuk mengupdate data peminjaman[cite: 1].</p>
        </div>

        <form action="" method="POST" class="update-form">
            <div class="form-group">
                <label><i class="fa-solid id-card"></i> ID Peminjam</label>
                <input type="text" name="id_peminjam" class="input-readonly" value="<?php echo $lama['id_peminjam'] ?? ''; ?>" readonly placeholder="ID Peminjam"[cite: 1]>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-calendar-day"></i> Hari</label>
                <input type="text" name="hari" value="<?php echo $lama['hari'] ?? ''; ?>" placeholder="Masukkan Hari"[cite: 1]>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-calendar-alt"></i> Tanggal</label>
                <input type="date" name="tanggal" value="<?php echo $lama['tanggal'] ?? ''; ?>"[cite: 1]>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-clock"></i> Jam Pinjam</label>
                <input type="time" name="jam_pinjam" value="<?php echo $lama['jam_pinjam'] ?? ''; ?>"[cite: 1]>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-clock-rotate-left"></i> Jam Selesai</label>
                <input type="time" name="jam_selesai" value="<?php echo $lama['jam_selesai'] ?? ''; ?>"[cite: 1]>
            </div>

            <div class="button-group">
                <button type="submit" name="submit" class="btn btn-primary btn-zoom">
                    <i class="fa-solid fa-save"></i> Update
                </button>
                <a href="tampil_peminjam.php" class="btn btn-secondary btn-zoom">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>

</body>
</html>php
include "koneksi.php";
$nip = $_GET['id_peminjam'] ?? $_POST['id_peminjam'] ?? '';

if (isset($_POST['submit'])) {
    $id_peminjaman = $_POST['id_peminjam'];
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $jam_pinjam = $_POST['jam_pinjam'];
    $jam_selesai = $_POST['jam_selesai'];

    $query = "UPDATE peminjaman SET hari='$hari', tanggal='$tanggal', jam_pinjam='$jam_pinjam', jam_selesai='$jam_selesai' WHERE id_peminjam='$nip'";
    mysqli_query($koneksi, $query);
    header("Location:tampil_peminjam.php");
    exit;
}

$query_lama = "SELECT * FROM peminjaman WHERE id_peminjam = '$nip'";
$hasil_lama = mysqli_query($koneksi, $query_lama);
$lama = mysqli_fetch_assoc($hasil_lama);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Peminjam</title>
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
</head>
<body>

    <div class="update-card">
        <div class="update-header">
            <h2><i class="fa-solid fa-user-edit"></i> Update Data Peminjaman</h2>
            <p>Mohon lengkapi formulir di bawah ini untuk mengupdate data peminjaman[cite: 1].</p>
        </div>

        <form action="" method="POST" class="update-form">
            <div class="form-group">
                <label><i class="fa-solid id-card"></i> ID Peminjam</label>
                <input type="text" name="id_peminjam" class="input-readonly" value="<?php echo $lama['id_peminjam'] ?? ''; ?>" readonly placeholder="ID Peminjam"[cite: 1]>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-calendar-day"></i> Hari</label>
                <input type="text" name="hari" value="<?php echo $lama['hari'] ?? ''; ?>" placeholder="Masukkan Hari"[cite: 1]>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-calendar-alt"></i> Tanggal</label>
                <input type="date" name="tanggal" value="<?php echo $lama['tanggal'] ?? ''; ?>"[cite: 1]>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-clock"></i> Jam Pinjam</label>
                <input type="time" name="jam_pinjam" value="<?php echo $lama['jam_pinjam'] ?? ''; ?>"[cite: 1]>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-clock-rotate-left"></i> Jam Selesai</label>
                <input type="time" name="jam_selesai" value="<?php echo $lama['jam_selesai'] ?? ''; ?>"[cite: 1]>
            </div>

            <div class="button-group">
                <button type="submit" name="submit" class="btn btn-primary btn-zoom">
                    <i class="fa-solid fa-save"></i> Update
                </button>
                <a href="tampil_peminjam.php" class="btn btn-secondary btn-zoom">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>

</body>
</html>