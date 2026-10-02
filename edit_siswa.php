<?php
include "koneksi.php";
$nip =$_GET['nis'] ?? $_POST['nis'] ?? '';
// var_dump($nip);
if (isset($_POST['submit'])) {
    $nis = $_POST['nis'];
    $nama_siswa= $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan'];
    $no_hp = $_POST['no_hp'];

    $query = "UPDATE peminjaman SET nis = '$nis', nama_siswa = '$nama_siswa', kelas = '$kelas', jenis_kelamin = '$jenis_kelamin', jurusan = '$jurusan', no_hp = '$no_hp' where nis ='$nip'";
    mysqli_query($koneksi, $query);
    header("Location:tampil_peminjaman.php");
    exit;
}
    $query_lama = "SELECT * FROM peminjaman WHERE nis ='$nip'";
    $hasil_lama = mysqli_query($koneksi, $query_lama);
    $lama = mysqli_fetch_assoc($hasil_lama);
   // var_dump($lama);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data siswa</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="update-card">
        <div class="update-header">
            <h2><i class="fa-solid fa-user-edit"></i> Update Data siswa</h2>
            <p>Mohon lengkapi formulir di bawah ini untuk mengupdate data siswa.</p>
        </div>
    <form action="" method="POST">
    <!-- Menggunakan isset/null coalescing agar tidak mencetak warning di value -->
    <input type="text" name="nis" value="<?php echo $lama['nis'] ?? ''; ?>" readonly placeholder="NIS">
    <input type="text" name="nama_siswa" value="<?php echo $lama['nama_siswa'] ?? ''; ?>" placeholder="Nama Siswa">
    <input type="text" name="kelas" value="<?php echo $lama['kelas'] ?? ''; ?>" placeholder="Kelas">
    <input type="text" name="jenis_kelamin" value="<?php echo $lama['jenis_kelamin'] ?? ''; ?>" placeholder="Jenis Kelamin">
    <input type="text" name="jurusan" value="<?php echo $lama['jurusan'] ?? ''; ?>" placeholder="Jurusan">
    <input type="text" name="no_hp" value="<?php echo $lama['no_hp'] ?? ''; ?>" placeholder="No HP">

    <button type="submit" name="submit" class="btn-zoom">Update</button>
    <a href="index.php" class="btn-back" class="btn-zoom">Kembali</a>
</form>
</body>
</html>