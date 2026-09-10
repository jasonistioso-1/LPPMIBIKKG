@extends('layouts.app')
@section('title', 'Lokasi Kampus | LPPM IBI KKG')
@push('styles')
<link rel="stylesheet" href="{{ asset('kontak/lokasi-kampus.css') }}" />
@endpush
@section('content')
<div class="bg-glow glow-1"></div>
  <div class="bg-glow glow-2"></div>
  <main>
    <section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge" data-lppm-cms="lokasi.hero.badge">{{ \App\Models\PageContent::getValue('lokasi.hero.badge', 'Kontak · Lokasi Kampus') }}</span>
          <h1 data-lppm-cms="lokasi.hero.title">{{ \App\Models\PageContent::getValue('lokasi.hero.title', 'Lokasi Kampus dan LPPM') }}</h1>
          <p data-lppm-cms="lokasi.hero.desc">{{ \App\Models\PageContent::getValue('lokasi.hero.desc', 'Halaman ini memuat lokasi kampus untuk memudahkan akses kunjungan, koordinasi, maupun kegiatan yang berkaitan dengan layanan LPPM.', 'textarea') }}</p>
          <div class="hero-actions">
            <a href="#lokasi-kampus" class="btn btn-primary" data-lppm-cms="lokasi.hero.btn1">{{ \App\Models\PageContent::getValue('lokasi.hero.btn1', 'Lihat Lokasi') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline" data-lppm-cms="lokasi.hero.btn2">{{ \App\Models\PageContent::getValue('lokasi.hero.btn2', 'Kembali ke Beranda') }}</a>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3 data-lppm-cms="lokasi.panel.title">{{ \App\Models\PageContent::getValue('lokasi.panel.title', 'Ringkasan Lokasi') }}</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong data-lppm-cms="lokasi.stat1.val">{{ \App\Models\PageContent::getValue('lokasi.stat1.val', 'Jakarta') }}</strong>
                <span data-lppm-cms="lokasi.stat1.lbl">{{ \App\Models\PageContent::getValue('lokasi.stat1.lbl', 'Kota') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="lokasi.stat2.val">{{ \App\Models\PageContent::getValue('lokasi.stat2.val', 'Sunter') }}</strong>
                <span data-lppm-cms="lokasi.stat2.lbl">{{ \App\Models\PageContent::getValue('lokasi.stat2.lbl', 'Area') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="lokasi.stat3.val">{{ \App\Models\PageContent::getValue('lokasi.stat3.val', 'IBI KKG') }}</strong>
                <span data-lppm-cms="lokasi.stat3.lbl">{{ \App\Models\PageContent::getValue('lokasi.stat3.lbl', 'Kampus') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="lokasi.stat4.val">{{ \App\Models\PageContent::getValue('lokasi.stat4.val', 'Map') }}</strong>
                <span data-lppm-cms="lokasi.stat4.lbl">{{ \App\Models\PageContent::getValue('lokasi.stat4.lbl', 'Tersedia') }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section" id="lokasi-kampus">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag" data-lppm-cms="lokasi.section.tag">{{ \App\Models\PageContent::getValue('lokasi.section.tag', 'Lokasi Kampus') }}</span>
            <h2 data-lppm-cms="lokasi.section.title">{{ \App\Models\PageContent::getValue('lokasi.section.title', 'Alamat dan Peta Lokasi') }}</h2>
          </div>
          <p data-lppm-cms="lokasi.section.desc">{{ \App\Models\PageContent::getValue('lokasi.section.desc', 'Gunakan peta berikut untuk menemukan lokasi kampus dan mendukung kebutuhan kunjungan atau kegiatan lapangan.', 'textarea') }}</p>
        </div>
        <div class="grid-2 lokasi-grid">
          <div class="card">
            <h3 data-lppm-cms="lokasi.card1.title">{{ \App\Models\PageContent::getValue('lokasi.card1.title', 'Alamat Lengkap') }}</h3>
            <div class="contact-list">
              <div class="contact-row">
                <span data-lppm-cms="lokasi.row1.label">{{ \App\Models\PageContent::getValue('lokasi.row1.label', 'Institusi') }}</span>
                <strong data-lppm-cms="lokasi.institusi">{{ \App\Models\PageContent::getValue('lokasi.institusi', 'Institut Bisnis dan Informatika Kwik Kian Gie') }}</strong>
              </div>
              <div class="contact-row">
                <span data-lppm-cms="lokasi.row2.label">{{ \App\Models\PageContent::getValue('lokasi.row2.label', 'Alamat') }}</span>
                <strong data-lppm-cms="contact.address">{{ \App\Models\PageContent::getValue('contact.address', 'Jl. Yos Sudarso Kav 85 No.87, Sunter Jaya, Jakarta Utara', 'textarea') }}</strong>
              </div>
              <div class="contact-row">
                <span data-lppm-cms="lokasi.row3.label">{{ \App\Models\PageContent::getValue('lokasi.row3.label', 'Keterangan') }}</span>
                <strong data-lppm-cms="lokasi.keterangan">{{ \App\Models\PageContent::getValue('lokasi.keterangan', 'Lokasi layanan LPPM berada dalam lingkungan kampus', 'textarea') }}</strong>
              </div>
            </div>
          </div>
          <div class="card">
            <h3 data-lppm-cms="lokasi.card2.title">{{ \App\Models\PageContent::getValue('lokasi.card2.title', 'Peta Lokasi') }}</h3>
            <iframe
              id="contactMap"
              class="map-frame"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              title="Peta Lokasi Kampus"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.6974753051066!2d106.88562307584102!3d-6.171247093815993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f52077e69c73%3A0xc345ca5288540c49!2sIBI%20KKG%20(Institut%20Bisnis%20dan%20Informatika%20Kwik%20Kian%20Gie)!5e0!3m2!1sen!2sid!4v1714000000000!5m2!1sen!2sid"
            ></iframe>
            <div class="location-status" id="contactLocationStatus" data-lppm-cms="lokasi.map.caption">
              {{ \App\Models\PageContent::getValue('lokasi.map.caption', 'Map: Kwik Kian Gie School of Business') }}
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection