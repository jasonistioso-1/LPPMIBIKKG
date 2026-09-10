@extends('layouts.app')
@section('title', 'Skema Penelitian | LPPM IBI KKG')
@push('styles')
<link rel="stylesheet" href="{{ asset('penelitian/skema.css') }}" />
@endpush
@section('content')
<div class="bg-glow glow-1"></div>
  <div class="bg-glow glow-2"></div>

  <main>
    <section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge" data-lppm-cms="pen_skema_hero_badge">{{ \App\Models\PageContent::getValue('pen_skema_hero_badge', 'Penelitian · Skema') }}</span>
          <h1 data-lppm-cms="penelitian.hero.title">{{ \App\Models\PageContent::getValue('penelitian.hero.title', 'Skema Penelitian LPPM') }}</h1>
          <p data-lppm-cms="penelitian.hero.desc">
            {{ \App\Models\PageContent::getValue('penelitian.hero.desc', 'Halaman ini memuat daftar skema penelitian yang dapat dipilih dosen sesuai kebutuhan, target luaran, dan karakteristik program penelitian.', 'textarea') }}
          </p>
          <div class="hero-actions">
            <a href="#daftar-skema" class="btn btn-primary" data-lppm-cms="pen_skema_hero_btn1">{{ \App\Models\PageContent::getValue('pen_skema_hero_btn1', 'Lihat Skema') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline" data-lppm-cms="pen_skema_hero_btn2">{{ \App\Models\PageContent::getValue('pen_skema_hero_btn2', 'Kembali ke Beranda') }}</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3 data-lppm-cms="pen_skema_stat_title">{{ \App\Models\PageContent::getValue('pen_skema_stat_title', 'Ringkasan Skema') }}</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong data-lppm-cms="pen_skema_stat1_val">{{ \App\Models\PageContent::getValue('pen_skema_stat1_val', '3') }}</strong>
                <span data-lppm-cms="pen_skema_stat1_lbl">{{ \App\Models\PageContent::getValue('pen_skema_stat1_lbl', 'Skema Utama') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="pen_skema_stat2_val">{{ \App\Models\PageContent::getValue('pen_skema_stat2_val', '1–2') }}</strong>
                <span data-lppm-cms="pen_skema_stat2_lbl">{{ \App\Models\PageContent::getValue('pen_skema_stat2_lbl', 'Tahun Durasi') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="pen_skema_stat3_val">{{ \App\Models\PageContent::getValue('pen_skema_stat3_val', 'Aktif') }}</strong>
                <span data-lppm-cms="pen_skema_stat3_lbl">{{ \App\Models\PageContent::getValue('pen_skema_stat3_lbl', 'Status Dominan') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="pen_skema_stat4_val">{{ \App\Models\PageContent::getValue('pen_skema_stat4_val', 'Dosen') }}</strong>
                <span data-lppm-cms="pen_skema_stat4_lbl">{{ \App\Models\PageContent::getValue('pen_skema_stat4_lbl', 'Target Utama') }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section skema-section" id="daftar-skema">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag" data-lppm-cms="pen_skema_sec_tag">{{ \App\Models\PageContent::getValue('pen_skema_sec_tag', 'Skema Penelitian') }}</span>
            <h2 data-lppm-cms="pen_skema_sec_title">{{ \App\Models\PageContent::getValue('pen_skema_sec_title', 'Pilihan Program Penelitian') }}</h2>
          </div>
          <p data-lppm-cms="pen_skema_sec_desc">
            {{ \App\Models\PageContent::getValue('pen_skema_sec_desc', 'Skema berikut disusun untuk menyesuaikan fokus kajian, target luaran, dan model kolaborasi penelitian.', 'textarea') }}
          </p>
        </div>

        <div class="table-card">
          <div class="table-wrap">
            <table class="data-table">
              <thead>
                <tr>
                  <th data-lppm-cms="pen_skema_th1">{{ \App\Models\PageContent::getValue('pen_skema_th1', 'No') }}</th>
                  <th data-lppm-cms="pen_skema_th2">{{ \App\Models\PageContent::getValue('pen_skema_th2', 'Nama Skema') }}</th>
                  <th data-lppm-cms="pen_skema_th3">{{ \App\Models\PageContent::getValue('pen_skema_th3', 'Target') }}</th>
                  <th data-lppm-cms="pen_skema_th4">{{ \App\Models\PageContent::getValue('pen_skema_th4', 'Durasi') }}</th>
                  <th data-lppm-cms="pen_skema_th5">{{ \App\Models\PageContent::getValue('pen_skema_th5', 'Status') }}</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-lppm-cms="pen_skema_tr1_td1">{{ \App\Models\PageContent::getValue('pen_skema_tr1_td1', '1') }}</td>
                  <td data-lppm-cms="pen_skema_tr1_td2">{{ \App\Models\PageContent::getValue('pen_skema_tr1_td2', 'Penelitian Dasar') }}</td>
                  <td data-lppm-cms="pen_skema_tr1_td3">{{ \App\Models\PageContent::getValue('pen_skema_tr1_td3', 'Dosen Tetap') }}</td>
                  <td data-lppm-cms="pen_skema_tr1_td4">{{ \App\Models\PageContent::getValue('pen_skema_tr1_td4', '1 Tahun') }}</td>
                  <td data-lppm-cms="pen_skema_tr1_td5">{{ \App\Models\PageContent::getValue('pen_skema_tr1_td5', 'Aktif') }}</td>
                </tr>
                <tr>
                  <td data-lppm-cms="pen_skema_tr2_td1">{{ \App\Models\PageContent::getValue('pen_skema_tr2_td1', '2') }}</td>
                  <td data-lppm-cms="pen_skema_tr2_td2">{{ \App\Models\PageContent::getValue('pen_skema_tr2_td2', 'Penelitian Terapan') }}</td>
                  <td data-lppm-cms="pen_skema_tr2_td3">{{ \App\Models\PageContent::getValue('pen_skema_tr2_td3', 'Dosen & Tim') }}</td>
                  <td data-lppm-cms="pen_skema_tr2_td4">{{ \App\Models\PageContent::getValue('pen_skema_tr2_td4', '1 Tahun') }}</td>
                  <td data-lppm-cms="pen_skema_tr2_td5">{{ \App\Models\PageContent::getValue('pen_skema_tr2_td5', 'Aktif') }}</td>
                </tr>
                <tr>
                  <td data-lppm-cms="pen_skema_tr3_td1">{{ \App\Models\PageContent::getValue('pen_skema_tr3_td1', '3') }}</td>
                  <td data-lppm-cms="pen_skema_tr3_td2">{{ \App\Models\PageContent::getValue('pen_skema_tr3_td2', 'Penelitian Kolaboratif') }}</td>
                  <td data-lppm-cms="pen_skema_tr3_td3">{{ \App\Models\PageContent::getValue('pen_skema_tr3_td3', 'Lintas Prodi') }}</td>
                  <td data-lppm-cms="pen_skema_tr3_td4">{{ \App\Models\PageContent::getValue('pen_skema_tr3_td4', '1–2 Tahun') }}</td>
                  <td data-lppm-cms="pen_skema_tr3_td5">{{ \App\Models\PageContent::getValue('pen_skema_tr3_td5', 'Draft') }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="grid-3 skema-info-grid">
          <div class="card info-card">
            <h3 data-lppm-cms="pen_skema_card1_title">{{ \App\Models\PageContent::getValue('pen_skema_card1_title', 'Penelitian Dasar') }}</h3>
            <p data-lppm-cms="penelitian.skema.dasar.desc">{{ \App\Models\PageContent::getValue('penelitian.skema.dasar.desc', 'Skema ini ditujukan untuk pengembangan konsep, model, atau kajian teoritis yang memperkuat landasan keilmuan di bidang terkait.', 'textarea') }}</p>
          </div>

          <div class="card info-card">
            <h3 data-lppm-cms="pen_skema_card2_title">{{ \App\Models\PageContent::getValue('pen_skema_card2_title', 'Penelitian Terapan') }}</h3>
            <p data-lppm-cms="penelitian.skema.terapan.desc">{{ \App\Models\PageContent::getValue('penelitian.skema.terapan.desc', 'Skema ini berfokus pada penyelesaian masalah nyata melalui penerapan metode, model, atau teknologi yang relevan dengan kebutuhan lapangan.', 'textarea') }}</p>
          </div>

          <div class="card info-card">
            <h3 data-lppm-cms="pen_skema_card3_title">{{ \App\Models\PageContent::getValue('pen_skema_card3_title', 'Penelitian Kolaboratif') }}</h3>
            <p data-lppm-cms="penelitian.skema.kolaboratif.desc">{{ \App\Models\PageContent::getValue('penelitian.skema.kolaboratif.desc', 'Skema ini mendorong kerja sama lintas program studi atau mitra eksternal untuk menghasilkan luaran yang lebih luas dan berdampak.', 'textarea') }}</p>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection