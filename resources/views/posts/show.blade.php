<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        @extends('layouts.app')　

        @section('content')
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        <div id="map" style="height:500px">
        </div>
        {!! Form::open(['route' => ['result.currentLocation',$post->id],'method' => 'get']) !!}
        {!! Form::hidden('lat','lat',['class'=>'lat_input']) !!}
        {!! Form::hidden('lng','lng',['class'=>'lng_input']) !!}
        {!! Form::submit("周辺を表示", ['class' => "btn btn-success btn-block",'disabled']) !!}
        {!! Form::close() !!}
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/setLocation.js') }}"></script>
        <script src="{{ asset('/js/result.js') }}"></script>
        <script src="{{ asset('/js/getLatLng.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{config('services.googlemap.token')}}&callback=initMap" defer>
        </script>
        <span id="lat" data-name="{{ $post->lat}}"></span>
        <span id="lng" data-name="{{ $post->lng }}"></span>
        @foreach($post->images as $image)
        <img src="{{ $image->image_url }}"/>
        @endforeach
        @endsection
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">投稿内容を編集する</a>]</p>
        
        <form action="/posts/{{ $post->id }}" id="form_delete" method="post">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <input type="submit" style="display:none">
            <p class='delete'>[<span onclick="return deletePost(this);">delete</span>]</p>
            
        </form>
        <script>
        function deletePost(e){
            'use strict';
            if (confirm('削除すると復元出来ません。\n本当に削除しますか？')){
                document.getElementById('form_delete').submit();
            }
        }
        </script>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
