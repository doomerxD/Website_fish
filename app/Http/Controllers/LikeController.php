<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{ 
    public function store(Post $post,Like $like)
    {
        $like->post_id = $post->id;
        $like->user_id = Auth::id();
        $like->save();


        return redirect("/posts/".$post->id);
    }



    public function destroy(Post $post)
    {
        $post->likes()->where('user_id', Auth::id())->delete();

        return redirect("/posts/".$post->id);
    }
}

