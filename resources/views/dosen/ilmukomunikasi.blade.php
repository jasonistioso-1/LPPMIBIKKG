@extends('layouts.app')
@section('title', 'Dosen Ilmu Komunikasi | LPPM IBI KKG')
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
          <span class="badge" data-lppm-cms="dosen.ilmukomunikasi.hero.badge">
            {{ \App\Models\PageContent::getValue('dosen.ilmukomunikasi.hero.badge', 'Akademisi · Ilmu Komunikasi', 'text', 'dosen.ilmukomunikasi', 'Badge: Ilmu Komunikasi') }}
          </span>
          <h1 data-lppm-cms="dosen.ilmukomunikasi.hero.title">
            {{ \App\Models\PageContent::getValue('dosen.ilmukomunikasi.hero.title', 'Ilmu Komunikasi', 'text', 'dosen.ilmukomunikasi', 'Judul: Ilmu Komunikasi') }}
          </h1>

          <div class="hero-actions">
            <a href="#daftar-dosen" class="btn btn-primary" data-lppm-cms="dosen.ilmukomunikasi.hero.btn1">
              {{ \App\Models\PageContent::getValue('dosen.ilmukomunikasi.hero.btn1', 'Lihat Akademisi', 'text', 'dosen.ilmukomunikasi', 'Tombol 1') }}
            </a>
            <a href="{{ route('home') }}" class="btn btn-outline" data-lppm-cms="dosen.ilmukomunikasi.hero.btn2">
              {{ \App\Models\PageContent::getValue('dosen.ilmukomunikasi.hero.btn2', 'Kembali', 'text', 'dosen.ilmukomunikasi', 'Tombol 2') }}
            </a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel dosen-hero-panel program-profile-card">
            <div class="program-certificate-wrap">
              <img
                src="{{ asset(\App\Models\PageContent::getValue('dosen.ilmukomunikasi.hero.image', 'assets/images/dosen/akre_ilkom.jpg', 'image', 'dosen.ilmukomunikasi', 'Gambar Hero')) }}"
                alt="Sertifikat Profil Program Ilmu Komunikasi"
                class="program-certificate-img"
                data-lppm-cms="dosen.ilmukomunikasi.hero.image"
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

        @include('dosen._dosen_list', ['prodiArray' => ['Ilmu Komunikasi'], 'prodiName' => 'Ilmu Komunikasi'])
      </div>
    </section>
  </main>

  <script src="{{ asset('dosen/dosen.js') }}"></script>
@endsection