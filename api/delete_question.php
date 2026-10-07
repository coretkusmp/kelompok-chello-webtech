<?php
require __DIR__ . '/../config/db.php';
$id = (int)($_POST['id'] ?? 0);
if ($id > 0) {
  $pdo->prepare('DELETE FROM questions WHERE id = ?')->execute([$id]);
}
header('Location: ../tambah-soal.php');
