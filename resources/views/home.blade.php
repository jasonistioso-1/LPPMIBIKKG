@extends('layouts.app')
@section('title', 'LPPM IBI KKG')
@section('content')
@php
  // Retrieve and group dynamic services
  $services = \App\Models\PageContent::where('key', 'like', 'home.service.%')
      ->get()
      ->sortBy(function($item) {
          $parts = explode('.', $item->key);
          return isset($parts[2]) ? (int)$parts[2] : 0;
      })
      ->groupBy(function($item) {
          $parts = explode('.', $item->key);
          return $parts[2] ?? '';
      });

  // Retrieve and group dynamic news
  $newsList = \App\Models\PageContent::where('key', 'like', 'home.news.%')
      ->get()
      ->sortBy(function($item) {
          $parts = explode('.', $item->key);
          return isset($parts[2]) ? (int)$parts[2] : 0;
      })
      ->groupBy(function($item) {
          $parts = explode('.', $item->key);
          return $parts[2] ?? '';
      });

  // Retrieve and group dynamic videos
  $videos = \App\Models\PageContent::where('key', 'like', 'home.video.%')
      ->get()
      ->sortBy(function($item) {
          $parts = explode('.', $item->key);
          return isset($parts[2]) ? (int)$parts[2] : 0;
      })
      ->groupBy(function($item) {
          $parts = explode('.', $item->key);
          return $parts[2] ?? '';
      });

  // Retrieve and group dynamic slides
  $slides = \App\Models\PageContent::where('key', 'like', 'home.slide.%')
      ->get()
      ->sortBy(function($item) {
          $parts = explode('.', $item->key);
          return isset($parts[2]) ? (int)$parts[2] : 0;
      })
      ->groupBy(function($item) {
          $parts = explode('.', $item->key);
          return $parts[2] ?? '';
      });

  if ($slides->count() < 10) {
      $defaults = [
          1 => [
              'title' => 'Pengabdian Masyarakat',
              'badge' => 'Pengabdian Masyarakat',
              'desc' => 'Kegiatan pengabdian masyarakat LPPM IBI KKG.',
              'image' => 'assets/images/home/home_gallery_1.jpg',
              'url' => route('abdimas.pengumuman'),
          ],
          2 => [
              'title' => 'Kunjungan Kebudayaan',
              'badge' => 'Kunjungan Kebudayaan',
              'desc' => 'Kunjungan kebudayaan dan sejarah.',
              'image' => 'assets/images/home/home_gallery_2.jpg',
              'url' => route('profil.tentang-kami'),
          ],
          3 => [
              'title' => 'Kegiatan LPPM',
              'badge' => 'Kegiatan LPPM',
              'desc' => 'Dokumentasi kegiatan akademik LPPM.',
              'image' => 'assets/images/home/home_gallery_3.jpg',
              'url' => route('penelitian.pengumuman'),
          ],
          4 => [
              'title' => 'Dokumentasi Tim',
              'badge' => 'Dokumentasi Tim',
              'desc' => 'Foto bersama tim LPPM IBI KKG.',
              'image' => 'assets/images/home/home_gallery_4.jpg',
              'url' => route('profil.tentang-kami'),
          ],
          5 => [
              'title' => 'Internasional PKM',
              'badge' => 'Internasional PKM',
              'desc' => 'Program Pengabdian Masyarakat Internasional.',
              'image' => 'assets/images/pkm2024.jpeg',
              'url' => route('abdimas.data-abdimas'),
          ],
          6 => [
              'title' => 'Pemberdayaan UMKM',
              'badge' => 'Pemberdayaan UMKM',
              'desc' => 'Program Pemberdayaan Ekonomi Pancasila.',
              'image' => 'assets/images/2.jpeg',
              'url' => route('abdimas.data-abdimas'),
          ],
          7 => [
              'title' => 'Budaya Riset Dosen',
              'badge' => 'Budaya Riset Dosen',
              'desc' => 'Penguatan ekosistem riset dosen.',
              'image' => 'assets/images/1.jpeg',
              'url' => route('penelitian.data-penelitian'),
          ],
          8 => [
              'title' => 'Program Abdimas',
              'badge' => 'Program Abdimas',
              'desc' => 'Pengabdian masyarakat berkelanjutan.',
              'image' => 'assets/images/pkm2025.jpeg',
              'url' => route('abdimas.pengumuman'),
          ],
          9 => [
              'title' => 'Publikasi Ilmiah',
              'badge' => 'Publikasi Ilmiah',
              'desc' => 'Publikasi jurnal dan prosiding ilmiah.',
              'image' => 'assets/images/wartel-2026.jpeg',
              'url' => route('publikasi.jurnal'),
          ],
          10 => [
              'title' => 'Apresiasi Dosen',
              'badge' => 'Apresiasi Dosen',
              'desc' => 'Penerima pendanaan penelitian dosen pemula.',
              'image' => 'assets/images/LCD - Selamat dan Sukses Dosen IBIKKG].jpg',
              'url' => route('penelitian.pengumuman'),
          ],
      ];

      foreach ($defaults as $id => $data) {
          foreach ($data as $field => $val) {
              \App\Models\PageContent::firstOrCreate(
                  ['key' => "home.slide.{$id}.{$field}"],
                  [
                      'page' => 'home',
                      'label' => "Slide {$id}: " . ucfirst($field),
                      'value' => $val,
                      'type' => $field === 'image' ? 'image' : ($field === 'desc' ? 'textarea' : 'text')
                  ]
              );
          }
      }

      $slides = \App\Models\PageContent::where('key', 'like', 'home.slide.%')
          ->get()
          ->sortBy(function($item) {
              $parts = explode('.', $item->key);
              return isset($parts[2]) ? (int)$parts[2] : 0;
          })
          ->groupBy(function($item) {
              $parts = explode('.', $item->key);
              return $parts[2] ?? '';
          });
  }
