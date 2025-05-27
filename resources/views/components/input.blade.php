@props([
    'type' => 'text',
    'name',
    'id' => $name,
    'value' => '',
])

<input
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $id }}"
    value="{{ old($name, $value) }}"
    {{ $attributes->merge([
        'class' => 'border-gray-300 focus:border-red-800 focus:ring-red-800 rounded-md shadow-sm w-full p-2'
    ]) }}
/>
