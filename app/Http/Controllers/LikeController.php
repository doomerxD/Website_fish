<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{ 
    public function store(Post $post)
    {
        $post->users()->attach(Auth::id());

        return redirect()->route('posts.index');
    }



    public function destroy(Post $post)
    {
        $post->users()->detach(Auth::id());

        return redirect()->route('posts.index');
    }
}

