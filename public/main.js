function getRootPath() {
  return document.body.dataset.root || ".";
}

function withCacheBust(filePath) {
  const separator = filePath.includes("?") ? "&" : "?";
  return `${filePath}${separator}v=${Date.now()}`;
}

async function loadComponent(targetId, filePath) {
  const target = document.getElementById(targetId);
  if (!target) return "";

  try {
    const response = await fetch(withCacheBust(filePath), {
      cache: "no-store",
    });
    if (!response.ok) {
      throw new Error(`Gagal load component: ${filePath}`);
    }

    let html = await response.text();
    html = html.replaceAll("{{ROOT}}", getRootPath());
    target.innerHTML = html;
    return html;
  } catch (error) {
    console.error(error);
    return "";
  }
}

function normalizePath(pathname) {
  return pathname.replace(/\/+/g, "/").replace(/\/$/, "");
}

function activateCurrentMenu() {
  const currentPath = normalizePath(window.location.pathname);
  const currentHash = window.location.hash;

  const navLinks = document.querySelectorAll(".nav-link");
  const submenuItems = document.querySelectorAll(".submenu-item");

function getSectionFromPath(path) {
  if (!path || path === "/" || path.endsWith("/index.html")) {
    return "beranda";
  }

  if (path.includes("/profil/")) return "profil";
  if (path.includes("/dosen/")) return "akademisi";
  if (path.includes("/penelitian/")) return "penelitian";
  if (path.includes("/abdimas/")) return "abdimas";
  if (path.includes("/publikasi/")) return "publikasi";
  if (path.includes("/submit/")) return "submit";
  if (path.includes("/dokumen/")) return "dokumen";
  if (path.includes("/kontak/")) return "kontak";

  return "";
}

  const currentSection = getSectionFromPath(currentPath);

  navLinks.forEach((link) => {
    const rawHref = link.getAttribute("href");
    if (!rawHref) return;

    const url = new URL(rawHref, window.location.origin);
    const hrefPath = normalizePath(url.pathname);
    const hrefSection = getSectionFromPath(hrefPath);

    const isActive =
      (currentSection && hrefSection === currentSection) ||
      (!currentSection && currentPath === hrefPath);

    link.classList.toggle("active", isActive);
  });

  submenuItems.forEach((item) => {
    const rawHref = item.getAttribute("href");
    if (!rawHref) return;

    const url = new URL(rawHref, window.location.origin);
    const hrefPath = normalizePath(url.pathname);
    const hrefHash = url.hash;

    const isCurrent =
      currentPath === hrefPath && (!hrefHash || currentHash === hrefHash);

    item.classList.toggle("current", isCurrent);
  });
}

function initMenuToggle() {
  const menuToggle = document.getElementById("menuToggle");
  const navMenu = document.getElementById("navMenu");

  if (!menuToggle || !navMenu) return;

  menuToggle.setAttribute("aria-expanded", "false");

  menuToggle.addEventListener("click", (event) => {
    event.preventDefault();
    event.stopPropagation();

    const isOpen = navMenu.classList.toggle("open");
    menuToggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
  });

  document.addEventListener("click", (event) => {
    const isInsideHeader = event.target.closest("#navbarWrap");

    if (!isInsideHeader) {
      navMenu.classList.remove("open");
      menuToggle.setAttribute("aria-expanded", "false");
    }
  });

  navMenu.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => {
      navMenu.classList.remove("open");
      menuToggle.setAttribute("aria-expanded", "false");
    });
  });
}

function initNavbarShadow() {
  const navbarWrap = document.getElementById("navbarWrap");
  if (!navbarWrap) return;

  const updateShadow = () => {
    navbarWrap.style.boxShadow =
      window.scrollY > 12
        ? "0 12px 28px rgba(27, 50, 98, 0.12)"
        : "0 14px 32px rgba(27, 50, 98, 0.08)";
  };

  updateShadow();
  window.addEventListener("scroll", updateShadow);
}

