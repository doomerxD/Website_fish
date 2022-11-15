<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    </head>
    <body>
        @extends('layouts.app')　

        @section('content')
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h2>釣果情報</h2>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        <div class="tool">
            <div class="tool__post">
                <h2>使用した道具</h2>
                <p>{{ $post->tool }}</p>    
            </div>
        </div>
        
        <div class="image">
            <h2>釣った魚の写真</h2>
            @foreach($post->images as $image)
            <img src="{{ $image->image_url }}"/>
            @endforeach
        </div>
        <h2>現在地</h2>
        <div id="map" style="height:500px">
        </div>
            <script>
                const lat = {{ $lat }};
                const lng = {{ $lng }};
            </script>
        
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/setLocation.js') }}"></script>
        <script src="{{ asset('/js/currentLocation.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{config('services.googlemap.token')}}&callback=initMap" async defer>
        </script>
        @endsection
        <div class="footer">
            <a href="/posts/{{ $post->id }}">戻る</a>
        </div>
    </body>
</html>