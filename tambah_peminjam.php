<?php
include "koneksi.php";
if (isset($_POST['submit'])){
    $id_peminjam =$_POST['id_peminjam'];
    $hari =$_POST['hari'];
    $tanggal =$_POST['tanggal'];
    $jam_pinjam =$_POST['jam_pinjam'];
    $jam_selesai =$_POST['jam_selesai'];


    $query = "INSERT INTO peminjam
                (id_peminjam,hari,tanggal,jam_pinjam,jam_selesai) VALUES
                ('$id_peminjam','$hari','$tanggal','$jam_pinjam','$jam_selesai')";
    mysqli_query($koneksi,$query);
    header ("location: index.php");
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

            /* Background gradasi biru ke putih */
            background: linear-gradient(135deg, #2563eb, #ffffff);

            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            width: 300px;
            border-radius: 15px;

            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #2563eb;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            box-sizing: border-box;

            border: 1px solid #2563eb;
            border-radius: 8px;
            outline: none;
        }

        input:focus {
            border-color: #2563eb;
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
        }

        button:hover {
            background-color: #1b5e20;
        }
    </style>
</head>

<body>
    <form action="" method="POST">
    <h1>Tambah Peminjam</h1>
        <label for="id_peminjam">ID Peminjam</label>
        <input type="text" id="id_peminjam" name="id_peminjam" placeholder="Masukkan ID Peminjam">

        <label for="hari">Hari</label>
        <input type="text" id="hari" name="hari" placeholder="Masukkan Hari">

        <label for="tanggal">Tanggal</label>
        <input type="text" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal">

        <label for="jam_pinjam">Jam Pinjam</label>
        <input type="text" id="jam_pinjam" name="jam_pinjam" placeholder="Masukkan Jam Pinjam">

        <label for="jam_selesai">Jam Selesai</label>
        <input type="text" id="jam_selesai" name="jam_selesai" placeholder="Masukkan Jam Selesai">  
        
        <button type="submit" name="submit">Simpan</button>

    </form>
</body>
</html>