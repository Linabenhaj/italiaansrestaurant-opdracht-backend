<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pizza;
use Illuminate\Support\Facades\Storage;

class PizzaController extends Controller
{
    public function index()
    {
        $pizzas = Pizza::latest()->paginate(10);
        return view('admin.pizzas.index', compact('pizzas'));
    }

    public function create()
    {
        return view('admin.pizzas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image_path' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('pizza_images', 'public');
        }

        Pizza::create($data);

        return redirect()->route('admin.pizzas.index')->with('success', 'Pizza toegevoegd!');
    }

    public function edit(Pizza $pizza)
    {
        return view('admin.pizzas.edit', compact('pizza'));
    }

    public function update(Request $request, Pizza $pizza)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image_path' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            // Verwijder oude afbeelding indien aanwezig
            if ($pizza->image_path) {
                Storage::disk('public')->delete($pizza->image_path);
            }
            $data['image_path'] = $request->file('image_path')->store('pizza_images', 'public');
        }

        $pizza->update($data);

        return redirect()->route('admin.pizzas.index')->with('success', 'Pizza bijgewerkt!');
    }

    public function destroy(Pizza $pizza)
    {
        if ($pizza->image_path) {
            Storage::disk('public')->delete($pizza->image_path);
        }

        $pizza->delete();

        return redirect()->route('admin.pizzas.index')->with('success', 'Pizza verwijderd.');
    }
}
