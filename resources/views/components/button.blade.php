@props([
    'type'  => 'button',
    'color' => 'primary', // primary | secondary | danger
])

@php
    $classes = match($color) {
        'secondary' => 'bg-gray-300 text-gray-800 hover:bg-gray-400',
        'danger'    => 'bg-red-600 text-white hover:bg-red-700',
        default     => 'bg-red-800 text-white hover:bg-red-900',
    };
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => "px-4 py-2 rounded {$classes} transition"]) }}
>
    {{ $slot }}
</button>
