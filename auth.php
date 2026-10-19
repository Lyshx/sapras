<?php
// Taruh di folder yang sama dengan koneksi.php
if(session_status()===PHP_SESSION_NONE) session_start();
const KODE_ADMIN='SAPRAS-MAJA';          // kode wajib untuk daftar admin
const HALAMAN_ADMIN='admin.php';         // dashboard admin (file baru)
const HALAMAN_SISWA='index.php';         // lobby siswa (punya Anda)
function e($s){ return htmlspecialchars((string)$s,ENT_QUOTES,'UTF-8'); }
function csrf(){ if(empty($_SESSION['t']))$_SESSION['t']=bin2hex(random_bytes(16)); return $_SESSION['t']; }
function cek_csrf(){ if(!hash_equals($_SESSION['t']??'',$_POST['t']??''))die('Token tidak valid, muat ulang halaman.'); }
function tujuan($role){ return $role==='admin'?HALAMAN_ADMIN:HALAMAN_SISWA; }
function wajib_login(){ if(empty($_SESSION['uid'])){ header('Location: login.php'); exit; } }
function wajib_admin(){ wajib_login(); if($_SESSION['role']!=='admin'){ header('Location: '.HALAMAN_SISWA); exit; } }
function siapkan_users($k){
  mysqli_query($k,"CREATE TABLE IF NOT EXISTS users(id INT AUTO_INCREMENT PRIMARY KEY, nama VARCHAR(60) NOT NULL, password VARCHAR(255) NOT NULL, role ENUM('admin','siswa') NOT NULL, UNIQUE KEY uq_nama_role(nama,role))");
}
