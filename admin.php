<?php
require_once 'koneksi.php';   // variabel koneksinya: $koneksi
require_once 'auth.php';
wajib_admin();

// Ganti nama tabel di sini kalau di database Anda berbeda
$menu=[
  ['Siswa',     'siswa',      'tampil_siswa.php',      'tambah_siswa.php',      'S'],
  ['Barang',    'barang',     'tampil_barang.php',     'tambah_barang.php',     'B'],
  ['Peminjaman','peminjaman', 'tampil_peminjaman.php', 'tambah_peminjaman.php', 'P'],
];
function hitung($k,$t){
  try{ $r=mysqli_query($k,"SELECT COUNT(*) AS c FROM `$t`"); return (int)mysqli_fetch_assoc($r)['c']; }
  catch(Throwable $x){ return '-'; }
}
?><!DOCTYPE html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Admin - Sapras SMKN 1 Maja</title><link rel="stylesheet" href="admin.css"></head><body>
<div class="blob b1"></div><div class="blob b2"></div>
<div class="page">
  <div class="top">
    <div class="logo"><div class="lg">S</div><div><h1>Sapras SMKN 1 Maja</h1><small>Panel Admin</small></div></div>
    <div class="who"><span class="chip"><?= e($_SESSION['nama']) ?> · Admin</span><a class="btn gh" href="logout.php">Keluar</a></div>
  </div>
  <div class="wrap">
    <div class="hero"><h2>Selamat datang, <?= e($_SESSION['nama']) ?>!</h2><p>Kelola data siswa, barang, dan peminjaman sarana prasarana sekolah.</p></div>
    <div class="grid">
      <?php foreach($menu as $i=>$m): ?>
      <div class="card" style="animation-delay:<?= $i*80 ?>ms">
        <div class="ic"><?= $m[4] ?></div>
        <b class="n" data-n="<?= hitung($koneksi,$m[1]) ?>">0</b>
        <span>Data <?= $m[0] ?></span>
        <div class="row"><a class="btn" href="<?= $m[2] ?>">Lihat Tabel</a><a class="btn gh" href="<?= $m[3] ?>">+ Tambah</a></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<script>
document.querySelectorAll('[data-n]').forEach(e=>{const n=+e.dataset.n;if(isNaN(n)){e.textContent='-';return}let i=0;const t=setInterval(()=>{i+=Math.max(1,Math.ceil(n/20));if(i>=n){i=n;clearInterval(t)}e.textContent=i},30)});
</script></body></html>
