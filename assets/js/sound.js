let _ctx = null;
function _ac() {
  if (!_ctx) _ctx = new (window.AudioContext || window.webkitAudioContext)();
  if (_ctx.state === 'suspended') _ctx.resume();
  return _ctx;
}
function _beep(freq, dur, delay = 0) {
  const ctx = _ac();
  const o = ctx.createOscillator();
  const g = ctx.createGain();
  o.type = 'sine';
  o.frequency.value = freq;
  o.connect(g);
  g.connect(ctx.destination);
  const t = ctx.currentTime + delay;
  g.gain.setValueAtTime(0.25, t);
  g.gain.exponentialRampToValueAtTime(0.001, t + dur);
  o.start(t);
  o.stop(t + dur);
}
function playBenar() { _beep(880, 0.15); _beep(1320, 0.2, 0.12); }
function playSalah() { _beep(160, 0.3); }
