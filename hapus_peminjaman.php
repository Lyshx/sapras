<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepared statement untuk menghapus transaksi peminjaman berdasarkan id_peminjaman
    $stmt = mysqli_prepare($koneksi, "DELETE FROM peminjaman WHERE id_peminjam = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        // Pop-up sukses dan kembali ke tampil_peminjam.php
        echo "<script>
                alert('Data peminjam berhasil dihapus!');
                window.location.href = 'tampil_peminjam.php';
              </script>";
        exit;
    } else {
        // Pop-up jika gagal[cite: 5]
        $error = mysqli_error($koneksi);
        echo "<script>
                alert('Gagal menghapus data peminjam: $error');
                window.location.href = 'tampil_peminjam.php';
              </script>";
    }
    mysqli_stmt_close($stmt);
} else {
    header("Location: tampil_peminjam.php");
    exit;
}
?>