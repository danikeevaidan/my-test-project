<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/posts', [PostController::class, 'index']);
Route::get('/deactivate-old-posts', [PostController::class, 'deactivateOldPosts']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->get('/check-token', [AuthController::class, 'checkToken']);
Route::middleware('auth:api')->post('/logout', [AuthController::class, 'logout']);