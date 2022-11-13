@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>釣果情報</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST"　enctype="multipart/form-data"id=place>
                @csrf
                @method('PUT')
                <div class='content__title'>
                    <h2>題名</h2>
                    <input type='text' name='post[title]' value="{{ $post->title }}">
                </div>
                <div class='content__body'>
                    <h2>釣果情報</h2>
                    <input type='text' name='post[body]' value="{{ $post->body }}">
                </div>
                <input  type="file" name="post[image]" value="{{$post->image}}"> 
                <div class='tool__body'>
                    <h2>使用した道具</h2>
                    <input type='text' name='post[tool]' value="{{ $post->tool }}">
                </div>
                <div class="address__body">
                    <h2>住所</h2>
                    <textarea name="post[address]" id="addressInput"></textarea>
                </div>
                <input type="hidden" id="lat" name='post[lat]'>
                <input type="hidden" id="lng" name='post[lng]'>
            </form>
        </div>
        <button id="searchGeo">投稿</button>
        <div class="back">[<a href="/">戻る</a>]</div>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/setLocation.js') }}"></script>
        <script src="{{ asset('/js/result.js') }}"></script>
        <script src="{{ asset('/js/getLatLng.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{config('services.googlemap.token')}}&callback=initMap" defer>
        </script>
    </body>
</html>
@endsection