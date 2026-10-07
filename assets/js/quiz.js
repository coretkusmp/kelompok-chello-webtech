let soal = [], idx = 0, skor = 0, benar = 0, sisa = 20, timerId = null;
const nama = localStorage.getItem('quiz_nama') || 'Tanpa Nama';
function esc(s) {
  return String(s).replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
}
async function init() {
  const r = await fetch('api/get_questions.php');
  soal = await r.json();
  if (!soal.length) {
    document.getElementById('box').innerHTML = '<div class="card"><h3>Belum ada soal.</h3><p><a class="btn" href="tambah-soal.php">Tambah soal dulu →</a></p></div>';
    return;
  }
  tampil();
}
function tampil() {
  sisa = 20;
  const q = soal[idx];
  document.getElementById('box').innerHTML =
    '<div class="card"><small>Soal ' + (idx + 1) + ' / ' + soal.length + ' &bull; ' + esc(nama) + ' &bull; Skor: ' + skor + '</small>' +
    '<div class="bar"><i id="pbar" style="width:100%"></i></div>' +
    '<div class="timer" id="tm">20</div>' +
    '<h2>' + esc(q.pertanyaan) + '</h2>' +
    ['A','B','C','D'].map(k =>
      '<button class="opt" data-k="' + k + '" onclick="jawab(this)"><b>' + k + '.</b> ' + esc(q['opsi_' + k.toLowerCase()]) + '</button>'
    ).join('') +
    '<div id="next"></div></div>';
  tick();
  timerId = setInterval(tick, 1000);
}
function tick() {
  const el = document.getElementById('tm');
  if (!el) return;
  el.textContent = sisa;
  document.getElementById('pbar').style.width = (sisa / 20 * 100) + '%';
  if (sisa <= 5) el.classList.add('low');
  if (sisa <= 0) { clearInterval(timerId); kunci(null); return; }
  sisa--;
}
function kunci(pilihBtn) {
  clearInterval(timerId);
  const q = soal[idx];
  document.querySelectorAll('.opt').forEach(b => {
    b.disabled = true;
    if (b.dataset.k === q.jawaban) b.classList.add('benar');
  });
  if (pilihBtn && pilihBtn.dataset.k === q.jawaban) {
    benar++;
    skor += 100 + Math.max(sisa, 0) * 5;
    playBenar();
    confetti();
  } else {
    if (pilihBtn) pilihBtn.classList.add('salah');
    playSalah();
  }
  document.getElementById('next').innerHTML =
    '<br><button class="btn" onclick="lanjut()">' + (idx + 1 < soal.length ? 'Soal Berikutnya →' : 'Lihat Hasil 🏁') + '</button>';
}
function jawab(btn) { kunci(btn); }
function lanjut() { idx++; idx < soal.length ? tampil() : selesai(); }
async function selesai() {
  await fetch('api/save_score.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({nama, skor, benar, total: soal.length})
  });
  const emoji = benar === soal.length ? '🏆' : benar >= soal.length / 2 ? '🎉' : '💪';
  document.getElementById('box').innerHTML =
    '<div class="card" style="text-align:center"><div class="hasil">' + emoji + '</div>' +
    '<h2>' + esc(nama) + ', skor kamu: ' + skor + '</h2>' +
    '<p>Benar ' + benar + ' dari ' + soal.length + ' soal</p><br>' +
    '<a class="btn" href="leaderboard.php">Lihat Papan Skor →</a> ' +
    '<a class="btn btn-ghost" href="kuis.php">Main Lagi</a></div>';
  if (benar >= soal.length / 2) confetti();
}
function confetti() {
  const colors = ['#38bdf8','#22c55e','#facc15','#fb923c','#e879f9'];
  for (let i = 0; i < 40; i++) {
    const d = document.createElement('div');
    d.className = 'confetti';
    d.style.left = Math.random() * 100 + 'vw';
    d.style.background = colors[i % colors.length];
    d.style.animationDelay = (Math.random() * 0.4) + 's';
    document.body.appendChild(d);
    setTimeout(() => d.remove(), 1800);
  }
}
init();
