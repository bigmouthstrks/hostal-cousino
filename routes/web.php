<?php

use Illuminate\Support\Facades\Route;

// Testimonios //
Route::get('/testimonios/index','TestimonioController@index')->name('testimonios.index');
Route::get('/testimonios/create','TestimonioController@create')->name('testimonios.create');
Route::post('/testimonios','TestimonioController@store')->name('testimonios.store');
Route::get('/testimonios/{testimonio}','TestimonioController@show')->name('testimonios.show');

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
Route::post('/mensajes','MensajeController@send')->name('mensajes.send');

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
Route::get('usuarios/{usuario}/edit','UsuarioController@edit')->name('usuarios.edit');
Route::put('usuarios/{usuario}','UsuarioController@update')->name('usuarios.update');

// Funcionarios //
Route::get('/create/funcionario', 'UsuarioController@create_funcionario')->name('create.funcionario');
Route::post('funcionario','UsuarioController@store_funcionario')->name('funcionario.store');

// Informes //
Route::get('/informes','InformeController@index')->name('informes.index');
Route::post('/informes/create_mensual','InformeController@create_mensual')->name('informe.create_mensual');
Route::post('/informes/create_anual','InformeController@create_anual')->name('informe.create_anual');
