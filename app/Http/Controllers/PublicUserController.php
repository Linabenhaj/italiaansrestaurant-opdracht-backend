<?php

namespace App\Http\Controllers;

use App\Models\User;

class PublicUserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('username')->get();
        return view('users.index', compact('users'));
    }
}
