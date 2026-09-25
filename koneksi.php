<?php
$koneksi = mysqli_connect("localhost", "root", "", "sapras");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>