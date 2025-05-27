<form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <label for="pizza_id">Kies een pizza:</label>
    <select name="pizza_id" id="pizza_id" required>
        @foreach($pizzas as $pizza)
            <option value="{{ $pizza->id }}">{{ $pizza->name }}</option>
        @endforeach
    </select>

    <label for="aantal">Aantal:</label>
    <input type="number" name="aantal" min="1" required>

    <button type="submit">Bestellen</button>
</form>
