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
  <script>
    (function() {
      try {
        var preloader = document.getElementById('sitePreloader');
        if (!preloader) return;

        // Detect if current page load is a reload / refresh
        var navEntries = (window.performance && performance.getEntriesByType) ? performance.getEntriesByType('navigation') : [];
        var navType = navEntries.length > 0 ? navEntries[0].type : '';
        var legacyReload = (window.performance && window.performance.navigation && window.performance.navigation.type === 1);
        var isReload = (navType === 'reload' || legacyReload);
        var hasSeen = sessionStorage.getItem('lppm_preloader_seen');

        // Only show on first visit of the session OR on manual refresh (F5 / reload)
        // If it's normal internal page navigation, hide immediately without flashing
        if (hasSeen && !isReload) {
          preloader.style.display = 'none';
          return;
        }

        // Mark as seen for current browser session
        sessionStorage.setItem('lppm_preloader_seen', '1');

        var dismissed = false;
        function dismissPreloader() {
          if (dismissed) return;
          dismissed = true;
          preloader.classList.add('is-hidden');
          setTimeout(function() {
            preloader.style.display = 'none';
          }, 700);
        }

        // Click anywhere on preloader to dismiss immediately if desired
        preloader.addEventListener('click', dismissPreloader);

        // Preloader duration: slightly longer (~1.8 seconds) as requested
        setTimeout(dismissPreloader, 1800);
      } catch (e) {
        var el = document.getElementById('sitePreloader');
        if (el) el.style.display = 'none';
      }
    })();
  </script>

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
</body>

</html>
