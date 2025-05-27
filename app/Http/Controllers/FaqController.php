<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Toont de publieke FAQ-pagina.
     */
    public function publicIndex()
    {
        // Haal categorieën + bijbehorende faqs op
        $faqCategories = FaqCategory::with('faqs')->get();

        return view('faq.index', compact('faqCategories'));
    }

    //Verwerkt een ingestuurde vraag
     
    public function submit(Request $request)
    {
        $data = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question'        => 'required|string|min:5|max:500',
        ]);


        return redirect()
            ->route('faq.public')
            ->with('success', 'Bedankt! Je vraag is ontvangen en wordt beoordeeld.');
    }
}
