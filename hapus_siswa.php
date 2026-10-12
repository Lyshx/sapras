<?php
include "koneksi.php";
$nis = $_GET['nis'];
$query = "DELETE FROM siswa WHERE nis = '$nis'";
mysqli_query($koneksi, $query);
header("Location: tampil_siswa.php");
exit;
?>