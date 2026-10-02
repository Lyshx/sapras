<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepared statement untuk menghapus transaksi peminjaman berdasarkan id_peminjaman
    $stmt = mysqli_prepare($koneksi, "DELETE FROM peminjaman WHERE id_peminjaman = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: tampil_peminjaman.php");
        exit;
    } else {
        echo "Gagal menghapus data peminjaman: " . mysqli_error($koneksi);
    }
    mysqli_stmt_close($stmt);
} else {
    header("Location: tampil_peminjaman.php");
    exit;
}
?>