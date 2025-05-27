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
        $categories = FaqCategory::all();
        $pendingFaqs = Faq::whereNull('answer')->get();
        $answeredFaqs = Faq::whereNotNull('answer')->get();

        return view('admin.faq.index', compact('categories', 'pendingFaqs', 'answeredFaqs'));
    }

    public function create()
    {
        $categories = FaqCategory::all(); 
        return view('admin.faq.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question'        => 'required|string|max:255',
            'answer'          => 'nullable|string',
        ]);
        Faq::create($data);




        return redirect()->route('admin.faq.index')->with('success', 'Nieuwe vraag toegevoegd.');
    }

    public function edit(Faq $faq)
    {
        $categories = FaqCategory::all();
        return view('admin.faq.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, Faq $faq)
    {
        $data = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question'        => 'required|string|max:255',
            'answer'          => 'nullable|string',
        ]);

        $faq->update($data);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ bijgewerkt.');
    }

    public function destroy(Faq $faq)

    
    {
        $faq->delete();

        return redirect()->route('admin.faq.index')->with('success', 'FAQ verwijderd.');
    }
}
