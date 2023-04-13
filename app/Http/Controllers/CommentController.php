<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request){
        $validated = $request->validate([
            "comment_text" => 'required',
            'post_id' => 'required|exists:posts,id'
        ]);

        $post = Post::find($request->post_id);
        $comment = new Comment;
        $comment->comment_text = $validated['comment_text'];
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $post->id;
        $comment->save();
        return redirect()->back();
    }

    public function delete(Comment $comment){
        $comment->delete();
        return redirect()->back();
    }

}
