@props(['href', 'color' => 'primary'])

@php
  $base = 'inline-block px-4 py-2 rounded font-semibold text-sm text-white';
  $colors = [
    'primary' => 'bg-red-800 hover:bg-red-900',
    'secondary' => 'bg-gray-500 hover:bg-gray-600',
    'danger' => 'bg-red-600 hover:bg-red-700',
  ];
@endphp

<a href="{{ $href }}"
   {{ $attributes->merge([
       'class' => $base . ' ' . (isset($colors[$color]) ? $colors[$color] : $colors['primary'])
   ]) }}>
    {{ $slot }}
</a>
