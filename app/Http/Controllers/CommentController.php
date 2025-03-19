<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{

    public function store(Request $request, Post $post) {

        $request->validate([
            'content' => 'required|string'
        ]);

         $data = [
            'content'=> $request->content,
            'post_id'=> $post->id,
            'user_id'=> Auth::id(),
        ];

        Comment::create($data);

        return redirect()->route('comments.index')->with('success', 'Comment created successfully.');
    }

    public function destroy($id)
    {
        // $comment = Comment::find($id);
        // $comment->delete();
    }
}
