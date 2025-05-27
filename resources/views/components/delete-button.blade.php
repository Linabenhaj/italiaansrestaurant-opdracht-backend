{{-- resources/views/components/delete-button.blade.php --}}
@props(['action'])

<form method="POST" action="{{ $action }}" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit"
            class="text-red-600 hover:underline bg-transparent border-none p-0 cursor-pointer">
        {{ $slot ?? 'Verwijderen' }}
    </button>
</form>
