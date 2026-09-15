@php
  $jsonPath = public_path('dosen/dosen-data.json');
  $dosenList = [];
  if (file_exists($jsonPath)) {
      $allDosen = json_decode(file_get_contents($jsonPath), true) ?? [];
      $dosenList = array_values(array_filter($allDosen, function($d) use ($prodiArray) {
          return in_array($d['prodi'] ?? '', $prodiArray);
      }));
  }

  function getDosenInitials($name) {
      $clean = preg_replace('/(Prof\.|Dr\.|Ir\.|Drs\.|Dra\.)/i', '', $name);
      if (str_contains($clean, ',')) {
          $clean = explode(',', $clean)[0];
      }
      $parts = array_values(array_filter(explode(' ', trim($clean))));
      if (count($parts) >= 2) {
          return strtoupper(substr($parts[0], 0, 1) . substr($parts[1], 0, 1));
      } elseif (count($parts) === 1) {
          return strtoupper(substr($parts[0], 0, 2));
      }
      return 'DS';
  }
@endphp

@push('meta')
<meta name="description" content="Direktori Akademisi, Dosen, dan Peneliti {{ $prodiName }} LPPM Institut Bisnis dan Informatika Kwik Kian Gie (IBI KKG). Informasi riset, publikasi, dan kepakaran akademik." />
<meta name="keywords" content="Dosen {{ $prodiName }}, Peneliti {{ $prodiName }}, LPPM IBI KKG, Riset Kwik Kian Gie, Akademisi IBIKKG" />
<meta property="og:title" content="Akademisi {{ $prodiName }} | LPPM IBI KKG" />
<meta property="og:description" content="Direktori Akademisi dan Peneliti {{ $prodiName }} LPPM Institut Bisnis dan Informatika Kwik Kian Gie." />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ request()->url() }}" />
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ItemList",
  "name": "Dosen dan Peneliti {{ $prodiName }} LPPM IBI Kwik Kian Gie",
  "description": "Daftar akademisi dan peneliti prodi {{ $prodiName }} Institut Bisnis dan Informatika Kwik Kian Gie",
  "itemListElement": [
    @foreach($dosenList as $idx => $d)
    {
      "@type": "ListItem",
      "position": {{ $idx + 1 }},
      "item": {
        "@type": "Person",
        "name": "{{ e($d['nama'] ?? '') }}",
        "jobTitle": "Dosen {{ e($d['prodi'] ?? '') }}",
        "worksFor": {
          "@type": "EducationalOrganization",
          "name": "Institut Bisnis dan Informatika Kwik Kian Gie"
        },
        "knowsAbout": "{{ e($d['keahlian'] ?? '-') }}"
      }
    }@if(!$loop->last),@endif
    @endforeach
  ]
}
</script>
@endpush

<div class="dosen-grid">
  @foreach($dosenList as $d)
    @php
      $nama = $d['nama'] ?? '';
      $prodi = $d['prodi'] ?? '';
      $keahlian = $d['keahlian'] ?? '-';
      $gsUser = $d['gsUser'] ?? '';
      $initials = getDosenInitials($nama);
    @endphp
    <article class="dosen-card card reveal" data-name="{{ strtolower($nama) }}" data-keahlian="{{ strtolower($keahlian) }}">
      <span class="dosen-badge">{{ $prodi }}</span>
      <div class="dosen-photo-wrap">
        <div class="dosen-rotator">
          @if(!empty($gsUser))
            <img class="dosen-photo is-active" src="https://scholar.googleusercontent.com/citations?view_op=medium_photo&user={{ $gsUser }}" alt="{{ $nama }}" onerror="this.style.display='none'; if(this.nextElementSibling) this.nextElementSibling.style.display='flex';" />
            <div class="dosen-avatar-placeholder" style="display:none;">{{ $initials }}</div>
          @else
            <div class="dosen-avatar-placeholder">{{ $initials }}</div>
          @endif
        </div>
      </div>
      <h3>{{ $nama }}</h3>
      <p class="dosen-role">{{ $prodi }}</p>
      <p class="dosen-meta"><i class="fa-solid fa-microscope"></i> {{ $keahlian }}</p>
      @if(!empty($gsUser))
        <a href="https://scholar.google.com/citations?user={{ $gsUser }}&hl=en" target="_blank" rel="noopener noreferrer" class="dosen-gs-link">
          <i class="fa-solid fa-graduation-cap"></i> Google Scholar
        </a>
      @endif
    </article>
  @endforeach
</div>
