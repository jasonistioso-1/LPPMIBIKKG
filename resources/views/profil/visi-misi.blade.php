@extends('layouts.app')
@section('title', 'Visi, Misi, Tujuan, dan Sasaran | LPPM IBI KKG')
@push('styles')
<link rel="stylesheet" href="{{ asset('profil/visi-misi.css') }}" />
@endpush
@section('content')
<div class="bg-glow glow-1"></div>
  <div class="bg-glow glow-2"></div>

  

  <main>
    <section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge" data-lppm-cms="visi_misi.hero.badge">{{ \App\Models\PageContent::getValue('visi_misi.hero.badge', 'Profil · Visi, Misi, Tujuan, dan Sasaran') }}</span>
          <h1 data-lppm-cms="visi_misi.hero.title">{{ \App\Models\PageContent::getValue('visi_misi.hero.title', 'Visi, Misi, Tujuan, dan Sasaran LPPM') }}</h1>
          <p data-lppm-cms="visi_misi.hero.desc">
            {{ \App\Models\PageContent::getValue('visi_misi.hero.desc', 'Halaman ini memuat arah pengembangan LPPM Institut Bisnis dan Informatika Kwik Kian Gie, meliputi visi dan misi periode 2025–2030, tujuan, sasaran, serta arsip visi dan misi periode sebelumnya.') }}
          </p>
          <div class="hero-actions">
            <a href="#visi-baru" class="btn btn-primary">Lihat Visi &amp; Misi</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke Beranda</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3 data-lppm-cms="visi_misi.hero.summary_title">{{ \App\Models\PageContent::getValue('visi_misi.hero.summary_title', 'Ringkasan Dokumen') }}</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong data-lppm-cms="visi_misi.hero.stat1.val">{{ \App\Models\PageContent::getValue('visi_misi.hero.stat1.val', '2025') }}</strong>
                <span data-lppm-cms="visi_misi.hero.stat1.lbl">{{ \App\Models\PageContent::getValue('visi_misi.hero.stat1.lbl', 'Periode Baru') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="visi_misi.hero.stat2.val">{{ \App\Models\PageContent::getValue('visi_misi.hero.stat2.val', '2045') }}</strong>
                <span data-lppm-cms="visi_misi.hero.stat2.lbl">{{ \App\Models\PageContent::getValue('visi_misi.hero.stat2.lbl', 'Arah Visi') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="visi_misi.hero.stat3.val">{{ \App\Models\PageContent::getValue('visi_misi.hero.stat3.val', '4') }}</strong>
                <span data-lppm-cms="visi_misi.hero.stat3.lbl">{{ \App\Models\PageContent::getValue('visi_misi.hero.stat3.lbl', 'Misi Utama') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="visi_misi.hero.stat4.val">{{ \App\Models\PageContent::getValue('visi_misi.hero.stat4.val', '4') }}</strong>
                <span data-lppm-cms="visi_misi.hero.stat4.lbl">{{ \App\Models\PageContent::getValue('visi_misi.hero.stat4.lbl', 'Sasaran Strategis') }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="visi-baru">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag" data-lppm-cms="visi_misi.visi_section.tag">{{ \App\Models\PageContent::getValue('visi_misi.visi_section.tag', 'Periode 2025–2030') }}</span>
            <h2 data-lppm-cms="visi_misi.visi_section.title">{{ \App\Models\PageContent::getValue('visi_misi.visi_section.title', 'Visi dan Misi LPPM') }}</h2>
          </div>
          <p data-lppm-cms="visi_misi.visi_section.desc">
            {{ \App\Models\PageContent::getValue('visi_misi.visi_section.desc', 'Visi dan misi terbaru menjadi landasan pengembangan penelitian, publikasi, dan pengabdian kepada masyarakat yang inovatif, kolaboratif, dan berdaya saing internasional.') }}
          </p>
        </div>

        <div class="content-stack">
          <div class="card vision-card">
            <div class="card-overlay-content">
              <h3 data-lppm-cms="visi_misi.visi.title">{{ \App\Models\PageContent::getValue('visi_misi.visi.title', 'Visi LPPM') }}</h3>
              <p class="highlight" data-lppm-cms="visi_misi.visi.text">
                “{{ \App\Models\PageContent::getValue('visi_misi.visi.text', 'Menjadi Lembaga Penelitian dan Pengabdian Masyarakat yang unggul dan terkemuka dengan mengembangkan proses penelitian, publikasi dan pengabdian kepada masyarakat yang inovatif, kolaboratif dan kreatif di bidang bisnis, informatika, komunikasi yang berorientasi pada entrepreneurship, serta berdaya saing internasional di tahun 2045') }}”
              </p>
            </div>
          </div>

          <div class="card mission-card">
            <div class="card-overlay-content">
              <h3 data-lppm-cms="visi_misi.misi.title">{{ \App\Models\PageContent::getValue('visi_misi.misi.title', 'Misi LPPM') }}</h3>
              <ul class="info-list" data-lppm-cms="visi_misi.misi.text">
                @php
                  $misiDefault = "Mengembangkan penelitian dan publikasi yang berkualitas di bidang bisnis, informatika, dan komunikasi yang berorientasi pada entrepreneurship dan bermanfaat bagi masyarakat serta berdaya saing internasional.\nMengembangkan pengabdian kepada masyarakat yang berkualitas di bidang bisnis, informatika, dan komunikasi yang berorientasi pada entrepreneurship dan bermanfaat bagi masyarakat serta berdaya saing internasional.\nMelaksanakan tata kelola Lembaga Penelitian dan Pengabdian Masyarakat yang responsif, transparan, akuntabel, mandiri, efektif, dan efisien untuk mendukung penelitian, publikasi dan pengabdian kepada masyarakat yang berkualitas dan berdaya saing internasional.\nMelaksanakan kolaborasi kerja sama penelitian, publikasi dan pengabdian kepada masyarakat dalam bidang bisnis, informatika, dan komunikasi dengan mitra strategis, yang bermanfaat bagi masyarakat dan berdaya saing internasional.";
                  $misiRaw = \App\Models\PageContent::getValue('visi_misi.misi.text', $misiDefault, 'textarea', 'visi-misi', 'Misi LPPM (Satu per baris)');
                  $misiItems = array_filter(array_map('trim', explode("\n", $misiRaw)));
                @endphp
                @foreach($misiItems as $item)
                  <li>{{ $item }}</li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section alt-section" id="tujuan-sasaran">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag" data-lppm-cms="visi_misi.tujuan_section.tag">{{ \App\Models\PageContent::getValue('visi_misi.tujuan_section.tag', 'Arah Strategis') }}</span>
            <h2 data-lppm-cms="visi_misi.tujuan_section.title">{{ \App\Models\PageContent::getValue('visi_misi.tujuan_section.title', 'Tujuan dan Sasaran LPPM') }}</h2>
          </div>
          <p data-lppm-cms="visi_misi.tujuan_section.desc">
            {{ \App\Models\PageContent::getValue('visi_misi.tujuan_section.desc', 'Tujuan dan sasaran ini menjadi indikator arah pelaksanaan program lembaga secara berkelanjutan.') }}
          </p>
        </div>

        <div class="content-stack">
          <div class="grid-2">
            <div class="card goal-card">
              <div class="card-overlay-content">
                <h3 data-lppm-cms="visi_misi.tujuan.title">{{ \App\Models\PageContent::getValue('visi_misi.tujuan.title', 'Tujuan LPPM') }}</h3>
                <ul class="info-list" data-lppm-cms="visi_misi.tujuan.text">
                  @php
                    $tujuanDefault = "Menghasilkan penelitian dan publikasi yang berkualitas di bidang bisnis, informatika, dan komunikasi yang berorientasi pada entrepreneurship dan bermanfaat bagi masyarakat serta berdaya saing internasional.\nMenghasilkan pengabdian kepada masyarakat yang berkualitas di bidang bisnis, informatika, dan komunikasi yang berorientasi pada entrepreneurship dan bermanfaat bagi masyarakat serta berdaya saing internasional.\nMenghasilkan tata kelola Lembaga Penelitian dan Pengabdian Masyarakat yang responsif, transparan, akuntabel, mandiri, efektif, dan efisien untuk mendukung penelitian, publikasi dan pengabdian kepada masyarakat yang berkualitas dan berdaya saing internasional.\nMenghasilkan kolaborasi kerja sama penelitian, publikasi dan pengabdian kepada masyarakat dalam bidang bisnis, informatika, dan komunikasi dengan mitra strategis, yang bermanfaat bagi masyarakat dan berdaya saing internasional.";
                    $tujuanRaw = \App\Models\PageContent::getValue('visi_misi.tujuan.text', $tujuanDefault, 'textarea', 'visi-misi', 'Tujuan LPPM (Satu per baris)');
                    $tujuanItems = array_filter(array_map('trim', explode("\n", $tujuanRaw)));
                  @endphp
                  @foreach($tujuanItems as $item)
                    <li>{{ $item }}</li>
                  @endforeach
                </ul>
              </div>
            </div>

            <div class="card target-card">
              <div class="card-overlay-content">
                <h3 data-lppm-cms="visi_misi.sasaran.title">{{ \App\Models\PageContent::getValue('visi_misi.sasaran.title', 'Sasaran LPPM') }}</h3>
                <ul class="info-list" data-lppm-cms="visi_misi.sasaran.text">
                  @php
                    $sasaranDefault = "Meningkatnya penelitian dan publikasi yang berkualitas di bidang bisnis, informatika, dan komunikasi yang berorientasi pada entrepreneurship dan bermanfaat bagi masyarakat serta berdaya saing internasional.\nMeningkatnya pengabdian kepada masyarakat yang berkualitas di bidang bisnis, informatika, dan komunikasi yang berorientasi pada entrepreneurship dan bermanfaat bagi masyarakat serta berdaya saing internasional.\nMeningkatnya kualitas tata kelola Lembaga Penelitian dan Pengabdian Masyarakat yang responsif, transparan, akuntabel, mandiri, efektif, dan efisien untuk mendukung penelitian, publikasi dan pengabdian kepada masyarakat yang berkualitas dan berdaya saing internasional.\nMeningkatnya kolaborasi kerja sama penelitian, publikasi dan pengabdian kepada masyarakat dalam bidang bisnis, informatika, dan komunikasi dengan mitra strategis, yang bermanfaat bagi masyarakat dan berdaya saing internasional.";
                    $sasaranRaw = \App\Models\PageContent::getValue('visi_misi.sasaran.text', $sasaranDefault, 'textarea', 'visi-misi', 'Sasaran LPPM (Satu per baris)');
                    $sasaranItems = array_filter(array_map('trim', explode("\n", $sasaranRaw)));
                  @endphp
                  @foreach($sasaranItems as $item)
                    <li>{{ $item }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="visi-lama">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag" data-lppm-cms="visi_misi.visi_lama_section.tag">{{ \App\Models\PageContent::getValue('visi_misi.visi_lama_section.tag', 'Arsip Dokumen') }}</span>
            <h2 data-lppm-cms="visi_misi.visi_lama_section.title">{{ \App\Models\PageContent::getValue('visi_misi.visi_lama_section.title', 'Visi dan Misi LPPM Periode 2020–2025') }}</h2>
          </div>
          <p data-lppm-cms="visi_misi.visi_lama_section.desc">
            {{ \App\Models\PageContent::getValue('visi_misi.visi_lama_section.desc', 'Bagian ini disimpan sebagai referensi arah kelembagaan pada periode sebelumnya.') }}
          </p>
        </div>

        <div class="content-stack">
          <div class="card old">
            <h3 data-lppm-cms="visi_misi.visi_lama.title">{{ \App\Models\PageContent::getValue('visi_misi.visi_lama.title', 'Visi LPPM 2020–2025') }}</h3>
            <p class="highlight" data-lppm-cms="visi_misi.visi_lama.text">
              “{{ \App\Models\PageContent::getValue('visi_misi.visi_lama.text', 'Menjadi lembaga penelitian dan pengabdian kepada masyarakat (LPPM) yang terkemuka dengan tata kelola, profesionalisme, dan kepemimpinan yang tinggi di bidang penelitian dan pengabdian kepada masyarakat serta selalu tanggap terhadap kebutuhan ilmu pengetahuan dan teknologi bagi masyarakat dan dunia bisnis') }}”
            </p>
          </div>

          <div class="grid-2">
            <div class="card old">
              <h3 data-lppm-cms="visi_misi.misi_lama_penelitian.title">{{ \App\Models\PageContent::getValue('visi_misi.misi_lama_penelitian.title', 'Misi LPPM 2020–2025') }}</h3>
              <h4 data-lppm-cms="visi_misi.misi_lama_penelitian.subtitle">{{ \App\Models\PageContent::getValue('visi_misi.misi_lama_penelitian.subtitle', 'A. Bidang Penelitian') }}</h4>
              <ol class="info-list" data-lppm-cms="visi_misi.misi_lama_penelitian.text">
                @php
                  $misiLamaPenelitianDefault = "Meningkatkan kemampuan dosen dalam melakukan penelitian dasar dan terapan.\nMendorong peningkatan penelitian dosen dan mempublikasikannya.\nMendorong penelitian dosen yang dapat meningkatkan kesejahteraan masyarakat.\nMendorong penelitian dosen untuk pengembangan ilmu pengetahuan dan teknologi.\nMendorong penelitian dosen yang inovatif serta mendukung pelaksanaan, pelaporan dan publikasi penelitian dosen.";
                  $misiLamaPenelitianRaw = \App\Models\PageContent::getValue('visi_misi.misi_lama_penelitian.text', $misiLamaPenelitianDefault, 'textarea', 'visi-misi', 'Misi Lama: Penelitian (Satu per baris)');
                  $misiLamaPenelitianItems = array_filter(array_map('trim', explode("\n", $misiLamaPenelitianRaw)));
                @endphp
                @foreach($misiLamaPenelitianItems as $item)
                  <li>{{ $item }}</li>
                @endforeach
              </ol>
            </div>

            <div class="card old">
              <h3>&nbsp;</h3>
              <h4 data-lppm-cms="visi_misi.misi_lama_abdimas.subtitle">{{ \App\Models\PageContent::getValue('visi_misi.misi_lama_abdimas.subtitle', 'B. Bidang Pengabdian kepada Masyarakat') }}</h4>
              <ol class="info-list" data-lppm-cms="visi_misi.misi_lama_abdimas.text">
                @php
                  $misiLamaAbdimasDefault = "Berperan serta dalam meningkatkan kemampuan masyarakat dan pelaku usaha kecil, menengah dan koperasi.\nMeningkatkan peran Learning Center dalam pendidikan, pelatihan dan penelitian agar sesuai dengan kebutuhan masyarakat, khususnya bagi pelaku bisnis usaha kecil, menengah dan koperasi.";
                  $misiLamaAbdimasRaw = \App\Models\PageContent::getValue('visi_misi.misi_lama_abdimas.text', $misiLamaAbdimasDefault, 'textarea', 'visi-misi', 'Misi Lama: Abdimas (Satu per baris)');
                  $misiLamaAbdimasItems = array_filter(array_map('trim', explode("\n", $misiLamaAbdimasRaw)));
                @endphp
                @foreach($misiLamaAbdimasItems as $item)
                  <li>{{ $item }}</li>
                @endforeach
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  </main>
@endsection