@extends('layouts.app')
@section('title', 'Tentang Kami | LPPM IBI KKG')
@push('styles')
<link rel="stylesheet" href="{{ asset('profil/tentang-kami.css') }}" />
@endpush
@section('content')
<div class="bg-glow glow-1"></div>
  <div class="bg-glow glow-2"></div>

  

  <main>
    <section class="hero section tentang-hero">
      <div class="container hero-grid">
        <div class="hero-copy reveal">
          <div class="hero-topbar">
            <span class="badge hero-badge">Profil · Tentang Kami</span>
          </div>
          <h1 class="hero-main-title">
            <span class="hero-title-line">{{ \App\Models\PageContent::getValue('about.hero.title', 'Tentang LPPM IBI KKG') }}</span>
          </h1>
          <p class="hero-main-desc">
            {{ \App\Models\PageContent::getValue('about.hero.desc', 'Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) merupakan unit strategis yang mengelola, mengembangkan, dan mendukung penuh pelaksanaan riset ilmiah, pengabdian masyarakat, publikasi ilmiah, serta penguatan jejaring kerja sama tridharma.') }}
          </p>
          <div class="hero-actions">
            <a href="#tentang-lppm" class="btn btn-primary">Pelajari Lebih Lanjut</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke Beranda</a>
          </div>
        </div>

        <div class="hero-visual reveal">
          <div class="glass-panel summary-panel">
            <div class="summary-header">
              <div class="summary-icon-box">
                <i class="fa-solid fa-chart-line"></i>
              </div>
              <div class="summary-titles">
                <h3>Sekilas LPPM</h3>
                <p>Metrik & Kinerja Aktivitas</p>
              </div>
            </div>
            
            <div class="summary-stats-grid">
              <div class="glass-stat-card">
                <div class="stat-icon"><i class="fa-solid fa-cubes"></i></div>
                <div class="stat-number">{{ \App\Models\PageContent::getValue('home.stats.pilar_count', '3') }}</div>
                <div class="stat-label">{{ \App\Models\PageContent::getValue('home.stats.pilar_label', 'Pilar Utama') }}</div>
              </div>
              
              <div class="glass-stat-card">
                <div class="stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                <div class="stat-number">{{ \App\Models\PageContent::getValue('home.stats.publikasi_count', '100+') }}</div>
                <div class="stat-label">{{ \App\Models\PageContent::getValue('home.stats.publikasi_label', 'Publikasi Aktif') }}</div>
              </div>
              
              <div class="glass-stat-card">
                <div class="stat-icon"><i class="fa-solid fa-award"></i></div>
                <div class="stat-number">{{ \App\Models\PageContent::getValue('home.stats.standar_count', 'Unggul') }}</div>
                <div class="stat-label">{{ \App\Models\PageContent::getValue('home.stats.standar_label', 'Standar Mutu') }}</div>
              </div>
              
              <div class="glass-stat-card">
                <div class="stat-icon"><i class="fa-solid fa-circle-check"></i></div>
                <div class="stat-number">{{ \App\Models\PageContent::getValue('home.stats.dukungan_count', '100%') }}</div>
                <div class="stat-label">{{ \App\Models\PageContent::getValue('home.stats.dukungan_label', 'Dukungan Dosen') }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section" id="tentang-lppm">
      <div class="container">
        <div class="section-head-center reveal">
          <div>
            <span class="section-tag" data-lppm-cms="about.section.tag">{{ \App\Models\PageContent::getValue('about.section.tag', 'Profil Lembaga', 'text', 'about', 'Section: Label Tag') }}</span>
            <h2 data-lppm-cms="about.section.title">{{ \App\Models\PageContent::getValue('about.section.title', 'Peran dan Fungsi LPPM', 'text', 'about', 'Section: Judul Utama') }}</h2>
            <p data-lppm-cms="about.section.desc">{{ \App\Models\PageContent::getValue('about.section.desc', 'LPPM hadir sebagai pusat orkestrasi tridharma perguruan tinggi, menghubungkan potensi keilmuan akademisi dengan kebutuhan nyata masyarakat dan industri secara berkelanjutan.', 'textarea', 'about', 'Section: Deskripsi') }}</p>
          </div>
        </div>

        <div class="content-stack">
          <!-- Profil Singkat Card with Glowing Accent -->
          <div class="card card-glow-accent reveal">
            <div class="card-icon-header">
              <div class="icon-circle"><i class="fa-solid fa-circle-info"></i></div>
              <h3 data-lppm-cms="about.short_profile.title">{{ \App\Models\PageContent::getValue('about.short_profile.title', 'Profil Singkat', 'text', 'about', 'Profil Singkat: Judul') }}</h3>
            </div>
            <div class="card-body-text">
              <p data-lppm-cms="about.short_profile.text1">{{ \App\Models\PageContent::getValue('about.short_profile.text1', 'LPPM IBI KKG bertugas mengelola proses administratif, akademik, dan strategis dalam pelaksanaan penelitian dosen, pengabdian kepada masyarakat, publikasi ilmiah, serta pengembangan kolaborasi dengan mitra internal maupun eksternal.', 'textarea', 'about', 'Profil Singkat: Paragraf 1') }}</p>
              <p data-lppm-cms="about.short_profile.text2">{{ \App\Models\PageContent::getValue('about.short_profile.text2', 'Melalui pengelolaan yang profesional, transparan, dan berbasis teknologi informasi, LPPM berkomitmen memfasilitasi sivitas akademika guna melahirkan karya riset inovatif dan program pengabdian yang memberikan kontribusi nyata bagi masyarakat luas.', 'textarea', 'about', 'Profil Singkat: Paragraf 2') }}</p>
            </div>
          </div>

          <!-- Tugas & Fungsi Grid -->
          <div class="grid-2">
            <div class="card card-premium-list card-blue reveal">
              <div class="card-icon-header">
                <div class="icon-circle"><i class="fa-solid fa-list-check"></i></div>
                <h3 data-lppm-cms="about.tasks.title">{{ \App\Models\PageContent::getValue('about.tasks.title', 'Tugas Utama', 'text', 'about', 'Tugas Utama: Judul') }}</h3>
              </div>
              <ul class="premium-check-list" data-lppm-cms="about.tasks.text">
                @php
                  $tugasRaw = \App\Models\PageContent::getValue('about.tasks.text', "Mengelola administrasi dan pendanaan internal/eksternal penelitian dosen.\nMengoordinasikan dan merancang agenda pengabdian kepada masyarakat (Abdimas).\nMendorong luaran ilmiah bermutu tinggi melalui pembinaan berkelanjutan.\nMenyediakan standarisasi panduan, dokumen administrasi, serta template resmi.\nMembangun kerja sama strategis multi-sektoral dengan industri, pemerintah, dan LSM.", 'textarea', 'about', 'Tugas Utama: Daftar (pisah per baris)');
                  $tugasItems = array_filter(array_map('trim', explode("\n", $tugasRaw)));
                @endphp
                @foreach($tugasItems as $item)
                  <li>
                    <span class="check-icon"><i class="fa-solid fa-circle-check"></i></span>
                    <span class="list-text">{{ $item }}</span>
                  </li>
                @endforeach
              </ul>
            </div>

            <div class="card card-premium-list card-gold reveal">
              <div class="card-icon-header">
                <div class="icon-circle"><i class="fa-solid fa-compass"></i></div>
                <h3 data-lppm-cms="about.functions.title">{{ \App\Models\PageContent::getValue('about.functions.title', 'Fungsi Strategis', 'text', 'about', 'Fungsi Strategis: Judul') }}</h3>
              </div>
              <ul class="premium-check-list" data-lppm-cms="about.functions.text">
                @php
                  $fungsiRaw = \App\Models\PageContent::getValue('about.functions.text', "Sebagai katalisator utama pengembangan iklim riset institusi.\nSebagai jembatan hilirisasi karya keilmuan dosen ke masyarakat.\nSebagai fasilitator peningkatan sitasi dan indeks publikasi ilmiah global.\nSebagai penyedia platform terintegrasi untuk seluruh layanan tridharma.", 'textarea', 'about', 'Fungsi Strategis: Daftar (pisah per baris)');
                  $fungsiItems = array_filter(array_map('trim', explode("\n", $fungsiRaw)));
                @endphp
                @foreach($fungsiItems as $item)
                  <li>
                    <span class="check-icon"><i class="fa-solid fa-circle-check"></i></span>
                    <span class="list-text">{{ $item }}</span>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>

          <!-- Ruang Lingkup Layanan (3 Pillars) -->
          <div class="card card-pillars reveal">
            <div class="card-icon-header">
              <div class="icon-circle"><i class="fa-solid fa-handshake-angle"></i></div>
              <h3 data-lppm-cms="about.ruanglingkup.title">{{ \App\Models\PageContent::getValue('about.ruanglingkup.title', 'Ruang Lingkup Layanan', 'text', 'about', 'Ruang Lingkup: Judul') }}</h3>
            </div>
            <div class="grid-3 pillar-cards-grid">
              <div class="pillar-card hover-glow reveal-delay-1">
                <div class="pillar-header">
                  <div class="pillar-icon"><i class="fa-solid fa-microscope"></i></div>
                  <h4 data-lppm-cms="about.pillar.penelitian.title">{{ \App\Models\PageContent::getValue('about.pillar.penelitian.title', 'Penelitian', 'text', 'about', 'Pillar: Judul Penelitian') }}</h4>
                </div>
                <p data-lppm-cms="about.pillar.penelitian">{{ \App\Models\PageContent::getValue('about.pillar.penelitian', 'Mengelola pengajuan proposal hibah, proses monitoring evaluasi berkala, pelaporan keuangan, hingga pendampingan paten dan HKI hasil riset dosen.', 'textarea', 'about', 'Pillar: Deskripsi Penelitian') }}</p>
                <div class="pillar-footer">
                  <a href="{{ route('penelitian.pengumuman') }}" class="pillar-link">Lihat Layanan <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
              </div>

              <div class="pillar-card hover-glow reveal-delay-2">
                <div class="pillar-header">
                  <div class="pillar-icon"><i class="fa-solid fa-users-line"></i></div>
                  <h4 data-lppm-cms="about.pillar.abdimas.title">{{ \App\Models\PageContent::getValue('about.pillar.abdimas.title', 'Abdimas', 'text', 'about', 'Pillar: Judul Abdimas') }}</h4>
                </div>
                <p data-lppm-cms="about.pillar.abdimas">{{ \App\Models\PageContent::getValue('about.pillar.abdimas', 'Menyelenggarakan kegiatan pengabdian masyarakat berorientasi dampak, memandu program binaan desa mitra, serta mengoordinasikan laporan pengabdian.', 'textarea', 'about', 'Pillar: Deskripsi Abdimas') }}</p>
                <div class="pillar-footer">
                  <a href="{{ route('abdimas.pengumuman') }}" class="pillar-link">Lihat Layanan <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
              </div>

              <div class="pillar-card hover-glow reveal-delay-3">
                <div class="pillar-header">
                  <div class="pillar-icon"><i class="fa-solid fa-book-open-reader"></i></div>
                  <h4 data-lppm-cms="about.pillar.publikasi.title">{{ \App\Models\PageContent::getValue('about.pillar.publikasi.title', 'Publikasi & Jurnal', 'text', 'about', 'Pillar: Judul Publikasi') }}</h4>
                </div>
                <p data-lppm-cms="about.pillar.publikasi">{{ \App\Models\PageContent::getValue('about.pillar.publikasi', 'Dukungan penyuntingan artikel ilmiah, penyediaan direktori jurnal bereputasi nasional dan internasional, serta pengurusan insentif publikasi.', 'textarea', 'about', 'Pillar: Deskripsi Publikasi') }}</p>
                <div class="pillar-footer">
                  <a href="{{ route('publikasi.jurnal') }}" class="pillar-link">Lihat Layanan <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Nilai Inti (Core Values) Grid -->
          <div class="card card-values reveal">
            <div class="card-icon-header">
              <div class="icon-circle"><i class="fa-solid fa-gem"></i></div>
              <h3 data-lppm-cms="about.corevalues.title">{{ \App\Models\PageContent::getValue('about.corevalues.title', 'Nilai Utama Layanan (Core Values)', 'text', 'about', 'Core Values: Judul') }}</h3>
            </div>
            <div class="values-grid">
              <div class="value-item">
                <div class="value-icon"><i class="fa-solid fa-clipboard-check"></i></div>
                <h5 data-lppm-cms="about.values.tertib.title">{{ \App\Models\PageContent::getValue('about.values.tertib.title', 'Tertib', 'text', 'about', 'Core Values: Nama Tertib') }}</h5>
                <p data-lppm-cms="about.values.tertib">{{ \App\Models\PageContent::getValue('about.values.tertib', 'Tata kelola administrasi yang rapi, transparan, terdokumentasi, dan sesuai dengan standar nasional DIKTI.', 'textarea', 'about', 'Core Values: Deskripsi Tertib') }}</p>
              </div>
              <div class="value-item">
                <div class="value-icon"><i class="fa-solid fa-eye"></i></div>
                <h5 data-lppm-cms="about.values.transparan.title">{{ \App\Models\PageContent::getValue('about.values.transparan.title', 'Transparan', 'text', 'about', 'Core Values: Nama Transparan') }}</h5>
                <p data-lppm-cms="about.values.transparan">{{ \App\Models\PageContent::getValue('about.values.transparan', 'Keterbukaan informasi terkait skema dana hibah riset, penilaian proposal, hasil monev, hingga pembagian insentif.', 'textarea', 'about', 'Core Values: Deskripsi Transparan') }}</p>
              </div>
              <div class="value-item">
                <div class="value-icon"><i class="fa-solid fa-sliders"></i></div>
                <h5 data-lppm-cms="about.values.adaptif.title">{{ \App\Models\PageContent::getValue('about.values.adaptif.title', 'Adaptif', 'text', 'about', 'Core Values: Nama Adaptif') }}</h5>
                <p data-lppm-cms="about.values.adaptif">{{ \App\Models\PageContent::getValue('about.values.adaptif', 'Terus berinovasi dan menyesuaikan layanan dengan kebutuhan digitalisasi tridharma perguruan tinggi.', 'textarea', 'about', 'Core Values: Deskripsi Adaptif') }}</p>
              </div>
              <div class="value-item">
                <div class="value-icon"><i class="fa-solid fa-star"></i></div>
                <h5 data-lppm-cms="about.values.berkualitas.title">{{ \App\Models\PageContent::getValue('about.values.berkualitas.title', 'Berkualitas', 'text', 'about', 'Core Values: Nama Berkualitas') }}</h5>
                <p data-lppm-cms="about.values.berkualitas">{{ \App\Models\PageContent::getValue('about.values.berkualitas', 'Memprioritaskan mutu hasil luaran yang berdaya saing nasional serta berorientasi dampak global.', 'textarea', 'about', 'Core Values: Deskripsi Berkualitas') }}</p>
              </div>
            </div>
          </div>

          <!-- Komitmen LPPM -->
          <div class="card card-commitment reveal">
            <div class="commitment-content">
              <div class="commitment-badge" data-lppm-cms="about.commitment.badge">{{ \App\Models\PageContent::getValue('about.commitment.badge', 'Komitmen Kami', 'text', 'about', 'Komitmen: Label Badge') }}</div>
              <h3 data-lppm-cms="about.commitment.title">{{ \App\Models\PageContent::getValue('about.commitment.title', 'Pemberdayaan Berkelanjutan & Dampak Nyata', 'text', 'about', 'Komitmen: Judul') }}</h3>
              <p data-lppm-cms="about.commitment.text">{{ \App\Models\PageContent::getValue('about.commitment.text', 'LPPM IBI KKG berkomitmen untuk secara konsisten memberikan pelayanan prima yang adaptif dan berorientasi kualitas. Melalui sinergi riset akademis dan program pengabdian inovatif, kami bertekad mempercepat pertumbuhan keilmuan civitas akademika dan mewujudkan kolaborasi bernilai tambah tinggi bagi masyarakat dan mitra strategis.', 'textarea', 'about', 'Komitmen: Teks Deskripsi') }}</p>
            </div>
          </div>
        </div>>
      </div>
    </section>
  </main>
@endsection