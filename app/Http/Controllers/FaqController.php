<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategory;
use App\Models\Faq;

class FaqController extends Controller
{
    //publikee faq categorie pagina 
   public function publicIndex()
{
    $faqCategories = FaqCategory::with('faqs')->get();
    return view('faq.index', compact('faqCategories'));
}

    //nieuwe vragen inzendingen verwerkenn
    public function submit(Request $request)
    {
        $data = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question'        => 'required|string|max:255',
            'email'           => 'nullable|email',
            'name'            => 'nullable|string|max:100',
        ]);

        // Sla de ingestuurde vraag op zonder antwoord
        Faq::create($data);

        return back()->with('success', 'Bedankt! Je vraag is ontvangen en wordt binnenkort beantwoord.');
    }
}
