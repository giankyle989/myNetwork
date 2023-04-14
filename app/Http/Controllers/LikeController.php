<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //

    public function toggle(Request $request)
    {
        $like = Like::where('user_id', auth()->user()->id)
                    ->where('post_id', $request->post_id)
                    ->first();
    
        if ($like) {
            if ($like->status == 'liked') {
                $like->delete();
            } else {
                $like->status = 'liked';
                $like->save();
            }
        } else {
            $like = new Like;
            $like->user_id = auth()->user()->id;
            $like->post_id = $request->post_id;
            $like->status = 'liked';
            $like->save();
        }
    
        return back();
    }

}
