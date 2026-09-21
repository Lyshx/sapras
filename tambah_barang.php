<?php
include "koneksi.php";
if (isset($_POST['submit'])){
    $id_barang =$_POST['id_barang'];
    $nama_barang =$_POST['nama_barang'];
    $jumlah =$_POST['jumlah'];
     $kondisi =$_POST['kondisi'];
      $stok_barang =$_POST['stok_barang'];
      $lokasi =$_POST['lokasi'];

    $query = "INSERT INTO barang
                (id_barang,nama_barang,jumlah,kondisi,stok_barang,lokasi) VALUES
                ('$id_barang,$nama_barang,$jumlah,$kondisi,$stok_barang,$lokasi')";
    mysqli_query($koneksi,$query);
    header ("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang di sapras</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;

            /* Background gradasi hijau ke putih */
            background: linear-gradient(135deg, #2e7d32, #ffffff);

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
            color: #2e7d32;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            box-sizing: border-box;

            border: 1px solid #4caf50;
            border-radius: 8px;
            outline: none;
        }

        input:focus {
            border-color: #2e7d32;
            box-shadow: 0 0 5px rgba(46, 125, 50, 0.5);
        }

        button {
            width: 100%;
            padding: 12px;

            background-color: #2e7d32;
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

        <label for="id_barang">id_barang</label>
        <input type="text" id="id_barang" name="id_barang" placeholder="Masukkan id barang">

        <label for="">nama barang</label>
        <input type="text" id="nama_barang" name="nama_barang" placeholder="Masukkan nama barang">

        <label for="jumlah">jumlah</label>
        <input type="text" id="jumlah" name="jumlah" placeholder="Masukkan jumlah">

        <label for="kondisi">kondisi</label>
        <input type="text" id="kondisi" name="kondisi" placeholder="Masukkan kondisi">

        <label for="stok_barang">stok barang</label>
        <input type="text" id="stok_barang" name="stok_barang" placeholder="Masukkan stok barang">

        <label for="lokasi">lokasi</label>
        <input type="text" id="lokasi" name="lokasi" placeholder="Masukkan lokasi">




        <button type="submit" name="submit">Simpan</button>

    </form>
</body>
</html>