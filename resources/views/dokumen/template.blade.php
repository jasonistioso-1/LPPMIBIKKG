@extends('layouts.app')
@section('title', 'Template Dokumen | LPPM IBI KKG')
@push('styles')
<link rel="stylesheet" href="{{ asset('dokumen/template.css') }}" />
@endpush
@section('content')
<div class="bg-glow glow-1"></div>
  <div class="bg-glow glow-2"></div>
  <main>
    <section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge" data-lppm-cms="dokumen_template.hero.badge">{{ \App\Models\PageContent::getValue('dokumen_template.hero.badge', 'Dokumen · Template') }}</span>
          <h1 data-lppm-cms="dokumen_template.hero.title">{{ \App\Models\PageContent::getValue('dokumen_template.hero.title', 'Template Dokumen LPPM') }}</h1>
          <p data-lppm-cms="dokumen_template.hero.desc">{{ \App\Models\PageContent::getValue('dokumen_template.hero.desc', 'Halaman ini berisi template resmi yang digunakan dalam penyusunan proposal, laporan, dan dokumen administrasi lainnya.', 'textarea') }}</p>
          <div class="hero-actions">
            <a href="#daftar-template" class="btn btn-primary" data-lppm-cms="dokumen_template.hero.btn1">{{ \App\Models\PageContent::getValue('dokumen_template.hero.btn1', 'Lihat Template') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline" data-lppm-cms="dokumen_template.hero.btn2">{{ \App\Models\PageContent::getValue('dokumen_template.hero.btn2', 'Kembali ke Beranda') }}</a>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3 data-lppm-cms="dokumen_template.panel.title">{{ \App\Models\PageContent::getValue('dokumen_template.panel.title', 'Ringkasan Template') }}</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong data-lppm-cms="dokumen_template.stat1.val">{{ \App\Models\PageContent::getValue('dokumen_template.stat1.val', '3') }}</strong>
                <span data-lppm-cms="dokumen_template.stat1.lbl">{{ \App\Models\PageContent::getValue('dokumen_template.stat1.lbl', 'Template Utama') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="dokumen_template.stat2.val">{{ \App\Models\PageContent::getValue('dokumen_template.stat2.val', 'DOCX') }}</strong>
                <span data-lppm-cms="dokumen_template.stat2.lbl">{{ \App\Models\PageContent::getValue('dokumen_template.stat2.lbl', 'Format') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="dokumen_template.stat3.val">{{ \App\Models\PageContent::getValue('dokumen_template.stat3.val', 'Standar') }}</strong>
                <span data-lppm-cms="dokumen_template.stat3.lbl">{{ \App\Models\PageContent::getValue('dokumen_template.stat3.lbl', 'Tata Naskah') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="dokumen_template.stat4.val">{{ \App\Models\PageContent::getValue('dokumen_template.stat4.val', 'Siap Pakai') }}</strong>
                <span data-lppm-cms="dokumen_template.stat4.lbl">{{ \App\Models\PageContent::getValue('dokumen_template.stat4.lbl', 'Status') }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section" id="daftar-template">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag" data-lppm-cms="dokumen_template.section.tag">{{ \App\Models\PageContent::getValue('dokumen_template.section.tag', 'Template') }}</span>
            <h2 data-lppm-cms="dokumen_template.section.title">{{ \App\Models\PageContent::getValue('dokumen_template.section.title', 'Template Dokumen yang Tersedia') }}</h2>
          </div>
          <p data-lppm-cms="dokumen_template.section.desc">{{ \App\Models\PageContent::getValue('dokumen_template.section.desc', 'Gunakan template berikut untuk memastikan format dokumen sesuai dengan standar administrasi LPPM.', 'textarea') }}</p>
        </div>
        <div class="grid-3 template-grid">
          <div class="card template-card">
            <div class="doc-item">
              <strong data-lppm-cms="dokumen_template.item1.title">{{ \App\Models\PageContent::getValue('dokumen_template.item1.title', 'Template Proposal Penelitian') }}</strong>
              <span data-lppm-cms="dokumen_template.item1.format">{{ \App\Models\PageContent::getValue('dokumen_template.item1.format', 'DOCX') }}</span>
            </div>
            <p data-lppm-cms="dokumen_template.item1.desc">{{ \App\Models\PageContent::getValue('dokumen_template.item1.desc', 'Digunakan untuk penyusunan proposal penelitian dosen sesuai format lembaga.', 'textarea') }}</p>
          </div>
          <div class="card template-card">
            <div class="doc-item">
              <strong data-lppm-cms="dokumen_template.item2.title">{{ \App\Models\PageContent::getValue('dokumen_template.item2.title', 'Template Proposal Abdimas') }}</strong>
              <span data-lppm-cms="dokumen_template.item2.format">{{ \App\Models\PageContent::getValue('dokumen_template.item2.format', 'DOCX') }}</span>
            </div>
            <p data-lppm-cms="dokumen_template.item2.desc">{{ \App\Models\PageContent::getValue('dokumen_template.item2.desc', 'Digunakan sebagai format utama dalam penyusunan proposal program abdimas.', 'textarea') }}</p>
          </div>
          <div class="card template-card">
            <div class="doc-item">
              <strong data-lppm-cms="dokumen_template.item3.title">{{ \App\Models\PageContent::getValue('dokumen_template.item3.title', 'Template Laporan Akhir') }}</strong>
              <span data-lppm-cms="dokumen_template.item3.format">{{ \App\Models\PageContent::getValue('dokumen_template.item3.format', 'DOCX') }}</span>
            </div>
            <p data-lppm-cms="dokumen_template.item3.desc">{{ \App\Models\PageContent::getValue('dokumen_template.item3.desc', 'Digunakan untuk penyusunan laporan akhir kegiatan penelitian maupun abdimas.', 'textarea') }}</p>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection