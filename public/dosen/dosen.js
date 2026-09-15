// Dynamic Dosen Renderer for LPPM IBI KKG
(function () {
  // Helper to extract initials from name
  function getInitials(name) {
    let clean = name.replace(/(Prof\.|Dr\.|Ir\.|Drs\.|Dra\.)/g, "").trim();
    if (clean.includes(",")) {
      clean = clean.split(",")[0].trim();
    }
    const parts = clean.split(/\s+/).filter(p => p.length > 0);
    if (parts.length >= 2) {
      return (parts[0][0] + parts[1][0]).toUpperCase();
    } else if (parts.length === 1) {
      return parts[0].substring(0, 2).toUpperCase();
    }
    return "DS";
  }

  function renderDosenCards() {
    const grid = document.querySelector(".dosen-grid");
    if (!grid || typeof DOSEN_DATA === "undefined") return;

    // If server already pre-rendered cards for SEO, do not wipe them
    if (grid.querySelectorAll(".dosen-card").length > 0) return;

    const path = window.location.pathname.toLowerCase();
    let activeProdis = [];

    if (path.includes("akuntansi")) {
      activeProdis = ["Akuntansi", "Magister Akuntansi"];
    } else if (path.includes("manajemen")) {
      activeProdis = ["Manajemen", "Magister Manajemen"];
    } else if (path.includes("teknikinformatika")) {
      activeProdis = ["Teknik Informatika"];
    } else if (path.includes("sisteminformasi")) {
      activeProdis = ["Sistem Informasi"];
    } else if (path.includes("ilmukomunikasi")) {
      activeProdis = ["Ilmu Komunikasi"];
    } else if (path.includes("ilmuadministrasibisnis")) {
      activeProdis = ["Administrasi Bisnis"];
    }

    const filteredDosen = DOSEN_DATA.filter(d => activeProdis.includes(d.prodi));

    grid.innerHTML = ""; // Clear static items

    filteredDosen.forEach((d) => {
      const card = document.createElement("article");
      card.className = "dosen-card card reveal";

      const badge = `<span class="dosen-badge">${d.prodi}</span>`;

      let photoHTML = "";
      if (d.gsUser) {
        const photoUrl = `https://scholar.googleusercontent.com/citations?view_op=medium_photo&user=${d.gsUser}`;
        photoHTML = `
          <img class="dosen-photo is-active" src="${photoUrl}" alt="${d.nama}" onerror="this.style.display='none'; if(this.nextElementSibling) this.nextElementSibling.style.display='flex';" />
          <div class="dosen-avatar-placeholder" style="display:none;">${getInitials(d.nama)}</div>
        `;
      } else {
        photoHTML = `<div class="dosen-avatar-placeholder">${getInitials(d.nama)}</div>`;
      }

      const photoWrap = `
        <div class="dosen-photo-wrap">
          <div class="dosen-rotator">
            ${photoHTML}
          </div>
        </div>
      `;

      const content = `
        <h3>${d.nama}</h3>
        <p class="dosen-role">${d.prodi}</p>
        <p class="dosen-meta"><i class="fa-solid fa-microscope"></i> ${d.keahlian || "-"}</p>
      `;

      let linkHTML = "";
      if (d.gsUser) {
        linkHTML = `
          <a href="https://scholar.google.com/citations?user=${d.gsUser}&hl=en" target="_blank" rel="noopener noreferrer" class="dosen-gs-link">
            <i class="fa-solid fa-graduation-cap"></i> Google Scholar
          </a>
        `;
      }

      card.innerHTML = `${badge}${photoWrap}${content}${linkHTML}`;
      grid.appendChild(card);
    });
  }

  // Real-time dynamic search injector
  function initDosenSearch() {
    const section = document.getElementById("daftar-dosen");
    if (!section) return;

    const container = section.querySelector(".container");
    if (!container) return;

    // Create search bar container if not present
    if (!document.getElementById("dosenSearchInput")) {
      const searchWrap = document.createElement("div");
      searchWrap.className = "dosen-search-wrap reveal";
      searchWrap.innerHTML = `
        <div class="dosen-search-box">
          <i class="fa-solid fa-magnifying-glass search-icon"></i>
          <input type="text" id="dosenSearchInput" placeholder="Cari akademisi berdasarkan nama atau bidang keahlian riset..." autocomplete="off" />
          <button type="button" id="dosenSearchClear" style="display:none;" aria-label="Bersihkan pencarian">&times;</button>
        </div>
        <div class="dosen-search-results-info" id="dosenSearchResultsInfo" style="display:none;"></div>
      `;

      const grid = container.querySelector(".dosen-grid");
      if (grid) {
        container.insertBefore(searchWrap, grid);
      }
    }

    const input = document.getElementById("dosenSearchInput");
    const clearBtn = document.getElementById("dosenSearchClear");
    const info = document.getElementById("dosenSearchResultsInfo");

    if (!input) return;

    input.addEventListener("input", () => {
      const query = input.value.toLowerCase().trim();
      const cards = Array.from(document.querySelectorAll(".dosen-card"));
      let visibleCount = 0;

      clearBtn.style.display = query ? "block" : "none";

      cards.forEach((card) => {
        const name = (card.querySelector("h3")?.textContent || "").toLowerCase();
        const role = (card.querySelector(".dosen-role")?.textContent || "").toLowerCase();
        const meta = (card.querySelector(".dosen-meta")?.textContent || "").toLowerCase();
        const dataName = (card.dataset.name || "").toLowerCase();
        const dataKeahlian = (card.dataset.keahlian || "").toLowerCase();

        const matches = !query || name.includes(query) || role.includes(query) || meta.includes(query) || dataName.includes(query) || dataKeahlian.includes(query);
        
        if (matches) {
          card.style.removeProperty("display");
          visibleCount++;
          card.classList.add("is-visible");
          card.style.opacity = "1";
          card.style.transform = "none";
        } else {
          card.style.setProperty("display", "none", "important");
        }
      });

      if (query) {
        info.textContent = `Menampilkan ${visibleCount} akademisi untuk "${input.value}"`;
        info.style.display = "block";
      } else {
        info.style.display = "none";
      }
    });

    clearBtn.addEventListener("click", () => {
      input.value = "";
      input.dispatchEvent(new Event("input"));
      input.focus();
    });
  }

  // Execute rendering immediately so elements are in the DOM before scroll reveal scripts run
  renderDosenCards();

  // Initialize features on DOM Load
  document.addEventListener("DOMContentLoaded", () => {
    initDosenSearch();
    initDosenRotators();
  });

  function initDosenRotators() {
    const rotators = Array.from(document.querySelectorAll(".dosen-rotator"));
    if (!rotators.length) return;

    rotators.forEach((rotator, index) => {
      const firstImage = rotator.querySelector(".dosen-photo");
      if (!firstImage) return;

      const altSrc = firstImage.dataset.altSrc;
      if (!altSrc) {
        // Safe fallback for single photo elements - enables zoom and smooth hover in CSS
        rotator.classList.add("is-single-photo");
        return;
      }

      const secondImage = document.createElement("img");
      secondImage.className = "dosen-photo";
      secondImage.alt = firstImage.alt || "Foto dosen";
      secondImage.src = altSrc;
      rotator.appendChild(secondImage);

      const layers = Array.from(rotator.querySelectorAll(".dosen-photo"));
      const card = rotator.closest(".dosen-card");

      let currentIndex = 0;
      let timer = null;
      let isAnimating = false;

      function setTextTransition(active) {
        if (!card) return;
        card.classList.remove("text-swapping", "text-restored");
        card.classList.add(active ? "text-restored" : "text-swapping");
      }

      function goToSlide(nextIndex) {
        if (isAnimating || nextIndex === currentIndex) return;

        isAnimating = true;
        setTextTransition(false);

        layers[currentIndex].classList.remove("is-active");
        layers[nextIndex].classList.add("is-active");

        window.setTimeout(() => {
          currentIndex = nextIndex;
          setTextTransition(true);
          isAnimating = false;
        }, 380);
      }

      function nextSlide() {
        const nextIndex = (currentIndex + 1) % layers.length;
        goToSlide(nextIndex);
      }

      function stop() {
        if (timer) {
          window.clearInterval(timer);
          timer = null;
        }
      }

      function start() {
        stop();
        timer = window.setInterval(nextSlide, 3500 + (index % 2) * 300);
      }

      rotator.addEventListener("mouseenter", stop);
      rotator.addEventListener("mouseleave", start);

      setTextTransition(true);
      start();
    });
  }
})();