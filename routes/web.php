<?php

use Illuminate\Support\Facades\Route;

Route::get('/posts', 'PostController@index');
Route::get('/', 'PostController@index');