@endphp
<div class="bg-glow glow-1 parallax-item"></div>
  <div class="bg-glow glow-2 parallax-item"></div>

  <main>
    <section class="hero section hero-marquee-layout" id="hero">
      <div class="hero-mesh-bg"></div>
      <div class="hero-orb orb-primary"></div>
      <div class="hero-orb orb-secondary"></div>
      <div class="hero-orb orb-accent"></div>

      @if(auth()->check())
        <div class="lppm-carousel-control" style="position: absolute; top: 20px; right: 20px; z-index: 100;">
          <button type="button" class="lppm-btn-manage-slides" style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); color: #fff; border: none; padding: 8px 14px; border-radius: 6px; font-size: 13px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 6px; box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4); transition: all 0.3s ease;">
            <i class="fa-solid fa-images"></i> Kelola Foto Hero
          </button>
        </div>
      @endif

      <div class="container hero-marquee-grid">
        <!-- LEFT FLOATING COLUMN (Infinite Up ⬆️) -->
        <div class="hero-column hero-column-left">
          <div class="hero-marquee-track marquee-up">
            @php
              $leftSlides = $slides->filter(function($slide, $key) { return ((int)$key % 2) !== 0; });
              if ($leftSlides->isEmpty()) $leftSlides = $slides;
            @endphp
            @foreach($leftSlides as $id => $slideFields)
              @php
                $titleKey = "home.slide.{$id}.title";
                $badgeKey = "home.slide.{$id}.badge";
                $imageKey = "home.slide.{$id}.image";
                $title = $slideFields->where('key', $titleKey)->first()?->value ?? 'Foto LPPM';
                $badge = $slideFields->where('key', $badgeKey)->first()?->value ?? 'Kegiatan';
                $image = $slideFields->where('key', $imageKey)->first()?->value ?? 'assets/images/home/home_gallery_1.jpg';
              @endphp
              <div class="hero-marquee-card" data-card-prefix="home.slide.{{ $id }}">
                <img src="{{ asset($image) }}" alt="{{ $title }}" class="lightbox-trigger" data-full-src="{{ asset($image) }}" data-lppm-cms="{{ $imageKey }}" />
                <span class="marquee-card-label" data-lppm-cms="{{ $badgeKey }}">{{ $badge }}</span>
              </div>
            @endforeach
            <!-- DUPLICATE FOR INFINITE LOOP -->
            @foreach($leftSlides as $id => $slideFields)
              @php
                $titleKey = "home.slide.{$id}.title";
                $badgeKey = "home.slide.{$id}.badge";
                $imageKey = "home.slide.{$id}.image";
                $title = $slideFields->where('key', $titleKey)->first()?->value ?? 'Foto LPPM';
                $badge = $slideFields->where('key', $badgeKey)->first()?->value ?? 'Kegiatan';
                $image = $slideFields->where('key', $imageKey)->first()?->value ?? 'assets/images/home/home_gallery_1.jpg';
              @endphp
              <div class="hero-marquee-card">
                <img src="{{ asset($image) }}" alt="{{ $title }}" class="lightbox-trigger" data-full-src="{{ asset($image) }}" />
                <span class="marquee-card-label">{{ $badge }}</span>
              </div>
            @endforeach
          </div>
        </div>

        <!-- CENTER HERO TEXT (TITLE & BUTTONS TO PROFIL & PUBLIKASI) -->
        <div class="hero-copy hero-copy-centered reveal-up">
          <h1 class="hero-main-title centered">
            <span class="hero-title-line" data-lppm-cms="home.hero.title">{{ \App\Models\PageContent::getValue('home.hero.title', 'Selamat Datang') }}</span>
            <span class="hero-title-line hero-title-line-middle" data-lppm-cms="home.hero.middle">{{ \App\Models\PageContent::getValue('home.hero.middle', 'di') }}</span>
            <span class="hero-title-line hero-title-line-accent gradient-text-gold" data-lppm-cms="home.hero.accent">{{ \App\Models\PageContent::getValue('home.hero.accent', 'LPPM IBIKKG') }}</span>
          </h1>
          <div class="hero-cta-group" style="margin-top: 24px;">
            <a href="{{ route('profil.tentang-kami') }}" class="btn btn-primary btn-glow">
              <i class="fa-solid fa-user-graduate"></i> <span data-lppm-cms="home.hero.btn_profil">{{ \App\Models\PageContent::getValue('home.hero.btn_profil', 'Profil LPPM') }}</span>
            </a>
            <a href="{{ route('publikasi.jurnal') }}" class="btn btn-outline">
              <i class="fa-solid fa-book-open"></i> <span data-lppm-cms="home.hero.btn_publikasi">{{ \App\Models\PageContent::getValue('home.hero.btn_publikasi', 'Publikasi Ilmiah') }}</span>
            </a>
          </div>
        </div>

        <!-- RIGHT FLOATING COLUMN (Infinite Down ⬇️) -->
        <div class="hero-column hero-column-right">
          <div class="hero-marquee-track marquee-down">
            @php
              $rightSlides = $slides->filter(function($slide, $key) { return ((int)$key % 2) === 0; });
              if ($rightSlides->isEmpty()) $rightSlides = $slides;
            @endphp
            @foreach($rightSlides as $id => $slideFields)
              @php
                $titleKey = "home.slide.{$id}.title";
                $badgeKey = "home.slide.{$id}.badge";
                $imageKey = "home.slide.{$id}.image";
                $title = $slideFields->where('key', $titleKey)->first()?->value ?? 'Foto LPPM';
                $badge = $slideFields->where('key', $badgeKey)->first()?->value ?? 'Kegiatan';
                $image = $slideFields->where('key', $imageKey)->first()?->value ?? 'assets/images/home/home_gallery_2.jpg';
              @endphp
              <div class="hero-marquee-card" data-card-prefix="home.slide.{{ $id }}">
                <img src="{{ asset($image) }}" alt="{{ $title }}" class="lightbox-trigger" data-full-src="{{ asset($image) }}" data-lppm-cms="{{ $imageKey }}" />
                <span class="marquee-card-label" data-lppm-cms="{{ $badgeKey }}">{{ $badge }}</span>
              </div>
            @endforeach
            <!-- DUPLICATE FOR INFINITE LOOP -->
            @foreach($rightSlides as $id => $slideFields)
              @php
                $titleKey = "home.slide.{$id}.title";
                $badgeKey = "home.slide.{$id}.badge";
                $imageKey = "home.slide.{$id}.image";
                $title = $slideFields->where('key', $titleKey)->first()?->value ?? 'Foto LPPM';
                $badge = $slideFields->where('key', $badgeKey)->first()?->value ?? 'Kegiatan';
                $image = $slideFields->where('key', $imageKey)->first()?->value ?? 'assets/images/home/home_gallery_2.jpg';
              @endphp
              <div class="hero-marquee-card">
                <img src="{{ asset($image) }}" alt="{{ $title }}" class="lightbox-trigger" data-full-src="{{ asset($image) }}" />
                <span class="marquee-card-label">{{ $badge }}</span>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>

    <section class="section layanan-section" id="layanan-lppm">
      <div class="container news-showcase-wrap">
        <div class="news-showcase-head reveal" style="position: relative;">
          <span class="news-showcase-line"></span>
          <h2>Layanan</h2>
          <span class="news-showcase-line"></span>
          @if(auth()->check())
            <button type="button" class="lppm-btn-add-item" data-add-type="service" title="Tambah Layanan Baru">
              <i class="fa-solid fa-circle-plus"></i> Tambah Baru
            </button>
          @endif
        </div>

        <div class="section-head-center section-head-compact reveal">
          <div>
            <p>
              Akses cepat ke layanan inti LPPM untuk mendukung penelitian,
              pengabdian, publikasi ilmiah, dan kebutuhan dokumen akademik.
            </p>
          </div>
        </div>

        <div class="layanan-grid">
          @foreach($services as $id => $serviceFields)
            @php
              $titleKey = "home.service.{$id}.title";
              $descKey = "home.service.{$id}.desc";
              $imageKey = "home.service.{$id}.image";
              $urlKey = "home.service.{$id}.url";

              $title = $serviceFields->where('key', $titleKey)->first()?->value ?? '';
              $desc = $serviceFields->where('key', $descKey)->first()?->value ?? '';
              $image = $serviceFields->where('key', $imageKey)->first()?->value ?? '';
              $url = $serviceFields->where('key', $urlKey)->first()?->value ?? '';
            @endphp
            <article class="news-feature-card glass-card reveal-up" data-card-prefix="home.service.{{ $id }}">
              <a href="{{ (str_starts_with($url, '/') || str_starts_with($url, 'http')) ? $url : 'javascript:void(0)' }}" class="news-feature-link">
                <div class="news-feature-image">
                  <img src="{{ asset($image) }}" alt="{{ $title }}" data-lppm-cms="{{ $imageKey }}" />
                </div>
                <div class="news-feature-body">
                  <h3 data-lppm-cms="{{ $titleKey }}">{{ $title }}</h3>
                  <p data-lppm-cms="{{ $descKey }}">{{ $desc }}</p>
                </div>
              </a>
            </article>
          @endforeach
        </div>
      </div>
    </section>

    <section class="section news-section" id="berita-terbaru">
      <div class="container news-showcase-wrap">
        <div class="news-showcase-head reveal" style="position: relative;">
          <span class="news-showcase-line"></span>
          <h2>Berita</h2>
          <span class="news-showcase-line"></span>
          @if(auth()->check())
            <button type="button" class="lppm-btn-add-item" data-add-type="news" title="Tambah Berita Baru">
              <i class="fa-solid fa-circle-plus"></i> Tambah Baru
            </button>
          @endif
        </div>

        <div class="news-showcase" id="newsShowcase">
          <button class="news-nav-btn news-nav-prev" type="button" id="newsPrev" aria-label="Berita sebelumnya">
            &#10094;
          </button>

          <div class="news-track-wrap">
            <div class="news-track" id="newsTrack">
              @foreach($newsList as $id => $newsFields)
                @php
                  $titleKey = "home.news.{$id}.title";
                  $dateKey = "home.news.{$id}.date";
                  $imageKey = "home.news.{$id}.image";
                  $urlKey = "home.news.{$id}.url";
                  $longKey = "home.news.{$id}.long";

                  $title = $newsFields->where('key', $titleKey)->first()?->value ?? '';
                  $date = $newsFields->where('key', $dateKey)->first()?->value ?? '';
                  $image = $newsFields->where('key', $imageKey)->first()?->value ?? '';
                  $url = $newsFields->where('key', $urlKey)->first()?->value ?? '';
                  $long = $newsFields->where('key', $longKey)->first()?->value ?? '';
                @endphp
                <article class="news-feature-card glass-card reveal-up" data-card-prefix="home.news.{{ $id }}">
                  @php
                    $displayLong = !empty($long) ? $long : "<p>Informasi dan pengumuman resmi mengenai <strong>" . e($title) . "</strong> (" . e($date) . ") dapat diakses melalui layanan LPPM Institut Bisnis dan Informatika Kwik Kian Gie.</p>";
                  @endphp
                  <div class="news-feature-image">
                    <img src="{{ asset($image) }}" alt="{{ $title }}" data-lppm-cms="{{ $imageKey }}" />
                  </div>
                  <div class="news-feature-body">
                    <div class="news-card-meta">
                      <span class="news-card-date" data-lppm-cms="{{ $dateKey }}"><i class="fa-regular fa-calendar-days"></i> {{ $date }}</span>
                    </div>
                    <h3 class="news-card-title" data-lppm-cms="{{ $titleKey }}">{{ $title }}</h3>
                    <button type="button" class="btn-read-more news-modal-trigger"
                      data-news-title="{{ $title }}"
                      data-news-date="{{ $date }}" 
                      data-news-image="{{ asset($image) }}"
                      data-news-long="{!! e($displayLong) !!}">
                      Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                    </button>
                  </div>
                </article>
              @endforeach
            </div>
          </div>

          <button class="news-nav-btn news-nav-next" type="button" id="newsNext" aria-label="Berita berikutnya">
            &#10095;
          </button>
        </div>
      </div>
    </section>

    <section class="section video-section" id="video-lppm">
      <div class="container news-showcase-wrap">
        <div class="news-showcase-head reveal" style="position: relative;">
          <span class="news-showcase-line"></span>
          <h2>Video</h2>
          <span class="news-showcase-line"></span>
          @if(auth()->check())
            <button type="button" class="lppm-btn-add-item" data-add-type="video" title="Tambah Video Baru">
              <i class="fa-solid fa-circle-plus"></i> Tambah Baru
            </button>
          @endif
        </div>

        <div class="video-grid">
          @foreach($videos as $id => $videoFields)
            @php
              $titleKey = "home.video.{$id}.title";
              $descKey = "home.video.{$id}.desc";
              $imageKey = "home.video.{$id}.image";
              $urlKey = "home.video.{$id}.url";

              $title = $videoFields->where('key', $titleKey)->first()?->value ?? '';
              $desc = $videoFields->where('key', $descKey)->first()?->value ?? '';
              $image = $videoFields->where('key', $imageKey)->first()?->value ?? '';
              $url = $videoFields->where('key', $urlKey)->first()?->value ?? '';
            @endphp
            <article class="news-feature-card glass-card reveal-up" data-card-prefix="home.video.{{ $id }}">
              <a href="{{ (str_starts_with($url, '/') || str_starts_with($url, 'http')) ? $url : 'javascript:void(0)' }}" 
                class="news-feature-link"
                @if(str_starts_with($url, 'http')) target="_blank" rel="noopener noreferrer" @endif>
                <div class="news-feature-image video-thumb">
                  <img src="{{ (str_starts_with($image, 'http://') || str_starts_with($image, 'https://')) ? $image : asset($image) }}" alt="{{ $title }}" data-lppm-cms="{{ $imageKey }}" />
                  <div class="video-play-overlay"></div>
                </div>
                <div class="news-feature-body">
                  <h3 data-lppm-cms="{{ $titleKey }}">{{ $title }}</h3>
                  <p data-lppm-cms="{{ $descKey }}">{{ $desc }}</p>
                </div>
              </a>
            </article>
          @endforeach
        </div>
      </div>
    </section>

    <section class="section cta-banner-section">
      <div class="container">
        <div class="cta-banner reveal">
          <div class="cta-banner-copy">
            <span class="section-tag" data-lppm-cms="home.cta.tag">{{ \App\Models\PageContent::getValue('home.cta.tag', 'Informasi LPPM', 'text', 'home', 'CTA: Label Tag') }}</span>
            <h2 data-lppm-cms="home.cta.title">{{ \App\Models\PageContent::getValue('home.cta.title', 'Butuh panduan, dokumen, atau informasi penelitian?', 'text', 'home', 'CTA: Judul Utama') }}</h2>
          </div>

          <div class="cta-banner-actions">
            <a href="{{ route('dokumen.panduan') }}" class="btn btn-primary" data-lppm-cms="home.cta.btn1">{{ \App\Models\PageContent::getValue('home.cta.btn1', 'Lihat Panduan', 'text', 'home', 'CTA: Tombol 1') }}</a>
            <a href="{{ route('kontak.informasi-kontak') }}" class="btn btn-outline" data-lppm-cms="home.cta.btn2">{{ \App\Models\PageContent::getValue('home.cta.btn2', 'Hubungi LPPM', 'text', 'home', 'CTA: Tombol 2') }}</a>
          </div>
        </div>
      </div>
    </section>
  </main>

  <div class="news-modal" id="newsModal" aria-hidden="true">
    <div class="news-modal-backdrop" data-close-news-modal></div>

    <div class="news-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="newsModalTitle">
      <button type="button" class="news-modal-close" id="newsModalClose" aria-label="Tutup detail berita">
        &times;
      </button>

      <div class="news-modal-content">
        <div class="news-modal-header">
          <span class="news-modal-date" id="newsModalDate"></span>
          <h2 id="newsModalTitle"></h2>
        </div>

        <div class="news-modal-media" id="newsModalMediaWrap">
          <img id="newsModalImage" src="" alt="" />
        </div>

        <div class="news-modal-body" id="newsModalBody"></div>
      </div>
    </div>
  </div>
@endsection