function initMaps() {
  const footerMap = document.getElementById("dynamicMap");
  const footerStatus = document.getElementById("locationStatus");
  const contactMap = document.getElementById("contactMap");
  const contactStatus = document.getElementById("contactLocationStatus");

  const kwikKianGieQuery = encodeURIComponent(
    "Kwik Kian Gie School of Business, Jl. Yos Sudarso Kav 85 No.87, Sunter Jaya, Jakarta Utara",
  );

  const src = `https://www.google.com/maps?q=${kwikKianGieQuery}&z=16&output=embed`;

  if (footerMap) footerMap.src = src;
  if (contactMap) contactMap.src = src;

  const msg = "Map: Kwik Kian Gie School of Business";
  if (footerStatus) footerStatus.textContent = msg;
  if (contactStatus) contactStatus.textContent = msg;
}

function ensureFooterLinks() {
  const footer = document.getElementById("shared-footer");
  if (!footer) return;

  let col4 = footer.querySelector(".footer-col-4");

  if (!col4) {
    const container = footer.querySelector(".footer-container");
    if (!container) return;

    col4 = document.createElement("div");
    col4.className = "footer-col footer-col-4";
    container.appendChild(col4);
  }

  const hasList = col4.querySelector(".footer-list");

  if (!hasList) {
    col4.innerHTML = `
      <h3>Tautan Lainnya</h3>
      <ul class="footer-list">
        <li>
          <a href="https://kwikkiangie.ac.id" target="_blank" rel="noopener noreferrer">
            Website utama
          </a>
        </li>
        <li>
          <a href="https://learning.kwikkiangie.ac.id" target="_blank" rel="noopener noreferrer">
            E-learning
          </a>
        </li>
        <li>
          <a href="https://sss.kwikkiangie.ac.id" target="_blank" rel="noopener noreferrer">
            Student Self Service
          </a>
        </li>
        <li>
          <a href="https://sinta.kemdiktisaintek.go.id/affiliations/departments/1113/032009" target="_blank" rel="noopener noreferrer">
            SINTA
          </a>
        </li>
      </ul>
    `;
  }
}

function ensureFooterContactInfo() {
  const footer = document.getElementById("shared-footer");
  if (!footer) return;

  const col3 = footer.querySelector(".footer-col-3");
  if (!col3) return;

  let contactDetails = col3.querySelector(".contact-details");

  if (!contactDetails) {
    contactDetails = document.createElement("div");
    contactDetails.className = "contact-details";
    col3.appendChild(contactDetails);
  }

  const hasPhone = contactDetails.querySelector('a[href^="tel:"]');
  const hasEmail = contactDetails.querySelector('a[href^="mailto:"]');

  if (!hasPhone || !hasEmail) {
    contactDetails.innerHTML = `
      <p>
        <span class="contact-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24">
            <path d="M6.62 10.79a15.46 15.46 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1-.24 11.4 11.4 0 0 0 3.59.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.49a1 1 0 0 1 1 1 11.4 11.4 0 0 0 .57 3.59 1 1 0 0 1-.25 1l-2.19 2.2Z"></path>
          </svg>
        </span>
        <a href="tel:+622165307062">+62 21 6530 7062</a>
      </p>

      <p>
        <span class="contact-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24">
            <path d="M3 5h18a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm16.8 2H4.2L12 12.6 19.8 7ZM4 17h16V8.24l-7.43 5.34a1 1 0 0 1-1.14 0L4 8.24V17Z"></path>
          </svg>
        </span>
        <a href="mailto:lppm@kwikkiangie.ac.id">lppm@kwikkiangie.ac.id</a>
      </p>
    `;
  }

  contactDetails.style.display = "grid";
  contactDetails.style.gap = "12px";
  contactDetails.style.visibility = "visible";
  contactDetails.style.opacity = "1";

  contactDetails.querySelectorAll("p").forEach((p) => {
    p.style.display = "flex";
    p.style.alignItems = "center";
    p.style.gap = "10px";
    p.style.margin = "0";
  });

  contactDetails.querySelectorAll("a").forEach((a) => {
    a.style.display = "inline-block";
    a.style.color = "#ffffff";
    a.style.opacity = "1";
    a.style.textDecoration = "none";
  });

  contactDetails.querySelectorAll(".contact-icon").forEach((icon) => {
    icon.style.display = "inline-flex";
    icon.style.alignItems = "center";
    icon.style.justifyContent = "center";
    icon.style.width = "20px";
    icon.style.height = "20px";
    icon.style.flexShrink = "0";
  });

  contactDetails.querySelectorAll(".contact-icon svg").forEach((svg) => {
    svg.style.width = "20px";
    svg.style.height = "20px";
    svg.style.fill = "currentColor";
    svg.style.color = "rgba(255, 255, 255, 0.94)";
  });
}

