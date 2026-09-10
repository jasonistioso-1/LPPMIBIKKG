@extends('layouts.app')
@section('title', 'Pengumuman Penelitian | LPPM IBI KKG')
@push('styles')
<link rel="stylesheet" href="{{ asset('penelitian/pengumuman.css') }}" />
@endpush
@section('content')
<div class="bg-glow glow-1"></div>
  <div class="bg-glow glow-2"></div>

  <main>
    <section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge" data-lppm-cms="pen_peng_hero_badge">{{ \App\Models\PageContent::getValue('pen_peng_hero_badge', 'Penelitian · Pengumuman') }}</span>
          <h1 data-lppm-cms="pen_peng_hero_title">{{ \App\Models\PageContent::getValue('pen_peng_hero_title', 'Pengumuman Penelitian LPPM') }}</h1>
          <p data-lppm-cms="pen_peng_hero_desc">
            {{ \App\Models\PageContent::getValue('pen_peng_hero_desc', 'Halaman ini berisi informasi terbaru terkait hibah, jadwal pengajuan, revisi proposal, seminar, monitoring, and ketentuan lain yang berkaitan dengan kegiatan penelitian dosen.', 'textarea') }}
          </p>
          <div class="hero-actions">
            <a href="#daftar-pengumuman" class="btn btn-primary" data-lppm-cms="pen_peng_hero_btn1">{{ \App\Models\PageContent::getValue('pen_peng_hero_btn1', 'Lihat Pengumuman') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline" data-lppm-cms="pen_peng_hero_btn2">{{ \App\Models\PageContent::getValue('pen_peng_hero_btn2', 'Kembali ke Beranda') }}</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3 data-lppm-cms="pen_peng_stat_title">{{ \App\Models\PageContent::getValue('pen_peng_stat_title', 'Ringkasan Informasi') }}</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong data-lppm-cms="pen_peng_stat1_val">{{ \App\Models\PageContent::getValue('pen_peng_stat1_val', '3') }}</strong>
                <span data-lppm-cms="pen_peng_stat1_lbl">{{ \App\Models\PageContent::getValue('pen_peng_stat1_lbl', 'Pengumuman Aktif') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="pen_peng_stat2_val">{{ \App\Models\PageContent::getValue('pen_peng_stat2_val', '2026') }}</strong>
                <span data-lppm-cms="pen_peng_stat2_lbl">{{ \App\Models\PageContent::getValue('pen_peng_stat2_lbl', 'Periode Berjalan') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="pen_peng_stat3_val">{{ \App\Models\PageContent::getValue('pen_peng_stat3_val', '10 Feb') }}</strong>
                <span data-lppm-cms="pen_peng_stat3_lbl">{{ \App\Models\PageContent::getValue('pen_peng_stat3_lbl', 'Batas Submit') }}</span>
              </div>
              <div class="mini-stat">
                <strong data-lppm-cms="pen_peng_stat4_val">{{ \App\Models\PageContent::getValue('pen_peng_stat4_val', 'LPPM') }}</strong>
                <span data-lppm-cms="pen_peng_stat4_lbl">{{ \App\Models\PageContent::getValue('pen_peng_stat4_lbl', 'Pengelola') }}</span>
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
            <span class="section-tag" data-lppm-cms="pen_peng_sec_tag">{{ \App\Models\PageContent::getValue('pen_peng_sec_tag', 'Pengumuman Penelitian') }}</span>
            <h2 data-lppm-cms="pen_peng_sec_title">{{ \App\Models\PageContent::getValue('pen_peng_sec_title', 'Informasi Terbaru untuk Kegiatan Penelitian') }}</h2>
          </div>
          <p data-lppm-cms="pen_peng_sec_desc">
            {{ \App\Models\PageContent::getValue('pen_peng_sec_desc', 'Silakan pantau halaman ini secara berkala untuk mengetahui pembaruan jadwal, ketentuan, dan tahapan kegiatan penelitian.', 'textarea') }}
          </p>
        </div>

        <div class="content-stack">
          <article class="card">
            <div class="announcement-item">
              <strong data-lppm-cms="pen_peng_card1_title">{{ \App\Models\PageContent::getValue('pen_peng_card1_title', 'Pembukaan Hibah Internal Penelitian 2026') }}</strong>
              <span data-lppm-cms="pen_peng_card1_status">{{ \App\Models\PageContent::getValue('pen_peng_card1_status', 'Status: Aktif') }}</span>
            </div>
            <p data-lppm-cms="pen_peng_card1_desc">
              {{ \App\Models\PageContent::getValue('pen_peng_card1_desc', 'LPPM membuka program hibah internal penelitian tahun 2026 bagi dosen tetap. Pengusul diharapkan menyesuaikan proposal dengan skema yang tersedia serta memperhatikan jadwal dan format dokumen yang telah ditetapkan.', 'textarea') }}
            </p>
            <ul class="info-list">
              <li data-lppm-cms="pen_peng_card1_item1">{{ \App\Models\PageContent::getValue('pen_peng_card1_item1', 'Batas submit proposal: 10 Februari 2026') }}</li>
              <li data-lppm-cms="pen_peng_card1_item2">{{ \App\Models\PageContent::getValue('pen_peng_card1_item2', 'Format proposal mengikuti template resmi LPPM') }}</li>
              <li data-lppm-cms="pen_peng_card1_item3">{{ \App\Models\PageContent::getValue('pen_peng_card1_item3', 'Pengajuan dilakukan melalui admin atau sistem yang ditentukan') }}</li>
            </ul>
          </article>

          <article class="card">
            <div class="announcement-item">
              <strong data-lppm-cms="pen_peng_card2_title">{{ \App\Models\PageContent::getValue('pen_peng_card2_title', 'Revisi Proposal Penelitian') }}</strong>
              <span data-lppm-cms="pen_peng_card2_status">{{ \App\Models\PageContent::getValue('pen_peng_card2_status', 'Status: Berjalan') }}</span>
            </div>
            <p data-lppm-cms="pen_peng_card2_desc">
              {{ \App\Models\PageContent::getValue('pen_peng_card2_desc', 'Dosen yang proposalnya telah melalui tahap evaluasi awal diwajibkan melakukan revisi sesuai catatan reviewer. Revisi diserahkan kembali sesuai jadwal yang telah ditentukan oleh LPPM.', 'textarea') }}
            </p>
            <ul class="info-list">
              <li data-lppm-cms="pen_peng_card2_item1">{{ \App\Models\PageContent::getValue('pen_peng_card2_item1', 'Batas revisi proposal: 18 Februari 2026') }}</li>
              <li data-lppm-cms="pen_peng_card2_item2">{{ \App\Models\PageContent::getValue('pen_peng_card2_item2', 'Pastikan seluruh catatan reviewer telah ditindaklanjuti') }}</li>
              <li data-lppm-cms="pen_peng_card2_item3">{{ \App\Models\PageContent::getValue('pen_peng_card2_item3', 'Gunakan dokumen final yang telah diberi nama sesuai format') }}</li>
            </ul>
          </article>

          <article class="card">
            <div class="announcement-item">
              <strong data-lppm-cms="pen_peng_card3_title">{{ \App\Models\PageContent::getValue('pen_peng_card3_title', 'Jadwal Seminar Proposal Penelitian') }}</strong>
              <span data-lppm-cms="pen_peng_card3_status">{{ \App\Models\PageContent::getValue('pen_peng_card3_status', 'Status: Menunggu Jadwal') }}</span>
            </div>
            <p data-lppm-cms="pen_peng_card3_desc">
              {{ \App\Models\PageContent::getValue('pen_peng_card3_desc', 'Seminar proposal akan dilaksanakan setelah proses verifikasi dan revisi proposal selesai. Jadwal seminar akan diinformasikan oleh admin LPPM kepada masing-masing pengusul.', 'textarea') }}
            </p>
            <ul class="info-list">
              <li data-lppm-cms="pen_peng_card3_item1">{{ \App\Models\PageContent::getValue('pen_peng_card3_item1', 'Peserta wajib menyiapkan materi presentasi ringkas') }}</li>
              <li data-lppm-cms="pen_peng_card3_item2">{{ \App\Models\PageContent::getValue('pen_peng_card3_item2', 'Tim pengusul diharapkan hadir sesuai jadwal yang ditetapkan') }}</li>
              <li data-lppm-cms="pen_peng_card3_item3">{{ \App\Models\PageContent::getValue('pen_peng_card3_item3', 'Informasi teknis seminar diumumkan lebih lanjut oleh LPPM') }}</li>
            </ul>
          </article>
        </div>
      </div>
    </section>
  </main>
@endsection