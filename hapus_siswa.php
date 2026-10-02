<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepared statement untuk menghapus siswa berdasarkan id_siswa
    $stmt = mysqli_prepare($koneksi, "DELETE FROM siswa WHERE id_siswa = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: tampil_siswa.php");
        exit;
    } else {
        echo "Gagal menghapus data siswa: " . mysqli_error($koneksi);
    }
    mysqli_stmt_close($stmt);
} else {
    header("Location: tampil_siswa.php");
    exit;
}
?>