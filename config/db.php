<?php
$host = '127.0.0.1';
$db   = 'mini_quizizz';
$user = 'quizizz';
$pass = 'quizizz123';
try {
  $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  ]);
} catch (PDOException $e) {
  http_response_code(500);
  exit('Koneksi DB gagal.');
}