function initHeroCarousel() {
  const carousel = document.getElementById("heroCarousel");
  if (!carousel) return;

  const slides = carousel.querySelectorAll(".hero-slide");
  const dots = carousel.querySelectorAll(".hero-dot");
  const prevBtn = document.getElementById("heroPrev");
  const nextBtn = document.getElementById("heroNext");

  if (!slides.length) return;

  let currentIndex = 0;
  let autoSlide = null;

  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.classList.toggle("active", i === index);
    });

    dots.forEach((dot, i) => {
      dot.classList.toggle("active", i === index);
    });

    currentIndex = index;
  }

  function nextSlide() {
    showSlide((currentIndex + 1) % slides.length);
  }

  function prevSlide() {
    showSlide((currentIndex - 1 + slides.length) % slides.length);
  }

  function startAutoSlide() {
    stopAutoSlide();
    autoSlide = setInterval(nextSlide, 4500);
  }

  function stopAutoSlide() {
    if (autoSlide) clearInterval(autoSlide);
  }

  nextBtn?.addEventListener("click", () => {
    nextSlide();
    startAutoSlide();
  });

  prevBtn?.addEventListener("click", () => {
    prevSlide();
    startAutoSlide();
  });

  dots.forEach((dot, index) => {
    dot.addEventListener("click", () => {
      showSlide(index);
      startAutoSlide();
    });
  });

  carousel.addEventListener("mouseenter", stopAutoSlide);
  carousel.addEventListener("mouseleave", startAutoSlide);

  showSlide(0);
  startAutoSlide();
}

