<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Jobs\DeactivateOldPostsJob;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        return PostResource::collection($posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'message' => $request->message,
            'active' => true,
        ]);

        event(new PostCreated($post));

        return response()->json(['message' => 'Post created and subscribers notified!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        if (Gate::allows('update', $post)) {
            $post->update($request->only(['title', 'message']));
            return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
        }

        abort(403, 'Unauthorized action.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (Gate::allows('delete', $post)) {
            $post->delete();
            return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
        }

        abort(403, 'Unauthorized action.');
    }


    public function deactivateOldPosts()
    {
        DeactivateOldPostsJob::dispatch();
        return response()->json(['message' => 'Job dispatched!']);
    }
}
