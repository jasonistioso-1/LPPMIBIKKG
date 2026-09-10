@extends('layouts.app')
@section('title', 'Data Penelitian | LPPM IBI KKG')
@push('styles')
<link rel="stylesheet" href="{{ asset('penelitian/data-penelitian.css') }}" />
@endpush
@section('content')
<div class="bg-glow glow-1"></div>
  <div class="bg-glow glow-2"></div>

  <main>
    <section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge" data-lppm-cms="data_penelitian.hero.badge">{{ \App\Models\PageContent::getValue('data_penelitian.hero.badge', 'Penelitian · Data Penelitian') }}</span>
          <h1 data-lppm-cms="data_penelitian.hero.title">{{ \App\Models\PageContent::getValue('data_penelitian.hero.title', 'Data Penelitian Dosen') }}</h1>
          <p data-lppm-cms="data_penelitian.hero.desc">
            {{ \App\Models\PageContent::getValue('data_penelitian.hero.desc', 'Halaman ini menampilkan rekap data penelitian yang dapat digunakan untuk monitoring, dokumentasi, serta kebutuhan pelaporan lembaga.', 'textarea') }}
          </p>
          <div class="hero-actions">
            <a href="#tabel-data" class="btn btn-primary" data-lppm-cms="data_penelitian.hero.btn1">{{ \App\Models\PageContent::getValue('data_penelitian.hero.btn1', 'Lihat Data') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline" data-lppm-cms="data_penelitian.hero.btn2">{{ \App\Models\PageContent::getValue('data_penelitian.hero.btn2', 'Kembali ke Beranda') }}</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3 data-lppm-cms="data_penelitian.panel.title">{{ \App\Models\PageContent::getValue('data_penelitian.panel.title', 'Ringkasan Data') }}</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong data-lppm-cms="data_penelitian.stat1.val">{{ \App\Models\PageContent::getValue('data_penelitian.stat1.val', '3') }}</strong>
                <span data-lppm-cms="data_penelitian.stat1.lbl">{{ \App\Models\PageContent::getValue('data_penelitian.stat1.lbl', 'Data Sampel') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="data_penelitian.stat2.val">{{ \App\Models\PageContent::getValue('data_penelitian.stat2.val', '2026') }}</strong>
                <span data-lppm-cms="data_penelitian.stat2.lbl">{{ \App\Models\PageContent::getValue('data_penelitian.stat2.lbl', 'Tahun Aktif') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="data_penelitian.stat3.val">{{ \App\Models\PageContent::getValue('data_penelitian.stat3.val', 'Jurnal') }}</strong>
                <span data-lppm-cms="data_penelitian.stat3.lbl">{{ \App\Models\PageContent::getValue('data_penelitian.stat3.lbl', 'Luaran Dominan') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="data_penelitian.stat4.val">{{ \App\Models\PageContent::getValue('data_penelitian.stat4.val', 'LPPM') }}</strong>
                <span data-lppm-cms="data_penelitian.stat4.lbl">{{ \App\Models\PageContent::getValue('data_penelitian.stat4.lbl', 'Pengelola') }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section data-section" id="tabel-data">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag" data-lppm-cms="data_penelitian.section.tag">{{ \App\Models\PageContent::getValue('data_penelitian.section.tag', 'Data Penelitian') }}</span>
            <h2 data-lppm-cms="data_penelitian.section.title">{{ \App\Models\PageContent::getValue('data_penelitian.section.title', 'Rekap Penelitian yang Terdata') }}</h2>
          </div>
          <p data-lppm-cms="data_penelitian.section.desc">
            {{ \App\Models\PageContent::getValue('data_penelitian.section.desc', 'Data berikut disusun untuk kebutuhan monitoring, dokumentasi, dan pelaporan penelitian lembaga.', 'textarea') }}
          </p>
        </div>

        <div class="table-card">
          <div class="toolbar">
            <input
              type="text"
              class="search-input"
              placeholder="Cari judul penelitian..."
            />
            <select class="filter-select">
              <option>Semua Tahun</option>
              <option>2026</option>
              <option>2025</option>
              <option>2024</option>
            </select>
          </div>

          <div class="table-wrap">
            <table class="data-table">
              <thead>
                <tr>
                  <th data-lppm-cms="data_penelitian.th1">{{ \App\Models\PageContent::getValue('data_penelitian.th1', 'Kode') }}</th>
                  <th data-lppm-cms="data_penelitian.th2">{{ \App\Models\PageContent::getValue('data_penelitian.th2', 'Judul Penelitian') }}</th>
                  <th data-lppm-cms="data_penelitian.th3">{{ \App\Models\PageContent::getValue('data_penelitian.th3', 'Ketua Peneliti') }}</th>
                  <th data-lppm-cms="data_penelitian.th4">{{ \App\Models\PageContent::getValue('data_penelitian.th4', 'Tahun') }}</th>
                  <th data-lppm-cms="data_penelitian.th5">{{ \App\Models\PageContent::getValue('data_penelitian.th5', 'Status') }}</th>
                  <th data-lppm-cms="data_penelitian.th6">{{ \App\Models\PageContent::getValue('data_penelitian.th6', 'Luaran') }}</th>
                  <th data-lppm-cms="data_penelitian.th7">{{ \App\Models\PageContent::getValue('data_penelitian.th7', 'Dokumen Kegiatan') }}</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-lppm-cms="data_penelitian.tr1_td1">{{ \App\Models\PageContent::getValue('data_penelitian.tr1_td1', 'PNL-001') }}</td>
                  <td><strong data-lppm-cms="data_penelitian.tr1_td2">{{ \App\Models\PageContent::getValue('data_penelitian.tr1_td2', 'Analisis Model Bisnis UMKM Digital') }}</strong></td>
                  <td data-lppm-cms="data_penelitian.tr1_td3">{{ \App\Models\PageContent::getValue('data_penelitian.tr1_td3', 'Dr. A') }}</td>
                  <td data-lppm-cms="data_penelitian.tr1_td4">{{ \App\Models\PageContent::getValue('data_penelitian.tr1_td4', '2026') }}</td>
                  <td><span class="badge" style="background: rgba(37, 99, 235, 0.08); color: #2563eb; padding: 6px 12px; border-radius: 8px; font-weight:600;" data-lppm-cms="data_penelitian.tr1_td5">{{ \App\Models\PageContent::getValue('data_penelitian.tr1_td5', 'Berjalan') }}</span></td>
                  <td data-lppm-cms="data_penelitian.tr1_td6">{{ \App\Models\PageContent::getValue('data_penelitian.tr1_td6', 'Jurnal') }}</td>
                  <td>
                    <div class="doc-links-wrap">
                      <a href="#" class="btn-doc-download proposal"><i class="fa-solid fa-file-pdf"></i> <span data-lppm-cms="data_penelitian.tr1_btn1">{{ \App\Models\PageContent::getValue('data_penelitian.tr1_btn1', 'Proposal') }}</span></a>
                      <a href="#" class="btn-doc-upload-placeholder"><i class="fa-solid fa-cloud-arrow-up"></i> <span data-lppm-cms="data_penelitian.tr1_btn2">{{ \App\Models\PageContent::getValue('data_penelitian.tr1_btn2', 'Lap. Kemajuan') }}</span></a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td data-lppm-cms="data_penelitian.tr2_td1">{{ \App\Models\PageContent::getValue('data_penelitian.tr2_td1', 'PNL-002') }}</td>
                  <td><strong data-lppm-cms="data_penelitian.tr2_td2">{{ \App\Models\PageContent::getValue('data_penelitian.tr2_td2', 'Perilaku Konsumen pada Platform E-Commerce') }}</strong></td>
                  <td data-lppm-cms="data_penelitian.tr2_td3">{{ \App\Models\PageContent::getValue('data_penelitian.tr2_td3', 'Dr. B') }}</td>
                  <td data-lppm-cms="data_penelitian.tr2_td4">{{ \App\Models\PageContent::getValue('data_penelitian.tr2_td4', '2026') }}</td>
                  <td><span class="badge" style="background: rgba(245, 158, 11, 0.08); color: #d97706; padding: 6px 12px; border-radius: 8px; font-weight:600;" data-lppm-cms="data_penelitian.tr2_td5">{{ \App\Models\PageContent::getValue('data_penelitian.tr2_td5', 'Review') }}</span></td>
                  <td data-lppm-cms="data_penelitian.tr2_td6">{{ \App\Models\PageContent::getValue('data_penelitian.tr2_td6', 'Prosiding') }}</td>
                  <td>
                    <div class="doc-links-wrap">
                      <a href="#" class="btn-doc-download proposal"><i class="fa-solid fa-file-pdf"></i> <span data-lppm-cms="data_penelitian.tr2_btn1">{{ \App\Models\PageContent::getValue('data_penelitian.tr2_btn1', 'Proposal') }}</span></a>
                      <a href="#" class="btn-doc-upload-placeholder"><i class="fa-solid fa-cloud-arrow-up"></i> <span data-lppm-cms="data_penelitian.tr2_btn2">{{ \App\Models\PageContent::getValue('data_penelitian.tr2_btn2', 'Lap. Akhir') }}</span></a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td data-lppm-cms="data_penelitian.tr3_td1">{{ \App\Models\PageContent::getValue('data_penelitian.tr3_td1', 'PNL-003') }}</td>
                  <td><strong data-lppm-cms="data_penelitian.tr3_td2">{{ \App\Models\PageContent::getValue('data_penelitian.tr3_td2', 'Inovasi Keuangan Digital untuk Pendidikan') }}</strong></td>
                  <td data-lppm-cms="data_penelitian.tr3_td3">{{ \App\Models\PageContent::getValue('data_penelitian.tr3_td3', 'Dr. C') }}</td>
                  <td data-lppm-cms="data_penelitian.tr3_td4">{{ \App\Models\PageContent::getValue('data_penelitian.tr3_td4', '2025') }}</td>
                  <td><span class="badge" style="background: rgba(16, 185, 129, 0.08); color: #059669; padding: 6px 12px; border-radius: 8px; font-weight:600;" data-lppm-cms="data_penelitian.tr3_td5">{{ \App\Models\PageContent::getValue('data_penelitian.tr3_td5', 'Selesai') }}</span></td>
                  <td data-lppm-cms="data_penelitian.tr3_td6">{{ \App\Models\PageContent::getValue('data_penelitian.tr3_td6', 'HKI') }}</td>
                  <td>
                    <div class="doc-links-wrap">
                      <a href="#" class="btn-doc-download proposal"><i class="fa-solid fa-file-pdf"></i> <span data-lppm-cms="data_penelitian.tr3_btn1">{{ \App\Models\PageContent::getValue('data_penelitian.tr3_btn1', 'Proposal') }}</span></a>
                      <a href="#" class="btn-doc-download kemajuan"><i class="fa-solid fa-file-word"></i> <span data-lppm-cms="data_penelitian.tr3_btn2">{{ \App\Models\PageContent::getValue('data_penelitian.tr3_btn2', 'Lap. Kemajuan') }}</span></a>
                      <a href="#" class="btn-doc-download akhir"><i class="fa-solid fa-file-circle-check"></i> <span data-lppm-cms="data_penelitian.tr3_btn3">{{ \App\Models\PageContent::getValue('data_penelitian.tr3_btn3', 'Lap. Akhir') }}</span></a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="grid-3 data-info-grid">
          <div class="card info-card">
            <h3 data-lppm-cms="data_penelitian.card1.title">{{ \App\Models\PageContent::getValue('data_penelitian.card1.title', 'Monitoring Progres') }}</h3>
            <p data-lppm-cms="data_penelitian.card1.desc">{{ \App\Models\PageContent::getValue('data_penelitian.card1.desc', 'Data penelitian dapat digunakan untuk memantau status proposal, proses review, penelitian berjalan, hingga penyelesaian luaran.', 'textarea') }}</p>
          </div>
          <div class="card info-card">
            <h3 data-lppm-cms="data_penelitian.card2.title">{{ \App\Models\PageContent::getValue('data_penelitian.card2.title', 'Dokumentasi Luaran') }}</h3>
            <p data-lppm-cms="data_penelitian.card2.desc">{{ \App\Models\PageContent::getValue('data_penelitian.card2.desc', 'Setiap data penelitian dapat dilengkapi dengan jurnal, prosiding, HKI, atau bentuk luaran lain yang relevan.', 'textarea') }}</p>
          </div>
          <div class="card info-card">
            <h3 data-lppm-cms="data_penelitian.card3.title">{{ \App\Models\PageContent::getValue('data_penelitian.card3.title', 'Pelaporan Lembaga') }}</h3>
            <p data-lppm-cms="data_penelitian.card3.desc">{{ \App\Models\PageContent::getValue('data_penelitian.card3.desc', 'Rekap data ini dapat dipakai untuk kebutuhan akreditasi, laporan tahunan, dan evaluasi kinerja penelitian institusi.', 'textarea') }}</p>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection