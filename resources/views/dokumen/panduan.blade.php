@extends('layouts.app')
@section('title', 'Panduan | LPPM IBI KKG')
@push('styles')
<link rel="stylesheet" href="{{ asset('dokumen/panduan.css') }}" />
@endpush
@section('content')
<div class="bg-glow glow-1"></div>
  <div class="bg-glow glow-2"></div>

  <main>
    <section class="hero section">
      <div class="container hero-grid">

        <div class="hero-copy">
          <span class="badge" data-lppm-cms="dokumen_panduan.hero.badge">{{ \App\Models\PageContent::getValue('dokumen_panduan.hero.badge', 'Dokumen · Panduan') }}</span>
          <h1 data-lppm-cms="dokumen.hero.title">{{ \App\Models\PageContent::getValue('dokumen.hero.title', 'Panduan Resmi LPPM') }}</h1>
          <p data-lppm-cms="dokumen.hero.desc">
            {{ \App\Models\PageContent::getValue('dokumen.hero.desc', 'Halaman ini memuat panduan pelaksanaan kegiatan penelitian, pengabdian kepada masyarakat, serta pelaporan yang digunakan dalam lingkungan LPPM.', 'textarea') }}
          </p>

          <div class="hero-actions">
            <a href="#daftar-panduan" class="btn btn-primary" data-lppm-cms="dokumen_panduan.hero.btn1">{{ \App\Models\PageContent::getValue('dokumen_panduan.hero.btn1', 'Lihat Panduan') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline" data-lppm-cms="dokumen_panduan.hero.btn2">{{ \App\Models\PageContent::getValue('dokumen_panduan.hero.btn2', 'Kembali ke Beranda') }}</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3 data-lppm-cms="dokumen_panduan.panel.title">{{ \App\Models\PageContent::getValue('dokumen_panduan.panel.title', 'Ringkasan Dokumen') }}</h3>
            </div>

            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong data-lppm-cms="dokumen_panduan.stat1.val">{{ \App\Models\PageContent::getValue('dokumen_panduan.stat1.val', '3') }}</strong>
                <span data-lppm-cms="dokumen_panduan.stat1.lbl">{{ \App\Models\PageContent::getValue('dokumen_panduan.stat1.lbl', 'Panduan Utama') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="dokumen_panduan.stat2.val">{{ \App\Models\PageContent::getValue('dokumen_panduan.stat2.val', 'PDF') }}</strong>
                <span data-lppm-cms="dokumen_panduan.stat2.lbl">{{ \App\Models\PageContent::getValue('dokumen_panduan.stat2.lbl', 'Format') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="dokumen_panduan.stat3.val">{{ \App\Models\PageContent::getValue('dokumen_panduan.stat3.val', '2026') }}</strong>
                <span data-lppm-cms="dokumen_panduan.stat3.lbl">{{ \App\Models\PageContent::getValue('dokumen_panduan.stat3.lbl', 'Versi') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="dokumen_panduan.stat4.val">{{ \App\Models\PageContent::getValue('dokumen_panduan.stat4.val', 'Resmi') }}</strong>
                <span data-lppm-cms="dokumen_panduan.stat4.lbl">{{ \App\Models\PageContent::getValue('dokumen_panduan.stat4.lbl', 'Status') }}</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="section" id="daftar-panduan">
      <div class="container">

        <div class="section-head">
          <div>
            <span class="section-tag" data-lppm-cms="dokumen_panduan.section.tag">{{ \App\Models\PageContent::getValue('dokumen_panduan.section.tag', 'Panduan') }}</span>
            <h2 data-lppm-cms="dokumen_panduan.section.title">{{ \App\Models\PageContent::getValue('dokumen_panduan.section.title', 'Daftar Panduan yang Tersedia') }}</h2>
          </div>
          <p data-lppm-cms="dokumen_panduan.section.desc">
            {{ \App\Models\PageContent::getValue('dokumen_panduan.section.desc', 'Dokumen panduan berikut digunakan sebagai acuan pelaksanaan dan administrasi kegiatan di bawah pengelolaan LPPM.', 'textarea') }}
          </p>
        </div>

        <div class="content-stack">
          <div class="card doc-card">
            <div class="doc-item">
              <strong data-lppm-cms="dokumen_panduan.item1.title">{{ \App\Models\PageContent::getValue('dokumen_panduan.item1.title', 'Panduan Pengajuan Penelitian') }}</strong>
              <span data-lppm-cms="dokumen_panduan.item1.format">{{ \App\Models\PageContent::getValue('dokumen_panduan.item1.format', 'PDF · Versi 2026') }}</span>
            </div>
            <p data-lppm-cms="dokumen_panduan.item1.desc">{{ \App\Models\PageContent::getValue('dokumen_panduan.item1.desc', 'Berisi tahapan pengajuan proposal penelitian.', 'textarea') }}</p>
          </div>

          <div class="card doc-card">
            <div class="doc-item">
              <strong data-lppm-cms="dokumen_panduan.item2.title">{{ \App\Models\PageContent::getValue('dokumen_panduan.item2.title', 'Panduan Pengajuan Abdimas') }}</strong>
              <span data-lppm-cms="dokumen_panduan.item2.format">{{ \App\Models\PageContent::getValue('dokumen_panduan.item2.format', 'PDF · Versi 2026') }}</span>
            </div>
            <p data-lppm-cms="dokumen_panduan.item2.desc">{{ \App\Models\PageContent::getValue('dokumen_panduan.item2.desc', 'Menjelaskan mekanisme pengajuan abdimas.', 'textarea') }}</p>
          </div>

          <div class="card doc-card">
            <div class="doc-item">
              <strong data-lppm-cms="dokumen_panduan.item3.title">{{ \App\Models\PageContent::getValue('dokumen_panduan.item3.title', 'Panduan Pelaporan Kegiatan') }}</strong>
              <span data-lppm-cms="dokumen_panduan.item3.format">{{ \App\Models\PageContent::getValue('dokumen_panduan.item3.format', 'PDF · Versi 2026') }}</span>
            </div>
            <p data-lppm-cms="dokumen_panduan.item3.desc">{{ \App\Models\PageContent::getValue('dokumen_panduan.item3.desc', 'Digunakan untuk laporan kegiatan penelitian dan abdimas.', 'textarea') }}</p>
          </div>
        </div>

      </div>
    </section>
  </main>
@endsection