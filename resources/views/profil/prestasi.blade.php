@extends('layouts.app')
@section('title', 'Prestasi | LPPM IBI KKG')
@push('styles')
<link rel="stylesheet" href="{{ asset('profil/prestasi.css') }}" />
@endpush
@section('content')
<div class="bg-glow glow-1"></div>
  <div class="bg-glow glow-2"></div>

  

  <main>
    <section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge" data-lppm-cms="prestasi.hero.badge">{{ \App\Models\PageContent::getValue('prestasi.hero.badge', 'Profil · Prestasi') }}</span>
          <h1 data-lppm-cms="prestasi.hero.title">{{ \App\Models\PageContent::getValue('prestasi.hero.title', 'Prestasi LPPM IBI KKG') }}</h1>
          <p data-lppm-cms="prestasi.hero.desc">
            {{ \App\Models\PageContent::getValue('prestasi.hero.desc', 'Halaman ini menampilkan berbagai penghargaan berupa hibah yang pernah diterima oleh akademisi LPPM IBIKKG maupun penghargaan yang diraih oleh LPPM IBIKKG sebagai sebuah lembaga penelitian dan pengabdian masyarakat.') }}
          </p>
          <div class="hero-actions">
            <a href="#tentang-lppm" class="btn btn-primary">Pelajari Lebih Lanjut</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke Beranda</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="award-showcase-visual">
            <div class="award-glow"></div>
            <i class="fa-solid fa-trophy main-trophy"></i>
            <div class="floating-badge fb-1" data-lppm-cms="prestasi.badge1.val"><i class="fa-solid fa-award"></i> <span>{{ \App\Models\PageContent::getValue('prestasi.badge1.val', 'Sosro 2017') }}</span></div>
            <div class="floating-badge fb-2" data-lppm-cms="prestasi.badge2.val"><i class="fa-solid fa-award"></i> <span>{{ \App\Models\PageContent::getValue('prestasi.badge2.val', 'Dikantara 2016') }}</span></div>
            <div class="floating-badge fb-3" data-lppm-cms="prestasi.badge3.val"><i class="fa-solid fa-award"></i> <span>{{ \App\Models\PageContent::getValue('prestasi.badge3.val', 'Apresiasi Rektorat') }}</span></div>
          </div>
        </div>
      </div>
    </section>

    <section class="section full-width-slider-section" id="prestasi-slider" style="position: relative;">
      @if(auth()->check())
        <div style="position: absolute; top: 15px; right: 15px; z-index: 1000;">
          <button type="button" class="lppm-btn" id="lppm-btn-kelola-prestasi-slide" style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); color: white; border: none; font-weight: 600; padding: 10px 16px; border-radius: 6px; cursor: pointer; box-shadow: 0 4px 10px rgba(59, 130, 246, 0.3);">
            <i class="fa-solid fa-images"></i> Kelola Slide Hibah
          </button>
        </div>
      @endif

      <div class="slider-container">
        <h2 class="slider-title reveal" data-lppm-cms="prestasi.slider.title">{{ \App\Models\PageContent::getValue('prestasi.slider.title', 'Penerimaan Hibah') }}</h2>
        <p class="slider-subtitle reveal" data-lppm-cms="prestasi.slider.subtitle">
          {{ \App\Models\PageContent::getValue('prestasi.slider.subtitle', 'Beberapa hibah yang pernah diterima oleh akademisi LPPM IBI KKG.') }}
        </p>

        @php
          $prestasiSlides = [];
          $cmsContent = \App\Models\PageContent::all()->keyBy('key');
          foreach ($cmsContent as $key => $content) {
              if (str_starts_with($key, 'prestasi.slide.')) {
                  $parts = explode('.', $key);
                  $id = $parts[2];
                  $field = $parts[3];
                  $prestasiSlides[$id][$field] = $content->value;
              }
          }
          ksort($prestasiSlides);

          if (empty($prestasiSlides)) {
              $defaultSlides = [
                  '1' => [
                      'badge' => 'Penghargaan Dosen',
                      'title' => 'Pendanaan Penelitian Dosen Pemula 2026',
                      'desc' => 'Selamat kepada dosen IBI KKG atas peraihan hibah Kemdikti Saintek. Prestasi luar biasa dalam pengembangan riset kampus.',
                      'image' => 'assets/images/LCD - Selamat dan Sukses Dosen IBIKKG].jpg'
                  ],
                  '2' => [
                      'badge' => 'Program Internasional',
                      'title' => 'International Community Development Program',
                      'desc' => 'Prestasi abdimas tingkat internasional Palembang 2025 melalui kolaborasi global untuk pengembangan masyarakat.',
                      'image' => 'assets/images/pkm2024.jpeg'
                  ],
                  '3' => [
                      'badge' => 'Kolaborasi Mitra',
                      'title' => 'Abdimas Inmato.id',
                      'desc' => 'Pengabdian masyarakat melalui kemitraan strategis dengan mitra eksternal untuk dampak nyata di masyarakat.',
                      'image' => 'assets/images/pkm2025.jpeg'
                  ]
              ];
              foreach ($defaultSlides as $id => $slide) {
                  foreach ($slide as $field => $val) {
                      \App\Models\PageContent::create([
                          'page' => 'prestasi',
                          'key' => "prestasi.slide.$id.$field",
                          'label' => "Prestasi Slide $id " . ucwords($field),
                          'value' => $val,
                          'type' => $field === 'image' ? 'image' : ($field === 'desc' ? 'textarea' : 'text')
                      ]);
                  }
              }
              $prestasiSlides = $defaultSlides;
          }
        @endphp

        <div class="prestasi-hero-visual reveal hero-visual-clean prestasi-full-slider">
          <div class="hero-carousel hero-carousel-right prestasi-hero-carousel full-width-carousel"
            id="prestasiHeroCarousel">
            <div class="hero-carousel-track">
              @foreach($prestasiSlides as $id => $slide)
                <div class="hero-slide {{ $loop->first ? 'active' : '' }}" 
                  data-badge="{{ $slide['badge'] ?? '' }}"
                  data-title="{{ $slide['title'] ?? '' }}"
                  data-description="{{ $slide['desc'] ?? '' }}">
                  <img src="{{ asset($slide['image'] ?? 'assets/images/pkm2024.jpeg') }}"
                    alt="{{ $slide['title'] ?? 'Prestasi' }}" />
                </div>
              @endforeach
            </div>

            <button class="hero-carousel-btn prev" type="button" id="prestasiHeroPrev" aria-label="Slide sebelumnya">
              &#10094;
            </button>

            <button class="hero-carousel-btn next" type="button" id="prestasiHeroNext" aria-label="Slide berikutnya">
              &#10095;
            </button>

            <div class="hero-carousel-dots" id="prestasiHeroDots">
              @foreach(array_values($prestasiSlides) as $index => $slide)
                <button class="hero-dot {{ $index === 0 ? 'active' : '' }}" type="button" data-slide="{{ $index }}" aria-label="Slide {{ $index + 1 }}"></button>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="sertifikat-section">
      <div class="container">
        <h2 class="slider-title reveal" style="font-size: 2.5rem; margin-bottom: 50px;" data-lppm-cms="prestasi.cert.section_title">
          {{ \App\Models\PageContent::getValue('prestasi.cert.section_title', 'Sertifikat Penghargaan') }}
        </h2>

        <div class="cert-grid">
          <div class="cert-card reveal" onclick="openCertViewer('{{ asset(\App\Models\PageContent::getValue('prestasi.cert.sosro.image', 'assets/images/prestasi_sosro.jpg')) }}', 'image')">
            <div class="cert-img-container">
              <img src="{{ asset(\App\Models\PageContent::getValue('prestasi.cert.sosro.image', 'assets/images/prestasi_sosro.jpg')) }}" alt="Piagam Penghargaan Sinar Sosro" data-lppm-cms="prestasi.cert.sosro.image" />
              <div class="cert-overlay">
                <span>Lihat Sertifikat</span>
              </div>
            </div>
            <div class="cert-info">
              <h3 data-lppm-cms="prestasi.cert.sosro.title">{{ \App\Models\PageContent::getValue('prestasi.cert.sosro.title', 'Piagam Penghargaan Kuliah Umum') }}</h3>
              <p data-lppm-cms="prestasi.cert.sosro.subtitle">{{ \App\Models\PageContent::getValue('prestasi.cert.sosro.subtitle', 'PT Sinar Sosro (A Rekso Company) - 2017') }}</p>
            </div>
          </div>

          <div class="cert-card reveal" onclick="openCertViewer('{{ asset(\App\Models\PageContent::getValue('prestasi.cert.dikantara.image', 'assets/images/prestasi_dikantara.jpg')) }}', 'image')">
            <div class="cert-img-container">
              <img src="{{ asset(\App\Models\PageContent::getValue('prestasi.cert.dikantara.image', 'assets/images/prestasi_dikantara.jpg')) }}" alt="Penghargaan Yayasan Dikantara" data-lppm-cms="prestasi.cert.dikantara.image" />
              <div class="cert-overlay">
                <span>Lihat Sertifikat</span>
              </div>
            </div>
            <div class="cert-info">
              <h3 data-lppm-cms="prestasi.cert.dikantara.title">{{ \App\Models\PageContent::getValue('prestasi.cert.dikantara.title', 'Penghargaan Pelatihan Guru Dikantara') }}</h3>
              <p data-lppm-cms="prestasi.cert.dikantara.subtitle">{{ \App\Models\PageContent::getValue('prestasi.cert.dikantara.subtitle', 'Yayasan Pendidikan Jakarta Utara - 2016') }}</p>
            </div>
          </div>

          <div class="cert-card reveal"
            onclick="openCertViewer('{{ asset(\App\Models\PageContent::getValue('prestasi.cert.apresiasi.image', 'assets/images/prestasi_apresiasi_pakimam.png')) }}', 'image')">
            <div class="cert-img-container">
              <img src="{{ asset(\App\Models\PageContent::getValue('prestasi.cert.apresiasi.image', 'assets/images/prestasi_apresiasi_pakimam.png')) }}" alt="Sertifikat Apresiasi Kepala LPPM" data-lppm-cms="prestasi.cert.apresiasi.image" />
              <div class="cert-overlay">
                <span>Lihat Sertifikat</span>
              </div>
            </div>
            <div class="cert-info">
              <h3 data-lppm-cms="prestasi.cert.apresiasi.title">{{ \App\Models\PageContent::getValue('prestasi.cert.apresiasi.title', 'Sertifikat Apresiasi Kepala LPPM') }}</h3>
              <p data-lppm-cms="prestasi.cert.apresiasi.subtitle">{{ \App\Models\PageContent::getValue('prestasi.cert.apresiasi.subtitle', 'Rektorat IBI KKG - 2021') }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div id="certModal" class="cert-modal">
      <div class="modal-overlay" onclick="closeCertViewer()"></div>
      <div class="modal-wrapper">
        <button class="modal-close" onclick="closeCertViewer()">&times;</button>
        <div class="modal-body">
          <iframe id="pdfFrame" src="" frameborder="0" style="display: none;"></iframe>
          <img id="imgFrame" src="" alt="Sertifikat Detail" style="display: none;" />
        </div>
      </div>
    </div>
  </main>
@endsection