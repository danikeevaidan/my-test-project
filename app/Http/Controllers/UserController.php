<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['posts' => function ($query) {
            $query->withCount('views');
        }])->get();

        return view('users.index', compact('users'));
    }
    public function adminsWithPublishedPosts()
    {
        $adminsWithPublishedPosts = User::where('role', 'admin')
            ->whereHas('posts', function ($query) {
                $query->where('active', true);
            })
            ->get();
        foreach ($adminsWithPublishedPosts as $admin) {
            echo "Admin: {$admin->name}, Email: {$admin->email}" . PHP_EOL;
        }
        return response()->json($adminsWithPublishedPosts);
    }
}
