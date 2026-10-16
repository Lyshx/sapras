<?php
include "koneksi.php";
if (isset($_POST['submit'])){
    $id = $_POST['id'];
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan'];
    $no_hp = $_POST['no_hp'];

    $query = "INSERT INTO siswa (id, nis, nama_siswa, kelas, jenis_kelamin, jurusan, no_hp) 
              VALUES ('$id', '$nis', '$nama_siswa', '$kelas', '$jenis_kelamin', '$jurusan', '$no_hp')";
    
    // Eksekusi query dengan penanganan error & diarahkan ke tampil_siswa.php
    if (mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Data siswa berhasil ditambahkan!');
                window.location.href = 'tampil_siswa.php';
              </script>";
        exit();
    } else {
        echo "<script>alert('Gagal menambah data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #2563eb, #ffffff);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            width: 320px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 24px;
            text-align: center;
            color: #1e293b;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #2563eb;
            font-size: 14px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #2563eb;
            border-radius: 8px;
            outline: none;
            background-color: #fff;
        }

        input:focus, select:focus {
            border-color: #1b5e20;
            box-shadow: 0 0 5px rgba(37, 99, 235, 0.5);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        button:hover {
            background-color: #1b5e20;
        }
    </style>
</head>

<body>
    <form action="" method="POST">
        <h1>Tambah Siswa</h1>
        
        <label for="id">ID</label>
        <input type="text" id="id" name="id" placeholder="Masukkan ID" required>

        <label for="nis">NIS</label>
        <input type="text" id="nis" name="nis" placeholder="Masukkan NIS" required>

        <label for="nama_siswa">Nama Siswa</label>
        <input type="text" id="nama_siswa" name="nama_siswa" placeholder="Masukkan nama siswa" required>

        <label for="kelas">Kelas</label>
        <input type="text" id="kelas" name="kelas" placeholder="Masukkan kelas" required>

        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label for="jurusan">Jurusan</label>
        <input type="text" id="jurusan" name="jurusan" placeholder="Masukkan jurusan" required>

        <label for="no_hp">No HP</label>
        <input type="text" id="no_hp" name="no_hp" placeholder="Masukkan no hp">

        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>php
include "koneksi.php";
if (isset($_POST['submit'])){
    $id = $_POST['id'];
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan'];
    $no_hp = $_POST['no_hp'];

    $query = "INSERT INTO siswa (id, nis, nama_siswa, kelas, jenis_kelamin, jurusan, no_hp) 
              VALUES ('$id', '$nis', '$nama_siswa', '$kelas', '$jenis_kelamin', '$jurusan', '$no_hp')";
    
    // Eksekusi query dengan penanganan error & diarahkan ke tampil_siswa.php
    if (mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Data siswa berhasil ditambahkan!');
                window.location.href = 'tampil_siswa.php';
              </script>";
        exit();
    } else {
        echo "<script>alert('Gagal menambah data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #2563eb, #ffffff);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            width: 320px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 24px;
            text-align: center;
            color: #1e293b;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #2563eb;
            font-size: 14px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #2563eb;
            border-radius: 8px;
            outline: none;
            background-color: #fff;
        }

        input:focus, select:focus {
            border-color: #1b5e20;
            box-shadow: 0 0 5px rgba(37, 99, 235, 0.5);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        button:hover {
            background-color: #1b5e20;
        }
    </style>
</head>

<body>
    <form action="" method="POST">
        <h1>Tambah Siswa</h1>
        
        <label for="id">ID</label>
        <input type="text" id="id" name="id" placeholder="Masukkan ID" required>

        <label for="nis">NIS</label>
        <input type="text" id="nis" name="nis" placeholder="Masukkan NIS" required>

        <label for="nama_siswa">Nama Siswa</label>
        <input type="text" id="nama_siswa" name="nama_siswa" placeholder="Masukkan nama siswa" required>

        <label for="kelas">Kelas</label>
        <input type="text" id="kelas" name="kelas" placeholder="Masukkan kelas" required>

        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label for="jurusan">Jurusan</label>
        <input type="text" id="jurusan" name="jurusan" placeholder="Masukkan jurusan" required>

        <label for="no_hp">No HP</label>
        <input type="text" id="no_hp" name="no_hp" placeholder="Masukkan no hp">

        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>