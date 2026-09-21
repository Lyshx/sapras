<?php
include "koneksi.php";
$id =$_GET['id_barang'];
// var_dump ($id)
if (isset($_POST['submit'])){
    $nama_barang =$_POST['nama_barang'];
    $jumlah =$_POST['jumlah'];
     $kondisi =$_POST['kondisi'];
      $stok_barang =$_POST['stok_barang'];
      $lokasi =$_POST['lokasi'];

    $query = "UPDATE penjualan SET id_barang ='$id_barang' , nama_barang='$nama_barang' , kondisi='$kondisi' , stok_barang='$stok_barang' , lokasi='$lokasi' , where id = '$id'";
    mysqli_query($koneksi,$query);
    header ("location: index.php");
    exit;
}
$query_lama = "SELECT * FROM penjualan WHERE id = '$id'";
$hasil_lama = mysqli_query  ($koneksi,$query_lama);
$data = mysqli_fetch_assoc ($hasil_lama);
// var_dump($lama)
?>