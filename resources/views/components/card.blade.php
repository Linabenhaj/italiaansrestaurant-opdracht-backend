@props([
    'class' => '',
])

<div {{ $attributes->merge(['class' => "bg-white rounded-lg shadow p-6 {$class}"]) }}>
    @if (isset($header))
        <div class="border-b pb-2 mb-4 text-lg font-semibold">
            {{ $header }}
        </div>
    @endif

    <div>
        {{ $slot }}
    </div>
</div>