function initPrestasiHeroCarousel() {
  const carousel = document.getElementById("prestasiHeroCarousel");
  if (!carousel) return;

  const slides = Array.from(carousel.querySelectorAll(".hero-slide"));
  const dots = Array.from(
    carousel.querySelectorAll(".hero-carousel-dots .hero-dot"),
  );
  const prevBtn = carousel.querySelector(".hero-carousel-btn.prev");
  const nextBtn = carousel.querySelector(".hero-carousel-btn.next");

  const captionBadge = document.getElementById("heroCaptionBadge");
  const captionTitle = document.getElementById("heroCaptionTitle");
  const captionText = document.getElementById("heroCaptionText");
  const captionBg = document.getElementById("heroCaptionBg");

  if (!slides.length) return;

  let currentIndex = 0;
  let autoSlide = null;
  let isAnimating = false;

  function updateCaption(index) {
    const activeSlide = slides[index];
    if (!activeSlide) return;

    const badge = activeSlide.dataset.badge || "";
    const title = activeSlide.dataset.title || "";
    const description = activeSlide.dataset.description || "";
    const image = activeSlide.querySelector("img");

    if (captionBadge) captionBadge.textContent = badge;
    if (captionTitle) captionTitle.textContent = title;
    if (captionText) captionText.textContent = description;

    if (captionBg && image) {
      const imageSrc = image.currentSrc || image.getAttribute("src") || "";
      captionBg.style.backgroundImage = `url("${imageSrc}")`;
    }
  }

  function syncDots(index) {
    dots.forEach((dot, i) => {
      dot.classList.toggle("active", i === index);
    });
  }

  function resetSlides() {
    slides.forEach((slide, i) => {
      slide.classList.remove("active", "prev-slide");
      slide.setAttribute("aria-hidden", i === currentIndex ? "false" : "true");

      if (i === currentIndex) {
        slide.classList.add("active");
      }
    });

    syncDots(currentIndex);
    updateCaption(currentIndex);
  }

  function goToSlide(newIndex) {
    if (
      isAnimating ||
      newIndex === currentIndex ||
      newIndex < 0 ||
      newIndex >= slides.length
    ) {
      return;
    }

    isAnimating = true;

    const currentSlide = slides[currentIndex];
    const nextSlide = slides[newIndex];

    currentSlide.classList.remove("active");
    currentSlide.classList.add("prev-slide");
    currentSlide.setAttribute("aria-hidden", "true");

    nextSlide.classList.add("active");
    nextSlide.setAttribute("aria-hidden", "false");

    syncDots(newIndex);
    currentIndex = newIndex;
    updateCaption(currentIndex);

    window.setTimeout(() => {
      slides.forEach((slide, i) => {
        slide.classList.remove("prev-slide");
        slide.classList.toggle("active", i === currentIndex);
        slide.setAttribute(
          "aria-hidden",
          i === currentIndex ? "false" : "true",
        );
      });

      isAnimating = false;
    }, 800);
  }

  function nextSlide() {
    const nextIndex = (currentIndex + 1) % slides.length;
    goToSlide(nextIndex);
  }

  function prevSlide() {
    const prevIndex = (currentIndex - 1 + slides.length) % slides.length;
    goToSlide(prevIndex);
  }

  function stopAutoSlide() {
    if (autoSlide) {
      window.clearInterval(autoSlide);
      autoSlide = null;
    }
  }

  function startAutoSlide() {
    stopAutoSlide();
    autoSlide = window.setInterval(() => {
      nextSlide();
    }, 4500);
  }

  resetSlides();

  dots.forEach((dot, index) => {
    dot.addEventListener("click", () => {
      goToSlide(index);
      startAutoSlide();
    });
  });

  if (nextBtn) {
    nextBtn.addEventListener("click", () => {
      nextSlide();
      startAutoSlide();
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener("click", () => {
      prevSlide();
      startAutoSlide();
    });
  }

  carousel.addEventListener("mouseenter", stopAutoSlide);
  carousel.addEventListener("mouseleave", startAutoSlide);
  carousel.addEventListener("focusin", stopAutoSlide);
  carousel.addEventListener("focusout", startAutoSlide);

  startAutoSlide();
}

function initNewsShowcase() {
  const track = document.getElementById("newsTrack");
  if (!track) return;

  const originalCards = Array.from(track.querySelectorAll(".news-feature-card"));
  if (!originalCards.length) return;

  // Clone all cards and append them to the end of the track for a seamless loop
  originalCards.forEach(card => {
    const clone = card.cloneNode(true);
    // Remove scroll reveal attributes from clones to avoid blank cards
    clone.classList.remove("reveal", "reveal-up", "reveal-left");
    clone.style.animationDelay = "0s";
    clone.style.transitionDelay = "0s";
    track.appendChild(clone);
  });

  let originalWidth = 0;
  function calculateWidth() {
    const firstCard = track.firstElementChild;
    if (!firstCard) return;
    const cardWidth = firstCard.getBoundingClientRect().width;
    const gap = 24; // matches style.css gap
    originalWidth = originalCards.length * (cardWidth + gap);
  }

  // Calculate width after elements are rendered in DOM
  setTimeout(calculateWidth, 100);
  window.addEventListener("resize", calculateWidth);

  let currentX = -originalWidth;
  let speed = 0.75; // buttery-smooth scrolling speed (pixels per frame)
  let isPaused = false;
  let shifting = false;

  function step() {
    const drawerOpen = document.querySelector(".lppm-editor-drawer.open") !== null;
    const hoverActive = document.querySelector(".lppm-hover-overlay[style*='display: block']") !== null;

    if (!isPaused && !shifting && originalWidth > 0 && !drawerOpen && !hoverActive) {
      currentX += speed;
      
      // If we reach 0, snap back to -originalWidth for infinite loop
      if (currentX >= 0) {
        currentX = -originalWidth;
      }
      
      track.style.transform = `translateX(${currentX}px)`;
    }
    requestAnimationFrame(step);
  }

  function shiftMarquee(direction) {
    if (shifting || originalWidth === 0) return;
    shifting = true;

    const firstCard = track.firstElementChild;
    if (!firstCard) return;
    const cardWidth = firstCard.getBoundingClientRect().width;
    const gap = 24;
    const shiftAmt = cardWidth + gap;

    // Apply smooth transition
    track.style.transition = "transform 0.5s cubic-bezier(0.16, 1, 0.3, 1)";

    if (direction === "prev") {
      currentX += shiftAmt; // slide right
    } else {
      currentX -= shiftAmt; // slide left
    }

    // Boundary checks & snap
    if (currentX >= 0) {
      track.style.transform = `translateX(${currentX}px)`;
      setTimeout(() => {
        track.style.transition = "none";
        currentX = -originalWidth + currentX;
        track.style.transform = `translateX(${currentX}px)`;
        shifting = false;
      }, 500);
    } else if (currentX <= -originalWidth * 2) {
      track.style.transform = `translateX(${currentX}px)`;
      setTimeout(() => {
        track.style.transition = "none";
        currentX = -originalWidth + (currentX + originalWidth * 2);
        track.style.transform = `translateX(${currentX}px)`;
        shifting = false;
      }, 500);
    } else {
      track.style.transform = `translateX(${currentX}px)`;
      setTimeout(() => {
        track.style.transition = "none";
        shifting = false;
      }, 500);
    }
  }

  const prevBtn = document.getElementById("newsPrev");
  const nextBtn = document.getElementById("newsNext");
  if (prevBtn && nextBtn) {
    prevBtn.addEventListener("click", (e) => {
      e.preventDefault();
      shiftMarquee("prev");
    });
    nextBtn.addEventListener("click", (e) => {
      e.preventDefault();
      shiftMarquee("next");
    });
  }

  // Hover to pause
  const container = track.closest(".news-showcase") || track;
  container.addEventListener("mouseenter", () => { isPaused = true; });
  container.addEventListener("mouseleave", () => { isPaused = false; });

  // Touch to pause on mobile
  track.addEventListener("touchstart", () => { isPaused = true; }, { passive: true });
  track.addEventListener("touchend", () => { isPaused = false; }, { passive: true });

  // Start the marquee animation loop
  requestAnimationFrame(step);
}

function initNewsModal() {
  const modal = document.getElementById("newsModal");
  if (!modal) return;

  const modalImage = document.getElementById("newsModalImage");
  const modalDate = document.getElementById("newsModalDate");
  const modalTitle = document.getElementById("newsModalTitle");
  const modalBody = document.getElementById("newsModalBody");
  const closeBtn = document.getElementById("newsModalClose");

  const triggers = document.querySelectorAll(".news-modal-trigger");
  const closeTargets = modal.querySelectorAll("[data-close-news-modal]");

  function openModal(trigger) {
    const title = trigger.dataset.newsTitle || "";
    const date = trigger.dataset.newsDate || "";
    const image = trigger.dataset.newsImage || "";
    let longContent = trigger.dataset.newsLong || "";

    // Clean literal escaped \n strings and convert double newlines to paragraph tags
    longContent = longContent
      .replace(/\\n/g, "\n")
      .replace(/\r\n/g, "\n")
      .replace(/\n{2,}/g, "</p><p>")
      .replace(/\n/g, "<br>");

    let trimmed = longContent.trim();
    if (trimmed && !trimmed.startsWith("<p") && !trimmed.startsWith("<div") && !trimmed.startsWith("<ul") && !trimmed.startsWith("<ol")) {
      longContent = "<p>" + longContent + "</p>";
    }

    modalTitle.textContent = title;
    modalDate.textContent = date;
    modalBody.innerHTML = longContent;

    if (image) {
      modalImage.src = image;
      modalImage.alt = title;
      modalImage.style.display = "block";
    } else {
      modalImage.removeAttribute("src");
      modalImage.alt = "";
      modalImage.style.display = "none";
    }

    modal.classList.add("is-open");
    modal.setAttribute("aria-hidden", "false");
    document.body.classList.add("news-modal-open");
  }

  function closeModal() {
    modal.classList.remove("is-open");
    modal.setAttribute("aria-hidden", "true");
    document.body.classList.remove("news-modal-open");
  }

  triggers.forEach((trigger) => {
    trigger.addEventListener("click", () => openModal(trigger));
  });

  closeTargets.forEach((el) => {
    el.addEventListener("click", closeModal);
  });

  if (closeBtn) {
    closeBtn.addEventListener("click", closeModal);
  }

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && modal.classList.contains("is-open")) {
      closeModal();
    }
  });
}

