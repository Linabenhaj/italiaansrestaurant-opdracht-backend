@props(['type' => 'submit', 'color' => 'primary', 'href' => null])

@php
  $base = 'inline-block px-4 py-2 rounded font-semibold text-sm';
  $colors = [
    'primary' => 'bg-red-800 hover:bg-red-900 text-white',
    'danger' => 'bg-red-600 hover:bg-red-700 text-white',
    'secondary' => 'bg-gray-500 hover:bg-gray-600 text-white',
  ];
  $finalClass = $base . ' ' . ($colors[$color] ?? $colors['primary']);
@endphp

@if ($href)
  <a href="{{ $href }}"
     {{ $attributes->merge(['class' => $finalClass]) }}>
    {{ $slot }}
  </a>
@else
  <button type="{{ $type }}"
          {{ $attributes->merge(['class' => $finalClass]) }}>
    {{ $slot }}
  </button>
@endif
