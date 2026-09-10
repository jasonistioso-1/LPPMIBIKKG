@extends('layouts.app')
@section('title', 'Dosen Teknik Informatika | LPPM IBI KKG')
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
          <span class="badge" data-lppm-cms="dosen.teknikinformatika.hero.badge">
            {{ \App\Models\PageContent::getValue('dosen.teknikinformatika.hero.badge', 'Akademisi · Teknik Informatika', 'text', 'dosen.teknikinformatika', 'Badge: Teknik Informatika') }}
          </span>
          <h1 data-lppm-cms="dosen.teknikinformatika.hero.title">
            {{ \App\Models\PageContent::getValue('dosen.teknikinformatika.hero.title', 'Teknik Informatika', 'text', 'dosen.teknikinformatika', 'Judul: Teknik Informatika') }}
          </h1>

          <div class="hero-actions">
            <a href="#daftar-dosen" class="btn btn-primary" data-lppm-cms="dosen.teknikinformatika.hero.btn1">
              {{ \App\Models\PageContent::getValue('dosen.teknikinformatika.hero.btn1', 'Lihat Akademisi', 'text', 'dosen.teknikinformatika', 'Tombol 1') }}
            </a>
            <a href="{{ route('home') }}" class="btn btn-outline" data-lppm-cms="dosen.teknikinformatika.hero.btn2">
              {{ \App\Models\PageContent::getValue('dosen.teknikinformatika.hero.btn2', 'Kembali', 'text', 'dosen.teknikinformatika', 'Tombol 2') }}
            </a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel dosen-hero-panel program-profile-card">
            <div class="program-certificate-wrap">
              <img
                src="{{ asset(\App\Models\PageContent::getValue('dosen.teknikinformatika.hero.image', 'assets/images/dosen/akre_ti.jpg', 'image', 'dosen.teknikinformatika', 'Gambar Hero')) }}"
                alt="Sertifikat Profil Program Teknik Informatika"
                class="program-certificate-img"
                data-lppm-cms="dosen.teknikinformatika.hero.image"
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

        <div class="dosen-grid">
        </div>
      </div>
    </section>
  </main>

  
  
  <script src="{{ asset('dosen/dosen-data.js') }}"></script>
  <script src="{{ asset('dosen/dosen.js') }}"></script>
@endsection