async function initSharedLayout() {
  // In Laravel, the navbar and footer are already pre-rendered by the server!
  // We don't need to perform client-side AJAX fetch requests.
  ensureFooterLinks();
  ensureFooterContactInfo();
  initMenuToggle();
  initNavbarShadow();
  activateCurrentMenu();
  initMaps();
}

(function () {
  const reduceMotion = window.matchMedia(
    "(prefers-reduced-motion: reduce)",
  ).matches;

  const revealSelector = [
    ".hero-copy > *",
    ".hero-visual",
    ".section-head > *",
    ".section-head-center > *",
    ".card",
    ".table-card",
    ".org-card",
    ".leader-card",
    ".announcement-item",
    ".doc-item",
    ".contact-row",
    ".branch-box",
    ".branch-child",
    ".quick-card",
    ".mini-stat",
    ".map-frame",
    ".org-avatar",
    ".leader-photo",
    ".branch-avatar",
    ".toolbar",
    ".data-table",
    ".grid-2 > *",
    ".grid-3 > *",
    ".grid-4 > *",
    ".stats-grid > *",
    ".content-stack > *",
    ".stack > *",
    ".news-card",
    ".news-feature-card",
    ".cta-banner",
    ".video-feature",
  ].join(",");

  const parallaxSelector = [
    ".hero-copy",
    ".hero-visual",
    ".quick-card",
    ".news-feature-card",
    ".bg-glow",
  ].join(",");

  function applyRevealClasses() {
    const containers = document.querySelectorAll("section, .section, header, footer, .container, .news-showcase, .layanan-grid, .video-grid");
    const processed = new Set();

    containers.forEach((container) => {
      const children = Array.from(container.querySelectorAll(revealSelector))
        .filter(el => !processed.has(el));
      
      children.forEach((el, idx) => {
        processed.add(el);
        if (
          el.closest(".site-header") ||
          el.closest(".custom-footer") ||
          el.closest(".site-footer")
        ) {
          return;
        }

        if (!el.classList.contains("reveal")) {
          el.classList.add("reveal");
        }

        // Add variants if not already defined
        const hasVariant = Array.from(el.classList).some(cls => cls.startsWith("reveal-") && cls !== "reveal-delay-");
        if (!hasVariant) {
          if (
            el.matches(".hero-copy > *") ||
            el.matches(".section-head > *") ||
            el.matches(".section-head-center > *") ||
            el.matches(".quick-card")
          ) {
            el.classList.add("reveal-up");
          } else if (
            el.matches(".hero-visual") ||
            el.matches(".cta-banner") ||
            el.matches(".video-feature")
          ) {
            el.classList.add("reveal-scale");
          } else {
            el.classList.add(idx % 2 === 0 ? "reveal-up" : "reveal-left");
          }
        }

        // Add cascading delay relative to parent container
        const hasDelay = Array.from(el.classList).some(cls => cls.startsWith("reveal-delay-"));
        if (!hasDelay) {
          const delay = (idx % 8) + 1;
          el.classList.add(`reveal-delay-${delay}`);
        }
      });
    });

    // Fallback for any elements not caught inside major containers
    const remaining = Array.from(document.querySelectorAll(revealSelector))
      .filter(el => !processed.has(el));

    remaining.forEach((el, idx) => {
      if (!el.classList.contains("reveal")) {
        el.classList.add("reveal");
      }
      
      const hasVariant = Array.from(el.classList).some(cls => cls.startsWith("reveal-") && cls !== "reveal-delay-");
      if (!hasVariant) {
        el.classList.add("reveal-up");
      }
      
      const hasDelay = Array.from(el.classList).some(cls => cls.startsWith("reveal-delay-"));
      if (!hasDelay) {
        el.classList.add(`reveal-delay-${(idx % 6) + 1}`);
      }
    });
  }

  function initRevealObserver() {
    if (reduceMotion) {
      document
        .querySelectorAll(".reveal")
        .forEach((el) => el.classList.add("is-visible"));
      return;
    }

    const sections = document.querySelectorAll("section, .section, header, footer");
    
    const sectionObserver = new IntersectionObserver(
      (entries, obs) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const reveals = entry.target.querySelectorAll(".reveal");
            reveals.forEach((el) => el.classList.add("is-visible"));
            obs.unobserve(entry.target);
          }
        });
      },
      {
        threshold: 0.08,
        rootMargin: "0px 0px -5% 0px",
      }
    );

    sections.forEach((sec) => sectionObserver.observe(sec));

    const individualObserver = new IntersectionObserver(
      (entries, obs) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            obs.unobserve(entry.target);
          }
        });
      },
      {
        threshold: 0.08,
        rootMargin: "0px 0px -5% 0px",
      }
    );

    document.querySelectorAll(".reveal").forEach((el) => {
      const hasSectionParent = el.closest("section, .section, header, footer");
      if (!hasSectionParent) {
        individualObserver.observe(el);
      }
    });
  }

  function applyParallaxMarkers() {
    document.querySelectorAll(parallaxSelector).forEach((el) => {
      if (
        el.closest(".site-header") ||
        el.closest(".custom-footer") ||
        el.closest(".site-footer")
      ) {
        return;
      }
      el.classList.add("parallax-item");
    });
  }

  function initParallax() {
    if (reduceMotion) return;

    const items = Array.from(document.querySelectorAll(".parallax-item"));
    if (!items.length) return;

    let ticking = false;

    function updateParallax() {
      const vh = window.innerHeight;

      items.forEach((el) => {
        const rect = el.getBoundingClientRect();
        const center = rect.top + rect.height / 2;
        const offset = (center - vh / 2) * -0.08;

        let speed = 0.05;
        if (el.classList.contains("hero-visual")) speed = 0.08;
        if (el.classList.contains("hero-copy")) speed = 0.03;
        if (el.classList.contains("bg-glow")) speed = 0.14;

        const y = offset * speed;
        el.style.transform = `translate3d(0, ${y.toFixed(2)}px, 0)`;
      });

      ticking = false;
    }

    function onScroll() {
      if (!ticking) {
        window.requestAnimationFrame(updateParallax);
        ticking = true;
      }
    }

    updateParallax();
    window.addEventListener("scroll", onScroll, { passive: true });
    window.addEventListener("resize", onScroll);
  }

  function initGlobalScrollEffects() {
    applyRevealClasses();
    applyParallaxMarkers();
    initRevealObserver();
    initParallax();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initGlobalScrollEffects);
  } else {
    initGlobalScrollEffects();
  }
})();

