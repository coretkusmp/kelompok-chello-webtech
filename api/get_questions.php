<?php
header('Content-Type: application/json');
require __DIR__ . '/../config/db.php';
$rows = $pdo->query('SELECT id, pertanyaan, opsi_a, opsi_b, opsi_c, opsi_d, jawaban FROM questions')->fetchAll();
shuffle($rows);
echo json_encode(array_slice($rows, 0, 10));
