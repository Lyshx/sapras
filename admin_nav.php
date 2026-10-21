<?php // Menu navigasi admin. Dipanggil dari halaman tampil_* dengan include. ?>
<style>
.anav{display:flex;align-items:center;gap:6px;flex-wrap:wrap;padding:10px 20px;background:#fff;border-bottom:1px solid #dbe6fb;font-family:"Segoe UI",system-ui,sans-serif;position:sticky;top:0;z-index:50}
.anav b{color:#1d5fe0;margin-right:12px}
.anav a{padding:7px 14px;border-radius:99px;color:#0f1f3d;text-decoration:none;font-size:14px;font-weight:600;transition:.2s}
.anav a:hover{background:#eaf2ff;color:#1d5fe0}
.anav a.out{margin-left:auto;color:#d93a3a}
@media(max-width:600px){
  .anav{gap:4px;padding:10px 12px}
  .anav b{width:100%;margin:0 0 4px}
  .anav a{padding:8px 10px;font-size:13px}
  .anav a.out{margin-left:0}
}
</style>
<div class="anav"><b>Sapras</b>
  <a href="admin.php">Dashboard</a><a href="tampil_siswa.php">Siswa</a><a href="tampil_barang.php">Barang</a><a href="tampil_peminjaman.php">Peminjaman</a>
  <a class="out" href="logout.php">Keluar (<?= htmlspecialchars($_SESSION['nama']??'') ?>)</a>
</div>
