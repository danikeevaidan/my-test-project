<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admins-with-posts', [UserController::class, 'adminsWithPublishedPosts']);
Route::resource('posts', PostController::class);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show'])
    ->middleware('log.post.view')
    ->name('posts.show');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
