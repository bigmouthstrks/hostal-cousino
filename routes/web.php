<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

//Mantenedor de testimonios //
Route::get('/testimonio/index','TestimonioController@index')->name('testimonios.index');

// Mantenedor de habitaciones //
Route::get('/habitacion/create','HabitacionController@create')->name('habitaciones.create');
Route::get('/habitacion/index','HabitacionController@index')->name('habitaciones.index');

// Reservas //
Route::get('/reservas/create','ReservaController@create')->name('reservas.create');

// Mensajes //
Route::get('/mensajes/create','MensajeController@create')->name('mensajes.create');

// Vistas generales //
Route::get('/','FrontController@index')->name('front.index');
Route::get('/about','FrontController@about')->name('front.about');
Route::get('/rooms','FrontController@rooms')->name('front.rooms');
Route::get('/services','FrontController@services')->name('front.services');