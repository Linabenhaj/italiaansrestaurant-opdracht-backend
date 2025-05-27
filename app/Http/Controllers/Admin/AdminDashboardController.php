<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Faq;
use App\Models\ContactMessage; 
use App\Models\Order;        

class AdminDashboardController extends Controller
{
    public function index()
{
    $admin = auth()->user();

    return view('admin.dashboard', [
        'admin' => $admin,
        'userCount' => User::count(),
        'pendingFaqs' => Faq::where('status', 'pending')->count(),
        'contactCount' => ContactMessage::count(),
        'orderCount' => Order::count(),
    ]);
}

}

//optellen van de zaken die er nog te doen zijn voor de admin op de dashboard via count
