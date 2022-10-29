<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class ResultController extends Controller
{ 
    public function currentLocation(Request $request,Post $post)
    {
        $lat = $request->lat;
        $lng = $request->lng;
        
        return view('posts/currentLocation', [
            'lat' => $lat,
            'lng' => $lng,
            'post' =>$post,
        ]);
    }
}
