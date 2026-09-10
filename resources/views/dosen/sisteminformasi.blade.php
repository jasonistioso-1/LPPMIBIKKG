@extends('layouts.app')
@section('title', 'Dosen Sistem Informasi | LPPM IBI KKG')
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
          <span class="badge" data-lppm-cms="dosen.sisteminformasi.hero.badge">
            {{ \App\Models\PageContent::getValue('dosen.sisteminformasi.hero.badge', 'Akademisi · Sistem Informasi', 'text', 'dosen.sisteminformasi', 'Badge: Sistem Informasi') }}
          </span>
          <h1 data-lppm-cms="dosen.sisteminformasi.hero.title">
            {{ \App\Models\PageContent::getValue('dosen.sisteminformasi.hero.title', 'Sistem Informasi', 'text', 'dosen.sisteminformasi', 'Judul: Sistem Informasi') }}
          </h1>

          <div class="hero-actions">
            <a href="#daftar-dosen" class="btn btn-primary" data-lppm-cms="dosen.sisteminformasi.hero.btn1">
              {{ \App\Models\PageContent::getValue('dosen.sisteminformasi.hero.btn1', 'Lihat Akademisi', 'text', 'dosen.sisteminformasi', 'Tombol 1') }}
            </a>
            <a href="{{ route('home') }}" class="btn btn-outline" data-lppm-cms="dosen.sisteminformasi.hero.btn2">
              {{ \App\Models\PageContent::getValue('dosen.sisteminformasi.hero.btn2', 'Kembali', 'text', 'dosen.sisteminformasi', 'Tombol 2') }}
            </a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel dosen-hero-panel program-profile-card">
            <div class="program-certificate-wrap">
              <img
                src="{{ asset(\App\Models\PageContent::getValue('dosen.sisteminformasi.hero.image', 'assets/images/dosen/akre_si.jpg', 'image', 'dosen.sisteminformasi', 'Gambar Hero')) }}"
                alt="Sertifikat Profil Program Sistem Informasi"
                class="program-certificate-img"
                data-lppm-cms="dosen.sisteminformasi.hero.image"
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