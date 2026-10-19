<?php
require_once 'auth.php';
wajib_admin();
include "koneksi.php";
$nis = $_GET['nis'];
$query = "DELETE FROM siswa WHERE nis = '$nis'";
mysqli_query($koneksi, $query);
header("Location: tampil_siswa.php");
exit;

if (isset($_GET['nis'])) {
    $nis = $_GET['nis'];

    $stmt = mysqli_prepare($koneksi, "DELETE FROM siswa WHERE nis = ?");
    mysqli_stmt_bind_param($stmt, "s", $nis);

    if (mysqli_stmt_execute($stmt)) {
        // Pop-up sukses dan kembali ke tampil_siswa.php
        echo "<script>
                alert('Data siswa berhasil dihapus!');
                window.location.href = 'tampil_siswa.php';
              </script>";
        exit;
    } else {
        // Pop-up jika gagal
        $error = mysqli_error($koneksi);
        echo "<script>
                alert('Gagal menghapus data siswa: $error');
                window.location.href = 'tampil_siswa.php';
              </script>";
    }
    mysqli_stmt_close($stmt);
} else {
    header("Location: index.php");
    exit;
}
