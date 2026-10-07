<?php $title = 'Belajar'; require 'partials/header.php'; ?>
<div class="card" style="text-align:center">
  <h1>📖 Ringkasan PHP</h1>
  <p><small>Baca 5 menit, langsung siap kuis.</small></p>
  <br><a class="btn" href="kuis.php">Saya Siap, Mulai Kuis →</a>
</div>
<div class="card"><span class="badge">1/6</span><h3>Sintaks Dasar</h3><p>Kode PHP diapit tag <b>&lt;?php ... ?&gt;</b> dan tiap perintah diakhiri titik koma.</p><pre>&lt;?php
echo "Halo!";</pre></div>
<div class="card"><span class="badge">2/6</span><h3>Variabel &amp; Tipe</h3><p>Variabel diawali <b>$</b>. String digabung dengan titik (<b>.</b>).</p><pre>$nama = "Budi";
$umur = 20;
echo "Halo " . $nama;</pre></div>
<div class="card"><span class="badge">3/6</span><h3>Percabangan</h3><p>Gunakan <b>if / else</b> untuk keputusan.</p><pre>if ($umur &gt;= 18) {
  echo "Dewasa";
} else {
  echo "Anak";
}</pre></div>
<div class="card"><span class="badge">4/6</span><h3>Perulangan</h3><p><b>for</b>/<b>foreach</b> untuk berulang; <b>do-while</b> minimal jalan 1×.</p><pre>for ($i = 1; $i &lt;= 3; $i++) {
  echo $i;
}</pre></div>
<div class="card"><span class="badge">5/6</span><h3>Fungsi &amp; Array</h3><p>Fungsi didefinisikan dengan <b>function</b>; <b>count()</b> menghitung isi array.</p><pre>function sapa($n) {
  return "Hai " . $n;
}
$buah = ["apel", "mangga"];
echo count($buah); // 2</pre></div>
<div class="card"><span class="badge">6/6</span><h3>Form &amp; Database</h3><p>Data form POST dibaca via <b>$_POST</b>; koneksi aman memakai <b>PDO</b>; sisipkan file dengan <b>include</b>.</p><pre>$nama = $_POST["nama"];
$pdo = new PDO($dsn, $u, $p);
include "header.php";</pre></div>
<div class="card" style="text-align:center"><a class="btn" href="kuis.php">Mulai Kuis 🚀</a></div>
<?php require 'partials/footer.php'; ?>
