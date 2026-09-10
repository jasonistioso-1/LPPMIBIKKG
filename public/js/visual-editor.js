/**
 * LPPM Visual WYSIWYG Editor Engine
 * Frosted-glass inline visual editing system for administrators.
 */

document.addEventListener("DOMContentLoaded", () => {
  // Ensure we are in edit mode and CMS content is loaded
  if (!window.LPPM_CMS_CONTENT || !window.LPPM_CMS_AUTH) return;

  // Initialize CSS styles for the editor dynamically
  injectEditorStyles();

  // State Management
  let isPreviewMode = false;
  let activeElement = null;
  let activeCMSKey = null;

  // Utility to prevent HTML injection in input values
  function escapeHtml(unsafe) {
    if (!unsafe) return "";
    return String(unsafe)
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
  }

  // Selector mappings
  const cmsMap = window.LPPM_CMS_CONTENT;

  // 1. Create & Inject Floating Admin Header Bar
  const header = document.createElement("div");
  header.className = "lppm-editor-header";
  const username = window.LPPM_CMS_USER || "Administrator LPPM";
  header.innerHTML = `
    <div class="lppm-header-brand">
      <img src="/assets/logo_ibinew_putih.png" alt="Logo">
      <span>Mode Admin LPPM Aktif</span>
      <span class="lppm-editor-status">(Halo, ${username})</span>
    </div>
    <div class="lppm-header-actions">
      <button id="lppm-btn-kelola-menu" class="lppm-btn" style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); color: #ffffff; box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);">
        <i class="fa-solid fa-bars"></i> Kelola Menu Navbar
      </button>
      <button id="lppm-btn-panduan" class="lppm-btn" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: #ffffff; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);">
        <i class="fa-solid fa-circle-question"></i> Panduan Edit LPPM
      </button>
      <a href="/admin/logout" class="lppm-btn lppm-btn-danger">
        <i class="fa-solid fa-right-from-bracket"></i> Keluar
      </a>
    </div>
  `;
  // Mount all editor DOM elements immediately
  document.body.prepend(header);
  document.body.classList.add("lppm-editor-active");

  // 2. Create & Inject Collapsible Left Structured Sidebar
  const sidebar = document.createElement("div");
  sidebar.className = "lppm-editor-sidebar";
  sidebar.innerHTML = `
    <div class="lppm-sidebar-header">
      <h3><i class="fa-solid fa-gears"></i> Konten Halaman</h3>
      <button class="lppm-sidebar-close">&times;</button>
    </div>
    <div class="lppm-sidebar-search">
      <i class="fa-solid fa-magnifying-glass"></i>
      <input type="text" id="lppm-sidebar-search-input" placeholder="Cari konten...">
    </div>
    <div class="lppm-sidebar-body" id="lppm-sidebar-list">
      <!-- Dynamically populated list -->
    </div>
  `;
  document.body.appendChild(sidebar);

  // 3. Create & Inject Floating Hover Overlay Box
  const hoverOverlay = document.createElement("div");
  hoverOverlay.className = "lppm-hover-overlay";
  hoverOverlay.innerHTML = `
    <span class="lppm-overlay-pill"><i class="fa-solid fa-pen"></i> Edit</span>
  `;
  document.body.appendChild(hoverOverlay);

  // 4. Create & Inject Frosted Glass Slide-Drawer Editor (Right)
  const drawer = document.createElement("div");
  drawer.className = "lppm-editor-drawer";
  drawer.innerHTML = `
    <div class="lppm-drawer-header">
      <h3><i class="fa-solid fa-pen-to-square"></i> Edit Konten</h3>
      <button class="lppm-drawer-close">&times;</button>
    </div>
    <div class="lppm-drawer-body">
      <form id="lppm-drawer-form" enctype="multipart/form-data">
        <input type="hidden" id="lppm-input-key" name="key">
        
        <div class="lppm-form-group">
          <label id="lppm-label-name">Nama Bidang</label>
          <span id="lppm-label-key" class="lppm-key-badge">key.name</span>
        </div>

        <div id="lppm-input-container">
          <!-- Dynamically populated fields -->
        </div>

        <button type="submit" class="lppm-btn-save">
          <i class="fa-solid fa-floppy-disk"></i> Simpan Konten
        </button>
      </form>
    </div>
  `;
  document.body.appendChild(drawer);

  // 5. Create & Inject Success Toast Notification
  const toast = document.createElement("div");
  toast.className = "lppm-editor-toast";
  document.body.appendChild(toast);

  // Toggle Sidebar Button
  const sidebarBtn = document.getElementById("lppm-btn-sidebar-toggle");
  if (sidebarBtn) {
    sidebarBtn.addEventListener("click", () => {
      sidebar.classList.toggle("open");
    });
  }

  // Panduan Button Event
  const panduanBtn = document.getElementById("lppm-btn-panduan");
  
  // Inject Guide Styles
  const guideStyle = document.createElement("style");
  guideStyle.innerHTML = `
    .lppm-guide-modal-overlay {
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(5, 11, 20, 0.8);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      z-index: 100000;
      display: flex;
      justify-content: center;
      align-items: center;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }
    .lppm-guide-modal-overlay.open {
      opacity: 1;
      visibility: visible;
    }
    .lppm-guide-modal {
      background: #0B192C;
      border: 1px solid rgba(255,255,255,0.1);
      border-radius: 16px;
      width: 90%;
      max-width: 700px;
      max-height: 90vh;
      display: flex;
      flex-direction: column;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
      transform: translateY(20px);
      transition: all 0.3s ease;
      color: #f1f5f9;
      font-family: 'Poppins', sans-serif;
    }
    .lppm-guide-modal-overlay.open .lppm-guide-modal {
      transform: translateY(0);
    }
    .lppm-guide-header {
      padding: 20px 25px;
      border-bottom: 1px solid rgba(255,255,255,0.05);
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: rgba(255,255,255,0.02);
      border-radius: 16px 16px 0 0;
    }
    .lppm-guide-header h3 {
      margin: 0;
      font-size: 18px;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 10px;
      color: #38bdf8;
    }
    .lppm-guide-close {
      background: transparent;
      border: none;
      color: #94a3b8;
      font-size: 28px;
      cursor: pointer;
      line-height: 1;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .lppm-guide-close:hover {
      color: #ef4444;
    }
    .lppm-guide-body {
      padding: 25px;
      overflow-y: auto;
    }
    .lppm-guide-section {
      background: rgba(255,255,255,0.03);
      border: 1px solid rgba(255,255,255,0.05);
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 20px;
    }
    .lppm-guide-section:last-child {
      margin-bottom: 0;
    }
    .lppm-guide-section h4 {
      margin: 0 0 10px 0;
      font-size: 16px;
      font-weight: 600;
      color: #ffffff;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .lppm-guide-section p {
      margin: 0 0 15px 0;
      font-size: 13px;
      color: #94a3b8;
      line-height: 1.5;
    }
    .lppm-guide-list {
      margin: 0;
      padding: 0;
      list-style: none;
    }
    .lppm-guide-list li {
      margin-bottom: 12px;
      font-size: 13px;
      color: #cbd5e1;
      display: flex;
      align-items: flex-start;
      gap: 10px;
      line-height: 1.6;
    }
    .lppm-guide-list li:last-child {
      margin-bottom: 0;
    }
    .lppm-guide-list li i.fa-check-circle {
      color: #10b981;
      margin-top: 4px;
      flex-shrink: 0;
    }
    .lppm-guide-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 3px 8px;
      border-radius: 6px;
      font-weight: 600;
      font-size: 11px;
      color: white;
      vertical-align: middle;
      border: none;
    }
    .lppm-guide-badge.blue { background: #3b82f6; }
    .lppm-guide-badge.green { background: #10b981; }
    .lppm-guide-badge.red { background: #ef4444; }
    .lppm-guide-badge.dark { background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.15); color: #cbd5e1;}
  `;
  document.head.appendChild(guideStyle);

  // Create Guide Modal Overlay
  const guideOverlay = document.createElement("div");
  guideOverlay.className = "lppm-guide-modal-overlay";
  guideOverlay.innerHTML = `
    <div class="lppm-guide-modal">
      <div class="lppm-guide-header">
        <h3><i class="fa-solid fa-book-open"></i> Panduan Penggunaan Visual Editor LPPM</h3>
        <button class="lppm-guide-close" title="Tutup">&times;</button>
      </div>
      <div class="lppm-guide-body">
        <div class="lppm-guide-section">
          <h4><i class="fa-solid fa-pen-to-square"></i> 1. Mengubah Teks & Gambar (Hover Edit)</h4>
          <p>Anda bisa mengubah hampir semua teks dan gambar yang ada di halaman ini secara langsung layaknya mengedit dokumen.</p>
          <ul class="lppm-guide-list">
            <li><i class="fa-solid fa-check-circle"></i> <strong>Arahkan Kursor (Hover):</strong> Dekatkan kursor mouse Anda ke teks atau gambar mana saja di halaman ini.</li>
            <li><i class="fa-solid fa-check-circle"></i> <strong>Klik Edit:</strong> Jika muncul kotak putus-putus atau ikon pensil (<i class="fa-solid fa-pencil" style="color: #38bdf8;"></i>) / kamera (<i class="fa-solid fa-camera" style="color: #38bdf8;"></i>) yang melayang, klik saja elemen tersebut.</li>
            <li><i class="fa-solid fa-check-circle"></i> <strong>Simpan Perubahan:</strong> Jendela "Edit Konten" akan muncul dari sisi kanan layar. Masukkan teks baru atau unggah gambar pengganti, kemudian klik tombol <span class="lppm-guide-badge blue"><i class="fa-solid fa-floppy-disk"></i> Simpan Konten</span>.</li>
          </ul>
        </div>
        
        <div class="lppm-guide-section">
          <h4><i class="fa-solid fa-plus-circle"></i> 2. Menambah Konten Baru (Berita, Layanan, Banner)</h4>
          <p>Untuk bagian berulang seperti daftar berita, layanan, atau foto berjalan (carousel).</p>
          <ul class="lppm-guide-list">
            <li><i class="fa-solid fa-check-circle"></i> Cari tombol hijau besar bertuliskan <span class="lppm-guide-badge blue"><i class="fa-solid fa-circle-plus"></i> Tambah Baru</span> di atas daftar konten tersebut.</li>
            <li><i class="fa-solid fa-check-circle"></i> Formulir penambahan akan terbuka. Isi semua data yang dibutuhkan (seperti judul, deskripsi, gambar).</li>
            <li><i class="fa-solid fa-check-circle"></i> Setelah itu klik <span class="lppm-guide-badge blue"><i class="fa-solid fa-floppy-disk"></i> Simpan Konten</span>. Sistem akan otomatis memasukkan data baru Anda ke dalam daftar.</li>
          </ul>
        </div>

        <div class="lppm-guide-section">
          <h4><i class="fa-solid fa-trash-can"></i> 3. Menghapus Konten</h4>
          <p>Fitur untuk menghapus satu kartu/konten secara permanen dari halaman web.</p>
          <ul class="lppm-guide-list">
            <li><i class="fa-solid fa-check-circle"></i> Arahkan kursor Anda ke kartu spesifik (misalnya satu kartu berita). Anda akan melihat label <span class="lppm-guide-badge dark"><i class="fa-solid fa-user-shield"></i> KONTROL ADMIN</span> muncul.</li>
            <li><i class="fa-solid fa-check-circle"></i> Di sebelahnya, klik tombol merah <span class="lppm-guide-badge red"><i class="fa-solid fa-trash-can"></i> Hapus</span>.</li>
            <li><i class="fa-solid fa-check-circle"></i> Sistem akan meminta konfirmasi. Jika Anda yakin, tekan "OK".</li>
          </ul>
        </div>

        <div class="lppm-guide-section">
          <h4><i class="fa-solid fa-bars"></i> 4. Mengelola Menu Navigasi (Bilah Atas)</h4>
          <p>Untuk mengatur menu apa saja yang muncul di deretan atas website.</p>
          <ul class="lppm-guide-list">
            <li><i class="fa-solid fa-check-circle"></i> Klik tombol biru <span class="lppm-guide-badge blue"><i class="fa-solid fa-bars"></i> Kelola Menu Navbar</span> yang ada di barisan tombol admin atas.</li>
            <li><i class="fa-solid fa-check-circle"></i> Sebuah panel akan terbuka menampilkan seluruh struktur menu saat ini.</li>
            <li><i class="fa-solid fa-check-circle"></i> Anda dapat menekan ikon <span class="lppm-guide-badge blue"><i class="fa-solid fa-pen"></i></span> untuk mengedit nama/tautan menu, dan <span class="lppm-guide-badge red"><i class="fa-solid fa-trash"></i></span> untuk menghapusnya selamanya.</li>
          </ul>
        </div>
      </div>
    </div>
  `;
  document.body.appendChild(guideOverlay);

  // Close Guide Handler
  guideOverlay.querySelector(".lppm-guide-close").addEventListener("click", () => {
    guideOverlay.classList.remove("open");
  });
  
  // Close Guide when clicking outside
  guideOverlay.addEventListener("click", (e) => {
    if (e.target === guideOverlay) {
      guideOverlay.classList.remove("open");
    }
  });

  if (panduanBtn) {
    panduanBtn.addEventListener("click", () => {
      guideOverlay.classList.add("open");
    });
  }

  // Kelola Menu Button Event
  const menuBtn = document.getElementById("lppm-btn-kelola-menu");
  if (menuBtn) {
    menuBtn.addEventListener("click", () => {
      openManageMenusDrawer();
    });
  }

  sidebar.querySelector(".lppm-sidebar-close").addEventListener("click", () => {
    sidebar.classList.remove("open");
  });



  // Close Drawer Event
  drawer.querySelector(".lppm-drawer-close").addEventListener("click", () => {
    drawer.classList.remove("open");
  });

  // Populate Sidebar List dynamically on Page Context
  function populateSidebar() {
    const listContainer = document.getElementById("lppm-sidebar-list");
    listContainer.innerHTML = "";

    // Group keys by domain prefix
    const groups = {};
    for (const [key, item] of Object.entries(cmsMap)) {
      const parts = key.split('.');
      const groupName = parts[0].toUpperCase();
      if (!groups[groupName]) {
        groups[groupName] = [];
      }
      groups[groupName].push({ key, ...item });
    }

    for (const [groupName, items] of Object.entries(groups)) {
      const section = document.createElement("div");
      section.className = "lppm-sidebar-section";
      section.innerHTML = `
        <div class="lppm-sidebar-section-title">
          <span>${groupName}</span>
          <i class="fa-solid fa-chevron-down"></i>
        </div>
        <div class="lppm-sidebar-section-items">
          ${items.map(item => `
            <div class="lppm-sidebar-item" data-sidebar-key="${item.key}">
              <div class="lppm-sidebar-item-info">
                <strong>${item.label || item.key}</strong>
                <span>${item.key}</span>
              </div>
              <i class="fa-solid fa-edit"></i>
            </div>
          `).join('')}
        </div>
      `;
      listContainer.appendChild(section);

      // Section title toggle click handler
      section.querySelector(".lppm-sidebar-section-title").addEventListener("click", () => {
        section.classList.toggle("collapsed");
      });
    }

    // Left Sidebar search handler
    const searchInput = document.getElementById("lppm-sidebar-search-input");
    searchInput.addEventListener("input", (e) => {
      const query = e.target.value.toLowerCase();
      listContainer.querySelectorAll(".lppm-sidebar-item").forEach(itemEl => {
        const key = itemEl.getAttribute("data-sidebar-key").toLowerCase();
        const text = itemEl.querySelector("strong").innerText.toLowerCase();
        if (key.includes(query) || text.includes(query)) {
          itemEl.style.display = "flex";
        } else {
          itemEl.style.display = "none";
        }
      });
    });

    // Add click listeners to sidebar items
    listContainer.querySelectorAll(".lppm-sidebar-item").forEach(itemEl => {
      itemEl.addEventListener("click", () => {
        const key = itemEl.getAttribute("data-sidebar-key");
        // Scroll to corresponding page element if exists
        const pageEl = document.querySelector(`[data-lppm-cms="${key}"]`);
        if (pageEl) {
          pageEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
          // Highlight it briefly
          pageEl.style.transition = "box-shadow 0.5s ease-in-out";
          pageEl.style.boxShadow = "0 0 30px rgba(56, 189, 248, 0.8)";
          setTimeout(() => {
            pageEl.style.boxShadow = "";
          }, 2000);
        }
        
        // Trigger drawer edit for this key
        activeCMSKey = key;
        activeElement = pageEl || document.body;
        
        // Trigger right drawer open with simulated click on hover overlay
        triggerDrawerOpen(key);
      });
    });
  }

  function triggerDrawerOpen(key) {
    // Pastikan tombol "Simpan Konten" standar selalu tampil (reset dari dual-photo mode)
    const standardSaveBtn = drawer.querySelector(".lppm-btn-save");
    if (standardSaveBtn) standardSaveBtn.style.display = "";

    let item = cmsMap[key];
    if (!item) {
      item = { value: "", label: "Konten Baru", type: "text" };
    }

    // === DUAL-PHOTO DETECTION ===
    // Deteksi dari POLA KEY saja (bukan type), karena record lama mungkin tersimpan dengan type='text'
    // Jika key berakhiran photo1 atau foto1, cari pasangannya (photo2/foto2)
    const isDualPhotoKey = /photo1$|foto1$/.test(key);
    if (isDualPhotoKey) {
      const key2 = key.replace(/photo1$/, "photo2").replace(/foto1$/, "foto2");
      const item2 = cmsMap[key2];
      if (item2) {
        // Ada photo2 → tampilkan dual-photo editor
        openDualPhotoDrawer(key, item, key2, item2);
        return;
      } else {
        // Tidak ada photo2 → paksa tampilkan single-image upload (bukan text input)
        drawer.querySelector("#lppm-input-key").value = key;
        drawer.querySelector("#lppm-label-name").innerText = item.label || "Foto";
        drawer.querySelector("#lppm-label-key").innerText = key;
        const container = drawer.querySelector("#lppm-input-container");
        container.innerHTML = `
          <div class="lppm-form-group">
            <label>Unggah Foto Baru</label>
            <div class="lppm-image-preview-box">
              <img src="${item.value ? '/' + item.value : ''}" id="lppm-preview-thumbnail" style="max-height:200px;object-fit:cover;width:100%;border-radius:6px;">
            </div>
            <input type="file" id="lppm-input-file" name="image" class="lppm-control" accept="image/*">
            <small class="lppm-help">JPG, PNG, WEBP. Maks 4MB.</small>
          </div>
        `;
        container.querySelector("#lppm-input-file").addEventListener("change", (e) => {
          const file = e.target.files[0];
          if (file) {
            const reader = new FileReader();
            reader.onload = (ev) => { container.querySelector("#lppm-preview-thumbnail").src = ev.target.result; };
            reader.readAsDataURL(file);
          }
        });
        drawer.classList.add("open");
        return;
      }
    }
    // ===========================

    drawer.querySelector("#lppm-input-key").value = key;
    drawer.querySelector("#lppm-label-name").innerText = item.label || "Konten";
    drawer.querySelector("#lppm-label-key").innerText = key;

    const container = drawer.querySelector("#lppm-input-container");
    container.innerHTML = "";

    if (item.type === "image") {
      container.innerHTML = `
        <div class="lppm-form-group">
          <label>Unggah Gambar Baru</label>
          <div class="lppm-image-preview-box">
            <img src="${item.value ? '/' + item.value : ''}" id="lppm-preview-thumbnail">
          </div>
          <input type="file" id="lppm-input-file" name="image" class="lppm-control" accept="image/*" required>
          <small class="lppm-help">Rekomendasi format: JPG, PNG, WEBP. Maks 4MB.</small>
        </div>
      `;

      // Live Thumbnail Preview Handler
      const fileInput = container.querySelector("#lppm-input-file");
      fileInput.addEventListener("change", (e) => {
        const file = e.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = (event) => {
            container.querySelector("#lppm-preview-thumbnail").src = event.target.result;
          };
          reader.readAsDataURL(file);
        }
      });

    } else if (item.value.includes("\n") || item.value.length > 80) {
      container.innerHTML = `
        <div class="lppm-form-group">
          <label>Isi Konten (Multi-Baris)</label>
          <textarea id="lppm-input-value" name="value" class="lppm-control lppm-textarea" rows="8" required>${item.value}</textarea>
          <small class="lppm-help">Gunakan baris baru (Enter) untuk teks berupa daftar/list.</small>
        </div>
      `;
    } else {
      container.innerHTML = `
        <div class="lppm-form-group">
          <label>Isi Konten Teks</label>
          <input type="text" id="lppm-input-value" name="value" class="lppm-control" value="${item.value}" required>
        </div>
      `;
    }

    drawer.classList.add("open");
  }

  /**
   * Buka drawer dengan 2 input upload foto sekaligus (Foto 1 + Foto 2).
   * Digunakan untuk elemen yang memiliki pasangan foto (photo1/foto1 + photo2/foto2).
   */
  function openDualPhotoDrawer(key1, item1, key2, item2) {
    drawer.querySelector("#lppm-input-key").value = key1;
    drawer.querySelector("#lppm-label-name").innerText = (item1.label || key1).replace(/foto1|photo1/i, "Foto");
    drawer.querySelector("#lppm-label-key").innerText = "Edit 2 Foto Sekaligus";

    const container = drawer.querySelector("#lppm-input-container");
    const saveBtn = drawer.querySelector(".lppm-btn-save");

    container.innerHTML = `
      <div style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.2); border-radius: 8px; padding: 12px; margin-bottom: 16px;">
        <p style="margin: 0; font-size: 12px; color: #93c5fd; display: flex; align-items: center; gap: 6px;">
          <i class="fa-solid fa-circle-info"></i>
          Ganti Foto 1 (tampilan utama) dan/atau Foto 2 (tampilan hover/rotasi). Kosongkan jika tidak ingin mengganti.
        </p>
      </div>

      <!-- Foto 1 -->
      <div class="lppm-form-group" style="padding: 14px; background: rgba(255,255,255,0.03); border-radius: 8px; border: 1px solid rgba(255,255,255,0.08); margin-bottom: 14px;">
        <label style="font-weight: 700; font-size: 13px; color: #60a5fa; display: flex; align-items: center; gap: 6px; margin-bottom: 10px;">
          <i class="fa-solid fa-image"></i> Foto 1 — Tampilan Utama
        </label>
        <div class="lppm-image-preview-box" style="margin-bottom: 10px;">
          <img src="${item1.value ? '/' + item1.value : ''}" id="lppm-preview-foto1" style="max-height: 130px; object-fit: cover; border-radius: 6px; width: 100%;">
        </div>
        <input type="file" id="lppm-file-foto1" class="lppm-control" accept="image/*">
        <small class="lppm-help">JPG, PNG, WEBP. Maks 4MB. Kosongkan jika tidak ingin diganti.</small>
      </div>

      <!-- Foto 2 -->
      <div class="lppm-form-group" style="padding: 14px; background: rgba(255,255,255,0.03); border-radius: 8px; border: 1px solid rgba(255,255,255,0.08);">
        <label style="font-weight: 700; font-size: 13px; color: #a78bfa; display: flex; align-items: center; gap: 6px; margin-bottom: 10px;">
          <i class="fa-solid fa-images"></i> Foto 2 — Tampilan Hover / Rotasi
        </label>
        <div class="lppm-image-preview-box" style="margin-bottom: 10px;">
          <img src="${item2.value ? '/' + item2.value : ''}" id="lppm-preview-foto2" style="max-height: 130px; object-fit: cover; border-radius: 6px; width: 100%;">
        </div>
        <input type="file" id="lppm-file-foto2" class="lppm-control" accept="image/*">
        <small class="lppm-help">JPG, PNG, WEBP. Maks 4MB. Kosongkan jika tidak ingin diganti.</small>
      </div>

      <button type="button" id="lppm-dual-photo-save" class="lppm-btn-save" style="margin-top: 16px; width: 100%;">
        <i class="fa-solid fa-floppy-disk"></i> Simpan Foto
      </button>
    `;

    // Hide the standard save button (kita pakai tombol custom di atas)
    if (saveBtn) saveBtn.style.display = "none";

    // Live preview Foto 1
    container.querySelector("#lppm-file-foto1").addEventListener("change", (e) => {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (ev) => { container.querySelector("#lppm-preview-foto1").src = ev.target.result; };
        reader.readAsDataURL(file);
      }
    });

    // Live preview Foto 2
    container.querySelector("#lppm-file-foto2").addEventListener("change", (e) => {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (ev) => { container.querySelector("#lppm-preview-foto2").src = ev.target.result; };
        reader.readAsDataURL(file);
      }
    });

    // Simpan handler — kirim 2 request terpisah jika ada file yang dipilih
    container.querySelector("#lppm-dual-photo-save").addEventListener("click", async () => {
      const file1 = container.querySelector("#lppm-file-foto1").files[0];
      const file2 = container.querySelector("#lppm-file-foto2").files[0];
      const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute("content");

      if (!file1 && !file2) {
        showToast("<i class='fa-solid fa-triangle-exclamation'></i> Pilih minimal satu foto untuk disimpan.");
        return;
      }

      const saveBtn2 = container.querySelector("#lppm-dual-photo-save");
      saveBtn2.disabled = true;
      saveBtn2.innerHTML = `<i class="fa-solid fa-spinner fa-spin"></i> Menyimpan...`;

      let success = true;

      // Upload Foto 1
      if (file1) {
        const fd1 = new FormData();
        fd1.append("key", key1);
        fd1.append("image", file1);
        try {
          const res = await fetch("/admin/update-ajax", { method: "POST", headers: { "X-CSRF-TOKEN": csrfToken || "" }, body: fd1 });
          const data = await res.json();
          if (data.success) {
            // Update preview dan cmsMap
            container.querySelector("#lppm-preview-foto1").src = data.value;
            if (window.LPPM_CMS_CONTENT && window.LPPM_CMS_CONTENT[key1]) {
              window.LPPM_CMS_CONTENT[key1].value = data.value.replace(/^\//, "");
            }
            // Update img di halaman
            const pageImg = document.querySelector(`[data-lppm-cms="${key1}"]`);
            if (pageImg && pageImg.tagName === "IMG") pageImg.src = data.value;
          } else { success = false; }
        } catch { success = false; }
      }

      // Upload Foto 2
      if (file2) {
        const fd2 = new FormData();
        fd2.append("key", key2);
        fd2.append("image", file2);
        try {
          const res = await fetch("/admin/update-ajax", { method: "POST", headers: { "X-CSRF-TOKEN": csrfToken || "" }, body: fd2 });
          const data = await res.json();
          if (data.success) {
            container.querySelector("#lppm-preview-foto2").src = data.value;
            if (window.LPPM_CMS_CONTENT && window.LPPM_CMS_CONTENT[key2]) {
              window.LPPM_CMS_CONTENT[key2].value = data.value.replace(/^\//, "");
            }
            // Update data-alt-src di halaman
            const pageImg1 = document.querySelector(`[data-lppm-cms="${key1}"]`);
            if (pageImg1) pageImg1.setAttribute("data-alt-src", data.value);
          } else { success = false; }
        } catch { success = false; }
      }

      saveBtn2.disabled = false;
      saveBtn2.innerHTML = `<i class="fa-solid fa-floppy-disk"></i> Simpan Foto`;

      if (success) {
        showToast("<i class='fa-solid fa-check-circle'></i> Foto berhasil diperbarui! Memuat ulang...");
        setTimeout(() => {
          window.location.reload();
        }, 1000);
      } else {
        showToast("<i class='fa-solid fa-circle-xmark'></i> Gagal menyimpan satu atau lebih foto.");
      }
    });

    drawer.classList.add("open");
  }

  // Scanner Algoritma to Bind Hover/Clicks
  function scanAndBind() {
    if (isPreviewMode) return;

    // Scan explicitly marked items first
    const marked = document.querySelectorAll("[data-lppm-cms]");
    marked.forEach(el => {
      const key = el.getAttribute("data-lppm-cms");
      if (key && cmsMap[key] && !el.classList.contains("lppm-editable-item")) {
        if (key.includes(".slide.")) return;
        bindCMSItem(el, key, cmsMap[key]);
      }
    });

    // Scan all text wrapper nodes and images in the main workspace
    const targets = document.querySelectorAll("h1, h2, h3, h4, h5, h6, p, a, span, li, img, td, .stat-number, .badge");

    targets.forEach(el => {
      // Prevent scanner from binding to admin tools, site headers, or topbars
      if (el.closest(".lppm-editor-header") || el.closest(".lppm-editor-drawer") || el.closest(".lppm-editor-sidebar") || el.closest(".lppm-editor-toast") || el.closest(".lppm-hover-overlay") || el.closest(".site-header") || el.closest(".topbar")) return;

      // Check if this is an image
      if (el.tagName.toLowerCase() === "img") {
        // Prevent double binding on the secondary photo layer
        if (el.classList.contains("photo-layer") && !el.classList.contains("is-active")) return;
        
        const srcAttr = el.getAttribute("src");
        if (srcAttr) {
          // Find matching dynamic image
          for (const [key, item] of Object.entries(cmsMap)) {
            if (key.includes(".slide.")) continue;
            if (item.type === "image" && srcAttr.includes(item.value)) {
              bindCMSItem(el, key, item);
              break;
            }
          }
        }
      } else {
        // Text Content matching
        const text = el.innerText.trim();
        if (text.length > 0) {
          for (const [key, item] of Object.entries(cmsMap)) {
            if (key.includes(".slide.")) continue;
            if (item.type !== "image" && item.value && text === item.value.trim()) {
              bindCMSItem(el, key, item);
              break;
            }
          }
        }
      }
    });

    // Inject blue edit badges and KONTROL ADMIN card badges
    injectEditBadges();
  }

  // Inject edit indicators and card admin badges
  function injectEditBadges() {
    if (isPreviewMode) return;

    // 1. Find all cards with data-card-prefix
    document.querySelectorAll("[data-card-prefix]").forEach(card => {
      if (card.querySelector(".lppm-card-control-badge")) return;

      const cardPrefix = card.getAttribute("data-card-prefix");
      
      const badge = document.createElement("div");
      badge.className = "lppm-card-control-badge";
      badge.innerHTML = `
        <span class="lppm-badge-text"><i class="fa-solid fa-user-shield"></i> KONTROL ADMIN</span>
        <div style="display: flex; gap: 8px;">
          <button type="button" class="lppm-btn-card-edit" title="Edit Item Ini"><i class="fa-solid fa-pen"></i> Edit</button>
          <button type="button" class="lppm-btn-card-delete" title="Hapus Item Ini"><i class="fa-solid fa-trash-can"></i> Hapus</button>
        </div>
      `;

      card.appendChild(badge);

      // Handle Edit Event
      const editBtn = badge.querySelector(".lppm-btn-card-edit");
      editBtn.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        openEditCardDrawer(cardPrefix);
      });

      // Handle Delete Event
      const deleteBtn = badge.querySelector(".lppm-btn-card-delete");
      deleteBtn.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        if (confirm("Apakah Anda yakin ingin menghapus item ini secara permanen?")) {
          const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute("content");
          fetch("/admin/delete-card-ajax", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": csrfToken || ""
            },
            body: JSON.stringify({ prefix: cardPrefix })
          })
          .then(res => res.json())
          .then(data => {
            if (data.success) {
              showToast("<i class='fa-solid fa-trash-can'></i> Item berhasil dihapus!");
              card.style.transition = "all 0.5s ease";
              card.style.opacity = "0";
              card.style.transform = "scale(0.8)";
              setTimeout(() => {
                card.remove();
                updateAbsoluteIndicators();
              }, 500);
            } else {
              showToast("<i class='fa-solid fa-triangle-exclamation'></i> Gagal menghapus item.");
            }
          })
          .catch(err => {
            showToast("<i class='fa-solid fa-circle-xmark'></i> Terjadi kesalahan jaringan.");
          });
        }
      });
    });

    // 2. Bind Add Buttons
    document.querySelectorAll(".lppm-btn-add-item").forEach(btn => {
      if (btn.classList.contains("lppm-bound")) return;
      btn.classList.add("lppm-bound");
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        const type = btn.getAttribute("data-add-type");
        const page = btn.getAttribute("data-add-page") || "home";
        openAddCardDrawer(type, page);
      });
    });

    // 3. Bind Manage Slides Button
    document.querySelectorAll(".lppm-btn-manage-slides").forEach(btn => {
      if (btn.classList.contains("lppm-bound")) return;
      btn.classList.add("lppm-bound");
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        openManageSlidesDrawer();
      });
    });

    const kelolaPrestasiBtn = document.getElementById("lppm-btn-kelola-prestasi-slide");
    if (kelolaPrestasiBtn && !kelolaPrestasiBtn.classList.contains("lppm-bound")) {
      kelolaPrestasiBtn.classList.add("lppm-bound");
      kelolaPrestasiBtn.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        openManageSlidesDrawer("prestasi");
      });
    }
  }

  // Update absolute-positioned floating indicators dynamically without breaking DOM texts/images layout
  function updateAbsoluteIndicators() {
    if (isPreviewMode) return;

    // Remove old absolute indicators
    document.querySelectorAll(".lppm-absolute-indicator").forEach(ind => ind.remove());

    let container = document.getElementById("lppm-absolute-indicators-container");
    if (!container) {
      container = document.createElement("div");
      container.id = "lppm-absolute-indicators-container";
      document.body.appendChild(container);
    }
    container.innerHTML = "";

    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    const scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;

    document.querySelectorAll("[data-lppm-cms]").forEach(el => {
      const key = el.getAttribute("data-lppm-cms");
      if (key && key.includes(".slide.")) return;

      // Ignore if inside admin headers, drawers, sidebars, hover overlays, inside dynamic card elements, or site header/topbar
      if (el.closest(".lppm-editor-header") || el.closest(".lppm-editor-drawer") || el.closest(".lppm-editor-sidebar") || el.closest(".lppm-hover-overlay") || el.closest("[data-card-prefix]") || el.closest(".site-header") || el.closest(".topbar")) return;

      const rect = el.getBoundingClientRect();
      if (rect.width === 0 || rect.height === 0) return; // Skip hidden elements

      const isImg = el.tagName.toLowerCase() === "img";
      const indicator = document.createElement("span");
      indicator.className = "lppm-absolute-indicator";
      indicator.title = isImg ? "Edit Gambar" : "Edit Teks";
      indicator.innerHTML = isImg ? `<i class="fa-solid fa-camera"></i>` : `<i class="fa-solid fa-pencil"></i>`;

      // Position absolute at top-left corner
      indicator.style.position = "absolute";
      indicator.style.top = `${rect.top + scrollTop - 8}px`;
      indicator.style.left = `${rect.left + scrollLeft - 8}px`;
      indicator.style.zIndex = "9999";

      // Bind click handler to open editor drawer
      indicator.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        const key = el.getAttribute("data-lppm-cms");
        if (key) triggerDrawerOpen(key);
      });

      container.appendChild(indicator);
    });
  }

  // Open Drawer for Add Dynamic Card Mode
  function openAddCardDrawer(type, page = "home") {
    const saveBtn = drawer.querySelector(".lppm-btn-save");
    if (saveBtn) saveBtn.style.display = "block";

    drawer.querySelector("#lppm-input-key").value = ""; // clear key to indicate creation
    
    let typeName = "";
    if (type === "service") typeName = "Layanan Baru";
    if (type === "news") typeName = "Berita Baru";
    if (type === "video") typeName = "Video Baru";
    if (type === "slide") typeName = "Banner Slide Baru";

    drawer.querySelector("#lppm-label-name").innerText = "Tambah " + typeName;
    drawer.querySelector("#lppm-label-key").innerText = "Tipe: " + type.toUpperCase();

    const container = drawer.querySelector("#lppm-input-container");
    container.innerHTML = "";

    // Hidden input to specify type
    const typeInput = document.createElement("input");
    typeInput.type = "hidden";
    typeInput.name = "type";
    typeInput.value = type;
    container.appendChild(typeInput);

    // Hidden input to specify page
    const pageInput = document.createElement("input");
    pageInput.type = "hidden";
    pageInput.name = "page";
    pageInput.value = page;
    container.appendChild(pageInput);

    // Standard inputs depending on type
    if (type === "service") {
      container.innerHTML += `
        <div class="lppm-form-group">
          <label>Judul Layanan</label>
          <input type="text" name="title" class="lppm-control" placeholder="Contoh: Penelitian" required>
        </div>
        <div class="lppm-form-group">
          <label>Deskripsi Singkat</label>
          <textarea name="desc" class="lppm-control lppm-textarea" rows="4" placeholder="Masukkan deskripsi layanan..." required></textarea>
        </div>
        <div class="lppm-form-group">
          <label>Gambar / Icon Layanan</label>
          <div class="lppm-image-preview-box">
            <img src="/assets/images/pkm2024.jpeg" id="lppm-preview-thumbnail">
          </div>
          <input type="file" name="image" id="lppm-input-file" class="lppm-control" accept="image/*">
          <small class="lppm-help">Rekomendasi format: JPG, PNG, WEBP. Maks 4MB.</small>
        </div>
        <div class="lppm-form-group">
          <label>URL / Link Rute</label>
          <input type="text" name="url" class="lppm-control" placeholder="Contoh: /penelitian/pengumuman" required>
        </div>
      `;
    } else if (type === "news") {
      container.innerHTML += `
        <div class="lppm-form-group">
          <label>Judul Berita</label>
          <input type="text" name="title" class="lppm-control" placeholder="Masukkan judul berita..." required>
        </div>
        <div class="lppm-form-group">
          <label>Tanggal Rilis</label>
          <input type="text" name="date" class="lppm-control" placeholder="Contoh: 20 Mei 2026 atau November 2025" required>
        </div>
        <div class="lppm-form-group">
          <label>Gambar / Poster Berita</label>
          <div class="lppm-image-preview-box">
            <img src="/assets/images/pkm2024.jpeg" id="lppm-preview-thumbnail">
          </div>
          <input type="file" name="image" id="lppm-input-file" class="lppm-control" accept="image/*">
          <small class="lppm-help">Rekomendasi format: JPG, PNG, WEBP. Maks 4MB.</small>
        </div>
        <div class="lppm-form-group">
          <label>URL / Link Eksternal (Opsional)</label>
          <input type="text" name="url" class="lppm-control" placeholder="Contoh: /penelitian/pengumuman atau javascript:void(0)">
          <small class="lppm-help">Kosongkan jika ingin berita ini membuka pop-up / modal detail.</small>
        </div>
        <div class="lppm-form-group">
          <label>Konten Detail Berita (HTML / Paragraf)</label>
          <textarea name="long" class="lppm-control lppm-textarea" rows="6" placeholder="Masukkan konten detail berita jika menggunakan pop-up..."></textarea>
        </div>
      `;
    } else if (type === "video") {
      container.innerHTML += `
        <div class="lppm-form-group">
          <label>Judul Video</label>
          <input type="text" name="title" class="lppm-control" placeholder="Masukkan judul video..." required>
        </div>
        <div class="lppm-form-group">
          <label>Deskripsi Video</label>
          <textarea name="desc" class="lppm-control lppm-textarea" rows="4" placeholder="Masukkan deskripsi video..." required></textarea>
        </div>
        <div class="lppm-form-group">
          <label>Thumbnail Video</label>
          <div class="lppm-image-preview-box">
            <img src="/assets/images/pkm2024.jpeg" id="lppm-preview-thumbnail">
          </div>
          <input type="file" name="image" id="lppm-input-file" class="lppm-control" accept="image/*">
          <small class="lppm-help">Rekomendasi format: JPG, PNG, WEBP. Maks 4MB.</small>
        </div>
        <div class="lppm-form-group">
          <label>URL / Link Video (YouTube / Dll)</label>
          <input type="text" name="url" class="lppm-control" placeholder="Contoh: https://youtu.be/uD1E8MuZK5c" required>
        </div>
      `;
    } else if (type === "slide") {
      container.innerHTML += `
        <div class="lppm-form-group">
          <label>Badge Banner</label>
          <input type="text" name="badge" class="lppm-control" placeholder="Contoh: Kegiatan LPPM" required>
        </div>
        <div class="lppm-form-group">
          <label>Judul Banner</label>
          <input type="text" name="title" class="lppm-control" placeholder="Masukkan judul..." required>
        </div>
        <div class="lppm-form-group">
          <label>Deskripsi Singkat</label>
          <textarea name="desc" class="lppm-control lppm-textarea" rows="4" placeholder="Masukkan deskripsi..." required></textarea>
        </div>
        <div class="lppm-form-group">
          <label>Gambar Banner</label>
          <div class="lppm-image-preview-box">
            <img src="/assets/images/pkm2024.jpeg" id="lppm-preview-thumbnail">
          </div>
          <input type="file" name="image" id="lppm-input-file" class="lppm-control" accept="image/*">
          <small class="lppm-help">Rekomendasi format: JPG, PNG, WEBP. Maks 4MB.</small>
        </div>
        <div class="lppm-form-group">
          <label>URL / Link Detail</label>
          <input type="text" name="url" class="lppm-control" placeholder="Contoh: /profil/tentang-kami atau #" required>
        </div>
      `;
    }

    // Live Thumbnail Preview Handler for file input in add form
    const fileInput = container.querySelector("#lppm-input-file");
    if (fileInput) {
      fileInput.addEventListener("change", (e) => {
        const file = e.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = (event) => {
            container.querySelector("#lppm-preview-thumbnail").src = event.target.result;
          };
          reader.readAsDataURL(file);
        }
      });
    }

    drawer.classList.add("open");
  }

  // Open Drawer to manage all banner slides (multi-slide list CRUD)
  function openManageSlidesDrawer(page = "home") {
    drawer.querySelector("#lppm-label-name").innerText = page === "home" ? "Kelola Banner Slide" : "Kelola Slide Hibah";
    drawer.querySelector("#lppm-label-key").innerText = "Jumlah slide banner aktif";
    drawer.querySelector("#lppm-input-key").value = ""; // No single key

    const container = drawer.querySelector("#lppm-input-container");
    container.innerHTML = "";

    // 1. Group slides from cmsMap
    const slidesGroup = {};
    const cmsMap = window.LPPM_CMS_CONTENT || {};
    
    const prefix = `${page}.slide.`;
    for (const [key, item] of Object.entries(cmsMap)) {
      if (key.startsWith(prefix)) {
        const parts = key.split(".");
        const id = parts[2]; // e.g. "1" or "2"
        const field = parts[3]; // e.g. "title", "desc", "badge", "image", "url"
        
        if (!slidesGroup[id]) {
          slidesGroup[id] = {};
        }
        slidesGroup[id][field] = item.value;
      }
    }

    // 2. Generate Manage UI inside the drawer
    let html = `
      <div style="margin-bottom: 20px;">
        <button type="button" class="lppm-btn-add-slide-new" style="width: 100%; padding: 12px; background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); color: white; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px; box-shadow: 0 4px 10px rgba(59, 130, 246, 0.3); transition: transform 0.2s;">
          <i class="fa-solid fa-circle-plus"></i> Tambah Banner Baru
        </button>
      </div>
      <div class="lppm-manage-slides-list" style="display: flex; flex-direction: column; gap: 12px;">
    `;

    // Sort IDs numerically
    const sortedIds = Object.keys(slidesGroup).sort((a, b) => parseInt(a) - parseInt(b));

    if (sortedIds.length === 0) {
      html += `<div style="text-align: center; color: #94a3b8; padding: 20px;">Belum ada slide banner.</div>`;
    } else {
      sortedIds.forEach(id => {
        const slide = slidesGroup[id];
        const title = slide.title || "Slide Tanpa Judul";
        const badge = slide.badge || "Slide";
        const image = slide.image || "assets/images/pkm2024.jpeg";
        
        html += `
          <div class="lppm-slide-row" style="display: flex; align-items: center; justify-content: space-between; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); padding: 10px; border-radius: 6px; gap: 10px;">
            <img src="/${image}" style="width: 60px; height: 45px; object-fit: cover; border-radius: 4px; border: 1px solid rgba(255,255,255,0.15);" onerror="this.src='/assets/images/pkm2024.jpeg'">
            <div style="flex: 1; min-width: 0; display: flex; flex-direction: column;">
              <span style="font-size: 10px; text-transform: uppercase; font-weight: bold; color: #3b82f6;">${escapeHtml(badge)}</span>
              <strong style="font-size: 13px; color: #fff; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">${escapeHtml(title)}</strong>
              <span style="font-size: 11px; color: #94a3b8;">ID: ${page}.slide.${id}</span>
            </div>
            <div style="display: flex; gap: 6px;">
              <button type="button" class="lppm-btn-slide-row-edit" data-id="${id}" style="background: #3b82f6; color: white; border: none; padding: 6px 10px; border-radius: 4px; font-size: 11px; font-weight: 600; cursor: pointer;"><i class="fa-solid fa-pen"></i> Edit</button>
              <button type="button" class="lppm-btn-slide-row-delete" data-id="${id}" style="background: #ef4444; color: white; border: none; padding: 6px 10px; border-radius: 4px; font-size: 11px; font-weight: 600; cursor: pointer;"><i class="fa-solid fa-trash"></i> Hapus</button>
            </div>
          </div>
        `;
      });
    }

    html += `</div>`;
    container.innerHTML = html;

    // Hide the standard "Simpan Konten" button since actions are immediate or opening sub-forms
    const saveBtn = drawer.querySelector(".lppm-btn-save");
    if (saveBtn) {
      saveBtn.style.display = "none";
    }

    // Bind Add button
    container.querySelector(".lppm-btn-add-slide-new").addEventListener("click", () => {
      openAddCardDrawer("slide", page);
    });

    // Bind Edit/Delete buttons for each row
    container.querySelectorAll(".lppm-btn-slide-row-edit").forEach(btn => {
      btn.addEventListener("click", () => {
        const id = btn.getAttribute("data-id");
        openEditCardDrawer(`${page}.slide.${id}`);
      });
    });

    container.querySelectorAll(".lppm-btn-slide-row-delete").forEach(btn => {
      btn.addEventListener("click", () => {
        const id = btn.getAttribute("data-id");
        if (confirm("Apakah Anda yakin ingin menghapus slide ini secara permanen?")) {
          const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute("content");
          fetch("/admin/delete-card-ajax", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": csrfToken || ""
            },
            body: JSON.stringify({ prefix: `${page}.slide.${id}` })
          })
          .then(res => res.json())
          .then(data => {
            if (data.success) {
              showToast("<i class='fa-solid fa-trash-can'></i> Slide berhasil dihapus!");
              // Reload visual-editor's state of cmsMap before refreshing the drawer
              if (window.LPPM_CMS_CONTENT) {
                delete window.LPPM_CMS_CONTENT[`${page}.slide.${id}.title`];
                delete window.LPPM_CMS_CONTENT[`${page}.slide.${id}.desc`];
                delete window.LPPM_CMS_CONTENT[`${page}.slide.${id}.badge`];
                delete window.LPPM_CMS_CONTENT[`${page}.slide.${id}.image`];
                delete window.LPPM_CMS_CONTENT[`${page}.slide.${id}.url`];
              }
              openManageSlidesDrawer(page); // Refresh list immediately!
            } else {
              showToast("<i class='fa-solid fa-triangle-exclamation'></i> Gagal menghapus slide.");
            }
          })
          .catch(err => {
            showToast("<i class='fa-solid fa-circle-xmark'></i> Terjadi kesalahan jaringan.");
          });
        }
      });
    });

    drawer.classList.add("open");
  }

  // Open Drawer to manage all menus (navbar and subnavbar CRUD)
  function openManageMenusDrawer() {
    drawer.querySelector("#lppm-label-name").innerText = "Kelola Menu Navbar";
    drawer.querySelector("#lppm-label-key").innerText = "Struktur Navigasi LPPM";
    drawer.querySelector("#lppm-input-key").value = "";

    const container = drawer.querySelector("#lppm-input-container");
    container.innerHTML = "";

    const menus = window.LPPM_CMS_MENUS || [];

    // Separate main menus and submenus
    const mainMenus = menus.filter(m => !m.parent_id);
    const subMenus = menus.filter(m => m.parent_id);

    let html = `

      <div class="lppm-manage-menus-list" style="display: flex; flex-direction: column; gap: 12px; max-height: 450px; overflow-y: auto; padding-right: 5px;">
    `;

    if (mainMenus.length === 0) {
      html += `<div style="text-align: center; color: #94a3b8; padding: 20px;">Belum ada menu navigasi.</div>`;
    } else {
      mainMenus.forEach(main => {
        const children = subMenus.filter(s => s.parent_id === main.id);
        
        html += `
          <div class="lppm-menu-parent-box" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.06); border-radius: 8px; padding: 10px; display: flex; flex-direction: column; gap: 8px;">
            <div class="lppm-menu-row" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; background: rgba(59, 130, 246, 0.08); padding: 8px; border-radius: 6px; border-left: 3px solid #3b82f6;">
                <div style="flex: 1; min-width: 0; display: flex; flex-direction: column;">
                  <strong style="font-size: 13px; color: #fff; text-transform: uppercase; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">${escapeHtml(main.name)}</strong>
                  <span style="font-size: 11px; color: #94a3b8; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Rute: ${escapeHtml(main.route_name || main.url || 'Tidak Ada Link')} | Urutan: ${main.order}</span>
                </div>
              <div style="display: flex; gap: 6px; flex-shrink: 0;">
                <button type="button" class="lppm-btn-menu-edit" data-id="${main.id}" style="background: #3b82f6; color: white; border: none; padding: 5px 8px; border-radius: 4px; font-size: 10px; font-weight: 600; cursor: pointer;" title="Edit Menu"><i class="fa-solid fa-pen"></i></button>
                <button type="button" class="lppm-btn-menu-delete" data-id="${main.id}" style="background: #ef4444; color: white; border: none; padding: 5px 8px; border-radius: 4px; font-size: 10px; font-weight: 600; cursor: pointer;" title="Hapus Menu"><i class="fa-solid fa-trash"></i></button>
              </div>
            </div>
        `;

        if (children.length > 0) {
          html += `<div style="display: flex; flex-direction: column; gap: 6px; padding-left: 15px; border-left: 1px dashed rgba(255,255,255,0.12); margin-top: 4px;">`;
          children.forEach(sub => {
            html += `
              <div class="lppm-menu-row submenu" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; background: rgba(255, 255, 255, 0.02); padding: 6px 8px; border-radius: 4px; border-left: 2px solid #10b981;">
                <div style="flex: 1; min-width: 0; display: flex; flex-direction: column;">
                  <span style="font-size: 12px; color: #e2e8f0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">${escapeHtml(sub.name)}</span>
                  <span style="font-size: 10px; color: #64748b; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Rute: ${escapeHtml(sub.route_name || sub.url || 'Tidak Ada Link')} | Urutan: ${sub.order}</span>
                </div>
                <div style="display: flex; gap: 6px; flex-shrink: 0;">
                  <button type="button" class="lppm-btn-menu-edit" data-id="${sub.id}" style="background: #10b981; color: white; border: none; padding: 4px 6px; border-radius: 4px; font-size: 9px; font-weight: 600; cursor: pointer;"><i class="fa-solid fa-pen"></i></button>
                  <button type="button" class="lppm-btn-menu-delete" data-id="${sub.id}" style="background: #ef4444; color: white; border: none; padding: 4px 6px; border-radius: 4px; font-size: 9px; font-weight: 600; cursor: pointer;"><i class="fa-solid fa-trash"></i></button>
                </div>
              </div>
            `;
          });
          html += `</div>`;
        }

        html += `</div>`;
      });
    }

    html += `</div>`;
    container.innerHTML = html;

    const saveBtn = drawer.querySelector(".lppm-btn-save");
    if (saveBtn) {
      saveBtn.style.display = "none";
    }



    // Bind Edit/Delete buttons
    container.querySelectorAll(".lppm-btn-menu-edit").forEach(btn => {
      btn.addEventListener("click", () => {
        const id = btn.getAttribute("data-id");
        openEditMenuForm(id);
      });
    });

    container.querySelectorAll(".lppm-btn-menu-delete").forEach(btn => {
      btn.addEventListener("click", () => {
        const id = btn.getAttribute("data-id");
        if (confirm("Apakah Anda yakin ingin menghapus menu ini? Semua sub-menu di dalamnya juga akan terhapus.")) {
          const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute("content");
          
          const form = document.createElement("form");
          form.method = "POST";
          form.action = `/admin/menus/${id}`;
          form.innerHTML = `
            <input type="hidden" name="_token" value="${csrfToken || ''}">
            <input type="hidden" name="_method" value="DELETE">
          `;
          document.body.appendChild(form);
          form.submit();
        }
      });
    });

    drawer.classList.add("open");
  }

  function openAddMenuForm(defaultParentId = null) {
    drawer.querySelector("#lppm-label-name").innerText = "Tambah Menu Baru";
    drawer.querySelector("#lppm-label-key").innerText = "Navigasi Baru";
    
    const container = drawer.querySelector("#lppm-input-container");
    container.innerHTML = getMenuFormHtml(null, defaultParentId);

    const routeSelect = container.querySelector("[name='route_name']");
    const customUrlGroup = container.querySelector("#custom-url-group");
    routeSelect.addEventListener("change", () => {
      if (routeSelect.value === "_custom_") {
        customUrlGroup.style.display = "block";
      } else {
        customUrlGroup.style.display = "none";
      }
    });

    const saveBtn = drawer.querySelector(".lppm-btn-save");
    if (saveBtn) {
      saveBtn.style.display = "block";
      saveBtn.innerHTML = `<i class="fa-solid fa-floppy-disk"></i> Simpan Menu`;
    }

    const form = document.getElementById("lppm-drawer-form");
    
    const menuSubmitHandler = (e) => {
      e.preventDefault();
      saveBtn.disabled = true;
      saveBtn.innerHTML = `<i class="fa-solid fa-spinner fa-spin"></i> Menyimpan...`;

      const formData = new FormData(form);
      const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute("content");

      if (formData.get("route_name") === "_custom_") {
        formData.set("route_name", "");
      } else {
        formData.set("url", "");
      }

      fetch("/admin/menus", {
        method: "POST",
        headers: {
          "X-CSRF-TOKEN": csrfToken || ""
        },
        body: formData
      })
      .then(() => {
        window.location.reload();
      })
      .catch(() => {
        saveBtn.disabled = false;
        saveBtn.innerHTML = `<i class="fa-solid fa-floppy-disk"></i> Simpan Menu`;
        alert("Gagal menyimpan menu!");
      });
    };

    const newForm = form.cloneNode(true);
    form.parentNode.replaceChild(newForm, form);
    newForm.addEventListener("submit", menuSubmitHandler);
  }

  function openEditMenuForm(id) {
    const menus = window.LPPM_CMS_MENUS || [];
    const menu = menus.find(m => m.id == id);
    if (!menu) return;

    drawer.querySelector("#lppm-label-name").innerText = "Edit Menu";
    drawer.querySelector("#lppm-label-key").innerText = "ID: " + menu.id;
    
    const container = drawer.querySelector("#lppm-input-container");
    container.innerHTML = getMenuFormHtml(menu);

    const routeSelect = container.querySelector("[name='route_name']");
    const customUrlGroup = container.querySelector("#custom-url-group");
    routeSelect.addEventListener("change", () => {
      if (routeSelect.value === "_custom_") {
        customUrlGroup.style.display = "block";
      } else {
        customUrlGroup.style.display = "none";
      }
    });

    const saveBtn = drawer.querySelector(".lppm-btn-save");
    if (saveBtn) {
      saveBtn.style.display = "block";
      saveBtn.innerHTML = `<i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan`;
    }

    const form = document.getElementById("lppm-drawer-form");
    
    const menuSubmitHandler = (e) => {
      e.preventDefault();
      saveBtn.disabled = true;
      saveBtn.innerHTML = `<i class="fa-solid fa-spinner fa-spin"></i> Menyimpan...`;

      const formData = new FormData(form);
      const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute("content");

      if (formData.get("route_name") === "_custom_") {
        formData.set("route_name", "");
      } else {
        formData.set("url", "");
      }

      fetch(`/admin/menus/${id}`, {
        method: "POST",
        headers: {
          "X-CSRF-TOKEN": csrfToken || ""
        },
        body: formData
      })
      .then(() => {
        window.location.reload();
      })
      .catch(() => {
        saveBtn.disabled = false;
        saveBtn.innerHTML = `<i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan`;
        alert("Gagal memperbarui menu!");
      });
    };

    const newForm = form.cloneNode(true);
    form.parentNode.replaceChild(newForm, form);
    newForm.addEventListener("submit", menuSubmitHandler);
  }

  function getMenuFormHtml(menu, defaultParentId = null) {
    const menus = window.LPPM_CMS_MENUS || [];
    const mainMenus = menus.filter(m => !m.parent_id && (!menu || m.id != menu.id));

    const nameVal = menu ? escapeHtml(menu.name) : "";
    const parentVal = menu ? menu.parent_id : (defaultParentId || "");
    const routeVal = menu ? menu.route_name : "";
    const urlVal = menu ? escapeHtml(menu.url) : "";
    const orderVal = menu ? menu.order : 1;

    const routesList = [
      { name: "home", label: "Beranda" },
      { name: "profil.tentang-kami", label: "Profil: Tentang Kami" },
      { name: "profil.visi-misi", label: "Profil: Visi & Misi" },
      { name: "profil.struktur-organisasi", label: "Profil: Struktur Organisasi" },
      { name: "profil.prestasi", label: "Profil: Prestasi" },
      { name: "dosen.ilmuadministrasibisnis", label: "Akademisi: Adm. Bisnis" },
      { name: "dosen.akuntansi", label: "Akademisi: Akuntansi" },
      { name: "dosen.manajemen", label: "Akademisi: Manajemen" },
      { name: "dosen.ilmukomunikasi", label: "Akademisi: Ilmu Komunikasi" },
      { name: "dosen.sisteminformasi", label: "Akademisi: Sistem Informasi" },
      { name: "dosen.teknikinformatika", label: "Akademisi: Teknik Informatika" },
      { name: "penelitian.pengumuman", label: "Penelitian: Pengumuman" },
      { name: "penelitian.skema", label: "Penelitian: Skema" },
      { name: "penelitian.data-penelitian", label: "Penelitian: Data Penelitian" },
      { name: "abdimas.pengumuman", label: "Abdimas: Pengumuman" },
      { name: "abdimas.skema", label: "Abdimas: Skema" },
      { name: "abdimas.data-abdimas", label: "Abdimas: Data Abdimas" },
      { name: "publikasi.jurnal", label: "Publikasi: Jurnal" },
      { name: "publikasi.prosiding", label: "Publikasi: Prosiding" },
      { name: "publikasi.artikel-ilmiah", label: "Publikasi: Artikel Ilmiah" },
      { name: "dokumen.panduan", label: "Dokumen: Panduan" },
      { name: "dokumen.template", label: "Dokumen: Template" },
      { name: "dokumen.unduhan", label: "Dokumen: Unduhan" },
      { name: "kontak.informasi-kontak", label: "Kontak: Informasi" },
      { name: "kontak.jam-layanan", label: "Kontak: Jam Layanan" },
      { name: "kontak.lokasi-kampus", label: "Kontak: Lokasi" },
    ];

    let parentOptionsHtml = `<option value="">-- Tidak Ada / Menu Utama --</option>`;
    mainMenus.forEach(m => {
      parentOptionsHtml += `<option value="${m.id}" ${parentVal == m.id ? "selected" : ""}>${escapeHtml(m.name)}</option>`;
    });

    let routeOptionsHtml = `<option value="">-- Tanpa Rute / Link Saja --</option>`;
    routesList.forEach(r => {
      routeOptionsHtml += `<option value="${r.name}" ${routeVal == r.name ? "selected" : ""}>${r.label}</option>`;
    });
    const isCustomUrl = urlVal && !routeVal;
    routeOptionsHtml += `<option value="_custom_" ${isCustomUrl ? "selected" : ""}>-- URL Kustom --</option>`;

    return `
      <div class="lppm-form-group">
        <label>Nama Menu</label>
        <input type="text" name="name" class="lppm-control" placeholder="Contoh: BERANDA" value="${nameVal}" required>
      </div>

      <div class="lppm-form-group">
        <label>Induk Menu (Parent)</label>
        <select name="parent_id" class="lppm-control">
          ${parentOptionsHtml}
        </select>
        <small class="lppm-help">Pilih jika menu ini merupakan submenu (dropdown) dari menu utama.</small>
      </div>

      <div class="lppm-form-group">
        <label>Rute Halaman</label>
        <select name="route_name" class="lppm-control">
          ${routeOptionsHtml}
        </select>
      </div>

      <div class="lppm-form-group" id="custom-url-group" style="display: ${isCustomUrl ? "block" : "none"};">
        <label>URL / Tautan Kustom</label>
        <input type="text" name="url" class="lppm-control" placeholder="Contoh: https://linktr.ee/..." value="${urlVal}">
        <small class="lppm-help">Gunakan https:// atau http:// untuk link luar.</small>
      </div>

      <div class="lppm-form-group">
        <label>Urutan Tampilan</label>
        <input type="number" name="order" class="lppm-control" value="${orderVal}" min="1" required>
        <small class="lppm-help">Urutan tampilan menu dari kiri ke kanan (atau atas ke bawah).</small>
      </div>
    `;
  }

  // Open Drawer to edit an entire dynamic card (unified form CRUD)
  function openEditCardDrawer(cardPrefix) {
    const saveBtn = drawer.querySelector(".lppm-btn-save");
    if (saveBtn) saveBtn.style.display = "block";

    // Determine type from the cardPrefix (e.g. "home.service.1" -> "service")
    let type = "";
    if (cardPrefix.includes(".service.")) type = "service";
    else if (cardPrefix.includes(".news.")) type = "news";
    else if (cardPrefix.includes(".video.")) type = "video";
    else if (cardPrefix.includes(".slide.")) type = "slide";

    let typeName = "Layanan";
    if (type === "news") typeName = "Berita";
    if (type === "video") typeName = "Video";
    if (type === "slide") typeName = "Banner Slide";

    drawer.querySelector("#lppm-label-name").innerText = "Edit " + typeName;
    drawer.querySelector("#lppm-label-key").innerText = "Prefix: " + cardPrefix;
    drawer.querySelector("#lppm-input-key").value = cardPrefix;

    const container = drawer.querySelector("#lppm-input-container");
    container.innerHTML = "";

    // Hidden input to specify type
    const typeInput = document.createElement("input");
    typeInput.type = "hidden";
    typeInput.name = "type";
    typeInput.value = type;
    container.appendChild(typeInput);

    const cmsMap = window.LPPM_CMS_CONTENT || {};
    
    // Retrieve current values
    const currentTitle = cmsMap[`${cardPrefix}.title`]?.value || "";
    const currentDesc = cmsMap[`${cardPrefix}.desc`]?.value || "";
    const currentImage = cmsMap[`${cardPrefix}.image`]?.value || "";
    const currentUrl = cmsMap[`${cardPrefix}.url`]?.value || "";
    const currentDate = cmsMap[`${cardPrefix}.date`]?.value || "";
    const currentLong = cmsMap[`${cardPrefix}.long`]?.value || "";
    const currentBadge = cmsMap[`${cardPrefix}.badge`]?.value || "";

    if (type === "service") {
      container.innerHTML += `
        <div class="lppm-form-group">
          <label>Judul Layanan</label>
          <input type="text" name="title" class="lppm-control" placeholder="Masukkan judul layanan..." value="${escapeHtml(currentTitle)}" required>
        </div>
        <div class="lppm-form-group">
          <label>Deskripsi Singkat</label>
          <textarea name="desc" class="lppm-control lppm-textarea" rows="4" placeholder="Masukkan deskripsi..." required>${escapeHtml(currentDesc)}</textarea>
        </div>
        <div class="lppm-form-group">
          <label>Gambar Ikon</label>
          <div class="lppm-image-preview-box">
            <img src="${currentImage.startsWith('/') ? currentImage : '/' + currentImage}" id="lppm-preview-thumbnail">
          </div>
          <input type="file" name="image" id="lppm-input-file" class="lppm-control" accept="image/*">
        </div>
      `;
    } else if (type === "news") {
      container.innerHTML += `
        <div class="lppm-form-group">
          <label>Judul Berita</label>
          <input type="text" name="title" class="lppm-control" placeholder="Masukkan judul berita..." value="${escapeHtml(currentTitle)}" required>
        </div>
        <div class="lppm-form-group">
          <label>Tanggal Rilis</label>
          <input type="text" name="date" class="lppm-control" placeholder="Contoh: April 2026..." value="${escapeHtml(currentDate)}" required>
        </div>
        <div class="lppm-form-group">
          <label>Gambar Berita</label>
          <div class="lppm-image-preview-box">
            <img src="${currentImage.startsWith('/') ? currentImage : '/' + currentImage}" id="lppm-preview-thumbnail">
          </div>
          <input type="file" name="image" id="lppm-input-file" class="lppm-control" accept="image/*">
        </div>
        <div class="lppm-form-group">
          <label>URL / Tautan (Opsional)</label>
          <input type="text" name="url" class="lppm-control" placeholder="Contoh: /berita/detail/1" value="${escapeHtml(currentUrl)}">
        </div>
        <div class="lppm-form-group">
          <label>Konten Detail Berita (HTML / Paragraf)</label>
          <textarea name="long" class="lppm-control lppm-textarea" rows="6" placeholder="Masukkan konten detail berita jika menggunakan pop-up...">${escapeHtml(currentLong)}</textarea>
        </div>
      `;
    } else if (type === "video") {
      container.innerHTML += `
        <div class="lppm-form-group">
          <label>Judul Video</label>
          <input type="text" name="title" class="lppm-control" placeholder="Masukkan judul video..." value="${escapeHtml(currentTitle)}" required>
        </div>
        <div class="lppm-form-group">
          <label>Deskripsi Singkat</label>
          <textarea name="desc" class="lppm-control lppm-textarea" rows="2" placeholder="Masukkan deskripsi..." required>${escapeHtml(currentDesc)}</textarea>
        </div>
        <div class="lppm-form-group">
          <label>Gambar Thumbnail</label>
          <div class="lppm-image-preview-box">
            <img src="${currentImage.startsWith('/') ? currentImage : '/' + currentImage}" id="lppm-preview-thumbnail">
          </div>
          <input type="file" name="image" id="lppm-input-file" class="lppm-control" accept="image/*">
        </div>
        <div class="lppm-form-group">
          <label>URL YouTube / Video</label>
          <input type="url" name="url" class="lppm-control" placeholder="https://youtube.com/..." value="${escapeHtml(currentUrl)}" required>
        </div>
      `;
    } else if (type === "slide") {
      container.innerHTML += `
        <div class="lppm-form-group">
          <label>Badge Banner</label>
          <input type="text" name="badge" class="lppm-control" placeholder="Contoh: Kegiatan LPPM" value="${escapeHtml(currentBadge)}" required>
        </div>
        <div class="lppm-form-group">
          <label>Judul Banner</label>
          <input type="text" name="title" class="lppm-control" placeholder="Masukkan judul..." value="${escapeHtml(currentTitle)}" required>
        </div>
        <div class="lppm-form-group">
          <label>Deskripsi Singkat</label>
          <textarea name="desc" class="lppm-control lppm-textarea" rows="4" placeholder="Masukkan deskripsi..." required>${escapeHtml(currentDesc)}</textarea>
        </div>
        <div class="lppm-form-group">
          <label>Gambar Banner</label>
          <div class="lppm-image-preview-box">
            <img src="${currentImage.startsWith('/') ? currentImage : '/' + currentImage}" id="lppm-preview-thumbnail">
          </div>
          <input type="file" name="image" id="lppm-input-file" class="lppm-control" accept="image/*">
        </div>
        <div class="lppm-form-group">
          <label>URL Tombol (Lihat Detail)</label>
          <input type="text" name="url" class="lppm-control" placeholder="Contoh: /penelitian" value="${escapeHtml(currentUrl)}" required>
        </div>
      `;
    }

    // Live Thumbnail Preview Handler
    const fileInput = container.querySelector("#lppm-input-file");
    if (fileInput) {
      fileInput.addEventListener("change", (e) => {
        const file = e.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = (event) => {
            container.querySelector("#lppm-preview-thumbnail").src = event.target.result;
          };
          reader.readAsDataURL(file);
        }
      });
    }

    drawer.classList.add("open");
  }

  // Helper to escape HTML values securely
  function escapeHtml(text) {
    if (!text) return "";
    return text
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
  }

  function bindCMSItem(el, key, item) {
    el.setAttribute("data-lppm-cms", key);
    
    // Skip hover overlays for elements inside dynamic cards
    if (el.closest("[data-card-prefix]")) return;

    el.classList.add("lppm-editable-item");

    el.addEventListener("mouseenter", (e) => {
      if (isPreviewMode) return;
      
      activeElement = el;
      activeCMSKey = key;

      const rect = el.getBoundingClientRect();
      const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      const scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;

      hoverOverlay.style.top = `${rect.top + scrollTop}px`;
      hoverOverlay.style.left = `${rect.left + scrollLeft}px`;
      hoverOverlay.style.width = `${rect.width}px`;
      hoverOverlay.style.height = `${rect.height}px`;
      hoverOverlay.style.display = "block";
      
      const labelType = item.type === "image" ? "Gambar" : "Teks";
      hoverOverlay.querySelector(".lppm-overlay-pill").innerHTML = `<i class="fa-solid fa-pen"></i> Edit ${item.label || labelType}`;
    });
  }

  // Handle Mouse Leave of Editable Elements
  document.addEventListener("mouseover", (e) => {
    if (isPreviewMode) return;
    if (!e.target.closest(".lppm-editable-item") && !e.target.closest(".lppm-hover-overlay")) {
      hoverOverlay.style.display = "none";
    }
  });

  // Trigger Edit Drawer on Click
  hoverOverlay.addEventListener("click", () => {
    if (isPreviewMode || !activeCMSKey) return;
    triggerDrawerOpen(activeCMSKey);
  });

  // Submit Drawer Form using AJAX
  const form = document.getElementById("lppm-drawer-form");
  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const saveBtn = form.querySelector(".lppm-btn-save");
    saveBtn.disabled = true;
    saveBtn.innerHTML = `<i class="fa-solid fa-spinner fa-spin"></i> Menyimpan...`;

    const formData = new FormData(form);
    const key = formData.get("key");
    const isAdding = !key;
    
    let url = "/admin/update-ajax";
    if (isAdding) {
      url = "/admin/add-card-ajax";
    } else if (/^[a-z_]+\.(service|news|video|slide)\.\d+$/.test(key)) {
      url = "/admin/update-card-ajax";
    }

    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute("content");

    fetch(url, {
      method: "POST",
      headers: {
        "X-CSRF-TOKEN": csrfToken || ""
      },
      body: formData
    })
      .then(res => res.json())
      .then(data => {
        saveBtn.disabled = false;
        saveBtn.innerHTML = `<i class="fa-solid fa-floppy-disk"></i> Simpan Konten`;

        if (data.success) {
          if (isAdding || /^[a-z_]+\.(service|news|video|slide)\.\d+$/.test(key)) {
            showToast("<i class='fa-solid fa-circle-check'></i> Perubahan berhasil disimpan!");
            drawer.classList.remove("open");
            // Reload page to let the backend render the new item
            setTimeout(() => {
              window.location.reload();
            }, 1000);
          } else {
            // Update client-side state
            if (activeCMSKey && cmsMap[activeCMSKey]) {
              cmsMap[activeCMSKey].value = data.value;
            }

            // Perform DOM visual update directly
            if (activeElement && activeElement.tagName.toLowerCase() === "img") {
              activeElement.src = data.value;
            } else {
              // Trigger a quick reload to let backend format complex items (lists, splits) perfectly!
              showToast("<i class='fa-solid fa-circle-check'></i> Konten diperbarui secara instan!");
              setTimeout(() => {
                window.location.reload();
              }, 1000);
              return;
            }

            showToast("<i class='fa-solid fa-circle-check'></i> Perubahan berhasil disimpan secara instan!");
            drawer.classList.remove("open");
            hoverOverlay.style.display = "none";
          }
        } else {
          showToast("<i class='fa-solid fa-triangle-exclamation'></i> " + (data.message || "Gagal menyimpan perubahan."));
        }
      })
      .catch(err => {
        saveBtn.disabled = false;
        saveBtn.innerHTML = `<i class="fa-solid fa-floppy-disk"></i> Simpan Konten`;
        showToast("<i class='fa-solid fa-circle-xmark'></i> Kesalahan jaringan atau server.");
      });
  });

  function showToast(message) {
    toast.innerHTML = message;
    toast.classList.add("show");
    setTimeout(() => {
      toast.classList.remove("show");
    }, 3000);
  }

  // Trigger initial runs
  scanAndBind();
  populateSidebar();
  updateAbsoluteIndicators();

  // Periodically run visual scan to catch dynamic components
  setInterval(() => {
    scanAndBind();
    updateAbsoluteIndicators();
  }, 2000);

  window.addEventListener("scroll", updateAbsoluteIndicators);
  window.addEventListener("resize", updateAbsoluteIndicators);
});

