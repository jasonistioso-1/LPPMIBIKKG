@extends('layouts.app')
@section('title', 'File Unduhan | LPPM IBI KKG')
@push('styles')
<link rel="stylesheet" href="{{ asset('dokumen/unduhan.css') }}" />
@endpush
@section('content')
<div class="bg-glow glow-1"></div>
  <div class="bg-glow glow-2"></div>
  <main>
    <section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge" data-lppm-cms="dokumen_unduhan.hero.badge">{{ \App\Models\PageContent::getValue('dokumen_unduhan.hero.badge', 'Dokumen · Unduhan') }}</span>
          <h1 data-lppm-cms="dokumen_unduhan.hero.title">{{ \App\Models\PageContent::getValue('dokumen_unduhan.hero.title', 'File Unduhan LPPM') }}</h1>
          <p data-lppm-cms="dokumen_unduhan.hero.desc">{{ \App\Models\PageContent::getValue('dokumen_unduhan.hero.desc', 'Halaman ini memuat berbagai file pendukung yang dapat diunduh untuk kebutuhan administrasi, pelaporan, dan pengelolaan kegiatan.', 'textarea') }}</p>
          <div class="hero-actions">
            <a href="#daftar-unduhan" class="btn btn-primary" data-lppm-cms="dokumen_unduhan.hero.btn1">{{ \App\Models\PageContent::getValue('dokumen_unduhan.hero.btn1', 'Lihat Unduhan') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline" data-lppm-cms="dokumen_unduhan.hero.btn2">{{ \App\Models\PageContent::getValue('dokumen_unduhan.hero.btn2', 'Kembali ke Beranda') }}</a>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3 data-lppm-cms="dokumen_unduhan.panel.title">{{ \App\Models\PageContent::getValue('dokumen_unduhan.panel.title', 'Ringkasan File') }}</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong data-lppm-cms="dokumen_unduhan.stat1.val">{{ \App\Models\PageContent::getValue('dokumen_unduhan.stat1.val', '3') }}</strong>
                <span data-lppm-cms="dokumen_unduhan.stat1.lbl">{{ \App\Models\PageContent::getValue('dokumen_unduhan.stat1.lbl', 'File Sampel') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="dokumen_unduhan.stat2.val">{{ \App\Models\PageContent::getValue('dokumen_unduhan.stat2.val', 'PDF') }}</strong>
                <span data-lppm-cms="dokumen_unduhan.stat2.lbl">{{ \App\Models\PageContent::getValue('dokumen_unduhan.stat2.lbl', 'Jenis Umum') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="dokumen_unduhan.stat3.val">{{ \App\Models\PageContent::getValue('dokumen_unduhan.stat3.val', 'XLSX') }}</strong>
                <span data-lppm-cms="dokumen_unduhan.stat3.lbl">{{ \App\Models\PageContent::getValue('dokumen_unduhan.stat3.lbl', 'Format Tambahan') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="dokumen_unduhan.stat4.val">{{ \App\Models\PageContent::getValue('dokumen_unduhan.stat4.val', 'Aktif') }}</strong>
                <span data-lppm-cms="dokumen_unduhan.stat4.lbl">{{ \App\Models\PageContent::getValue('dokumen_unduhan.stat4.lbl', 'Status') }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section" id="daftar-unduhan">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag" data-lppm-cms="dokumen_unduhan.section.tag">{{ \App\Models\PageContent::getValue('dokumen_unduhan.section.tag', 'Unduhan') }}</span>
            <h2 data-lppm-cms="dokumen_unduhan.section.title">{{ \App\Models\PageContent::getValue('dokumen_unduhan.section.title', 'Daftar File yang Tersedia') }}</h2>
          </div>
          <p data-lppm-cms="dokumen_unduhan.section.desc">{{ \App\Models\PageContent::getValue('dokumen_unduhan.section.desc', 'File berikut dapat diunduh untuk mendukung pengajuan, administrasi, dan pelaporan kegiatan yang dikelola LPPM.', 'textarea') }}</p>
        </div>
        <div class="table-card">
          <div class="table-wrap">
            <table class="data-table">
              <thead>
                <tr>
                  <th data-lppm-cms="dokumen_unduhan.table.col1">{{ \App\Models\PageContent::getValue('dokumen_unduhan.table.col1', 'Nama File') }}</th>
                  <th data-lppm-cms="dokumen_unduhan.table.col2">{{ \App\Models\PageContent::getValue('dokumen_unduhan.table.col2', 'Jenis') }}</th>
                  <th data-lppm-cms="dokumen_unduhan.table.col3">{{ \App\Models\PageContent::getValue('dokumen_unduhan.table.col3', 'Ukuran') }}</th>
                  <th data-lppm-cms="dokumen_unduhan.table.col4">{{ \App\Models\PageContent::getValue('dokumen_unduhan.table.col4', 'Tanggal Update') }}</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-lppm-cms="dokumen_unduhan.row1.name">{{ \App\Models\PageContent::getValue('dokumen_unduhan.row1.name', 'Form Pengajuan Penelitian') }}</td>
                  <td data-lppm-cms="dokumen_unduhan.row1.jenis">{{ \App\Models\PageContent::getValue('dokumen_unduhan.row1.jenis', 'PDF') }}</td>
                  <td data-lppm-cms="dokumen_unduhan.row1.ukuran">{{ \App\Models\PageContent::getValue('dokumen_unduhan.row1.ukuran', '1.2 MB') }}</td>
                  <td data-lppm-cms="dokumen_unduhan.row1.tanggal">{{ \App\Models\PageContent::getValue('dokumen_unduhan.row1.tanggal', '12 Jan 2026') }}</td>
                </tr>
                <tr>
                  <td data-lppm-cms="dokumen_unduhan.row2.name">{{ \App\Models\PageContent::getValue('dokumen_unduhan.row2.name', 'Form Pengajuan Abdimas') }}</td>
                  <td data-lppm-cms="dokumen_unduhan.row2.jenis">{{ \App\Models\PageContent::getValue('dokumen_unduhan.row2.jenis', 'PDF') }}</td>
                  <td data-lppm-cms="dokumen_unduhan.row2.ukuran">{{ \App\Models\PageContent::getValue('dokumen_unduhan.row2.ukuran', '980 KB') }}</td>
                  <td data-lppm-cms="dokumen_unduhan.row2.tanggal">{{ \App\Models\PageContent::getValue('dokumen_unduhan.row2.tanggal', '12 Jan 2026') }}</td>
                </tr>
                <tr>
                  <td data-lppm-cms="dokumen_unduhan.row3.name">{{ \App\Models\PageContent::getValue('dokumen_unduhan.row3.name', 'Format SPJ Kegiatan') }}</td>
                  <td data-lppm-cms="dokumen_unduhan.row3.jenis">{{ \App\Models\PageContent::getValue('dokumen_unduhan.row3.jenis', 'XLSX') }}</td>
                  <td data-lppm-cms="dokumen_unduhan.row3.ukuran">{{ \App\Models\PageContent::getValue('dokumen_unduhan.row3.ukuran', '320 KB') }}</td>
                  <td data-lppm-cms="dokumen_unduhan.row3.tanggal">{{ \App\Models\PageContent::getValue('dokumen_unduhan.row3.tanggal', '10 Jan 2026') }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="grid-3 info-grid">
          <div class="card info-card">
            <h3 data-lppm-cms="dokumen_unduhan.card1.title">{{ \App\Models\PageContent::getValue('dokumen_unduhan.card1.title', 'Akses Cepat') }}</h3>
            <p data-lppm-cms="dokumen_unduhan.card1.desc">{{ \App\Models\PageContent::getValue('dokumen_unduhan.card1.desc', 'File unduhan disusun agar dosen dan admin dapat mengakses dokumen penting secara cepat dan terpusat.', 'textarea') }}</p>
          </div>
          <div class="card info-card">
            <h3 data-lppm-cms="dokumen_unduhan.card2.title">{{ \App\Models\PageContent::getValue('dokumen_unduhan.card2.title', 'Dokumen Pendukung') }}</h3>
            <p data-lppm-cms="dokumen_unduhan.card2.desc">{{ \App\Models\PageContent::getValue('dokumen_unduhan.card2.desc', 'Setiap file dapat digunakan sebagai pelengkap proses pengajuan, pelaporan, atau kebutuhan administrasi lainnya.', 'textarea') }}</p>
          </div>
          <div class="card info-card">
            <h3 data-lppm-cms="dokumen_unduhan.card3.title">{{ \App\Models\PageContent::getValue('dokumen_unduhan.card3.title', 'Pembaruan Berkala') }}</h3>
            <p data-lppm-cms="dokumen_unduhan.card3.desc">{{ \App\Models\PageContent::getValue('dokumen_unduhan.card3.desc', 'Daftar file perlu diperbarui secara berkala agar versi dokumen yang digunakan selalu sesuai ketentuan terbaru.', 'textarea') }}</p>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection