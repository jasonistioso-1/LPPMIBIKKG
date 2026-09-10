@extends('layouts.app')
@section('title', 'Prosiding | LPPM IBI KKG')
@push('styles')
<link rel="stylesheet" href="{{ asset('publikasi/prosiding.css') }}" />
@endpush
@section('content')
<div class="bg-glow glow-1"></div>
  <div class="bg-glow glow-2"></div>

  <main>
    <section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge" data-lppm-cms="pub_prosiding.hero.badge">{{ \App\Models\PageContent::getValue('pub_prosiding.hero.badge', 'Publikasi · Prosiding') }}</span>
          <h1 data-lppm-cms="pub_prosiding.hero.title">{{ \App\Models\PageContent::getValue('pub_prosiding.hero.title', 'Daftar Prosiding') }}</h1>
          <p data-lppm-cms="pub_prosiding.hero.desc">{{ \App\Models\PageContent::getValue('pub_prosiding.hero.desc', 'Halaman ini memuat kegiatan prosiding dan konferensi yang relevan dengan luaran penelitian maupun kegiatan ilmiah LPPM.', 'textarea') }}</p>
          <div class="hero-actions">
            <a href="#daftar-prosiding" class="btn btn-primary" data-lppm-cms="pub_prosiding.hero.btn1">{{ \App\Models\PageContent::getValue('pub_prosiding.hero.btn1', 'Lihat Prosiding') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline" data-lppm-cms="pub_prosiding.hero.btn2">{{ \App\Models\PageContent::getValue('pub_prosiding.hero.btn2', 'Kembali ke Beranda') }}</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3 data-lppm-cms="pub_prosiding.panel.title">{{ \App\Models\PageContent::getValue('pub_prosiding.panel.title', 'Ringkasan Prosiding') }}</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong data-lppm-cms="pub_prosiding.stat1.val">{{ \App\Models\PageContent::getValue('pub_prosiding.stat1.val', '2') }}</strong>
                <span data-lppm-cms="pub_prosiding.stat1.lbl">{{ \App\Models\PageContent::getValue('pub_prosiding.stat1.lbl', 'Prosiding Sampel') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="pub_prosiding.stat2.val">{{ \App\Models\PageContent::getValue('pub_prosiding.stat2.val', '2025–2026') }}</strong>
                <span data-lppm-cms="pub_prosiding.stat2.lbl">{{ \App\Models\PageContent::getValue('pub_prosiding.stat2.lbl', 'Periode') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="pub_prosiding.stat3.val">{{ \App\Models\PageContent::getValue('pub_prosiding.stat3.val', 'Seminar') }}</strong>
                <span data-lppm-cms="pub_prosiding.stat3.lbl">{{ \App\Models\PageContent::getValue('pub_prosiding.stat3.lbl', 'Kegiatan') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="pub_prosiding.stat4.val">{{ \App\Models\PageContent::getValue('pub_prosiding.stat4.val', 'Terbit') }}</strong>
                <span data-lppm-cms="pub_prosiding.stat4.lbl">{{ \App\Models\PageContent::getValue('pub_prosiding.stat4.lbl', 'Status') }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="daftar-prosiding">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag" data-lppm-cms="pub_prosiding.section.tag">{{ \App\Models\PageContent::getValue('pub_prosiding.section.tag', 'Prosiding') }}</span>
            <h2 data-lppm-cms="pub_prosiding.section.title">{{ \App\Models\PageContent::getValue('pub_prosiding.section.title', 'Daftar Prosiding Kegiatan Ilmiah') }}</h2>
          </div>
          <p data-lppm-cms="pub_prosiding.section.desc">{{ \App\Models\PageContent::getValue('pub_prosiding.section.desc', 'Prosiding berikut dapat menjadi alternatif luaran untuk seminar, konferensi, dan forum ilmiah terpilih.', 'textarea') }}</p>
        </div>

        <div class="table-card">
          <div class="table-wrap">
            <table class="data-table">
              <thead>
                <tr>
                  <th data-lppm-cms="pub_prosiding.th1">{{ \App\Models\PageContent::getValue('pub_prosiding.th1', 'No') }}</th>
                  <th data-lppm-cms="pub_prosiding.th2">{{ \App\Models\PageContent::getValue('pub_prosiding.th2', 'Judul Kegiatan') }}</th>
                  <th data-lppm-cms="pub_prosiding.th3">{{ \App\Models\PageContent::getValue('pub_prosiding.th3', 'Tahun') }}</th>
                  <th data-lppm-cms="pub_prosiding.th4">{{ \App\Models\PageContent::getValue('pub_prosiding.th4', 'Penyelenggara') }}</th>
                  <th data-lppm-cms="pub_prosiding.th5">{{ \App\Models\PageContent::getValue('pub_prosiding.th5', 'Status') }}</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-lppm-cms="pub_prosiding.tr1_td1">{{ \App\Models\PageContent::getValue('pub_prosiding.tr1_td1', '1') }}</td>
                  <td data-lppm-cms="pub_prosiding.tr1_td2">{{ \App\Models\PageContent::getValue('pub_prosiding.tr1_td2', 'Seminar Nasional Ekonomi') }}</td>
                  <td data-lppm-cms="pub_prosiding.tr1_td3">{{ \App\Models\PageContent::getValue('pub_prosiding.tr1_td3', '2026') }}</td>
                  <td data-lppm-cms="pub_prosiding.tr1_td4">{{ \App\Models\PageContent::getValue('pub_prosiding.tr1_td4', 'LPPM IBI KKG') }}</td>
                  <td data-lppm-cms="pub_prosiding.tr1_td5">{{ \App\Models\PageContent::getValue('pub_prosiding.tr1_td5', 'Terbit') }}</td>
                </tr>
                <tr>
                  <td data-lppm-cms="pub_prosiding.tr2_td1">{{ \App\Models\PageContent::getValue('pub_prosiding.tr2_td1', '2') }}</td>
                  <td data-lppm-cms="pub_prosiding.tr2_td2">{{ \App\Models\PageContent::getValue('pub_prosiding.tr2_td2', 'Konferensi Bisnis Digital') }}</td>
                  <td data-lppm-cms="pub_prosiding.tr2_td3">{{ \App\Models\PageContent::getValue('pub_prosiding.tr2_td3', '2025') }}</td>
                  <td data-lppm-cms="pub_prosiding.tr2_td4">{{ \App\Models\PageContent::getValue('pub_prosiding.tr2_td4', 'Kolaborasi Mitra') }}</td>
                  <td data-lppm-cms="pub_prosiding.tr2_td5">{{ \App\Models\PageContent::getValue('pub_prosiding.tr2_td5', 'Terbit') }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="grid-3 info-grid">
          <div class="card info-card">
            <h3 data-lppm-cms="pub_prosiding.card1.title">{{ \App\Models\PageContent::getValue('pub_prosiding.card1.title', 'Forum Ilmiah') }}</h3>
            <p data-lppm-cms="pub_prosiding.card1.desc">{{ \App\Models\PageContent::getValue('pub_prosiding.card1.desc', 'Prosiding mendukung publikasi hasil penelitian yang dipresentasikan pada seminar atau konferensi ilmiah.', 'textarea') }}</p>
          </div>

          <div class="card info-card">
            <h3 data-lppm-cms="pub_prosiding.card2.title">{{ \App\Models\PageContent::getValue('pub_prosiding.card2.title', 'Jejaring Akademik') }}</h3>
            <p data-lppm-cms="pub_prosiding.card2.desc">{{ \App\Models\PageContent::getValue('pub_prosiding.card2.desc', 'Kegiatan prosiding membuka peluang kolaborasi dengan peneliti, dosen, dan institusi dari berbagai bidang.', 'textarea') }}</p>
          </div>

          <div class="card info-card">
            <h3 data-lppm-cms="pub_prosiding.card3.title">{{ \App\Models\PageContent::getValue('pub_prosiding.card3.title', 'Luaran Terukur') }}</h3>
            <p data-lppm-cms="pub_prosiding.card3.desc">{{ \App\Models\PageContent::getValue('pub_prosiding.card3.desc', 'Prosiding menjadi salah satu bentuk luaran yang dapat didokumentasikan untuk kebutuhan evaluasi dan pelaporan lembaga.', 'textarea') }}</p>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection