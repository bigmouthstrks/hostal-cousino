<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// Testimonios //
Route::get('/testimonios/index','TestimonioController@index')->name('testimonios.index');

// Habitaciones //
Route::get('/habitaciones/create','HabitacionController@create')->name('habitaciones.create');
Route::get('/habitaciones/index','HabitacionController@index')->name('habitaciones.index');
Route::post('/habitaciones','HabitacionController@store')->name('habitaciones.store');
Route::get('/habitaciones/{habitacion}','HabitacionController@show')->name('habitaciones.show');
Route::get('/habitaciones/{habitacion}/edit','HabitacionController@edit')->name('habitaciones.edit');
Route::delete('/habitaciones/{habitacion}','HabitacionController@destroy')->name('habitaciones.destroy');

// Reservas //
Route::get('/reservas/create','ReservaController@create')->name('reservas.create');

// Mensajes //
Route::get('/mensajes/create','MensajeController@create')->name('mensajes.create');

// Vistas generales //
Route::get('/','FrontController@index')->name('front.index');
Route::get('/about','FrontController@about')->name('front.about');
Route::get('/rooms','FrontController@rooms')->name('front.rooms');
Route::get('/services','FrontController@services')->name('front.services');

// Usuario //
Route::view('login', 'usuario.login')->name('login');
Route::get('create/usuario','UsuarioController@create')->name('create.usuario');
Route::post('usuario','UsuarioController@store')->name('usuario.store');
Route::post('login/usuario', 'UsuarioController@login')->name('login.usuario');
Route::get('logout/usuario','UsuarioController@logout')->name('logout.usuario');
