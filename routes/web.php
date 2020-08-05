<?php

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;

// Testimonios //
Route::get('/testimonios','TestimonioController@index')->name('testimonios.index');
Route::get('/testimonios/create','TestimonioController@create')->name('testimonios.create');
Route::post('/testimonios','TestimonioController@store')->name('testimonios.store');
Route::get('/testimonios/{testimonio}','TestimonioController@show')->name('testimonios.show');

// Habitaciones //
Route::get('/habitaciones/create','HabitacionController@create')->name('habitaciones.create');
Route::get('/habitaciones','HabitacionController@index')->name('habitaciones.index');
Route::post('/habitaciones','HabitacionController@store')->name('habitaciones.store');
Route::get('/habitaciones/{habitacion}','HabitacionController@show')->name('habitaciones.show');
Route::get('/habitaciones/{habitacion}/edit','HabitacionController@edit')->name('habitaciones.edit');
Route::delete('/habitaciones/{habitacion}','HabitacionController@destroy')->name('habitaciones.destroy');
Route::put('habitaciones/{habitacion}','HabitacionController@update')->name('habitaciones.update');

// Reservas //
Route::get('/reservas/create','ReservaController@create')->name('reservas.create');
Route::get('/reservas','ReservaController@index')->name('reservas.index');
Route::post('/reservas','ReservaController@store')->name('reservas.store');
Route::get('/reservas/{reserva}', 'ReservaController@show')->name('reservas.show');
Route::get('/reservas/{reserva}/edit','ReservaController@edit')->name('reservas.edit');
Route::get('/reservas/search/{tipo}','ReservaController@search')->name('reservas.search');
Route::delete('/reservas/{reserva}','ReservaController@destroy')->name('reservas.destroy');
Route::put('reservas/{reserva}','ReservaController@update')->name('reservas.update');
Route::post('/reservas/consultar','ReservaController@consultar')->name('reservas.consultar');
Route::view('/reservas/registrar', 'reserva.registrar')->name('reservas.registrar');

// Mensajes //
Route::get('/mensajes/create','MensajeController@create')->name('mensajes.create');
Route::post('/mensajes','MensajeController@send')->name('mensajes.send');

// Vistas generales //
Route::get('/','FrontController@index')->name('front.index');
Route::get('/about','FrontController@about')->name('front.about');
Route::get('/services','FrontController@services')->name('front.services');

// Usuario //
Route::view('/login', 'usuario.login')->name('login');
Route::get('/create/usuario','UsuarioController@create')->name('create.usuario');
Route::post('/usuario','UsuarioController@store')->name('usuario.store');
Route::post('/login/usuario', 'UsuarioController@login')->name('login.usuario');
Route::get('/logout/usuario','UsuarioController@logout')->name('logout.usuario');
Route::get('/usuarios/{usuario}/edit','UsuarioController@edit')->name('usuarios.edit');
Route::get('/usuarios/{usuario}/edit/change_password','UsuarioController@change_password')->name('usuarios.change_password');
Route::get('/usuarios/{usuario}/edit/change_email','UsuarioController@change_email')->name('usuarios.change_email');
Route::get('/usuarios/{usuario}/edit/change_phone','UsuarioController@change_phone')->name('usuarios.change_phone');
Route::get('/usuarios/{usuario}/edit/change_address','UsuarioController@change_address')->name('usuarios.change_address');
Route::put('/usuarios/{usuario}/update_email','UsuarioController@update_email')->name('usuarios.update_email');
Route::put('/usuarios/{usuario}/update_address','UsuarioController@update_address')->name('usuarios.update_address');
Route::put('/usuarios/{usuario}/update_password','UsuarioController@update_password')->name('usuarios.update_password');
Route::put('/usuarios/{usuario}/update_phone','UsuarioController@update_phone')->name('usuarios.update_phone');
Route::delete('/usuarios/{usuario}','UsuarioController@destroy')->name('usuarios.destroy');

// Funcionarios //
Route::get('/create/funcionario', 'UsuarioController@create_funcionario')->name('create.funcionario');
Route::post('/funcionario','UsuarioController@store_funcionario')->name('funcionario.store');

// Informes //
Route::get('/informes','InformeController@index')->name('informes.index');
Route::post('/informes/create_mensual','InformeController@create_mensual')->name('informe.create_mensual');
Route::post('/informes/create_anual','InformeController@create_anual')->name('informe.create_anual');

// Artículo //
Route::resource('/articulo', 'ArticuloController');

// Check-in //
Route::resource('/checkin', 'CheckinController');
Route::get('/checkin/create/{reserva}','CheckinController@create')->name('checkin.create');
Route::post('/checkin/store','CheckinController@store')->name('checkin.store');

// Estadía //
Route::resource('estadia', 'EstadiaController');
Route::get('/estadias/{estadia}','EstadiaController@show')->name('estadias.show');
Route::get('/estadias/index','EstadiaController@index')->name('estadias.index');
Route::get('/estadias/add_service/{estadia}','EstadiaController@add_service')->name('estadia.add_service');
Route::post('/estadias/store_service','EstadiaController@store_service')->name('estadia.store_service');

// Imagenes //
Route::resource('/imagen','ImagenController');

// Check-out //
Route::resource('/checkout','CheckoutController');

// Servicios //
Route::resource('/servicio','ServicioController');
