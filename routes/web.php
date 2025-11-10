<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lucas', 'App\Http\Controllers\LucasController@index');
Route::get('/lucas_criar', 'App\Http\Controllers\LucasController@store');
