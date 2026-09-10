@extends('layouts.app')
@section('title', 'Jam Layanan | LPPM IBI KKG')
@push('styles')
<link rel="stylesheet" href="{{ asset('kontak/jam-layanan.css') }}" />
@endpush
@section('content')
<div class="bg-glow glow-1"></div>
  <div class="bg-glow glow-2"></div>
  <main>
    <section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge" data-lppm-cms="jam_layanan.hero.badge">{{ \App\Models\PageContent::getValue('jam_layanan.hero.badge', 'Kontak · Jam Layanan') }}</span>
          <h1 data-lppm-cms="jam_layanan.hero.title">{{ \App\Models\PageContent::getValue('jam_layanan.hero.title', 'Jam Layanan LPPM') }}</h1>
          <p data-lppm-cms="jam_layanan.hero.desc">{{ \App\Models\PageContent::getValue('jam_layanan.hero.desc', 'Halaman ini memuat informasi waktu operasional layanan untuk membantu dosen, tenaga kependidikan, dan pihak mitra melakukan koordinasi.', 'textarea') }}</p>
          <div class="hero-actions">
            <a href="#jam-operasional" class="btn btn-primary" data-lppm-cms="jam_layanan.hero.btn1">{{ \App\Models\PageContent::getValue('jam_layanan.hero.btn1', 'Lihat Jam Layanan') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline" data-lppm-cms="jam_layanan.hero.btn2">{{ \App\Models\PageContent::getValue('jam_layanan.hero.btn2', 'Kembali ke Beranda') }}</a>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3 data-lppm-cms="jam_layanan.panel.title">{{ \App\Models\PageContent::getValue('jam_layanan.panel.title', 'Ringkasan Operasional') }}</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong data-lppm-cms="jam_layanan.stat1.val">{{ \App\Models\PageContent::getValue('jam_layanan.stat1.val', 'Senin') }}</strong>
                <span data-lppm-cms="jam_layanan.stat1.lbl">{{ \App\Models\PageContent::getValue('jam_layanan.stat1.lbl', 'Hari Kerja') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="jam_layanan.stat2.val">{{ \App\Models\PageContent::getValue('jam_layanan.stat2.val', '08.00') }}</strong>
                <span data-lppm-cms="jam_layanan.stat2.lbl">{{ \App\Models\PageContent::getValue('jam_layanan.stat2.lbl', 'Jam Buka') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="jam_layanan.stat3.val">{{ \App\Models\PageContent::getValue('jam_layanan.stat3.val', '16.00') }}</strong>
                <span data-lppm-cms="jam_layanan.stat3.lbl">{{ \App\Models\PageContent::getValue('jam_layanan.stat3.lbl', 'Jam Tutup') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="jam_layanan.stat4.val">{{ \App\Models\PageContent::getValue('jam_layanan.stat4.val', 'Minggu') }}</strong>
                <span data-lppm-cms="jam_layanan.stat4.lbl">{{ \App\Models\PageContent::getValue('jam_layanan.stat4.lbl', 'Tutup') }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section" id="jam-operasional">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag" data-lppm-cms="jam_layanan.section.tag">{{ \App\Models\PageContent::getValue('jam_layanan.section.tag', 'Jam Layanan') }}</span>
            <h2 data-lppm-cms="jam_layanan.section.title">{{ \App\Models\PageContent::getValue('jam_layanan.section.title', 'Waktu Operasional Layanan') }}</h2>
          </div>
          <p data-lppm-cms="jam_layanan.section.desc">{{ \App\Models\PageContent::getValue('jam_layanan.section.desc', 'Pastikan komunikasi dan pengajuan dokumen dilakukan sesuai dengan jam operasional yang telah ditetapkan.', 'textarea') }}</p>
        </div>
        <div class="table-card">
          <div class="table-wrap">
            <table class="data-table">
              <thead>
                <tr>
                  <th data-lppm-cms="jam_layanan.table.col1">{{ \App\Models\PageContent::getValue('jam_layanan.table.col1', 'Hari') }}</th>
                  <th data-lppm-cms="jam_layanan.table.col2">{{ \App\Models\PageContent::getValue('jam_layanan.table.col2', 'Jam') }}</th>
                  <th data-lppm-cms="jam_layanan.table.col3">{{ \App\Models\PageContent::getValue('jam_layanan.table.col3', 'Status') }}</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-lppm-cms="jam_layanan.row1.hari">{{ \App\Models\PageContent::getValue('jam_layanan.row1.hari', 'Senin - Jumat') }}</td>
                  <td data-lppm-cms="jam_layanan.row1.jam">{{ \App\Models\PageContent::getValue('jam_layanan.row1.jam', '08.00 - 16.00') }}</td>
                  <td data-lppm-cms="jam_layanan.row1.status">{{ \App\Models\PageContent::getValue('jam_layanan.row1.status', 'Buka') }}</td>
                </tr>
                <tr>
                  <td data-lppm-cms="jam_layanan.row2.hari">{{ \App\Models\PageContent::getValue('jam_layanan.row2.hari', 'Sabtu') }}</td>
                  <td data-lppm-cms="jam_layanan.row2.jam">{{ \App\Models\PageContent::getValue('jam_layanan.row2.jam', '08.00 - 12.00') }}</td>
                  <td data-lppm-cms="jam_layanan.row2.status">{{ \App\Models\PageContent::getValue('jam_layanan.row2.status', 'Terbatas') }}</td>
                </tr>
                <tr>
                  <td data-lppm-cms="jam_layanan.row3.hari">{{ \App\Models\PageContent::getValue('jam_layanan.row3.hari', 'Minggu') }}</td>
                  <td data-lppm-cms="jam_layanan.row3.jam">{{ \App\Models\PageContent::getValue('jam_layanan.row3.jam', '-') }}</td>
                  <td data-lppm-cms="jam_layanan.row3.status">{{ \App\Models\PageContent::getValue('jam_layanan.row3.status', 'Tutup') }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="grid-3 info-grid">
          <div class="card info-card">
            <h3 data-lppm-cms="jam_layanan.card1.title">{{ \App\Models\PageContent::getValue('jam_layanan.card1.title', 'Layanan Administrasi') }}</h3>
            <p data-lppm-cms="jam_layanan.card1.desc">{{ \App\Models\PageContent::getValue('jam_layanan.card1.desc', 'Pengajuan dokumen dan kebutuhan administrasi sebaiknya dilakukan pada hari kerja untuk mempercepat proses tindak lanjut.', 'textarea') }}</p>
          </div>
          <div class="card info-card">
            <h3 data-lppm-cms="jam_layanan.card2.title">{{ \App\Models\PageContent::getValue('jam_layanan.card2.title', 'Koordinasi Kegiatan') }}</h3>
            <p data-lppm-cms="jam_layanan.card2.desc">{{ \App\Models\PageContent::getValue('jam_layanan.card2.desc', 'Jadwal layanan membantu dosen dan mitra menentukan waktu yang tepat untuk koordinasi kegiatan penelitian maupun abdimas.', 'textarea') }}</p>
          </div>
          <div class="card info-card">
            <h3 data-lppm-cms="jam_layanan.card3.title">{{ \App\Models\PageContent::getValue('jam_layanan.card3.title', 'Pelayanan Terbatas') }}</h3>
            <p data-lppm-cms="jam_layanan.card3.desc">{{ \App\Models\PageContent::getValue('jam_layanan.card3.desc', 'Pada hari Sabtu, layanan dapat bersifat terbatas sesuai kebutuhan dan kebijakan operasional yang berlaku.', 'textarea') }}</p>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection