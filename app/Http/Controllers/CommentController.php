<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);

        $comment = $post->comments()->create([
            'message' => $request->input('message'),
            'user_id' => auth()->id(),
        ]);

        $post->user->notify(new NewCommentNotification([
            'post_id' => $post->id,
            'message' => $comment->message,
            'user_id' => $comment->user_id,
        ]));

        return response()->json(['message' => 'Comment added and notification sent.']);
    }
}
