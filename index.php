<?php $title = 'Beranda'; require 'partials/header.php'; ?>
<div class="card" style="text-align:center">
  <span class="badge">Media Presentasi Interaktif</span>
  <h1>⚡ Mini-Quizizz: Dasar PHP</h1>
  <p><small>Belajar ringkas → kerjakan 10 soal pilihan ganda → kejar skor tertinggi!</small></p>
  <br>
  <label for="nama" style="display:block;text-align:left">Nama kamu:</label>
  <input id="nama" maxlength="50" placeholder="cth: Budi" value="">
  <button class="btn" onclick="mulai()">Mulai Kuis 🚀</button>
  <a class="btn btn-ghost" href="belajar.php">Belajar Dulu 📖</a>
</div>
<div class="card">
  <h3>Cara main</h3>
  <p>1. Isi nama → 2. Jawab tiap soal (20 detik) → 3. Jawaban cepat = bonus poin → 4. Skor masuk papan peringkat.</p>
  <p><small>Benar = 100 + sisa detik × 5 poin. Salah / habis waktu = 0.</small></p>
</div>
<script>
function mulai(){
  const n = document.getElementById('nama').value.trim();
  if(!n){ alert('Isi nama dulu ya!'); return; }
  localStorage.setItem('quiz_nama', n);
  location.href = 'kuis.php';
}
document.getElementById('nama').value = localStorage.getItem('quiz_nama') || '';
</script>
<?php require 'partials/footer.php'; ?>
