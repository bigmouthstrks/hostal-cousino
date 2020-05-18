<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// Mensajes //
Route::get('/mensajes/create','MensajeController@create')->name('mensajes.create');

// Vistas generales //
Route::get('/','FrontController@index')->name('front.index');
Route::get('/about','FrontController@about')->name('front.about');