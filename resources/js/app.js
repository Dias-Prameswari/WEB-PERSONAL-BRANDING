import "../css/app.css";
import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// --- nav highlight bubble ---
document.querySelectorAll("[data-nav]").forEach((nav) => {
    const hi = nav.querySelector("[data-nav-hi]");
    if (!hi) return;

    const move = (el) => {
        const r = el.getBoundingClientRect();
        const p = nav.getBoundingClientRect();
        hi.style.setProperty("--nav-w", r.width + "px");
        hi.style.setProperty("--nav-x", r.left - p.left + "px");
        hi.style.opacity = "1";
    };

    nav.querySelectorAll(".nav-link").forEach((a) => {
        a.addEventListener("mouseenter", () => move(a));
        if (a.hasAttribute("data-active")) move(a);
    });

    nav.addEventListener("mouseleave", () => {
        hi.style.opacity = "0";
    });
});
// --- end nav highlight bubble ---

// ====== Auto-scroll logo carousel ======
document.querySelectorAll("[data-logo-carousel]").forEach((wrap) => {
    const track = wrap.querySelector("[data-track]");
    if (!track) return;

    // gandakan konten untuk efek seamless
    track.innerHTML = track.innerHTML + track.innerHTML;

    let x = 0;
    let paused = false;
    const speed = 0.6; // px per frame (atur selera)
    const halfWidth = () => track.scrollWidth / 2;

    // pause saat hover
    wrap.addEventListener("mouseenter", () => (paused = true));
    wrap.addEventListener("mouseleave", () => (paused = false));

    // hormati prefers-reduced-motion
    const reduce = window.matchMedia(
        "(prefers-reduced-motion: reduce)"
    ).matches;

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

// ====== accordin icon kontak  ======
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".faq-toggle").forEach(function (btn) {
        btn.addEventListener("click", function () {
            const targetId = btn.getAttribute("data-faq-target");
            const answer = document.getElementById(targetId);
            const plusIcon = btn.querySelector(".faq-icon-plus");
            const minusIcon = btn.querySelector(".faq-icon-minus");

            const isOpen = answer.classList.contains("faq-open");

            if (isOpen) {
                // tutup
                answer.classList.remove("faq-open", "max-h-40", "opacity-100");
                answer.classList.add("max-h-0", "opacity-0");
                plusIcon.classList.remove("hidden");
                minusIcon.classList.add("hidden");
            } else {
                // buka
                answer.classList.add("faq-open", "max-h-40", "opacity-100");
                answer.classList.remove("max-h-0", "opacity-0");
                plusIcon.classList.add("hidden");
                minusIcon.classList.remove("hidden");
            }
        });
    });
});
// ====== end accordin icon kontak  ======

// ====== Generic horizontal carousel (layanan, stories, testimoni, artikel, tim) ======
document.querySelectorAll("[data-carousel]").forEach((root) => {
    const viewport = root.querySelector("[data-viewport]");
    const track = root.querySelector("[data-track]");
    if (!viewport || !track) return;

    const items = Array.from(track.children);
    if (!items.length) return;

    const prev = root.querySelector("[data-prev]");
    const next = root.querySelector("[data-next]");
    let current = 0;

    function scrollToCurrent() {
        const item = items[current];
        if (!item) return;

        const first = items[0];
        const offset = item.offsetLeft - first.offsetLeft;

        viewport.scrollTo({
            left: offset,
            behavior: "smooth",
        });
    }

    prev && prev.addEventListener("click", () => {
        current = (current - 1 + items.length) % items.length;
        scrollToCurrent();
    });

    next && next.addEventListener("click", () => {
        current = (current + 1) % items.length;
        scrollToCurrent();
    });

    // kalau window di-resize, posisikan ulang slide aktif biar tetap center
    window.addEventListener("resize", scrollToCurrent);
});
// ====== End generic horizontal carousel ======

