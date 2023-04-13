<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post(Request $request){
        $validated = $request->validate([
            "body" => ['required']
        ]);

        $post = new Post;
        $post->body = $validated['body'];
        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect()->back();
    }

    public function delete(Post $post){
        $post->post_comment()->delete(); //This deletes the comment
        $post->delete(); //This deletes the
        return redirect()->back();
    }
}
