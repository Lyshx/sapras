-- Jalankan di database sapras yang sudah ada (tidak mengubah tabel lain)
CREATE TABLE IF NOT EXISTS users(
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(60) NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('admin','siswa') NOT NULL,
  UNIQUE KEY uq_nama_role(nama,role)
);
