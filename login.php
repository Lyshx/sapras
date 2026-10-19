<?php
require_once 'koneksi.php';   // pastikan variabel koneksinya bernama $koneksi
require_once 'auth.php';
siapkan_users($koneksi);
if(!empty($_SESSION['uid'])){ header('Location: '.tujuan($_SESSION['role'])); exit; }
$err=''; $role='siswa';
if($_SERVER['REQUEST_METHOD']==='POST'){
  cek_csrf();
  $role=($_POST['role']??'')==='admin'?'admin':'siswa';
  $nama=trim($_POST['nama']??''); $pw=$_POST['password']??'';
  $st=mysqli_prepare($koneksi,'SELECT id,nama,password,role FROM users WHERE nama=? AND role=?');
  mysqli_stmt_bind_param($st,'ss',$nama,$role); mysqli_stmt_execute($st);
  $u=mysqli_fetch_assoc(mysqli_stmt_get_result($st));
  if($u && password_verify($pw,$u['password'])){
    session_regenerate_id(true);
    $_SESSION=['uid'=>$u['id'],'nama'=>$u['nama'],'role'=>$u['role']];
    header('Location: '.tujuan($role)); exit;
  }
  $err='Nama atau password salah.';
}
?><!DOCTYPE html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Masuk - Sapras SMKN 1 Maja</title><link rel="stylesheet" href="auth.css"></head><body>
<div class="blob b1"></div><div class="blob b2"></div>
<div class="auth"><div class="card">
  <div class="logo"><div class="lg">S</div><div><h1>Sapras SMKN 1 Maja</h1><small>Sarana &amp; Prasarana Sekolah</small></div></div>
  <div class="seg"><a href="login.php" class="on">Masuk</a><a href="daftar.php">Daftar</a></div>
  <form method="post" autocomplete="off">
    <input type="hidden" name="t" value="<?= csrf() ?>">
    <div class="seg">
      <label><input type="radio" name="role" value="siswa" <?= $role==='siswa'?'checked':'' ?>><span>Siswa</span></label>
      <label><input type="radio" name="role" value="admin" <?= $role==='admin'?'checked':'' ?>><span>Admin</span></label>
    </div>
    <label>Nama</label><input name="nama" required placeholder="Masukkan nama" value="<?= e($_POST['nama']??'') ?>">
    <label>Password</label><input type="password" name="password" required placeholder="Masukkan password">
    <?php if($err): ?><div class="alert"><?= e($err) ?></div><?php endif; ?>
    <button class="b">Masuk</button>
  </form>
</div></div></body></html>