/**
 * CSS Injections to render the frosted glass dashboard visual overlays perfectly.
 */
function injectEditorStyles() {
  const style = document.createElement("style");
  style.textContent = `
    /* Editor global reset and space */
    body.lppm-editor-active {
      padding-top: 60px !important;
      transition: padding-left 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .site-header {
      z-index: 99998 !important;
    }

    /* Floating Header Bar */
    .lppm-editor-header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      height: 60px;
      background: linear-gradient(90deg, #0f172a 0%, #1e3a8a 40%, #1e40af 100%);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
      border-bottom: 3px solid #3b82f6;
      z-index: 999999;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 30px;
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
      font-family: 'Poppins', sans-serif;
    }

    .lppm-header-brand {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .lppm-header-brand img {
      height: 32px;
    }

    .lppm-header-brand span {
      font-size: 16px;
      font-weight: 700;
      color: #ffffff;
      letter-spacing: 0.5px;
    }

    .lppm-editor-status {
      font-size: 10px !important;
      font-weight: 800 !important;
      color: #38bdf8 !important;
      background: rgba(56, 189, 248, 0.12);
      padding: 3px 8px;
      border-radius: 6px;
      letter-spacing: 1px;
    }

    .lppm-header-actions {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    /* General Premium Buttons */
    .lppm-btn {
      padding: 8px 16px;
      font-size: 13px;
      font-weight: 600;
      border-radius: 8px;
      border: none;
      cursor: pointer;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s ease;
      font-family: 'Poppins', sans-serif;
    }

    .lppm-btn-primary {
      background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
      color: #ffffff;
      box-shadow: 0 4px 15px rgba(37, 99, 235, 0.2);
    }
    
    .lppm-btn-primary:hover {
      transform: translateY(-1px);
      box-shadow: 0 6px 20px rgba(37, 99, 235, 0.35);
    }

    .lppm-btn-secondary {
      background: rgba(255, 255, 255, 0.08);
      color: #e2e8f0;
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .lppm-btn-secondary:hover {
      background: rgba(255, 255, 255, 0.15);
      color: #ffffff;
    }

    .lppm-btn-success {
      background: linear-gradient(135deg, #059669 0%, #10b981 100%);
      color: #ffffff;
      box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
    }

    .lppm-btn-danger {
      background: rgba(239, 68, 68, 0.15);
      color: #fca5a5;
      border: 1px solid rgba(239, 68, 68, 0.3);
    }

    .lppm-btn-danger:hover {
      background: rgba(239, 68, 68, 0.3);
      color: #ffffff;
    }

    /* Left Structured Sidebar Panel */
    .lppm-editor-sidebar {
      position: fixed;
      top: 60px;
      left: -320px;
      width: 300px;
      height: calc(100vh - 60px);
      background: rgba(15, 23, 42, 0.95);
      backdrop-filter: blur(25px);
      -webkit-backdrop-filter: blur(25px);
      border-right: 1px solid rgba(255, 255, 255, 0.08);
      z-index: 999998;
      box-shadow: 15px 0 40px rgba(0, 0, 0, 0.4);
      transition: left 0.4s cubic-bezier(0.16, 1, 0.3, 1);
      display: flex;
      flex-direction: column;
      font-family: 'Poppins', sans-serif;
      color: #ffffff;
    }

    .lppm-editor-sidebar.open {
      left: 0;
    }

    .lppm-sidebar-header {
      padding: 20px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.06);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .lppm-sidebar-header h3 {
      margin: 0;
      font-size: 14px;
      font-weight: 700;
      color: #ffffff;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .lppm-sidebar-close {
      background: transparent;
      border: none;
      color: #94a3b8;
      font-size: 20px;
      cursor: pointer;
      line-height: 1;
    }

    .lppm-sidebar-search {
      padding: 10px 20px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.06);
      display: flex;
      align-items: center;
      gap: 10px;
      background: rgba(0, 0, 0, 0.2);
    }

    .lppm-sidebar-search i {
      color: #64748b;
      font-size: 13px;
    }

    .lppm-sidebar-search input {
      background: transparent;
      border: none;
      color: #ffffff;
      font-size: 13px;
      outline: none;
      width: 100%;
      font-family: inherit;
    }

    .lppm-sidebar-body {
      flex-grow: 1;
      overflow-y: auto;
      padding: 15px;
    }

    /* Sidebar Content Sections */
    .lppm-sidebar-section {
      margin-bottom: 15px;
      background: rgba(255, 255, 255, 0.02);
      border-radius: 8px;
      border: 1px solid rgba(255, 255, 255, 0.04);
      overflow: hidden;
    }

    .lppm-sidebar-section-title {
      padding: 12px 15px;
      font-size: 11px;
      font-weight: 800;
      color: #94a3b8;
      display: flex;
      align-items: center;
      justify-content: space-between;
      cursor: pointer;
      background: rgba(255, 255, 255, 0.04);
      letter-spacing: 0.5px;
    }

    .lppm-sidebar-section-title i {
      transition: transform 0.3s;
      font-size: 10px;
    }

    .lppm-sidebar-section.collapsed .lppm-sidebar-section-title i {
      transform: rotate(-90deg);
    }

    .lppm-sidebar-section.collapsed .lppm-sidebar-section-items {
      display: none;
    }

    .lppm-sidebar-section-items {
      display: flex;
      flex-direction: column;
    }

    .lppm-sidebar-item {
      padding: 12px 15px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.02);
      display: flex;
      align-items: center;
      justify-content: space-between;
      cursor: pointer;
      transition: all 0.2s;
    }

    .lppm-sidebar-item:hover {
      background: rgba(56, 189, 248, 0.08);
    }

    .lppm-sidebar-item-info {
      display: flex;
      flex-direction: column;
      gap: 3px;
      max-width: 80%;
    }

    .lppm-sidebar-item-info strong {
      font-size: 12.5px;
      color: #f1f5f9;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .lppm-sidebar-item-info span {
      font-size: 10px;
      color: #64748b;
      font-family: monospace;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .lppm-sidebar-item i {
      font-size: 12px;
      color: #64748b;
      transition: color 0.2s;
    }

    .lppm-sidebar-item:hover i {
      color: #38bdf8;
    }

    /* Visual Hover Elements & Outline Overlays */
    .lppm-editable-item {
      position: relative;
    }

    .lppm-hover-overlay {
      position: absolute;
      border: 2px dashed #38bdf8;
      background: rgba(56, 189, 248, 0.06);
      box-shadow: 0 0 12px rgba(56, 189, 248, 0.25);
      border-radius: 8px;
      z-index: 99999;
      pointer-events: auto;
      cursor: pointer;
      display: none;
      transition: border-color 0.2s, background 0.2s;
    }

    .lppm-hover-overlay:hover {
      border-color: #2563eb;
      background: rgba(37, 99, 235, 0.1);
      box-shadow: 0 0 20px rgba(37, 99, 235, 0.4);
    }

    .lppm-overlay-pill {
      position: absolute;
      top: -28px;
      left: 10px;
      background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%);
      color: #ffffff;
      padding: 4px 10px;
      border-radius: 6px;
      font-size: 11px;
      font-weight: 700;
      white-space: nowrap;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
      font-family: 'Poppins', sans-serif;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    /* Frosted-glass Slide-out Drawer Editor Dashboard (Right) */
    .lppm-editor-drawer {
      position: fixed;
      top: 0;
      right: -420px;
      width: 400px;
      height: 100vh;
      background: rgba(15, 23, 42, 0.95);
      backdrop-filter: blur(25px);
      -webkit-backdrop-filter: blur(25px);
      border-left: 1px solid rgba(255, 255, 255, 0.08);
      z-index: 9999999;
      box-shadow: -15px 0 40px rgba(0, 0, 0, 0.5);
      transition: right 0.4s cubic-bezier(0.16, 1, 0.3, 1);
      display: flex;
      flex-direction: column;
      font-family: 'Poppins', sans-serif;
      color: #ffffff;
    }

    .lppm-editor-drawer.open {
      right: 0;
    }

    .lppm-drawer-header {
      padding: 25px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.06);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .lppm-drawer-header h3 {
      margin: 0;
      font-size: 16px;
      font-weight: 700;
      color: #ffffff;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .lppm-drawer-close {
      background: transparent;
      border: none;
      color: #94a3b8;
      font-size: 24px;
      cursor: pointer;
      line-height: 1;
      transition: color 0.2s;
    }

    .lppm-drawer-close:hover {
      color: #ffffff;
    }

    .lppm-drawer-body {
      padding: 25px;
      flex-grow: 1;
      overflow-y: auto;
    }

    /* Drawer Form Fields & Controls */
    .lppm-form-group {
      display: flex;
      flex-direction: column;
      gap: 8px;
      margin-bottom: 20px;
    }

    .lppm-form-group label {
      font-size: 13px;
      font-weight: 600;
      color: #cbd5e1;
    }

    .lppm-key-badge {
      font-size: 11px;
      font-family: monospace;
      color: #38bdf8;
      background: rgba(56, 189, 248, 0.1);
      padding: 4px 8px;
      border-radius: 6px;
      align-self: flex-start;
      margin-top: 4px;
    }

    .lppm-control {
      background: rgba(255, 255, 255, 0.03) !important;
      border: 1px solid rgba(255, 255, 255, 0.1) !important;
      border-radius: 10px !important;
      color: #ffffff !important;
      padding: 12px 14px !important;
      font-size: 13.5px !important;
      font-family: inherit !important;
      transition: all 0.3s ease !important;
      outline: none !important;
      width: 100% !important;
      box-sizing: border-box !important;
    }

    .lppm-control option {
      background: #1e293b !important;
      color: #ffffff !important;
    }

    .lppm-control:focus {
      border-color: #38bdf8 !important;
      box-shadow: 0 0 10px rgba(56, 189, 248, 0.25) !important;
      background: rgba(255, 255, 255, 0.05) !important;
    }

    .lppm-textarea {
      resize: vertical;
      line-height: 1.6;
    }

    .lppm-help {
      font-size: 11px;
      color: #64748b;
      margin-top: 4px;
    }

    .lppm-btn-save {
      background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
      color: #ffffff;
      border: none;
      padding: 14px;
      font-size: 14px;
      font-weight: 700;
      border-radius: 10px;
      cursor: pointer;
      width: 100%;
      box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }

    .lppm-btn-save:hover:not(:disabled) {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(37, 99, 235, 0.45);
    }

    .lppm-btn-save:disabled {
      background: rgba(255, 255, 255, 0.1);
      color: #64748b;
      cursor: not-allowed;
      box-shadow: none;
    }

    /* Thumbnail Preview Block */
    .lppm-image-preview-box {
      width: 100%;
      height: 180px;
      border-radius: 12px;
      overflow: hidden;
      background: #000;
      border: 1px solid rgba(255,255,255,0.08);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 10px;
    }

    .lppm-image-preview-box img {
      max-width: 100%;
      max-height: 100%;
      object-fit: contain;
    }

    /* Toast Notification Toast */
    .lppm-editor-toast {
      position: fixed;
      bottom: -80px;
      left: 50%;
      transform: translateX(-50%);
      background: rgba(15, 23, 42, 0.95);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border: 1px solid rgba(16, 185, 129, 0.25);
      color: #34d399;
      padding: 15px 30px;
      border-radius: 50px;
      font-size: 14px;
      font-weight: 600;
      font-family: 'Poppins', sans-serif;
      box-shadow: 0 10px 30px rgba(0,0,0,0.5);
      z-index: 99999999;
      transition: bottom 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .lppm-editor-toast.show {
      bottom: 40px;
    }

    /* Preview-only Mode Hides Overlays & Sidebars */
    body.lppm-preview-only {
      padding-top: 0 !important;
    }
    
    body.lppm-preview-only .lppm-editable-item {
      cursor: inherit !important;
    }

    body.lppm-preview-only .lppm-editor-header,
    body.lppm-preview-only .lppm-editor-sidebar,
    body.lppm-preview-only .lppm-editor-drawer,
    body.lppm-preview-only .lppm-hover-overlay,
    body.lppm-preview-only .lppm-absolute-indicator,
    body.lppm-preview-only .lppm-card-control-badge,
    body.lppm-preview-only .lppm-btn-add-item {
      display: none !important;
    }

    /* Absolute Floating Edit Indicator */
    .lppm-absolute-indicator {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
      color: #ffffff !important;
      width: 22px;
      height: 22px;
      border-radius: 50%;
      font-size: 10px;
      cursor: pointer;
      box-shadow: 0 2px 8px rgba(37, 99, 235, 0.4);
      transition: all 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      border: 1.5px solid rgba(255, 255, 255, 0.8);
      z-index: 99999;
    }
    
    .lppm-absolute-indicator:hover {
      transform: scale(1.25) rotate(15deg);
      background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
      box-shadow: 0 4px 12px rgba(37, 99, 235, 0.6);
    }

    /* KONTROL ADMIN Badge overlay on cards */
    .lppm-card-control-badge {
      position: absolute;
      top: 12px;
      left: 12px;
      right: 12px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: rgba(15, 23, 42, 0.85);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.15);
      padding: 6px 12px;
      border-radius: 8px;
      z-index: 99;
      opacity: 0.9;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(0,0,0,0.35);
    }
    
    .lppm-card-control-badge:hover {
      opacity: 1;
      background: rgba(15, 23, 42, 0.95);
      border-color: #2563eb;
    }
    
    .lppm-badge-text {
      color: #38bdf8;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.5px;
      display: flex;
      align-items: center;
      gap: 5px;
    }
    
    .lppm-btn-card-edit {
      background: #2563eb;
      color: #ffffff !important;
      border: none;
      padding: 4px 10px;
      font-size: 10px;
      font-weight: 700;
      border-radius: 6px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 4px;
      transition: background 0.2s, transform 0.2s;
    }
    
    .lppm-btn-card-edit:hover {
      background: #1d4ed8;
      transform: scale(1.05);
    }

    .lppm-btn-card-delete {
      background: #ef4444;
      color: #ffffff !important;
      border: none;
      padding: 4px 10px;
      font-size: 10px;
      font-weight: 700;
      border-radius: 6px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 4px;
      transition: background 0.2s, transform 0.2s;
    }
    
    .lppm-btn-card-delete:hover {
      background: #dc2626;
      transform: scale(1.05);
    }

    /* Section Add Buttons */
    .lppm-btn-add-item {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
      color: #ffffff !important;
      border: none;
      padding: 6px 14px;
      font-size: 12px;
      font-weight: 700;
      border-radius: 20px;
      cursor: pointer;
      box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4);
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: all 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      z-index: 100;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    
    .lppm-btn-add-item:hover {
      transform: translateY(-50%) scale(1.06);
      box-shadow: 0 6px 18px rgba(37, 99, 235, 0.6);
      background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    }

    /* Support absolute positioning inside cards */
    .layanan-grid .news-feature-card,
    .news-track .news-feature-card,
    .video-grid .news-feature-card {
      position: relative !important;
      overflow: hidden !important;
    }
  `;
  document.head.appendChild(style);
}
