@extends('layouts.app')
@section('title', 'Dosen Akuntansi | LPPM IBI KKG')
@push('styles')
<link rel="stylesheet" href="{{ asset('dosen/dosen.css') }}" />
@endpush
@section('content')
<div class="bg-glow glow-1"></div>
  <div class="bg-glow glow-2"></div>
  
  <main>
    <section class="hero section dosen-hero">
      <div class="container dosen-hero-grid">
        <div class="hero-copy">
          <span class="badge" data-lppm-cms="dosen.akuntansi.hero.badge">
            {{ \App\Models\PageContent::getValue('dosen.akuntansi.hero.badge', 'Akademisi · Akuntansi', 'text', 'dosen.akuntansi', 'Badge: Akuntansi') }}
          </span>
          <h1 data-lppm-cms="dosen.akuntansi.hero.title">
            {{ \App\Models\PageContent::getValue('dosen.akuntansi.hero.title', 'Akuntansi', 'text', 'dosen.akuntansi', 'Judul: Akuntansi') }}
          </h1>

          <div class="hero-actions">
            <a href="#daftar-dosen" class="btn btn-primary" data-lppm-cms="dosen.akuntansi.hero.btn1">
              {{ \App\Models\PageContent::getValue('dosen.akuntansi.hero.btn1', 'Lihat Akademisi', 'text', 'dosen.akuntansi', 'Tombol 1') }}
            </a>
            <a href="{{ route('home') }}" class="btn btn-outline" data-lppm-cms="dosen.akuntansi.hero.btn2">
              {{ \App\Models\PageContent::getValue('dosen.akuntansi.hero.btn2', 'Kembali', 'text', 'dosen.akuntansi', 'Tombol 2') }}
            </a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel dosen-hero-panel program-profile-card">
            <div class="program-certificate-wrap">
              <img
                src="{{ asset(\App\Models\PageContent::getValue('dosen.akuntansi.hero.image', 'assets/images/dosen/akre_akuntansi.jpg', 'image', 'dosen.akuntansi', 'Gambar Hero')) }}"
                alt="Sertifikat Profil Program Akuntansi"
                class="program-certificate-img"
                data-lppm-cms="dosen.akuntansi.hero.image"
              />
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="daftar-dosen">
      <div class="container">
        <div class="section-head section-head-center">
          <span class="section-tag">Daftar Akademisi</span>
        </div>

        @include('dosen._dosen_list', ['prodiArray' => ['Akuntansi', 'Magister Akuntansi'], 'prodiName' => 'Akuntansi'])
      </div>
    </section>
  </main>

  <script src="{{ asset('dosen/dosen.js') }}"></script>
@endsection