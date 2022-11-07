@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>釣果情報</h1>
        <p class='create'>[<a href='/posts/create'>create</a>]</p>
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