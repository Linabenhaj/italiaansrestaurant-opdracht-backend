<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Faq;
use App\Models\ContactMessage;
class AdminDashboardController extends Controller
{
    public function index()
    {
        $admin        = auth()->user();
        $userCount    = User::count();
        $pendingFaqs  = Faq::whereNull('answer')->count();
        $contactCount = ContactMessage::count();





        
        return view('admin.dashboard', compact(
            'admin',
            'userCount',
            'pendingFaqs',
            'contactCount'
        ));
    }
}
