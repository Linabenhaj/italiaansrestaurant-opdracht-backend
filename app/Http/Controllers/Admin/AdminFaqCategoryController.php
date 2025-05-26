<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaqCategory;

class AdminFaqCategoryController extends Controller
{

    public function index()
    {
        $categories = FaqCategory::all();
        return view('admin.faq-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.faq-categories.create');
    }


   public function store(Request $request)
{
    $request->validate(['name' => 'required|string|max:255']);

    FaqCategory::create(['name' => $request->name]);

    // Redirect naar admin.faq.index
    return redirect()
        ->route('admin.faq.index')
        ->with('success', 'Categorie toegevoegd.');
}


   //categoriën bewerken 
    public function edit(FaqCategory $faqCategory)
    {
        return view('admin.faq-categories.edit', compact('faqCategory'));
    }

    //update van bewerkte catgeoriën
    public function update(Request $request, FaqCategory $faqCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $faqCategory->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('admin.faq-categories.index')
            ->with('success', 'Categorie bijgewerkt.');
    }

    //verwijder een categorie
     public function destroy(FaqCategory $faqCategory)
    {
        $faqCategory->delete();

        // Daarna redirect naar 
        return redirect()
            ->route('admin.faq.index')
            ->with('success', 'Categorie verwijderd.');
    }
}