/* Supercharged Scroll Reveal for New Classes */
function initSuperchargedReveal() {
  const elements = document.querySelectorAll('.reveal-up, .reveal-fade, .glass-card, .stat-card, .card, .news-feature-card, .quick-card');
  if (!elements.length) return;

  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('revealed', 'is-visible');
        obs.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.1,
    rootMargin: '0px 0px -40px 0px'
  });

  elements.forEach(el => observer.observe(el));
}

/* Stat Counter Animation for Metrics */
function initStatCounterAnimation() {
  const statElements = document.querySelectorAll('.stat-number, .hero-point strong');
  if (!statElements.length) return;

  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const el = entry.target;
        const text = el.innerText.trim();
        const num = parseInt(text.replace(/[^0-9]/g, ''));
        if (!isNaN(num) && num > 0 && !el.dataset.counted) {
          el.dataset.counted = 'true';
          let start = 0;
          const duration = 1500;
          const stepTime = 20;
          const steps = duration / stepTime;
          const increment = num / steps;
          const suffix = text.replace(/[0-9]/g, '');

          const timer = setInterval(() => {
            start += increment;
            if (start >= num) {
              el.innerText = num + suffix;
              clearInterval(timer);
            } else {
              el.innerText = Math.floor(start) + suffix;
            }
          }, stepTime);
        }
        obs.unobserve(el);
      }
    });
  }, { threshold: 0.2 });

  statElements.forEach(el => observer.observe(el));
}

