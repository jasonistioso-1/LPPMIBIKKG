@extends('layouts.app')
@section('title', 'Struktur Organisasi | LPPM IBI KKG')
@push('styles')
<link rel="stylesheet" href="{{ asset('profil/struktur-organisasi.css') }}" />
@endpush
@section('content')
<div class="page-noise"></div>
  <div class="bg-side-orb orb-left"></div>
  <div class="bg-side-orb orb-right"></div>
  <div class="bg-side-orb orb-bottom"></div>
  <div class="bg-glow glow-1"></div>
  <div class="bg-glow glow-2"></div>

  

  <main>
    <section class="hero section org-hero">
      <div class="container org-hero-grid">
        <div class="hero-copy">
          <span class="badge" data-lppm-cms="struktur.hero.badge">{{ \App\Models\PageContent::getValue('struktur.hero.badge', 'Profil · Struktur Organisasi') }}</span>
          <h1 data-lppm-cms="struktur.hero.title">{{ \App\Models\PageContent::getValue('struktur.hero.title', 'Struktur Organisasi LPPM IBI KKG') }}</h1>
          <p data-lppm-cms="struktur.hero.desc" style="color: #94a3b8; font-size: 15px; margin-top: 10px;">{{ \App\Models\PageContent::getValue('struktur.hero.desc', 'Susunan kepengurusan dan tata kelola organisasi Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) IBI Kwik Kian Gie.') }}</p>
        
          <div class="hero-actions">
            <a href="#pohon-organisasi" class="btn btn-primary">Lihat Struktur</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke Beranda</a>
          </div>
        </div>

       
    </section>

    <section class="section" id="pohon-organisasi">
      <div class="container">
        <div class="section-head section-head-center">
          <div>
            <span class="section-tag" data-lppm-cms="struktur.section.tag">{{ \App\Models\PageContent::getValue('struktur.section.tag', 'Struktur Organisasi') }}</span>
            <h2 data-lppm-cms="struktur.section.title">{{ \App\Models\PageContent::getValue('struktur.section.title', 'Susunan Jabatan') }}</h2>
          </div>
        </div>

        <div class="org-layout">
          <div class="org-top-line"></div>

          <article class="leader-card card">
            <div class="leader-photo-wrap">
              <div class="photo-rotator leader-rotator">
                <img
                  class="photo-layer is-active"
                  alt="Foto Ketua LPPM"
                  src="{{ asset(\App\Models\PageContent::getValue('struktur.pimpinan.foto1', 'assets/images/struktur-organisasi/pakimam1.jpg', 'image', 'struktur', 'Foto Kepala LPPM: Tampilan Utama')) }}"
                  data-alt-src="{{ asset(\App\Models\PageContent::getValue('struktur.pimpinan.foto2', 'assets/images/struktur-organisasi/pakimam2.png', 'image', 'struktur', 'Foto Kepala LPPM: Tampilan Hover/Rotasi')) }}"
                  data-lppm-cms="struktur.pimpinan.foto1"
                />
              </div>
            </div>

            <div class="leader-info">
              <span class="leader-label" data-lppm-cms="struktur.pimpinan.label">{{ \App\Models\PageContent::getValue('struktur.pimpinan.label', 'Kepala LPPM') }}</span>
              <h3 data-lppm-cms="struktur.pimpinan.ketua">{{ \App\Models\PageContent::getValue('struktur.pimpinan.ketua', 'Dr. Imam Nuraryo, M.A.') }}</h3>
              <p data-lppm-cms="struktur.pimpinan.desc">
                {{ \App\Models\PageContent::getValue('struktur.pimpinan.desc', 'Memimpin kebijakan strategis lembaga dan mengarahkan penelitian, pengabdian, publikasi, serta penguatan kerja sama institusi.') }}
              </p>
              <div class="leader-meta">
                <div class="meta-pill" data-lppm-cms="struktur.pimpinan.meta1">{{ \App\Models\PageContent::getValue('struktur.pimpinan.meta1', 'Pengarah Utama') }}</div>
                <div class="meta-pill" data-lppm-cms="struktur.pimpinan.meta2">{{ \App\Models\PageContent::getValue('struktur.pimpinan.meta2', 'Koordinator Kebijakan') }}</div>
                <div class="meta-pill" data-lppm-cms="struktur.pimpinan.meta3">{{ \App\Models\PageContent::getValue('struktur.pimpinan.meta3', 'Penanggung Jawab') }}</div>
              </div>
              <a href="prestasi.html#sertifikat-section" class="leader-award-badge" data-lppm-cms="struktur.pimpinan.award">
                <i class="fa-solid fa-award"></i> {{ \App\Models\PageContent::getValue('struktur.pimpinan.award', 'Apresiasi Pengabdian Rektorat IBI KKG') }}
              </a>
            </div>
          </article>

          <div class="org-main-line"></div>

          <div class="org-grid">
            {{-- Dede --}}
            <article class="org-card card">
              <span class="org-number" data-lppm-cms="struktur.staff.dede.label">{{ \App\Models\PageContent::getValue('struktur.staff.dede.label', 'Koordinator Bidang') }}</span>
              <div class="photo-rotator org-rotator">
                <img
                  class="photo-layer is-active"
                  alt="Kesekretariatan dan Publikasi Ilmiah"
                  src="{{ asset(\App\Models\PageContent::getValue('struktur.staff.dede.photo1', 'assets/images/struktur-organisasi/pakdede1.png', 'image', 'struktur', 'Foto Dede: Tampilan Utama')) }}"
                  data-alt-src="{{ asset(\App\Models\PageContent::getValue('struktur.staff.dede.photo2', 'assets/images/struktur-organisasi/pakdede2.png', 'image', 'struktur', 'Foto Dede: Tampilan Hover/Rotasi')) }}"
                  data-lppm-cms="struktur.staff.dede.photo1"
                />
              </div>
              <h3 data-lppm-cms="struktur.staff.dede.name">{{ \App\Models\PageContent::getValue('struktur.staff.dede.name', 'Dede Surya Atmaja, S.Pd') }}</h3>
              <p class="org-role" data-lppm-cms="struktur.staff.dede.role">{{ \App\Models\PageContent::getValue('struktur.staff.dede.role', 'Kesekretariatan dan Publikasi Ilmiah') }}</p>
            </article>

            {{-- Zulfikar --}}
            <article class="org-card card">
              <span class="org-number" data-lppm-cms="struktur.staff.zulfikar.label">{{ \App\Models\PageContent::getValue('struktur.staff.zulfikar.label', 'Koordinator Bidang') }}</span>
              <div class="photo-rotator org-rotator">
                <img
                  class="photo-layer is-active"
                  alt="Penelitian"
                  src="{{ asset(\App\Models\PageContent::getValue('struktur.staff.zulfikar.photo1', 'assets/images/struktur-organisasi/pakzulfikar1.png', 'image', 'struktur', 'Foto Zulfikar: Tampilan Utama')) }}"
                  data-alt-src="{{ asset(\App\Models\PageContent::getValue('struktur.staff.zulfikar.photo2', 'assets/images/struktur-organisasi/pakzulfikar2.png', 'image', 'struktur', 'Foto Zulfikar: Tampilan Hover/Rotasi')) }}"
                  data-lppm-cms="struktur.staff.zulfikar.photo1"
                />
              </div>
              <h3 data-lppm-cms="struktur.staff.zulfikar.name">{{ \App\Models\PageContent::getValue('struktur.staff.zulfikar.name', 'Dr. Zulfikar Ikhsan Pane, S.E., Ak.') }}</h3>
              <p class="org-role" data-lppm-cms="struktur.staff.zulfikar.role">{{ \App\Models\PageContent::getValue('struktur.staff.zulfikar.role', 'Penelitian') }}</p>
            </article>

            {{-- Hanif --}}
            <article class="org-card card">
              <span class="org-number" data-lppm-cms="struktur.staff.hanif.label">{{ \App\Models\PageContent::getValue('struktur.staff.hanif.label', 'Koordinator Bidang') }}</span>
              <div class="photo-rotator org-rotator">
                <img
                  class="photo-layer is-active"
                  alt="Chief Editor Jurnal Akuntansi"
                  src="{{ asset(\App\Models\PageContent::getValue('struktur.staff.hanif.photo1', 'assets/images/struktur-organisasi/pakhanif1.png', 'image', 'struktur', 'Foto Hanif: Tampilan Utama')) }}"
                  data-alt-src="{{ asset(\App\Models\PageContent::getValue('struktur.staff.hanif.photo2', 'assets/images/struktur-organisasi/pakhanif2.jpeg', 'image', 'struktur', 'Foto Hanif: Tampilan Hover/Rotasi')) }}"
                  data-lppm-cms="struktur.staff.hanif.photo1"
                />
              </div>
              <h3 data-lppm-cms="struktur.staff.hanif.name">{{ \App\Models\PageContent::getValue('struktur.staff.hanif.name', 'Prof. Dr. Hanif Ismail') }}</h3>
              <p class="org-role" data-lppm-cms="struktur.staff.hanif.role">{{ \App\Models\PageContent::getValue('struktur.staff.hanif.role', 'Chief Editor Jurnal Akuntansi') }}</p>
            </article>

            {{-- Salam --}}
            <article class="org-card card">
              <span class="org-number" data-lppm-cms="struktur.staff.salam.label">{{ \App\Models\PageContent::getValue('struktur.staff.salam.label', 'Koordinator Bidang') }}</span>
              <div class="photo-rotator org-rotator">
                <img
                  class="photo-layer is-active"
                  alt="Chief Editor Jurnal Ekonomi Perusahaan"
                  src="{{ asset(\App\Models\PageContent::getValue('struktur.staff.salam.photo1', 'assets/images/struktur-organisasi/paksalam1.jpeg', 'image', 'struktur', 'Foto Salam: Tampilan Utama')) }}"
                  data-alt-src="{{ asset(\App\Models\PageContent::getValue('struktur.staff.salam.photo2', 'assets/images/struktur-organisasi/paksalam1.jpeg', 'image', 'struktur', 'Foto Salam: Tampilan Hover/Rotasi')) }}"
                  data-lppm-cms="struktur.staff.salam.photo1"
                />
              </div>
              <h3 data-lppm-cms="struktur.staff.salam.name">{{ \App\Models\PageContent::getValue('struktur.staff.salam.name', 'Salam Fadillah Alzah, S.Tr., MAB') }}</h3>
              <p class="org-role" data-lppm-cms="struktur.staff.salam.role">{{ \App\Models\PageContent::getValue('struktur.staff.salam.role', 'Chief Editor Jurnal Ekonomi Perusahaan') }}</p>
            </article>

            {{-- Tundo --}}
            <article class="org-card card">
              <span class="org-number" data-lppm-cms="struktur.staff.tundo.label">{{ \App\Models\PageContent::getValue('struktur.staff.tundo.label', 'Koordinator Bidang') }}</span>
              <div class="photo-rotator org-rotator">
                <img
                  class="photo-layer is-active"
                  alt="Publikasi Ilmiah"
                  src="{{ asset(\App\Models\PageContent::getValue('struktur.staff.tundo.photo1', 'assets/images/struktur-organisasi/paktundo1.png', 'image', 'struktur', 'Foto Tundo: Tampilan Utama')) }}"
                  data-alt-src="{{ asset(\App\Models\PageContent::getValue('struktur.staff.tundo.photo2', 'assets/images/struktur-organisasi/paktundo1.png', 'image', 'struktur', 'Foto Tundo: Tampilan Hover/Rotasi')) }}"
                  data-lppm-cms="struktur.staff.tundo.photo1"
                />
              </div>
              <h3 data-lppm-cms="struktur.staff.tundo.name">{{ \App\Models\PageContent::getValue('struktur.staff.tundo.name', 'Joko Susilo, S.Kom., M.M., M.Kom.') }}</h3>
              <p class="org-role" data-lppm-cms="struktur.staff.tundo.role">{{ \App\Models\PageContent::getValue('struktur.staff.tundo.role', 'Chief Editor Jurnal Informatika dan Bisnis') }}</p>
            </article>

            {{-- Kristin --}}
            <article class="org-card card">
              <span class="org-number" data-lppm-cms="struktur.staff.kristin.label">{{ \App\Models\PageContent::getValue('struktur.staff.kristin.label', 'Koordinator Bidang') }}</span>
              <div class="photo-rotator org-rotator">
                <img
                  class="photo-layer is-active"
                  alt="Kemitraan dan Jejaring"
                  src="{{ asset(\App\Models\PageContent::getValue('struktur.staff.kristin.photo1', 'assets/images/struktur-organisasi/ibu1.png', 'image', 'struktur', 'Foto Kristin: Tampilan Utama')) }}"
                  data-alt-src="{{ asset(\App\Models\PageContent::getValue('struktur.staff.kristin.photo2', 'assets/images/struktur-organisasi/ibu2.png', 'image', 'struktur', 'Foto Kristin: Tampilan Hover/Rotasi')) }}"
                  data-lppm-cms="struktur.staff.kristin.photo1"
                />
              </div>
              <h3 data-lppm-cms="struktur.staff.kristin.name">{{ \App\Models\PageContent::getValue('struktur.staff.kristin.name', 'Kristin Handayani,S.Si.,M.M.') }}</h3>
              <p class="org-role" data-lppm-cms="struktur.staff.kristin.role">{{ \App\Models\PageContent::getValue('struktur.staff.kristin.role', 'Chief Editor Jurnal Abdimas') }}</p>
            </article>

            {{-- Abdullah --}}
            <article class="org-card card">
              <span class="org-number" data-lppm-cms="struktur.staff.abdullah.label">{{ \App\Models\PageContent::getValue('struktur.staff.abdullah.label', 'Koordinator Bidang') }}</span>
              <div class="photo-rotator org-rotator">
                <img
                  class="photo-layer is-active"
                  alt="Data dan Sistem"
                  src="{{ asset(\App\Models\PageContent::getValue('struktur.staff.abdullah.photo1', 'assets/images/struktur-organisasi/foto81.JPG', 'image', 'struktur', 'Foto Abdullah: Tampilan Utama')) }}"
                  data-alt-src="{{ asset(\App\Models\PageContent::getValue('struktur.staff.abdullah.photo2', 'assets/images/struktur-organisasi/foto82.JPG', 'image', 'struktur', 'Foto Abdullah: Tampilan Hover/Rotasi')) }}"
                  data-lppm-cms="struktur.staff.abdullah.photo1"
                />
              </div>
              <h3 data-lppm-cms="struktur.staff.abdullah.name">{{ \App\Models\PageContent::getValue('struktur.staff.abdullah.name', 'Dr. Abdullah Rakhman') }}</h3>
              <p class="org-role" data-lppm-cms="struktur.staff.abdullah.role">{{ \App\Models\PageContent::getValue('struktur.staff.abdullah.role', 'Chief Editor Jurnal Manajemen') }}</p>
            </article>

            {{-- Yosafat --}}
            <article class="org-card card">
              <span class="org-number" data-lppm-cms="struktur.staff.yosafat.label">{{ \App\Models\PageContent::getValue('struktur.staff.yosafat.label', 'Koordinator Bidang') }}</span>
              <div class="photo-rotator org-rotator">
                <img
                  class="photo-layer is-active"
                  alt="Evaluasi dan Mutu"
                  src="{{ asset(\App\Models\PageContent::getValue('struktur.staff.yosafat.photo1', 'assets/images/struktur-organisasi/foto91.png', 'image', 'struktur', 'Foto Yosafat: Tampilan Utama')) }}"
                  data-alt-src="{{ asset(\App\Models\PageContent::getValue('struktur.staff.yosafat.photo2', 'assets/images/struktur-organisasi/foto92.png', 'image', 'struktur', 'Foto Yosafat: Tampilan Hover/Rotasi')) }}"
                  data-lppm-cms="struktur.staff.yosafat.photo1"
                />
              </div>
              <h3 data-lppm-cms="struktur.staff.yosafat.name">{{ \App\Models\PageContent::getValue('struktur.staff.yosafat.name', 'Yosafat Danis Murtiharso,S.Sn.,M.Sn.') }}</h3>
              <p class="org-role" data-lppm-cms="struktur.staff.yosafat.role">{{ \App\Models\PageContent::getValue('struktur.staff.yosafat.role', 'Chief Editor Jurnal Komunikasi dan Bisnis') }}</p>
            </article>
          </div>
        </div>
      </div>
    </section>
  </main>

  

  

  <script src="{{ asset('profil/struktur-organisasi.js') }}"></script>
@endsection