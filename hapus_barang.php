<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepared statement untuk menghapus barang berdasarkan id_barang
    $stmt = mysqli_prepare($koneksi, "DELETE FROM barang WHERE id_barang = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: tampil_barang.php");
        exit;
    } else {
        echo "Gagal menghapus data barang: " . mysqli_error($koneksi);
    }
    mysqli_stmt_close($stmt);
} else {
    header("Location: tampil_barang.php");
    exit;
}
?>