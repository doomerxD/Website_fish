@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <h1>釣果情報</h1>
        <p class='create'>[<a href='/posts/create'>釣果情報を作成する</a>]</p>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <div class="card-body">
            <h5 class="card-title">タイトル：{{ $post->title }}</h5>
            <p class="card-text">内容：{{ $post->body }}</p>
            <p class="card-text">投稿者：{{ $post->user->name }}</p>
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <form action="">
                        <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                    </form>
                </div>
                <div class="col-md-3">
                    <form action="">
                        <input type="submit" value="&#xf164;いいね取り消す" class="fas btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection