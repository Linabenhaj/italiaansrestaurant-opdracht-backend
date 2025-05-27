{{-- resources/views/components/label.blade.php --}}
@props(['for', 'value'])

<label for="{{ $for }}" {{ $attributes->merge(['class' => 'block text-sm font-semibold mb-1 text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
