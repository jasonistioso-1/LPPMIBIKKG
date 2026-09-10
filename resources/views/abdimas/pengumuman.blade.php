@extends('layouts.app')
@section('title', 'Pengumuman Abdimas | LPPM IBI KKG')
@push('styles')
<link rel="stylesheet" href="{{ asset('abdimas/pengumuman.css') }}" />
@endpush
@section('content')
<div class="bg-glow glow-1"></div>
  <div class="bg-glow glow-2"></div>
  <main>
    <section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge" data-lppm-cms="abdimas_pengumuman.hero.badge">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.hero.badge', 'Abdimas · Pengumuman') }}</span>
          <h1 data-lppm-cms="abdimas_pengumuman.hero.title">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.hero.title', 'Pengumuman Program Abdimas') }}</h1>
          <p data-lppm-cms="abdimas_pengumuman.hero.desc">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.hero.desc', 'Halaman ini berisi informasi terbaru terkait pengajuan, pelaksanaan, monitoring, dan evaluasi kegiatan pengabdian kepada masyarakat.', 'textarea') }}</p>
          <div class="hero-actions">
            <a href="#daftar-pengumuman" class="btn btn-primary" data-lppm-cms="abdimas_pengumuman.hero.btn1">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.hero.btn1', 'Lihat Pengumuman') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline" data-lppm-cms="abdimas_pengumuman.hero.btn2">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.hero.btn2', 'Kembali ke Beranda') }}</a>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head"><h3 data-lppm-cms="abdimas_pengumuman.stat_title">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.stat_title', 'Ringkasan Informasi') }}</h3></div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong data-lppm-cms="abdimas_pengumuman.stat1.val">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.stat1.val', '2') }}</strong>
                <span data-lppm-cms="abdimas_pengumuman.stat1.lbl">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.stat1.lbl', 'Pengumuman Aktif') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="abdimas_pengumuman.stat2.val">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.stat2.val', '2026') }}</strong>
                <span data-lppm-cms="abdimas_pengumuman.stat2.lbl">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.stat2.lbl', 'Periode Berjalan') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="abdimas_pengumuman.stat3.val">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.stat3.val', '20 Feb') }}</strong>
                <span data-lppm-cms="abdimas_pengumuman.stat3.lbl">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.stat3.lbl', 'Batas Pengajuan') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="abdimas_pengumuman.stat4.val">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.stat4.val', 'LPPM') }}</strong>
                <span data-lppm-cms="abdimas_pengumuman.stat4.lbl">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.stat4.lbl', 'Pengelola') }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section" id="daftar-pengumuman">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag" data-lppm-cms="abdimas_pengumuman.section.tag">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.section.tag', 'Pengumuman Abdimas') }}</span>
            <h2 data-lppm-cms="abdimas_pengumuman.section.title">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.section.title', 'Informasi Terbaru Kegiatan Abdimas') }}</h2>
          </div>
          <p data-lppm-cms="abdimas_pengumuman.section.desc">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.section.desc', 'Pantau halaman ini untuk mengetahui pembaruan jadwal, skema, monitoring, dan ketentuan kegiatan pengabdian kepada masyarakat.', 'textarea') }}</p>
        </div>
        <div class="content-stack">
          <article class="card">
            <div class="announcement-item">
              <strong data-lppm-cms="abdimas_pengumuman.item1.title">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.item1.title', 'Pembukaan Proposal Abdimas 2026') }}</strong>
              <span data-lppm-cms="abdimas_pengumuman.item1.status">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.item1.status', 'Status: Aktif') }}</span>
            </div>
            <p data-lppm-cms="abdimas_pengumuman.item1.desc">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.item1.desc', 'LPPM membuka pengajuan proposal program pengabdian kepada masyarakat bagi dosen tetap dan tim pelaksana sesuai ketentuan yang berlaku.', 'textarea') }}</p>
            <div data-lppm-cms="abdimas_pengumuman.item1.list">
              <ul class="info-list">
                @php $items1 = array_filter(array_map('trim', explode("\n", \App\Models\PageContent::getValue('abdimas_pengumuman.item1.list', "Batas pengajuan proposal: 20 Februari 2026\nDokumen mengikuti format resmi LPPM\nProposal diserahkan sesuai mekanisme yang ditentukan", 'textarea', 'abdimas')))); @endphp
                @foreach($items1 as $it)<li>{{ $it }}</li>@endforeach
              </ul>
            </div>
          </article>
          <article class="card">
            <div class="announcement-item">
              <strong data-lppm-cms="abdimas_pengumuman.item2.title">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.item2.title', 'Monitoring Program Abdimas Lapangan') }}</strong>
              <span data-lppm-cms="abdimas_pengumuman.item2.status">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.item2.status', 'Status: Terjadwal') }}</span>
            </div>
            <p data-lppm-cms="abdimas_pengumuman.item2.desc">{{ \App\Models\PageContent::getValue('abdimas_pengumuman.item2.desc', 'Kegiatan monitoring akan dilakukan untuk memastikan pelaksanaan program berjalan sesuai target, luaran, dan jadwal kegiatan.', 'textarea') }}</p>
            <div data-lppm-cms="abdimas_pengumuman.item2.list">
              <ul class="info-list">
                @php $items2 = array_filter(array_map('trim', explode("\n", \App\Models\PageContent::getValue('abdimas_pengumuman.item2.list', "Jadwal monitoring diumumkan oleh admin LPPM\nTim diwajibkan menyiapkan laporan progres singkat\nDokumentasi kegiatan harus tersedia saat monitoring", 'textarea', 'abdimas')))); @endphp
                @foreach($items2 as $it)<li>{{ $it }}</li>@endforeach
              </ul>
            </div>
          </article>
        </div>
      </div>
    </section>
  </main>
@endsection