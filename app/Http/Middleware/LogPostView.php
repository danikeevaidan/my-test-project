<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogPostView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->route('post')) {
            $user = Auth::user();
            $postId = $request->route('post')->id;

            $username = $user ? $user->name : 'Guest';
            Log::info("Post ID $postId viewed by: $username");
        }

        return $next($request);
    }
}
