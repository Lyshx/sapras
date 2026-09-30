<?php
include "koneksi.php";
$nip =$_GET['id_peminjaman'] ?? $_POST['id_peminjaman'] ?? '';
// var_dump($nip);
if (isset($_POST['submit'])) {
    $id_peminjaman = $_POST['id_peminjaman'];
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $jam_pinjam = $_POST['jam_pinjam'];
    $jam_selesai = $_POST['jam_selesai'];

    $query = "UPDATE peminjaman SET id_peminjaman = '$id_peminjaman', hari = '$hari', tanggal = '$tanggal', jam_pinjam = '$jam_pinjam', jam_selesai = '$jam_selesai' where id_peminjaman ='$id_peminjaman'";
    mysqli_query($koneksi, $query);
    header("Location:tampil_peminjaman.php");
    exit;
}
    $query_lama = "SELECT * FROM peminjaman WHERE id_peminjaman ='$nip'";
    $hasil_lama = mysqli_query($koneksi, $query_lama);
    $lama = mysqli_fetch_assoc($hasil_lama);
   // var_dump($lama);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data peminjaman</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="update-card">
        <div class="update-header">
            <h2><i class="fa-solid fa-user-edit"></i> Update Data peminjaman</h2>
            <p>Mohon lengkapi formulir di bawah ini untuk mengupdate data peminjaman.</p>
        </div>
    <form action="" method="POST">
    <!-- Menggunakan isset/null coalescing agar tidak mencetak warning di value -->
    <input type="text" name="id_peminjaman" value="<?php echo $lama['id_peminjaman'] ?? ''; ?>" readonly placeholder="ID Peminjaman">
    <input type="text" name="hari" value="<?php echo $lama['hari'] ?? ''; ?>" placeholder="Hari">
    <input type="date" name="tanggal" value="<?php echo $lama['tanggal'] ?? ''; ?>" placeholder="Tanggal">
    <input type="time" name="jam_pinjam" value="<?php echo $lama['jam_pinjam'] ?? ''; ?>" placeholder="Jam Pinjam">
    <input type="time" name="jam_selesai" value="<?php echo $lama['jam_selesai'] ?? ''; ?>" placeholder="Jam Selesai">

    <button type="submit" name="submit" class="btn-zoom">Update</button>
    <a href="index.php" class="btn-back" class="btn-zoom">Kembali</a>
</form>
</body>
</html>