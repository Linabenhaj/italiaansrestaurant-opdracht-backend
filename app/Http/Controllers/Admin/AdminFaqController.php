<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\FaqCategory;

class AdminFaqController extends Controller
{
   public function index()
{
    // opgestuurde vragen (nog niet beantwoord)
    $pendingFaqs  = Faq::whereNull('answer')->with('category')->get();
    // beantwoorde vragen
    $answeredFaqs = Faq::whereNotNull('answer')->with('category')->get();
    // alle categorieën
    $categories   = FaqCategory::all();

    return view('admin.faq.index', compact('pendingFaqs','answeredFaqs','categories'));
}
    public function create()
    {
        $categories = FaqCategory::all();
        return view('admin.faq.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'question'        => 'required|string|max:255',
            'answer'          => 'nullable|string',
            'faq_category_id' => 'required|exists:faq_categories,id',
        ]);

        Faq::create($data);

        return redirect()->route('admin.faq.index')
                         ->with('success','Nieuwe vraag toegevoegd.');
    }

    public function edit(Faq $faq)
    {
        $categories = FaqCategory::all();
        return view('admin.faq.edit', compact('faq','categories'));
    }

    public function update(Request $request, Faq $faq)
    {
        $data = $request->validate([
            'question'        => 'required|string|max:255',
            'answer'          => 'nullable|string',
            'faq_category_id' => 'required|exists:faq_categories,id',
        ]);

        $faq->update($data);

        return redirect()->route('admin.faq.index')
                         ->with('success','Vraag bijgewerkt.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faq.index')
                         ->with('success','Vraag verwijderd.');
    }
}
