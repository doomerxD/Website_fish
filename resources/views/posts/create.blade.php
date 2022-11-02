@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>釣果情報</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data"id=place>
            @csrf
            <div class="title">
                <h2>題名</h2>
                <input type="text" name="post[title]" placeholder="題名を入力してください"/>
            </div>
            <div class="body">
                <h2>釣果情報</h2>
                <textarea name="post[body]" placeholder="釣果情報を入力してください"></textarea>
            </div>
            <div class="tool">
                <h2>使用した道具</h2>
                <textarea name="post[tool]" placeholder="使用した道具を入力してください。"></textarea>
            </div>
            <input  type="file" name="image"> 
            <div class="adress">
                <h2>住所</h2>
                <textarea name="post[address]" placeholder="釣った場所を入力してください。" id="addressInput"></textarea>
            </div>
            <input type="hidden" id="lat" name='post[lat]'>
            <input type="hidden" id="lng" name='post[lng]'>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
        <button id="searchGeo">緯度経度変換</button>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/setLocation.js') }}"></script>
        <script src="{{ asset('/js/result.js') }}"></script>
        <script src="{{ asset('/js/getLatLng.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{config('services.googlemap.token')}}&callback=initMap" defer>
        </script>
    </body>
</html>
@endsection