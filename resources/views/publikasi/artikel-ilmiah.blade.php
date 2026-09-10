@extends('layouts.app')
@section('title', 'Artikel Ilmiah | LPPM IBI KKG')
@push('styles')
<link rel="stylesheet" href="{{ asset('publikasi/artikel-ilmiah.css') }}" />
@endpush
@section('content')
<div class="bg-glow glow-1"></div>
  <div class="bg-glow glow-2"></div>

  <main>
    <section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge" data-lppm-cms="pub_artikel.hero.badge">{{ \App\Models\PageContent::getValue('pub_artikel.hero.badge', 'Publikasi · Artikel Ilmiah') }}</span>
          <h1 data-lppm-cms="pub_artikel.hero.title">{{ \App\Models\PageContent::getValue('pub_artikel.hero.title', 'Daftar Artikel Ilmiah') }}</h1>
          <p data-lppm-cms="pub_artikel.hero.desc">{{ \App\Models\PageContent::getValue('pub_artikel.hero.desc', 'Halaman ini memuat artikel ilmiah yang relevan dengan bidang bisnis, informatika, komunikasi, dan kegiatan akademik LPPM.', 'textarea') }}</p>
          <div class="hero-actions">
            <a href="#daftar-artikel" class="btn btn-primary" data-lppm-cms="pub_artikel.hero.btn1">{{ \App\Models\PageContent::getValue('pub_artikel.hero.btn1', 'Lihat Artikel') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline" data-lppm-cms="pub_artikel.hero.btn2">{{ \App\Models\PageContent::getValue('pub_artikel.hero.btn2', 'Kembali ke Beranda') }}</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3 data-lppm-cms="pub_artikel.panel.title">{{ \App\Models\PageContent::getValue('pub_artikel.panel.title', 'Ringkasan Artikel') }}</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong data-lppm-cms="pub_artikel.stat1.val">{{ \App\Models\PageContent::getValue('pub_artikel.stat1.val', '2') }}</strong>
                <span data-lppm-cms="pub_artikel.stat1.lbl">{{ \App\Models\PageContent::getValue('pub_artikel.stat1.lbl', 'Artikel Sampel') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="pub_artikel.stat2.val">{{ \App\Models\PageContent::getValue('pub_artikel.stat2.val', '2025–2026') }}</strong>
                <span data-lppm-cms="pub_artikel.stat2.lbl">{{ \App\Models\PageContent::getValue('pub_artikel.stat2.lbl', 'Tahun') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="pub_artikel.stat3.val">{{ \App\Models\PageContent::getValue('pub_artikel.stat3.val', 'Bisnis') }}</strong>
                <span data-lppm-cms="pub_artikel.stat3.lbl">{{ \App\Models\PageContent::getValue('pub_artikel.stat3.lbl', 'Kategori') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="pub_artikel.stat4.val">{{ \App\Models\PageContent::getValue('pub_artikel.stat4.val', 'Ekonomi') }}</strong>
                <span data-lppm-cms="pub_artikel.stat4.lbl">{{ \App\Models\PageContent::getValue('pub_artikel.stat4.lbl', 'Topik') }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="daftar-artikel">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag" data-lppm-cms="pub_artikel.section.tag">{{ \App\Models\PageContent::getValue('pub_artikel.section.tag', 'Artikel Ilmiah') }}</span>
            <h2 data-lppm-cms="pub_artikel.section.title">{{ \App\Models\PageContent::getValue('pub_artikel.section.title', 'Daftar Artikel Terpublikasi') }}</h2>
          </div>
          <p data-lppm-cms="pub_artikel.section.desc">{{ \App\Models\PageContent::getValue('pub_artikel.section.desc', 'Artikel ilmiah berikut dapat menjadi referensi pengembangan riset sekaligus dokumentasi luaran akademik institusi.', 'textarea') }}</p>
        </div>

        <div class="table-card">
          <div class="table-wrap">
            <table class="data-table">
              <thead>
                <tr>
                  <th data-lppm-cms="pub_artikel.th1">{{ \App\Models\PageContent::getValue('pub_artikel.th1', 'No') }}</th>
                  <th data-lppm-cms="pub_artikel.th2">{{ \App\Models\PageContent::getValue('pub_artikel.th2', 'Judul Artikel') }}</th>
                  <th data-lppm-cms="pub_artikel.th3">{{ \App\Models\PageContent::getValue('pub_artikel.th3', 'Penulis') }}</th>
                  <th data-lppm-cms="pub_artikel.th4">{{ \App\Models\PageContent::getValue('pub_artikel.th4', 'Tahun') }}</th>
                  <th data-lppm-cms="pub_artikel.th5">{{ \App\Models\PageContent::getValue('pub_artikel.th5', 'Kategori') }}</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-lppm-cms="pub_artikel.tr1_td1">{{ \App\Models\PageContent::getValue('pub_artikel.tr1_td1', '1') }}</td>
                  <td data-lppm-cms="pub_artikel.tr1_td2">{{ \App\Models\PageContent::getValue('pub_artikel.tr1_td2', 'Transformasi Digital UMKM Indonesia') }}</td>
                  <td data-lppm-cms="pub_artikel.tr1_td3">{{ \App\Models\PageContent::getValue('pub_artikel.tr1_td3', 'Tim Penulis A') }}</td>
                  <td data-lppm-cms="pub_artikel.tr1_td4">{{ \App\Models\PageContent::getValue('pub_artikel.tr1_td4', '2026') }}</td>
                  <td data-lppm-cms="pub_artikel.tr1_td5">{{ \App\Models\PageContent::getValue('pub_artikel.tr1_td5', 'Ekonomi') }}</td>
                </tr>
                <tr>
                  <td data-lppm-cms="pub_artikel.tr2_td1">{{ \App\Models\PageContent::getValue('pub_artikel.tr2_td1', '2') }}</td>
                  <td data-lppm-cms="pub_artikel.tr2_td2">{{ \App\Models\PageContent::getValue('pub_artikel.tr2_td2', 'Strategi Pemasaran Berbasis Data') }}</td>
                  <td data-lppm-cms="pub_artikel.tr2_td3">{{ \App\Models\PageContent::getValue('pub_artikel.tr2_td3', 'Tim Penulis B') }}</td>
                  <td data-lppm-cms="pub_artikel.tr2_td4">{{ \App\Models\PageContent::getValue('pub_artikel.tr2_td4', '2025') }}</td>
                  <td data-lppm-cms="pub_artikel.tr2_td5">{{ \App\Models\PageContent::getValue('pub_artikel.tr2_td5', 'Bisnis') }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="grid-3 info-grid">
          <div class="card info-card">
            <h3 data-lppm-cms="pub_artikel.card1.title">{{ \App\Models\PageContent::getValue('pub_artikel.card1.title', 'Dokumentasi Luaran') }}</h3>
            <p data-lppm-cms="pub_artikel.card1.desc">{{ \App\Models\PageContent::getValue('pub_artikel.card1.desc', 'Artikel ilmiah membantu mendokumentasikan hasil penelitian dan memperlihatkan kontribusi akademik sivitas institusi.', 'textarea') }}</p>
          </div>

          <div class="card info-card">
            <h3 data-lppm-cms="pub_artikel.card2.title">{{ \App\Models\PageContent::getValue('pub_artikel.card2.title', 'Referensi Akademik') }}</h3>
            <p data-lppm-cms="pub_artikel.card2.desc">{{ \App\Models\PageContent::getValue('pub_artikel.card2.desc', 'Artikel dapat digunakan sebagai referensi pengembangan topik riset, pembelajaran, maupun pengabdian kepada masyarakat.', 'textarea') }}</p>
          </div>

          <div class="card info-card">
            <h3 data-lppm-cms="pub_artikel.card3.title">{{ \App\Models\PageContent::getValue('pub_artikel.card3.title', 'Penguatan Reputasi') }}</h3>
            <p data-lppm-cms="pub_artikel.card3.desc">{{ \App\Models\PageContent::getValue('pub_artikel.card3.desc', 'Publikasi artikel ilmiah mendukung penguatan reputasi akademik lembaga di tingkat nasional maupun internasional.', 'textarea') }}</p>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection