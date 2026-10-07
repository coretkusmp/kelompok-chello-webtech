CREATE DATABASE IF NOT EXISTS mini_quizizz CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE mini_quizizz;

CREATE TABLE IF NOT EXISTS questions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  pertanyaan TEXT NOT NULL,
  opsi_a VARCHAR(255) NOT NULL,
  opsi_b VARCHAR(255) NOT NULL,
  opsi_c VARCHAR(255) NOT NULL,
  opsi_d VARCHAR(255) NOT NULL,
  jawaban ENUM('A','B','C','D') NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS scores (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(50) NOT NULL,
  skor INT NOT NULL DEFAULT 0,
  benar INT NOT NULL DEFAULT 0,
  total INT NOT NULL DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_skor (skor DESC)
) ENGINE=InnoDB;

INSERT INTO questions (pertanyaan, opsi_a, opsi_b, opsi_c, opsi_d, jawaban) VALUES
('Tag pembuka yang benar untuk memulai kode PHP adalah...', '<?php', '<php>', '<script php>', '<??php', 'A'),
('Fungsi PHP untuk menampilkan teks ke layar adalah...', 'print_out()', 'echo', 'display()', 'show()', 'B'),
('Semua variabel di PHP diawali dengan simbol...', '#', '@', '$', '&', 'C'),
('Operator yang tepat untuk menggabungkan dua string di PHP adalah...', '+', '&&', '.', '||', 'C'),
('Supervariabel untuk mengambil data form dengan method POST adalah...', '$_GET', '$_POST', '$_SEND', '$_FORM', 'B'),
('Perulangan yang minimal dijalankan satu kali di PHP adalah...', 'for', 'while', 'do-while', 'foreach', 'C'),
('Fungsi untuk menghitung jumlah elemen array di PHP adalah...', 'len()', 'size()', 'count()', 'length()', 'C'),
('Cara yang benar mendefinisikan fungsi bernama sapa di PHP adalah...', 'func sapa() {}', 'function sapa() {}', 'def sapa():', 'fun sapa() {}', 'B'),
('Ekstensi PDO untuk koneksi database yang aman menggunakan...', 'mysql_connect()', 'new PDO()', 'db_open()', 'mysqli_old()', 'B'),
('Perintah untuk menyisipkan file header.php ke halaman lain adalah...', 'include "header.php";', 'import header.php', '#include header', 'load header.php', 'A');
