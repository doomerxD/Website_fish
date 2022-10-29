<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function(){
    Route::get('/', 'PostController@index');
    Route::post('/posts', 'PostController@store');
    Route::get('/posts/create', 'PostController@create');
    Route::get('/posts/{post}/result', 'ResultController@currentLocation')->name('result.currentLocation');
    Route::get('/posts/{post}', 'PostController@show');
    Route::post('/posts/create', 'PostController@upload');
    Route::delete('/posts/{post}', 'PostController@delete');
    Route::get('/posts/{post}/edit', 'PostController@edit');
    
    
});

Auth::routes();
