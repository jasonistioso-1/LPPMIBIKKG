<footer class="site-footer custom-footer">
  <div class="container footer-modern">
    <div class="footer-brand">
      <img
        src="{{ asset('assets/logo_ibinew_putih.png') }}"
        alt="Logo IBI KKG"
        class="footer-logo-img"
      />
      <p data-lppm-cms="footer.brand.desc">{{ \App\Models\PageContent::getValue('footer.brand.desc', 'Lembaga Penelitian dan Pengabdian Masyarakat Institut Bisnis dan Informatika Kwik Kian Gie.', 'textarea', 'footer', 'Footer: Deskripsi Singkat') }}</p>
    </div>

    <div class="footer-info">
      <h3>LPPM IBI Kwik Kian Gie</h3>
      <p>
        {{ \App\Models\PageContent::getValue('contact.address', 'Jl. Yos Sudarso Kav. 87, Sunter, Jakarta Utara') }}
      </p>

      <iframe
        id="dynamicMap"
        class="map-frame footer-map-frame"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      ></iframe>

      <div class="location-status" id="locationStatus">
        Map: Kwik Kian Gie School of Business
      </div>
    </div>

    <div class="footer-contact footer-col-3">
      <h3>Hubungi Kami</h3>

      <div class="social-icons">
        <a href="https://www.instagram.com/lppmkkg?igsh=MTA1NzE5M3NlM2p2dQ==" class="icon-box icon-instagram" target="_blank" rel="noopener noreferrer">
          <i class="fab fa-instagram"></i>
        </a>

        <a href="https://www.youtube.com/@ibikwikkiangie" class="icon-box icon-youtube" target="_blank" rel="noopener noreferrer">
          <i class="fab fa-youtube"></i>
        </a>

        <a href="https://www.tiktok.com/@ibikwikkiangie" class="icon-box icon-tiktok" target="_blank" rel="noopener noreferrer">
          <i class="fab fa-tiktok"></i>
        </a>
      </div>

      <div class="contact-details">
        <p>☎ <a href="tel:{{ \App\Models\PageContent::getValue('contact.phone', '(021) 6530 7062') }}">{{ \App\Models\PageContent::getValue('contact.phone', '(021) 6530 7062') }}</a></p>
        <p>✉ <a href="mailto:{{ \App\Models\PageContent::getValue('contact.email', 'lppm@kwikkiangie.ac.id') }}">{{ \App\Models\PageContent::getValue('contact.email', 'lppm@kwikkiangie.ac.id') }}</a></p>
      </div>
    </div>

    <div class="footer-links footer-col-4">
      <h3>Tautan Lainnya</h3>
      <ul class="footer-list">
        <li><a href="https://kwikkiangie.ac.id" target="_blank" rel="noopener noreferrer">Website utama</a></li>
        <li><a href="https://learning.kwikkiangie.ac.id" target="_blank" rel="noopener noreferrer">E-learning</a></li>
        <li><a href="https://sss.kwikkiangie.ac.id" target="_blank" rel="noopener noreferrer">Student Self Service</a></li>
        <li><a href="https://sinta.kemdiktisaintek.go.id/affiliations/departments/1113/032009" target="_blank" rel="noopener noreferrer">SINTA</a></li>
      </ul>
    </div>
  </div>

  <div class="footer-copyright">
    <div style="display: flex; flex-direction: column; align-items: center; gap: 6px;">
      <span>© 2025 IBIKKG. All rights reserved.</span>
      <span style="font-size: 11px; color: rgba(255,255,255,0.35); letter-spacing: 0.5px;">
        
        @php
            echo base64_decode('TWFkZSBieSBKYXNvbiBJc3Rpb3NvIGFuZCBLZW5ueSBBZHJpYW4gU2V0aWFidWRp');
        @endphp
      </span>
    </div>
  </div>
</footer>
