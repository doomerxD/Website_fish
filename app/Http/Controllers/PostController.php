<?php

namespace App\Http\Controllers;

use App\Post;
use App\Image;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cloudinary;


class PostController extends Controller
{ 
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateBylimit()]);
    }
    
    public function show(Post $post, Image $image)
    { 
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create()
    {
        return view('posts/create');
    }
    
    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }

    public function store(PostRequest $request, Post $post, Image $image)
    {   
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $post->fill($input)->save();
        $image->post_id = $post->id;
        $image->image_url = $image_url;
        $image->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function upload(Request $request)
    {
        $dir = 'sample';
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/' . $dir, $file_name);
        
        $image = new Image();
        $image->name = $file_name;
        $image->path = 'storage/' . $dir . '/' . $file_name;
        $image->save();
        
        return redirect('/');
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
}

   