/* Dynamic Ripple Click Effect */
function initRippleEffect() {
  document.addEventListener('click', (e) => {
    const btn = e.target.closest('.btn, .btn-primary, .btn-glow, .quick-card');
    if (!btn) return;

    const rect = btn.getBoundingClientRect();
    const circle = document.createElement('span');
    const diameter = Math.max(rect.width, rect.height);
    const radius = diameter / 2;

    circle.style.width = circle.style.height = `${diameter}px`;
    circle.style.left = `${e.clientX - rect.left - radius}px`;
    circle.style.top = `${e.clientY - rect.top - radius}px`;
    circle.style.position = 'absolute';
    circle.style.borderRadius = '50%';
    circle.style.background = 'rgba(255, 255, 255, 0.4)';
    circle.style.transform = 'scale(0)';
    circle.style.animation = 'rippleAnim 0.6s linear';
    circle.style.pointerEvents = 'none';

    const prevRipple = btn.querySelector('.ripple-effect');
    if (prevRipple) prevRipple.remove();

    circle.classList.add('ripple-effect');
    btn.appendChild(circle);

    setTimeout(() => circle.remove(), 600);
  });
}

function initImageLightbox() {
  const lightbox = document.getElementById("imageLightboxModal");
  if (!lightbox) return;

  const lightboxImg = document.getElementById("imageLightboxImg");
  const lightboxCaption = document.getElementById("imageLightboxCaption");
  const closeBtn = document.getElementById("imageLightboxClose");
  const backdrop = document.getElementById("imageLightboxBackdrop");

  function openLightbox(src, alt = "") {
    if (!src) return;
    lightboxImg.src = src;
    lightboxImg.alt = alt;
    lightboxCaption.textContent = alt;
    lightbox.classList.add("is-open");
    lightbox.setAttribute("aria-hidden", "false");
    document.body.classList.add("lightbox-open");
  }

  function closeLightbox() {
    lightbox.classList.remove("is-open");
    lightbox.setAttribute("aria-hidden", "true");
    document.body.classList.remove("lightbox-open");
  }

  const newsModalImg = document.getElementById("newsModalImage");
  if (newsModalImg) {
    newsModalImg.addEventListener("click", (e) => {
      e.stopPropagation();
      openLightbox(newsModalImg.src, newsModalImg.alt || "Detail Gambar Berita");
    });
  }

  document.addEventListener("click", (e) => {
    const target = e.target;
    if (target.tagName === "IMG" && (target.closest(".news-modal-media") || target.closest(".news-feature-image"))) {
      e.stopPropagation();
      openLightbox(target.src, target.alt || target.title || "Detail Gambar Berita");
    }
  });

  if (closeBtn) closeBtn.addEventListener("click", closeLightbox);
  if (backdrop) backdrop.addEventListener("click", closeLightbox);

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && lightbox.classList.contains("is-open")) {
      closeLightbox();
    }
  });
}

document.addEventListener("DOMContentLoaded", async () => {
  await initSharedLayout();
  initHeroCarousel();
  initPrestasiHeroCarousel();
  initNewsShowcase();
  initNewsModal();
  initImageLightbox();
  initSuperchargedReveal();
  initStatCounterAnimation();
  initRippleEffect();
});