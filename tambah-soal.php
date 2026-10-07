<?php
$title = 'Kelola Soal';
require 'config/db.php';
$msg = '';
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST' && isset($_POST['pertanyaan'])) {
  $p = trim($_POST['pertanyaan'] ?? '');
  $a = trim($_POST['opsi_a'] ?? '');
  $b = trim($_POST['opsi_b'] ?? '');
  $c = trim($_POST['opsi_c'] ?? '');
  $d = trim($_POST['opsi_d'] ?? '');
  $j = $_POST['jawaban'] ?? '';
  if ($p !== '' && $a !== '' && $b !== '' && $c !== '' && $d !== '' && in_array($j, ['A','B','C','D'], true)) {
    $pdo->prepare('INSERT INTO questions (pertanyaan, opsi_a, opsi_b, opsi_c, opsi_d, jawaban) VALUES (?,?,?,?,?,?)')->execute([$p,$a,$b,$c,$d,$j]);
    $msg = 'Soal berhasil ditambah!';
  } else {
    $msg = 'Semua field wajib diisi, jawaban harus A/B/C/D.';
  }
}
$list = $pdo->query('SELECT id, pertanyaan, jawaban FROM questions ORDER BY id DESC')->fetchAll();
require 'partials/header.php';
?>
<div class="card">
  <h2>➕ Tambah Soal</h2>
  <?php if ($msg): ?><p><b><?= htmlspecialchars($msg) ?></b></p><?php endif; ?>
  <form method="post">
    <label>Pertanyaan</label>
    <textarea name="pertanyaan" rows="2" required></textarea>
    <label>Opsi A</label><input name="opsi_a" required>
    <label>Opsi B</label><input name="opsi_b" required>
    <label>Opsi C</label><input name="opsi_c" required>
    <label>Opsi D</label><input name="opsi_d" required>
    <label>Jawaban benar</label>
    <select name="jawaban"><option>A</option><option>B</option><option>C</option><option>D</option></select>
    <button class="btn">Simpan Soal</button>
  </form>
</div>
<div class="card">
  <h2>📝 Daftar Soal (<?= count($list) ?>)</h2>
  <table>
    <tr><th>#</th><th>Pertanyaan</th><th>Kunci</th><th></th></tr>
    <?php foreach ($list as $q): ?>
    <tr>
      <td><?= (int)$q['id'] ?></td>
      <td><?= htmlspecialchars(mb_strimwidth($q['pertanyaan'], 0, 60, '...')) ?></td>
      <td><?= htmlspecialchars($q['jawaban']) ?></td>
      <td><form method="post" action="api/delete_question.php" onsubmit="return confirm('Hapus soal ini?')"><input type="hidden" name="id" value="<?= (int)$q['id'] ?>"><button class="btn btn-ghost" style="padding:.3rem .8rem">Hapus</button></form></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
<?php require 'partials/footer.php'; ?>
