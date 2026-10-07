<?php
header('Content-Type: application/json');
require __DIR__ . '/../config/db.php';
$d = json_decode(file_get_contents('php://input'), true) ?? [];
$nama  = trim($d['nama'] ?? '');
$skor  = $d['skor'] ?? -1;
$benar = $d['benar'] ?? -1;
$total = $d['total'] ?? -1;
if ($nama === '' || strlen($nama) > 50 || !is_int($skor) || $skor < 0 || !is_int($benar) || $benar < 0 || !is_int($total) || $total <= 0 || $benar > $total) {
  http_response_code(400);
  echo json_encode(['error' => 'Data skor tidak valid']);
  exit;
}
$stmt = $pdo->prepare('INSERT INTO scores (nama, skor, benar, total) VALUES (?, ?, ?, ?)');
$stmt->execute([$nama, $skor, $benar, $total]);
echo json_encode(['ok' => true]);
