<?php
include "koneksi.php";
$nis = $_GET['nis'] ?? $_POST['nis'] ?? '';
// var_dump($nip);
if (isset($_POST['submit'])) {
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan'];
    $no_hp = $_POST['no_hp'];

    $query = "UPDATE siswa SET nis = '$nis', nama_siswa = '$nama_siswa', kelas = '$kelas', jenis_kelamin = '$jenis_kelamin', jurusan = '$jurusan', no_hp = '$no_hp' WHERE nis = '$nis'";
    mysqli_query($koneksi, $query);
    header("Location:tampil_siswa.php");
    exit;
}
    $query_lama = "SELECT * FROM siswa WHERE nis = '$nis'";
    $hasil_lama = mysqli_query($koneksi, $query_lama);
    $lama = mysqli_fetch_assoc($hasil_lama);
   // var_dump($lama);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Siswa</title>
    <!-- FontAwesome untuk Icon -->
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
            <h2><i class="fa-solid fa-user-edit"></i> Update Data Siswa</h2>
            <p>Mohon lengkapi formulir di bawah ini untuk mengupdate data siswa.</p>
        </div>
        
        <form action="" method="POST" class="update-form">
            <div class="form-group">
                <label><i class="fa-solid fa-id-card"></i> NIS</label>
                <input type="text" name="nis" class="input-readonly" value="<?php echo $lama['nis'] ?? ''; ?>" readonly placeholder="NIS">
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-user"></i> Nama Siswa</label>
                <input type="text" name="nama_siswa" value="<?php echo $lama['nama_siswa'] ?? ''; ?>" placeholder="Masukkan Nama Siswa" required>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-school"></i> Kelas</label>
                <input type="text" name="kelas" value="<?php echo $lama['kelas'] ?? ''; ?>" placeholder="Masukkan Kelas" required>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-venus-mars"></i> Jenis Kelamin</label>
                <input type="text" name="jenis_kelamin" value="<?php echo $lama['jenis_kelamin'] ?? ''; ?>" placeholder="Masukkan Jenis Kelamin" required>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-book"></i> Jurusan</label>
                <input type="text" name="jurusan" value="<?php echo $lama['jurusan'] ?? ''; ?>" placeholder="Masukkan Jurusan" required>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-phone"></i> No HP</label>
                <input type="text" name="no_hp" value="<?php echo $lama['no_hp'] ?? ''; ?>" placeholder="Masukkan No HP" required>
            </div>

            <div class="button-group">
                <button type="submit" name="submit" class="btn btn-primary btn-zoom">
                    <i class="fa-solid fa-save"></i> Update
                </button>
                <a href="tampil_siswa.php" class="btn btn-secondary btn-zoom">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</body>
</html>