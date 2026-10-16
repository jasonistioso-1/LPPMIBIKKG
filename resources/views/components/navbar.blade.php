<header class="topbar">
  <div class="container topbar-inner">
    <div class="topbar-left">
      <span>Lembaga Penelitian dan Pengabdian kepada Masyarakat</span>
    </div>
    <div class="topbar-right">
      <span>Institut Bisnis dan Informatika Kwik Kian Gie</span>
    </div>
  </div>
</header>

<header class="site-header" id="navbarWrap">
  <div class="container header-container">
    <a href="{{ route('home') }}" class="header-logo" aria-label="Beranda LPPM IBI KKG">
      <img src="{{ asset('assets/logo_ibinew_biru.png') }}" alt="Logo IBI KKG" />
    </a>

    <nav class="header-nav" id="navMenu" aria-label="Navigasi utama">
      @foreach (\App\Models\Menu::whereNull('parent_id')->with('children')->orderBy('order')->get() as $menu)
        @if ($menu->children->isEmpty())
          <div class="nav-item no-dropdown">
            <a href="{{ $menu->route_name ? (Route::has($menu->route_name) ? route($menu->route_name) : '#') : ($menu->url ?? '#') }}" class="nav-link" {!! !empty($menu->url) && preg_match('/^https?:\/\//i', $menu->url) ? 'target="_blank" rel="noopener noreferrer"' : '' !!}>
              {{ $menu->name }}
            </a>
          </div>
        @else
          <div class="nav-item">
            <a href="{{ $menu->route_name ? (Route::has($menu->route_name) ? route($menu->route_name) : '#') : ($menu->url ?? '#') }}" class="nav-link">
              <span>{{ $menu->name }}</span>
              <i class="fa-solid fa-chevron-down nav-chevron"></i>
            </a>
            <div class="nav-dropdown">
              @foreach ($menu->children as $child)
                <a href="{{ $child->route_name ? (Route::has($child->route_name) ? route($child->route_name) : '#') : ($child->url ?? '#') }}" class="submenu-item" {!! !empty($child->url) && preg_match('/^https?:\/\//i', $child->url) ? 'target="_blank" rel="noopener noreferrer"' : '' !!}>
                  <span class="submenu-text">{{ $child->name }}</span>
                  <i class="fa-solid fa-arrow-right-long submenu-arrow"></i>
                </a>
              @endforeach
            </div>
          </div>
        @endif
      @endforeach
    </nav>

    <button class="menu-toggle" id="menuToggle" aria-label="Buka menu navigasi">
      ☰
    </button>
  </div>
</header>
