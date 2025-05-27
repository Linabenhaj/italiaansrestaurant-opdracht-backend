@props([
    'name',
    'rows' => 4,
    'required' => false,
])

<textarea
    name="{{ $name }}"
    id="{{ $name }}"
    rows="{{ $rows }}"
    {{ $attributes->merge(['class' => 'w-full p-2 border rounded']) }}
    @if($required) required @endif
>{{ old($name) }}</textarea>
