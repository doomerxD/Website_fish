<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function(){
    Route::get('/', 'PostController@index');
    Route::post('/posts', 'PostController@store');
    Route::get('/posts/create', 'PostController@create');
    Route::post('/posts/{post}/likes', 'LikeController@store')->name('likes');
    Route::post('/posts/{post}/unlikes', 'LikeController@destroy')->name('unlikes');  
    Route::get('/posts/{post}/result', 'ResultController@currentLocation')->name('result.currentLocation');
    Route::get('/posts/{post}', 'PostController@show');
    Route::get('/posts/{post}/edit', 'PostController@edit');
    Route::put('/posts/{post}', 'PostController@update');
    Route::post('/posts/create', 'PostController@upload');
    Route::delete('/posts/{post}', 'PostController@delete');
    
    
});

Auth::routes();
