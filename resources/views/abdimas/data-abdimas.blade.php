@extends('layouts.app')
@section('title', 'Data Abdimas | LPPM IBI KKG')
@push('styles')
<link rel="stylesheet" href="{{ asset('abdimas/data-abdimas.css') }}" />
@endpush
@section('content')
<div class="bg-glow glow-1"></div>
  <div class="bg-glow glow-2"></div>

  <main>
    <section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge" data-lppm-cms="data_abdimas.hero.badge">{{ \App\Models\PageContent::getValue('data_abdimas.hero.badge', 'Abdimas · Data Abdimas') }}</span>
          <h1 data-lppm-cms="data_abdimas.hero.title">{{ \App\Models\PageContent::getValue('data_abdimas.hero.title', 'Data Kegiatan Abdimas') }}</h1>
          <p data-lppm-cms="data_abdimas.hero.desc">{{ \App\Models\PageContent::getValue('data_abdimas.hero.desc', 'Halaman ini memuat rekap data pengabdian kepada masyarakat untuk kebutuhan pemantauan, dokumentasi, dan pelaporan lembaga.', 'textarea') }}</p>
          <div class="hero-actions">
            <a href="#tabel-data" class="btn btn-primary" data-lppm-cms="data_abdimas.hero.btn1">{{ \App\Models\PageContent::getValue('data_abdimas.hero.btn1', 'Lihat Data') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline" data-lppm-cms="data_abdimas.hero.btn2">{{ \App\Models\PageContent::getValue('data_abdimas.hero.btn2', 'Kembali ke Beranda') }}</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3 data-lppm-cms="data_abdimas.panel.title">{{ \App\Models\PageContent::getValue('data_abdimas.panel.title', 'Ringkasan Data') }}</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong data-lppm-cms="data_abdimas.stat1.val">{{ \App\Models\PageContent::getValue('data_abdimas.stat1.val', '3') }}</strong>
                <span data-lppm-cms="data_abdimas.stat1.lbl">{{ \App\Models\PageContent::getValue('data_abdimas.stat1.lbl', 'Data Sampel') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="data_abdimas.stat2.val">{{ \App\Models\PageContent::getValue('data_abdimas.stat2.val', '2026') }}</strong>
                <span data-lppm-cms="data_abdimas.stat2.lbl">{{ \App\Models\PageContent::getValue('data_abdimas.stat2.lbl', 'Tahun Aktif') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="data_abdimas.stat3.val">{{ \App\Models\PageContent::getValue('data_abdimas.stat3.val', 'Mitra') }}</strong>
                <span data-lppm-cms="data_abdimas.stat3.lbl">{{ \App\Models\PageContent::getValue('data_abdimas.stat3.lbl', 'Fokus Program') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="data_abdimas.stat4.val">{{ \App\Models\PageContent::getValue('data_abdimas.stat4.val', 'LPPM') }}</strong>
                <span data-lppm-cms="data_abdimas.stat4.lbl">{{ \App\Models\PageContent::getValue('data_abdimas.stat4.lbl', 'Pengelola') }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="tabel-data">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag" data-lppm-cms="data_abdimas.section.tag">{{ \App\Models\PageContent::getValue('data_abdimas.section.tag', 'Data Abdimas') }}</span>
            <h2 data-lppm-cms="data_abdimas.section.title">{{ \App\Models\PageContent::getValue('data_abdimas.section.title', 'Rekap Kegiatan yang Terdata') }}</h2>
          </div>
          <p data-lppm-cms="data_abdimas.section.desc">{{ \App\Models\PageContent::getValue('data_abdimas.section.desc', 'Data berikut disusun untuk kebutuhan monitoring, dokumentasi, dan pelaporan kegiatan pengabdian kepada masyarakat.', 'textarea') }}</p>
        </div>

        <div class="table-card">
          <div class="toolbar">
            <input
              type="text"
              class="search-input"
              placeholder="Cari program abdimas..."
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
                  <th data-lppm-cms="data_abdimas.th1">{{ \App\Models\PageContent::getValue('data_abdimas.th1', 'Kode') }}</th>
                  <th data-lppm-cms="data_abdimas.th2">{{ \App\Models\PageContent::getValue('data_abdimas.th2', 'Program Abdimas') }}</th>
                  <th data-lppm-cms="data_abdimas.th3">{{ \App\Models\PageContent::getValue('data_abdimas.th3', 'Ketua Pelaksana') }}</th>
                  <th data-lppm-cms="data_abdimas.th4">{{ \App\Models\PageContent::getValue('data_abdimas.th4', 'Mitra Sasaran') }}</th>
                  <th data-lppm-cms="data_abdimas.th5">{{ \App\Models\PageContent::getValue('data_abdimas.th5', 'Tahun') }}</th>
                  <th data-lppm-cms="data_abdimas.th6">{{ \App\Models\PageContent::getValue('data_abdimas.th6', 'Status') }}</th>
                  <th data-lppm-cms="data_abdimas.th7">{{ \App\Models\PageContent::getValue('data_abdimas.th7', 'Dokumen Kegiatan') }}</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-lppm-cms="data_abdimas.tr1_td1">{{ \App\Models\PageContent::getValue('data_abdimas.tr1_td1', 'ABD-001') }}</td>
                  <td><strong data-lppm-cms="data_abdimas.tr1_td2">{{ \App\Models\PageContent::getValue('data_abdimas.tr1_td2', 'Pelatihan Branding UMKM') }}</strong></td>
                  <td data-lppm-cms="data_abdimas.tr1_td3">{{ \App\Models\PageContent::getValue('data_abdimas.tr1_td3', 'Dr. D') }}</td>
                  <td data-lppm-cms="data_abdimas.tr1_td4">{{ \App\Models\PageContent::getValue('data_abdimas.tr1_td4', 'Komunitas UMKM') }}</td>
                  <td data-lppm-cms="data_abdimas.tr1_td5">{{ \App\Models\PageContent::getValue('data_abdimas.tr1_td5', '2026') }}</td>
                  <td><span class="badge" style="background: rgba(37, 99, 235, 0.08); color: #2563eb; padding: 6px 12px; border-radius: 8px; font-weight:600;" data-lppm-cms="data_abdimas.tr1_td6">{{ \App\Models\PageContent::getValue('data_abdimas.tr1_td6', 'Berjalan') }}</span></td>
                  <td>
                    <div class="doc-links-wrap">
                      <a href="#" class="btn-doc-download proposal"><i class="fa-solid fa-file-pdf"></i> <span data-lppm-cms="data_abdimas.tr1_btn1">{{ \App\Models\PageContent::getValue('data_abdimas.tr1_btn1', 'Proposal') }}</span></a>
                      <a href="#" class="btn-doc-upload-placeholder"><i class="fa-solid fa-cloud-arrow-up"></i> <span data-lppm-cms="data_abdimas.tr1_btn2">{{ \App\Models\PageContent::getValue('data_abdimas.tr1_btn2', 'Lap. Kemajuan') }}</span></a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td data-lppm-cms="data_abdimas.tr2_td1">{{ \App\Models\PageContent::getValue('data_abdimas.tr2_td1', 'ABD-002') }}</td>
                  <td><strong data-lppm-cms="data_abdimas.tr2_td2">{{ \App\Models\PageContent::getValue('data_abdimas.tr2_td2', 'Workshop Literasi Keuangan') }}</strong></td>
                  <td data-lppm-cms="data_abdimas.tr2_td3">{{ \App\Models\PageContent::getValue('data_abdimas.tr2_td3', 'Dr. E') }}</td>
                  <td data-lppm-cms="data_abdimas.tr2_td4">{{ \App\Models\PageContent::getValue('data_abdimas.tr2_td4', 'SMA Mitra') }}</td>
                  <td data-lppm-cms="data_abdimas.tr2_td5">{{ \App\Models\PageContent::getValue('data_abdimas.tr2_td5', '2025') }}</td>
                  <td><span class="badge" style="background: rgba(16, 185, 129, 0.08); color: #059669; padding: 6px 12px; border-radius: 8px; font-weight:600;" data-lppm-cms="data_abdimas.tr2_td6">{{ \App\Models\PageContent::getValue('data_abdimas.tr2_td6', 'Selesai') }}</span></td>
                  <td>
                    <div class="doc-links-wrap">
                      <a href="#" class="btn-doc-download proposal"><i class="fa-solid fa-file-pdf"></i> <span data-lppm-cms="data_abdimas.tr2_btn1">{{ \App\Models\PageContent::getValue('data_abdimas.tr2_btn1', 'Proposal') }}</span></a>
                      <a href="#" class="btn-doc-download kemajuan"><i class="fa-solid fa-file-word"></i> <span data-lppm-cms="data_abdimas.tr2_btn2">{{ \App\Models\PageContent::getValue('data_abdimas.tr2_btn2', 'Lap. Kemajuan') }}</span></a>
                      <a href="#" class="btn-doc-download akhir"><i class="fa-solid fa-file-circle-check"></i> <span data-lppm-cms="data_abdimas.tr2_btn3">{{ \App\Models\PageContent::getValue('data_abdimas.tr2_btn3', 'Lap. Akhir') }}</span></a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td data-lppm-cms="data_abdimas.tr3_td1">{{ \App\Models\PageContent::getValue('data_abdimas.tr3_td1', 'ABD-003') }}</td>
                  <td><strong data-lppm-cms="data_abdimas.tr3_td2">{{ \App\Models\PageContent::getValue('data_abdimas.tr3_td2', 'Digitalisasi Administrasi Sekolah') }}</strong></td>
                  <td data-lppm-cms="data_abdimas.tr3_td3">{{ \App\Models\PageContent::getValue('data_abdimas.tr3_td3', 'Dr. F') }}</td>
                  <td data-lppm-cms="data_abdimas.tr3_td4">{{ \App\Models\PageContent::getValue('data_abdimas.tr3_td4', 'Yayasan Pendidikan') }}</td>
                  <td data-lppm-cms="data_abdimas.tr3_td5">{{ \App\Models\PageContent::getValue('data_abdimas.tr3_td5', '2026') }}</td>
                  <td><span class="badge" style="background: rgba(245, 158, 11, 0.08); color: #d97706; padding: 6px 12px; border-radius: 8px; font-weight:600;" data-lppm-cms="data_abdimas.tr3_td6">{{ \App\Models\PageContent::getValue('data_abdimas.tr3_td6', 'Review') }}</span></td>
                  <td>
                    <div class="doc-links-wrap">
                      <a href="#" class="btn-doc-download proposal"><i class="fa-solid fa-file-pdf"></i> <span data-lppm-cms="data_abdimas.tr3_btn1">{{ \App\Models\PageContent::getValue('data_abdimas.tr3_btn1', 'Proposal') }}</span></a>
                      <a href="#" class="btn-doc-upload-placeholder"><i class="fa-solid fa-cloud-arrow-up"></i> <span data-lppm-cms="data_abdimas.tr3_btn2">{{ \App\Models\PageContent::getValue('data_abdimas.tr3_btn2', 'Lap. Akhir') }}</span></a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="grid-3 info-grid">
          <div class="card info-card">
            <h3 data-lppm-cms="data_abdimas.card1.title">{{ \App\Models\PageContent::getValue('data_abdimas.card1.title', 'Monitoring Program') }}</h3>
            <p data-lppm-cms="data_abdimas.card1.desc">{{ \App\Models\PageContent::getValue('data_abdimas.card1.desc', 'Data abdimas membantu pemantauan program dari tahap pengajuan, pelaksanaan, evaluasi, hingga penutupan kegiatan.', 'textarea') }}</p>
          </div>
          <div class="card info-card">
            <h3 data-lppm-cms="data_abdimas.card2.title">{{ \App\Models\PageContent::getValue('data_abdimas.card2.title', 'Dokumentasi Mitra') }}</h3>
            <p data-lppm-cms="data_abdimas.card2.desc">{{ \App\Models\PageContent::getValue('data_abdimas.card2.desc', 'Setiap kegiatan dapat dilengkapi identitas mitra, lokasi, capaian, serta luaran program sebagai dokumentasi resmi lembaga.', 'textarea') }}</p>
          </div>
          <div class="card info-card">
            <h3 data-lppm-cms="data_abdimas.card3.title">{{ \App\Models\PageContent::getValue('data_abdimas.card3.title', 'Pelaporan Kinerja') }}</h3>
            <p data-lppm-cms="data_abdimas.card3.desc">{{ \App\Models\PageContent::getValue('data_abdimas.card3.desc', 'Rekap kegiatan abdimas bermanfaat untuk pelaporan institusi, evaluasi tahunan, dan kebutuhan akreditasi.', 'textarea') }}</p>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection