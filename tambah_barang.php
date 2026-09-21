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