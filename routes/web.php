<?php

use Illuminate\Support\Facades\Route;

// Testimonios //
Route::get('/testimonios/index','TestimonioController@index')->name('testimonios.index');

// Habitaciones //
Route::get('/habitaciones/create','HabitacionController@create')->name('habitaciones.create');
Route::get('/habitaciones/index','HabitacionController@index')->name('habitaciones.index');
Route::post('/habitaciones','HabitacionController@store')->name('habitaciones.store');
Route::get('/habitaciones/{habitacion}','HabitacionController@show')->name('habitaciones.show');
Route::get('/habitaciones/{habitacion}/edit','HabitacionController@edit')->name('habitaciones.edit');
Route::delete('/habitaciones/{habitacion}','HabitacionController@destroy')->name('habitaciones.destroy');
Route::put('habitaciones/{habitacion}','HabitacionController@update')->name('habitaciones.update');

// Reservas //
Route::get('/reservas/create','ReservaController@create')->name('reservas.create');
Route::get('/reservas/index','ReservaController@index')->name('reservas.index');
Route::post('/reservas','ReservaController@store')->name('reservas.store');
Route::get('/reservas/{reserva}', 'ReservaController@show')->name('reservas.show');
Route::get('/reservas/{reserva}/edit','ReservaController@edit')->name('reservas.edit');

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
Route::get('usuarios/{usuario}/edit','UsuarioController@edit')->name('usuario.edit');

Route::get('create/funcionario', 'UsuarioController@create_funcionario')->name('create.funcionario');
Route::post('funcionario','UsuarioController@store_funcionario')->name('funcionario.store');
