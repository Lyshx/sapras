<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepared statement untuk menghapus barang berdasarkan id_barang
    $stmt = mysqli_prepare($koneksi, "DELETE FROM barang WHERE id_barang = ?");
    mysqli_stmt_bind_param($stmt, "s", $id);

    if (mysqli_stmt_execute($stmt)) {
        // Pop-up pemberitahuan berhasil dan kembali ke tampil_barang.php
        echo "<script>
                alert('Data barang berhasil dihapus!✅');
                window.location.href = 'tampil_barang.php';
              </script>";
        exit;
    } else {
        // Pop-up pemberitahuan jika terjadi kegagalan[cite: 2]
        $error = mysqli_error($koneksi);
        echo "<script>
                alert('Gagal menghapus data barang: $error');
                window.location.href = 'tampil_barang.php';
              </script>";
    }
    mysqli_stmt_close($stmt);
} else {
    header("Location: tampil_barang.php");
    exit;
}
?>