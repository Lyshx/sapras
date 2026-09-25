<?php
include "koneksi.php";
$id_barang =$_GET['id_barang'] ?? null;
// var_dump ($id)
if (isset($_POST['submit'])){
    $nama_barang =$_POST['nama_barang'];
    $jumlah =$_POST['jumlah'];
     $kondisi =$_POST['kondisi'];
      $stok_barang =$_POST['stok_barang'];
      $lokasi =$_POST['lokasi'];

    $query = "UPDATE barang SET id_barang ='$id_barang' , nama_barang='$nama_barang' , kondisi='$kondisi' , stok_barang='$stok_barang' , lokasi='$lokasi' , where id = '$id'";
    mysqli_query($koneksi,$query);
    header ("location: index.php");
    exit;
}
$query_lama = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
$hasil_lama = mysqli_query  ($koneksi,$query_lama);
$data = mysqli_fetch_assoc ($hasil_lama);
// var_dump($lama)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
</head>
<body>
    <form action = "" method = "POST">
        <input type = "text" name = "id_barang"
        value = "<?php echo $data ['id_barang'];?>">
        <input type = "text" name = "nama_barang"
        value = "<?php echo $data ['nama_barang'];?>">
        <input type = "text" name = "jumlah"
        value = "<?php echo $data ['jumlah'];?>">
        <input type = "text" name = "kondisi"
        value = "<?php echo $data ['kondisi'];?>">
        <input type = "text" name = "stok_barang"
        value = "<?php echo $data ['stok_barang'];?>">
        <input type = "text" name = "lokasi"
        value = "<?php echo $data ['lokasi'];?>">
        <button type = "submit" name = "submit">update</button>
</form>
</body>
</html>