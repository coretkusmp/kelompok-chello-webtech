<?php
$title = 'Papan Skor';
require 'config/db.php';
$top = $pdo->query('SELECT nama, skor, benar, total FROM scores ORDER BY skor DESC LIMIT 10')->fetchAll();
require 'partials/header.php';
?>
<div class="card" style="text-align:center">
  <h1>🏆 Papan Skor</h1>
  <p><small>10 nilai tertinggi</small></p>
  <br><a class="btn" href="kuis.php">Main Lagi 🔄</a>
</div>
<div class="card">
  <?php if (!$top): ?><p>Belum ada skor. Jadilah yang pertama!</p>
  <?php else: ?>
  <table>
    <tr><th>#</th><th>Nama</th><th>Skor</th><th>Benar</th></tr>
    <?php foreach ($top as $i => $s): ?>
    <tr class="<?= $i === 0 ? 'top1' : ($i === 1 ? 'top2' : ($i === 2 ? 'top3' : '')) ?>">
      <td><?= $i === 0 ? '🥇' : ($i === 1 ? '🥈' : ($i === 2 ? '🥉' : $i + 1)) ?></td>
      <td><?= htmlspecialchars($s['nama']) ?></td>
      <td><?= (int)$s['skor'] ?></td>
      <td><?= (int)$s['benar'] ?>/<?= (int)$s['total'] ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
  <?php endif; ?>
</div>
<?php require 'partials/footer.php'; ?>
