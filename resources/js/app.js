import '../css/app.css';
import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// --- nav highlight bubble ---
document.querySelectorAll('[data-nav]').forEach((nav) => {
  const hi = nav.querySelector('[data-nav-hi]');
  if (!hi) return;

  const move = (el) => {
    const r = el.getBoundingClientRect();
    const p = nav.getBoundingClientRect();
    hi.style.setProperty('--nav-w', r.width + 'px');
    hi.style.setProperty('--nav-x', (r.left - p.left) + 'px');
    hi.style.opacity = '1';
  };

  nav.querySelectorAll('.nav-link').forEach((a) => {
    a.addEventListener('mouseenter', () => move(a));
    if (a.hasAttribute('data-active')) move(a);
  });

  nav.addEventListener('mouseleave', () => { hi.style.opacity = '0'; });
});
// --- end nav highlight bubble ---

// ====== Auto-scroll logo carousel ======
document.querySelectorAll('[data-logo-carousel]').forEach((wrap) => {
  const track = wrap.querySelector('[data-track]');
  if (!track) return;

  // gandakan konten untuk efek seamless
  track.innerHTML = track.innerHTML + track.innerHTML;

  let x = 0;
  let paused = false;
  const speed = 0.6; // px per frame (atur selera)
  const halfWidth = () => track.scrollWidth / 2;

  // pause saat hover
  wrap.addEventListener('mouseenter', () => paused = true);
  wrap.addEventListener('mouseleave', () => paused = false);

  // hormati prefers-reduced-motion
  const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function tick() {
    if (!paused && !reduce) {
      x -= speed;
      if (Math.abs(x) >= halfWidth()) x = 0; // reset mulus
      track.style.transform = `translateX(${x}px)`;
    }
    requestAnimationFrame(tick);
  }
  tick();
});
// ====== End Auto-scroll logo carousel ======
