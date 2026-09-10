document.addEventListener("DOMContentLoaded", () => {
  initJournalCards();
  initJournalReveal();
  initIndexMarquee();
});

function initJournalCards() {
  const cards = Array.from(document.querySelectorAll(".journal-card"));
  if (!cards.length) return;

  cards.forEach((card, index) => {
    card.style.transitionDelay = `${Math.min(index * 40, 220)}ms`;

    const image = card.querySelector(".journal-cover img");
    if (!image) return;

    image.addEventListener("load", () => {
      card.classList.add("image-ready");
    });

    if (image.complete) {
      card.classList.add("image-ready");
    }
  });
}

function initJournalReveal() {
  const items = Array.from(
    document.querySelectorAll(
      ".journal-card, .hero-copy, .section-head-center, .index-marquee"
    )
  );

  if (!items.length) return;

  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  items.forEach((item, index) => {
    if (!item.classList.contains("reveal")) {
      item.classList.add("reveal");
      item.classList.add(index % 2 === 0 ? "reveal-up" : "reveal-left");

      const delay = (index % 6) + 1;
      item.classList.add(`reveal-delay-${delay}`);
    }
  });

  if (reduceMotion) {
    items.forEach((item) => item.classList.add("is-visible"));
    return;
  }

  const observer = new IntersectionObserver(
    (entries, obs) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;

        entry.target.classList.add("is-visible");
        obs.unobserve(entry.target);
      });
    },
    {
      threshold: 0.14,
      rootMargin: "0px 0px -8% 0px",
    }
  );

  items.forEach((item) => observer.observe(item));
}

function initIndexMarquee() {
  const marquee = document.querySelector(".index-marquee");
  const track = document.querySelector(".index-marquee-track");

  if (!marquee || !track) return;

  track.querySelectorAll("[data-clone='true']").forEach((clone) => clone.remove());

  const originalItems = Array.from(track.children);
  if (!originalItems.length) return;

  const gap = parseFloat(getComputedStyle(track).gap) || 0;
  const marqueeWidth = marquee.offsetWidth;

  let originalWidth = 0;

  originalItems.forEach((item, index) => {
    originalWidth += item.offsetWidth;

    if (index < originalItems.length - 1) {
      originalWidth += gap;
    }
  });

  if (originalWidth <= 0) return;

  while (track.scrollWidth < marqueeWidth + originalWidth * 2) {
    originalItems.forEach((item) => {
      const clone = item.cloneNode(true);
      clone.dataset.clone = "true";
      clone.setAttribute("aria-hidden", "true");
      track.appendChild(clone);
    });
  }

  track.style.setProperty("--marquee-distance", `${originalWidth + gap}px`);

  const speed = 70;
  const duration = Math.max(14, (originalWidth + gap) / speed);

  track.style.setProperty("--marquee-duration", `${duration}s`);
}

window.addEventListener("resize", () => {
  window.clearTimeout(window.__journalMarqueeResizeTimer);

  window.__journalMarqueeResizeTimer = window.setTimeout(() => {
    initIndexMarquee();
  }, 180);
});