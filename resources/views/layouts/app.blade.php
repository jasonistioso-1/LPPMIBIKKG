<!doctype html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="referrer" content="no-referrer" />
  <title>@yield('title', 'LPPM IBI KKG')</title>
  @stack('meta')
  <link rel="icon" type="image/png" href="{{ asset('assets/logo_ibinew_biru.png') }}" />
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/logo_ibinew_biru.png') }}" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('assets/css/shared.css') }}?v={{ file_exists(public_path('assets/css/shared.css')) ? filemtime(public_path('assets/css/shared.css')) : time() }}" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ file_exists(public_path('css/style.css')) ? filemtime(public_path('css/style.css')) : time() }}" />
  @stack('styles')
</head>

<body data-root="">
  {{-- Global Preloader Splash Screen --}}
  <div id="sitePreloader" class="site-preloader" aria-hidden="true">
    <div class="preloader-content">
      <div class="preloader-logo-wrapper">
        <div class="preloader-glow"></div>
        <img src="{{ asset('assets/logo_ibinew_biru.png') }}" alt="Logo LPPM IBI KKG" class="preloader-logo" />
      </div>
      <div class="preloader-text">
        <h2 class="preloader-title">LPPM IBI KWIK KIAN GIE</h2>
        <p class="preloader-subtitle">Lembaga Penelitian dan Pengabdian kepada Masyarakat</p>
      </div>
      <div class="preloader-bar-wrap">
        <div class="preloader-bar"></div>
      </div>
    </div>
  </div>

  <div class="bg-glow glow-1 parallax-item"></div>
  <div class="bg-glow glow-2 parallax-item"></div>

  <div id="shared-navbar">
    @include('components.navbar')
  </div>

  <main>
    @yield('content')
  </main>

  <div id="shared-footer">
    @include('components.footer')
  </div>

  <script src="{{ asset('main.js') }}?v={{ time() }}"></script>
  @stack('scripts')

  {{-- Global Visual Inline Editor Engine (Loaded only if logged in) --}}
  @if(auth()->check())
    <script>
      window.LPPM_CMS_AUTH = true;
      window.LPPM_CMS_USER = "{{ auth()->user()->username }}";
      window.LPPM_CMS_CONTENT = @json(\App\Models\PageContent::all()->keyBy('key'));
      window.LPPM_CMS_MENUS = @json(\App\Models\Menu::orderBy('order')->get());
    </script>
    <script src="{{ asset('js/visual-editor.js') }}?v={{ time() }}"></script>
  @endif
  {{-- Global Image Zoom Lightbox Modal --}}
  <div class="image-lightbox" id="imageLightboxModal" aria-hidden="true">
    <div class="image-lightbox-backdrop" id="imageLightboxBackdrop"></div>
    <div class="image-lightbox-dialog">
      <button type="button" class="image-lightbox-close" id="imageLightboxClose" aria-label="Tutup Zoom Gambar">
        &times;
      </button>
      <div class="image-lightbox-body">
        <img id="imageLightboxImg" src="" alt="Zoomed view" />
        <div class="image-lightbox-caption" id="imageLightboxCaption"></div>
      </div>
    </div>
  </div>
  {{-- Preloader Dismissal Handler --}}
  <script>
    (function() {
      var preloader = document.getElementById('sitePreloader');
      if (!preloader) return;

      var hidden = false;
      function dismiss() {
        if (hidden) return;
        hidden = true;
        preloader.classList.add('is-hidden');
        setTimeout(function() {
          preloader.style.display = 'none';
        }, 550);
      }

      if (document.readyState === 'complete') {
        setTimeout(dismiss, 600);
      } else {
        window.addEventListener('load', function() {
          setTimeout(dismiss, 600);
        });
      }

      // Maximum fallback safety timeout (2.5s)
      setTimeout(dismiss, 2500);
    })();
  </script>
</body>

</html>
