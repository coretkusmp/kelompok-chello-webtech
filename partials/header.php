<?php $title = $title ?? 'Mini-Quizizz'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($title) ?> | Mini-Quizizz</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav>
  <a class="logo" href="index.php">⚡ Mini-Quizizz</a>
  <a href="index.php">Beranda</a>
  <a href="belajar.php">Belajar</a>
  <a href="kuis.php">Kuis</a>
  <a href="tambah-soal.php">Soal</a>
  <a href="leaderboard.php">Skor</a>
</nav>
<div class="wrap">
