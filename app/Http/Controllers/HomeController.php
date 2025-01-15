<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('home', compact('users'));
    }
}
