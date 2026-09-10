@extends('layouts.app')
@section('title', 'Jurnal | LPPM IBI KKG')
@push('styles')
<link rel="stylesheet" href="{{ asset('publikasi/jurnal.css') }}" />
@endpush
@section('content')
<div class="bg-glow glow-1"></div>
  <div class="bg-glow glow-2"></div>

  

  <main>
    <section class="hero section jurnal-hero">
      <div class="container jurnal-hero-grid">
        <div class="hero-copy">
          <span class="badge" data-lppm-cms="publikasi.hero.badge">{{ \App\Models\PageContent::getValue('publikasi.hero.badge', 'Publikasi · Jurnal') }}</span>

          <div class="hero-title-row">
            <h1 data-lppm-cms="publikasi.hero.title">{{ \App\Models\PageContent::getValue('publikasi.hero.title', 'Jurnal Publikasi') }}</h1>
            
            <div style="position: relative;">
              <!-- Tombol Edit WA Khusus Admin (Akan muncul otomatis saat mode editor aktif via CSS) -->
              <div class="wa-admin-controls">
                <span data-lppm-cms="jurnal.wa.number" class="lppm-wa-admin-btn" title="Edit Nomor WhatsApp"><i class="fa-solid fa-phone"></i> Edit No WA</span>
                <span data-lppm-cms="jurnal.wa.message" class="lppm-wa-admin-btn" title="Edit Pesan WhatsApp"><i class="fa-solid fa-message"></i> Edit Pesan</span>
              </div>

              @php
                  $wa_num = preg_replace('/[^0-9]/', '', \App\Models\PageContent::getValue('jurnal.wa.number', '6281234567890'));
                  if (substr($wa_num, 0, 1) === '0') {
                      $wa_num = '62' . substr($wa_num, 1);
                  }
              @endphp
              <a href="https://wa.me/{{ $wa_num }}?text={{ urlencode(\App\Models\PageContent::getValue('jurnal.wa.message', 'Halo LPPM, saya ingin bertanya seputar Jurnal Publikasi.')) }}" 
                 class="wa-inline-card" target="_blank" rel="noopener noreferrer">
              <div class="wa-inline-icon">
                <svg viewBox="0 0 24 24" width="24" height="24">
                  <path fill="#25D366" d="M12.031 0C5.385 0 0 5.385 0 12.031c0 2.115.545 4.184 1.584 6.002L.062 24l6.104-1.602c1.761.95 3.754 1.452 5.865 1.452 6.646 0 12.031-5.385 12.031-12.031S18.677 0 12.031 0z" />
                  <path fill="#FFFFFF" d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347" />
                </svg>
              </div>
              <div class="wa-inline-content">
                <span class="wa-inline-title" data-lppm-cms="jurnal.wa.title">{{ \App\Models\PageContent::getValue('jurnal.wa.title', 'Tanya Seputar Jurnal') }}</span>
                <span class="wa-inline-desc" data-lppm-cms="jurnal.wa.desc">{{ \App\Models\PageContent::getValue('jurnal.wa.desc', 'Klik di sini untuk terhubung dengan admin via WhatsApp') }}</span>
              </div>
            </a>
            </div>

            <div class="index-marquee hero-marquee" aria-label="Index jurnal publikasi">
              <div class="index-marquee-track">
                <div class="index-marquee-item">
                  <img src="{{ asset('assets/images/index/sinta.png') }}" alt="SINTA" />
                </div>

                <div class="index-marquee-item">
                  <img src="{{ asset('assets/images/index/google-scholar.png') }}" alt="Google Scholar" />
                </div>

                <div class="index-marquee-item">
                  <img src="{{ asset('assets/images/index/garuda.png') }}" alt="GARUDA" />
                </div>

                <div class="index-marquee-item">
                  <img src="{{ asset('assets/images/index/crossreff.png') }}" alt="Crossref" />
                </div>

                <div class="index-marquee-item">
                  <img src="{{ asset('assets/images/index/indexcopernicus.png') }}" alt="Index Copernicus" />
                </div>

                <div class="index-marquee-item">
                  <img src="{{ asset('assets/images/index/dimensions.webp') }}" alt="Dimensions" />
                </div>
              </div>
            </div>
          </div>


          <div class="hero-actions">
            <a href="#daftar-jurnal" class="btn btn-primary" data-lppm-cms="publikasi.hero.btn1">{{ \App\Models\PageContent::getValue('publikasi.hero.btn1', 'Daftar Jurnal') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline" data-lppm-cms="publikasi.hero.btn2">{{ \App\Models\PageContent::getValue('publikasi.hero.btn2', 'Kembali ke Beranda') }}</a>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="daftar-jurnal">
      <div class="container">
        <div class="section-head section-head-center">
          <div>
            <span class="section-tag">Direktori Jurnal</span>
            <h2>Daftar Jurnal</h2>
          </div>
        </div>

        <div class="journal-grid">
          <article class="journal-card card">
            <div class="journal-index-ribbon">
              <img src="{{ asset('assets/images/index/sinta-3.png') }}" alt="SINTA 3" />
            </div>
            <div class="journal-cover">
              <img src="{{ asset(\App\Models\PageContent::getValue('jurnal.j1.cover', 'assets/images/jurnal/jurnal-akuntansi.jpg')) }}" alt="Cover Jurnal Akuntansi" />
            </div>
            <div class="journal-content">
              <h3>{{ \App\Models\PageContent::getValue('jurnal.j1.name', 'Jurnal Akuntansi') }}</h3>
              <p>{{ \App\Models\PageContent::getValue('jurnal.j1.desc', 'Publikasi ilmiah bidang akuntansi, auditing, perpajakan, dan pelaporan keuangan.') }}</p>
              <div class="journal-actions">
                <a href="{{ \App\Models\PageContent::getValue('jurnal.j1.url_deskripsi', 'https://jurnal.kwikkiangie.ac.id/index.php/JA') }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm">Deskripsi</a>
                <a href="{{ \App\Models\PageContent::getValue('jurnal.j1.url_issue', 'https://jurnal.kwikkiangie.ac.id/index.php/JA/issue/view/151') }}" target="_blank" rel="noopener noreferrer" class="btn btn-white btn-sm">Current Issue</a>
              </div>
            </div>
          </article>

          <article class="journal-card card">
            <div class="journal-index-ribbon">
              <img src="{{ asset('assets/images/index/sinta-4.png') }}" alt="SINTA 4" />
            </div>
            <div class="journal-cover">
              <img src="{{ asset(\App\Models\PageContent::getValue('jurnal.j2.cover', 'assets/images/jurnal/jurnal-manajemen.jpg')) }}" alt="Cover Jurnal Manajemen" />
            </div>
            <div class="journal-content">
              <h3>{{ \App\Models\PageContent::getValue('jurnal.j2.name', 'Jurnal Manajemen') }}</h3>
              <p>{{ \App\Models\PageContent::getValue('jurnal.j2.desc', 'Artikel ilmiah bidang manajemen, pemasaran, keuangan, sumber daya manusia, dan strategi bisnis.') }}</p>
              <div class="journal-actions">
                <a href="{{ \App\Models\PageContent::getValue('jurnal.j2.url_deskripsi', 'https://jurnal.kwikkiangie.ac.id/index.php/JM') }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm">Deskripsi</a>
                <a href="{{ \App\Models\PageContent::getValue('jurnal.j2.url_issue', 'https://jurnal.kwikkiangie.ac.id/index.php/JM/issue/view/149') }}" target="_blank" rel="noopener noreferrer" class="btn btn-white btn-sm">Current Issue</a>
              </div>
            </div>
          </article>

          <article class="journal-card card">
            <div class="journal-index-ribbon">
              <img src="{{ asset('assets/images/index/sinta-3.png') }}" alt="SINTA 3" />
            </div>
            <div class="journal-cover">
              <img src="{{ asset(\App\Models\PageContent::getValue('jurnal.j3.cover', 'assets/images/jurnal/jurnal-komunikasi-bisnis.png')) }}" alt="Cover Jurnal Komunikasi dan Bisnis" />
            </div>
            <div class="journal-content">
              <h3>{{ \App\Models\PageContent::getValue('jurnal.j3.name', 'Jurnal Komunikasi dan Bisnis') }}</h3>
              <p>{{ \App\Models\PageContent::getValue('jurnal.j3.desc', 'Publikasi bidang komunikasi, media, branding, public relations, dan komunikasi bisnis.') }}</p>
              <div class="journal-actions">
                <a href="{{ \App\Models\PageContent::getValue('jurnal.j3.url_deskripsi', 'https://jurnal.kwikkiangie.ac.id/index.php/JKB') }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm">Deskripsi</a>
                <a href="{{ \App\Models\PageContent::getValue('jurnal.j3.url_issue', 'https://jurnal.kwikkiangie.ac.id/index.php/JKB/issue/view/152') }}" target="_blank" rel="noopener noreferrer" class="btn btn-white btn-sm">Current Issue</a>
              </div>
            </div>
          </article>

          <article class="journal-card card">
            <div class="journal-index-ribbon">
              <img src="{{ asset('assets/images/index/sinta-5.jpg') }}" alt="SINTA 5" />
            </div>
            <div class="journal-cover">
              <img src="{{ asset(\App\Models\PageContent::getValue('jurnal.j4.cover', 'assets/images/jurnal/jurnal-ekonomi-perusahaan.jpg')) }}" alt="Cover Jurnal Ekonomi Perusahaan" />
            </div>
            <div class="journal-content">
              <h3>{{ \App\Models\PageContent::getValue('jurnal.j4.name', 'Jurnal Ekonomi Perusahaan') }}</h3>
              <p>{{ \App\Models\PageContent::getValue('jurnal.j4.desc', 'Kajian ekonomi perusahaan, kebijakan bisnis, dan pengembangan usaha.') }}</p>
              <div class="journal-actions">
                <a href="{{ \App\Models\PageContent::getValue('jurnal.j4.url_deskripsi', 'https://jurnal.kwikkiangie.ac.id/index.php/JEP') }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm">Deskripsi</a>
                <a href="{{ \App\Models\PageContent::getValue('jurnal.j4.url_issue', 'https://jurnal.kwikkiangie.ac.id/index.php/JEP/issue/view/153') }}" target="_blank" rel="noopener noreferrer" class="btn btn-white btn-sm">Current Issue</a>
              </div>
            </div>
          </article>

          <article class="journal-card card">
            <div class="journal-index-ribbon">
              <img src="{{ asset('assets/images/index/sinta-5.jpg') }}" alt="SINTA 5" />
            </div>
            <div class="journal-cover">
              <img src="{{ asset(\App\Models\PageContent::getValue('jurnal.j5.cover', 'assets/images/jurnal/jurnal-informatika-bisnis.jpg')) }}" alt="Cover Jurnal Informatika dan Bisnis" />
            </div>
            <div class="journal-content">
              <h3>{{ \App\Models\PageContent::getValue('jurnal.j5.name', 'Jurnal Informatika dan Bisnis') }}</h3>
              <p>{{ \App\Models\PageContent::getValue('jurnal.j5.desc', 'Publikasi sistem informasi, informatika, data, teknologi digital, dan bisnis.') }}</p>
              <div class="journal-actions">
                <a href="{{ \App\Models\PageContent::getValue('jurnal.j5.url_deskripsi', 'https://jurnal.kwikkiangie.ac.id/index.php/JIB') }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm">Deskripsi</a>
                <a href="{{ \App\Models\PageContent::getValue('jurnal.j5.url_issue', 'https://jurnal.kwikkiangie.ac.id/index.php/JIB/issue/view/154') }}" target="_blank" rel="noopener noreferrer" class="btn btn-white btn-sm">Current Issue</a>
              </div>
            </div>
          </article>

          <article class="journal-card card">
            <div class="journal-index-ribbon">
              <img src="{{ asset('assets/images/index/sinta-5.jpg') }}" alt="SINTA 5" />
            </div>
            <div class="journal-cover">
              <img src="{{ asset(\App\Models\PageContent::getValue('jurnal.j6.cover', 'assets/images/jurnal/global-research.jpg')) }}" alt="Cover Global Research" />
            </div>
            <div class="journal-content">
              <h3>{{ \App\Models\PageContent::getValue('jurnal.j6.name', 'Global Research on Economy, Business, Communication, and Information') }}</h3>
              <p>{{ \App\Models\PageContent::getValue('jurnal.j6.desc', 'Jurnal multidisiplin ekonomi, bisnis, komunikasi, dan informasi.') }}</p>
              <div class="journal-actions">
                <a href="{{ \App\Models\PageContent::getValue('jurnal.j6.url_deskripsi', 'https://jurnal.kwikkiangie.ac.id/index.php/GREBUCI') }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm">Deskripsi</a>
                <a href="{{ \App\Models\PageContent::getValue('jurnal.j6.url_issue', 'https://jurnal.kwikkiangie.ac.id/index.php/grebuci/issue/view/155') }}" target="_blank" rel="noopener noreferrer" class="btn btn-white btn-sm">Current Issue</a>
              </div>
            </div>
          </article>

          <article class="journal-card card journal-card-center">
            <div class="journal-index-ribbon">
              <img src="{{ asset('assets/images/index/sinta-4.png') }}" alt="SINTA 4" />
            </div>
            <div class="journal-cover">
              <img src="{{ asset(\App\Models\PageContent::getValue('jurnal.j7.cover', 'assets/images/jurnal/jurnal-abdimas.png')) }}" alt="Cover Jurnal Abdimas" />
            </div>
            <div class="journal-content">
              <h3>{{ \App\Models\PageContent::getValue('jurnal.j7.name', 'Jurnal Abdimas') }}</h3>
              <p>{{ \App\Models\PageContent::getValue('jurnal.j7.desc', 'Publikasi kegiatan pengabdian kepada masyarakat, pemberdayaan komunitas, dan kolaborasi mitra.') }}</p>
              <div class="journal-actions">
                <a href="{{ \App\Models\PageContent::getValue('jurnal.j7.url_deskripsi', 'https://jurnal.kwikkiangie.ac.id/QuickSubmit/index.php/ABDIMAS') }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm">Deskripsi</a>
                <a href="{{ \App\Models\PageContent::getValue('jurnal.j7.url_issue', 'https://jurnal.kwikkiangie.ac.id/index.php/ABDIMAS/issue/view/156') }}" target="_blank" rel="noopener noreferrer" class="btn btn-white btn-sm">Current Issue</a>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>
  </main>

  <script src="{{ asset('publikasi/jurnal.js') }}"></script>
@endsection