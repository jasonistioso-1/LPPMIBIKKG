@extends('layouts.app')
@section('title', 'Informasi Kontak | LPPM IBI KKG')
@push('styles')
<link rel="stylesheet" href="{{ asset('kontak/informasi-kontak.css') }}" />
@endpush
@section('content')
<div class="bg-glow glow-1"></div>
    <div class="bg-glow glow-2"></div>

    <main>
      <section class="hero section">
        <div class="container hero-grid">
          <div class="hero-copy">
            <span class="badge" data-lppm-cms="contact.hero.badge">{{ \App\Models\PageContent::getValue('contact.hero.badge', 'Kontak · Informasi') }}</span>
            <h1 data-lppm-cms="contact.hero.title">{{ \App\Models\PageContent::getValue('contact.hero.title', 'Informasi Kontak LPPM') }}</h1>
            <p data-lppm-cms="contact.hero.desc">
              {{ \App\Models\PageContent::getValue('contact.hero.desc', 'Halaman ini memuat informasi dasar layanan LPPM, termasuk alamat, email, dan nomor kontak yang dapat dihubungi.', 'textarea') }}
            </p>
            <div class="hero-actions">
              <a href="#kontak-utama" class="btn btn-primary" data-lppm-cms="contact.hero.btn1">{{ \App\Models\PageContent::getValue('contact.hero.btn1', 'Lihat Informasi') }}</a>
              <a href="{{ route('home') }}" class="btn btn-outline" data-lppm-cms="contact.hero.btn2">{{ \App\Models\PageContent::getValue('contact.hero.btn2', 'Kembali ke Beranda') }}</a>
            </div>
          </div>

          <div class="hero-visual">
            <div class="hero-panel">
              <div class="hero-panel-head">
                <h3 data-lppm-cms="contact.panel.title">{{ \App\Models\PageContent::getValue('contact.panel.title', 'Ringkasan Kontak') }}</h3>
              </div>
              <div class="hero-panel-body">
                <div class="mini-stat">
                  <strong data-lppm-cms="contact.stat1.val">{{ \App\Models\PageContent::getValue('contact.stat1.val', '1') }}</strong>
                  <span data-lppm-cms="contact.stat1.lbl">{{ \App\Models\PageContent::getValue('contact.stat1.lbl', 'Alamat Utama') }}</span>
                </div>
                <div class="mini-stat">
                  <strong data-lppm-cms="contact.stat2.val">{{ \App\Models\PageContent::getValue('contact.stat2.val', 'Email') }}</strong>
                  <span data-lppm-cms="contact.stat2.lbl">{{ \App\Models\PageContent::getValue('contact.stat2.lbl', 'Layanan Resmi') }}</span>
                </div>
                <div class="mini-stat">
                  <strong data-lppm-cms="contact.stat3.val">{{ \App\Models\PageContent::getValue('contact.stat3.val', 'Telepon') }}</strong>
                  <span data-lppm-cms="contact.stat3.lbl">{{ \App\Models\PageContent::getValue('contact.stat3.lbl', 'Kontak Admin') }}</span>
                </div>
                <div class="mini-stat">
                  <strong data-lppm-cms="contact.stat4.val">{{ \App\Models\PageContent::getValue('contact.stat4.val', 'LPPM') }}</strong>
                  <span data-lppm-cms="contact.stat4.lbl">{{ \App\Models\PageContent::getValue('contact.stat4.lbl', 'Pusat Layanan') }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section" id="kontak-utama">
        <div class="container">
          <div class="section-head">
            <div>
              <span class="section-tag" data-lppm-cms="contact.section.tag">{{ \App\Models\PageContent::getValue('contact.section.tag', 'Informasi Kontak') }}</span>
              <h2 data-lppm-cms="contact.section.title">{{ \App\Models\PageContent::getValue('contact.section.title', 'Detail Layanan yang Dapat Dihubungi') }}</h2>
            </div>
            <p data-lppm-cms="contact.section.desc">
              {{ \App\Models\PageContent::getValue('contact.section.desc', 'Gunakan informasi berikut untuk kebutuhan komunikasi, konsultasi, dan koordinasi administrasi bersama LPPM.', 'textarea') }}
            </p>
          </div>

          <div class="grid-2 contact-grid">
            <div class="card">
              <div class="contact-list">
                <div class="contact-row">
                  <span data-lppm-cms="contact.row1.lbl">{{ \App\Models\PageContent::getValue('contact.row1.lbl', 'Alamat') }}</span>
                  <strong data-lppm-cms="contact.address">{{ \App\Models\PageContent::getValue('contact.address', 'Jl. Yos Sudarso Kav 85 No.87, Sunter Jaya, Jakarta Utara') }}</strong>
                </div>
                <div class="contact-row">
                  <span data-lppm-cms="contact.row2.lbl">{{ \App\Models\PageContent::getValue('contact.row2.lbl', 'Email') }}</span>
                  <strong data-lppm-cms="contact.email">{{ \App\Models\PageContent::getValue('contact.email', 'lppm@kwikkiangie.ac.id') }}</strong>
                </div>
                <div class="contact-row">
                  <span data-lppm-cms="contact.row3.lbl">{{ \App\Models\PageContent::getValue('contact.row3.lbl', 'Telepon') }}</span>
                  <strong data-lppm-cms="contact.phone">{{ \App\Models\PageContent::getValue('contact.phone', '+62 21 6530 7062') }}</strong>
                </div>
              </div>
            </div>

            <div class="card">
              <h3 data-lppm-cms="contact.info.title">{{ \App\Models\PageContent::getValue('contact.info.title', 'Keterangan') }}</h3>
              <p data-lppm-cms="contact.info.desc1">
                {{ \App\Models\PageContent::getValue('contact.info.desc1', 'Informasi kontak ini dapat digunakan untuk kebutuhan surat-menyurat, konfirmasi kegiatan, pengajuan dokumen, dan komunikasi resmi lainnya.', 'textarea') }}
              </p>
              <p data-lppm-cms="contact.info.desc2">
                {{ \App\Models\PageContent::getValue('contact.info.desc2', 'Untuk kebutuhan layanan spesifik seperti jadwal operasional atau lokasi kampus, silakan lihat submenu terkait pada bagian kontak.', 'textarea') }}
              </p>
            </div>
          </div>
        </div>
      </section>
    </main>
@endsection