<?php
include "koneksi.php";
$id = $_GET ['id'];
$query = "DELETE FORM barang WHERE id='$id";
mysqli_query ($koneksi,query);
header ("location : tampil.php");
exit;
?>