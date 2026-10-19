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
  $st=mysqli_prepare($koneksi,'SELECT COUNT(*) FROM users WHERE nama=? AND role=?');
  mysqli_stmt_bind_param($st,'ss',$nama,$role); mysqli_stmt_execute($st);
  mysqli_stmt_bind_result($st,$ada); mysqli_stmt_fetch($st); mysqli_stmt_close($st);
  if(mb_strlen($nama)<3) $err='Nama minimal 3 karakter.';
  elseif(strlen($pw)<6) $err='Password minimal 6 karakter.';
  elseif($pw!==($_POST['password2']??'')) $err='Ulangi password tidak sama.';
  elseif($role==='admin' && ($_POST['kode']??'')!==KODE_ADMIN) $err='Kode admin salah.';
  elseif($ada>0) $err='Nama sudah terdaftar.';
  else{
    $hash=password_hash($pw,PASSWORD_DEFAULT);
    $st=mysqli_prepare($koneksi,'INSERT INTO users(nama,password,role) VALUES(?,?,?)');
    mysqli_stmt_bind_param($st,'sss',$nama,$hash,$role); mysqli_stmt_execute($st);
    session_regenerate_id(true);
    $_SESSION=['uid'=>mysqli_insert_id($koneksi),'nama'=>$nama,'role'=>$role];
    header('Location: '.tujuan($role)); exit;
  }
}
?><!DOCTYPE html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Daftar - Sapras SMKN 1 Maja</title><link rel="stylesheet" href="auth.css"></head><body>
<div class="blob b1"></div><div class="blob b2"></div>
<div class="auth"><div class="card">
  <div class="logo"><div class="lg">S</div><div><h1>Sapras SMKN 1 Maja</h1><small>Sarana &amp; Prasarana Sekolah</small></div></div>
  <div class="seg"><a href="login.php">Masuk</a><a href="daftar.php" class="on">Daftar</a></div>
  <form method="post" autocomplete="off">
    <input type="hidden" name="t" value="<?= csrf() ?>">
    <div class="seg">
      <label><input type="radio" name="role" value="siswa" <?= $role==='siswa'?'checked':'' ?>><span>Siswa</span></label>
      <label><input type="radio" name="role" value="admin" <?= $role==='admin'?'checked':'' ?>><span>Admin</span></label>
    </div>
    <label>Nama</label><input name="nama" required placeholder="Masukkan nama" value="<?= e($_POST['nama']??'') ?>">
    <label>Password</label><input type="password" name="password" required placeholder="Masukkan password">
    <label>Ulangi Password</label><input type="password" name="password2" required placeholder="Ulangi password">
    <div id="fa"><label>Kode Admin</label><input name="kode" placeholder="Kode dari pihak sekolah"></div>
    <?php if($err): ?><div class="alert"><?= e($err) ?></div><?php endif; ?>
    <button class="b">Daftar Sekarang</button>
  </form>
</div></div>
<script>
const fa=document.getElementById('fa');
function t(){fa.style.display=document.querySelector('[name=role]:checked').value==='admin'?'':'none'}
document.querySelectorAll('[name=role]').forEach(x=>x.addEventListener('change',t));t();
</script></body></html>
