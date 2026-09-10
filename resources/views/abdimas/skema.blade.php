@extends('layouts.app')
@section('title', 'Skema Abdimas | LPPM IBI KKG')
@push('styles')
<link rel="stylesheet" href="{{ asset('abdimas/skema.css') }}" />
@endpush
@section('content')
<div class="bg-glow glow-1"></div>
  <div class="bg-glow glow-2"></div>

  <main>
    <section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge" data-lppm-cms="abdimas_skema.hero.badge">{{ \App\Models\PageContent::getValue('abdimas_skema.hero.badge', 'Abdimas · Skema') }}</span>
          <h1 data-lppm-cms="abdimas.hero.title">{{ \App\Models\PageContent::getValue('abdimas.hero.title', 'Skema Program Abdimas') }}</h1>
          <p data-lppm-cms="abdimas.hero.desc">
            {{ \App\Models\PageContent::getValue('abdimas.hero.desc', 'Halaman ini memuat pilihan skema pengabdian kepada masyarakat yang dapat disesuaikan dengan target mitra, durasi, dan bentuk luaran.', 'textarea') }}
          </p>
          <div class="hero-actions">
            <a href="#daftar-skema" class="btn btn-primary" data-lppm-cms="abdimas_skema.hero.btn1">{{ \App\Models\PageContent::getValue('abdimas_skema.hero.btn1', 'Lihat Skema') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline" data-lppm-cms="abdimas_skema.hero.btn2">{{ \App\Models\PageContent::getValue('abdimas_skema.hero.btn2', 'Kembali ke Beranda') }}</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3 data-lppm-cms="abdimas_skema.panel.title">{{ \App\Models\PageContent::getValue('abdimas_skema.panel.title', 'Ringkasan Skema') }}</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong data-lppm-cms="abdimas_skema.stat1.val">{{ \App\Models\PageContent::getValue('abdimas_skema.stat1.val', '3') }}</strong>
                <span data-lppm-cms="abdimas_skema.stat1.lbl">{{ \App\Models\PageContent::getValue('abdimas_skema.stat1.lbl', 'Skema Utama') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="abdimas_skema.stat2.val">{{ \App\Models\PageContent::getValue('abdimas_skema.stat2.val', '6–12') }}</strong>
                <span data-lppm-cms="abdimas_skema.stat2.lbl">{{ \App\Models\PageContent::getValue('abdimas_skema.stat2.lbl', 'Bulan Durasi') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="abdimas_skema.stat3.val">{{ \App\Models\PageContent::getValue('abdimas_skema.stat3.val', 'Aktif') }}</strong>
                <span data-lppm-cms="abdimas_skema.stat3.lbl">{{ \App\Models\PageContent::getValue('abdimas_skema.stat3.lbl', 'Status Dominan') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="abdimas_skema.stat4.val">{{ \App\Models\PageContent::getValue('abdimas_skema.stat4.val', 'Mitra') }}</strong>
                <span data-lppm-cms="abdimas_skema.stat4.lbl">{{ \App\Models\PageContent::getValue('abdimas_skema.stat4.lbl', 'Target Program') }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="daftar-skema">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag" data-lppm-cms="abdimas_skema.section.tag">{{ \App\Models\PageContent::getValue('abdimas_skema.section.tag', 'Skema Abdimas') }}</span>
            <h2 data-lppm-cms="abdimas_skema.section.title">{{ \App\Models\PageContent::getValue('abdimas_skema.section.title', 'Pilihan Program Pengabdian') }}</h2>
          </div>
          <p data-lppm-cms="abdimas_skema.section.desc">
            {{ \App\Models\PageContent::getValue('abdimas_skema.section.desc', 'Skema abdimas disusun untuk mendukung kebutuhan masyarakat, mitra, dan pencapaian luaran pengabdian secara terukur.', 'textarea') }}
          </p>
        </div>

        <div class="table-card">
          <div class="table-wrap">
            <table class="data-table">
              <thead>
                <tr>
                  <th data-lppm-cms="abdimas_skema.table.col0">{{ \App\Models\PageContent::getValue('abdimas_skema.table.col0', 'No') }}</th>
                  <th data-lppm-cms="abdimas_skema.table.col1">{{ \App\Models\PageContent::getValue('abdimas_skema.table.col1', 'Nama Skema') }}</th>
                  <th data-lppm-cms="abdimas_skema.table.col2">{{ \App\Models\PageContent::getValue('abdimas_skema.table.col2', 'Sasaran') }}</th>
                  <th data-lppm-cms="abdimas_skema.table.col3">{{ \App\Models\PageContent::getValue('abdimas_skema.table.col3', 'Durasi') }}</th>
                  <th data-lppm-cms="abdimas_skema.table.col4">{{ \App\Models\PageContent::getValue('abdimas_skema.table.col4', 'Status') }}</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-lppm-cms="abdimas_skema.row1.no">{{ \App\Models\PageContent::getValue('abdimas_skema.row1.no', '1') }}</td>
                  <td data-lppm-cms="abdimas_skema.row1.name">{{ \App\Models\PageContent::getValue('abdimas_skema.row1.name', 'Pelatihan UMKM') }}</td>
                  <td data-lppm-cms="abdimas_skema.row1.target">{{ \App\Models\PageContent::getValue('abdimas_skema.row1.target', 'Masyarakat Umum') }}</td>
                  <td data-lppm-cms="abdimas_skema.row1.durasi">{{ \App\Models\PageContent::getValue('abdimas_skema.row1.durasi', '6 Bulan') }}</td>
                  <td data-lppm-cms="abdimas_skema.row1.status">{{ \App\Models\PageContent::getValue('abdimas_skema.row1.status', 'Aktif') }}</td>
                </tr>
                <tr>
                  <td data-lppm-cms="abdimas_skema.row2.no">{{ \App\Models\PageContent::getValue('abdimas_skema.row2.no', '2') }}</td>
                  <td data-lppm-cms="abdimas_skema.row2.name">{{ \App\Models\PageContent::getValue('abdimas_skema.row2.name', 'Pendampingan Sekolah') }}</td>
                  <td data-lppm-cms="abdimas_skema.row2.target">{{ \App\Models\PageContent::getValue('abdimas_skema.row2.target', 'Sekolah Mitra') }}</td>
                  <td data-lppm-cms="abdimas_skema.row2.durasi">{{ \App\Models\PageContent::getValue('abdimas_skema.row2.durasi', '1 Tahun') }}</td>
                  <td data-lppm-cms="abdimas_skema.row2.status">{{ \App\Models\PageContent::getValue('abdimas_skema.row2.status', 'Aktif') }}</td>
                </tr>
                <tr>
                  <td data-lppm-cms="abdimas_skema.row3.no">{{ \App\Models\PageContent::getValue('abdimas_skema.row3.no', '3') }}</td>
                  <td data-lppm-cms="abdimas_skema.row3.name">{{ \App\Models\PageContent::getValue('abdimas_skema.row3.name', 'Literasi Digital') }}</td>
                  <td data-lppm-cms="abdimas_skema.row3.target">{{ \App\Models\PageContent::getValue('abdimas_skema.row3.target', 'Komunitas') }}</td>
                  <td data-lppm-cms="abdimas_skema.row3.durasi">{{ \App\Models\PageContent::getValue('abdimas_skema.row3.durasi', '6 Bulan') }}</td>
                  <td data-lppm-cms="abdimas_skema.row3.status">{{ \App\Models\PageContent::getValue('abdimas_skema.row3.status', 'Draft') }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="grid-3 info-grid">
          <div class="card info-card">
            <h3 data-lppm-cms="abdimas.skema.umkm.title">{{ \App\Models\PageContent::getValue('abdimas.skema.umkm.title', 'Pelatihan UMKM') }}</h3>
            <p data-lppm-cms="abdimas.skema.umkm.desc">{{ \App\Models\PageContent::getValue('abdimas.skema.umkm.desc', 'Fokus pada peningkatan kapasitas pelaku usaha melalui pelatihan manajemen, pemasaran, keuangan, dan digitalisasi usaha.', 'textarea') }}</p>
          </div>

          <div class="card info-card">
            <h3 data-lppm-cms="abdimas.skema.sekolah.title">{{ \App\Models\PageContent::getValue('abdimas.skema.sekolah.title', 'Pendampingan Sekolah') }}</h3>
            <p data-lppm-cms="abdimas.skema.sekolah.desc">{{ \App\Models\PageContent::getValue('abdimas.skema.sekolah.desc', 'Ditujukan untuk mendukung mitra sekolah melalui pelatihan, penguatan administrasi, literasi, dan pengembangan program pendidikan.', 'textarea') }}</p>
          </div>

          <div class="card info-card">
            <h3 data-lppm-cms="abdimas.skema.digital.title">{{ \App\Models\PageContent::getValue('abdimas.skema.digital.title', 'Literasi Digital') }}</h3>
            <p data-lppm-cms="abdimas.skema.digital.desc">{{ \App\Models\PageContent::getValue('abdimas.skema.digital.desc', 'Mendorong pemanfaatan teknologi digital secara tepat guna bagi komunitas, organisasi, atau kelompok masyarakat sasaran.', 'textarea') }}</p>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection