<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservaEditRequest;
use App\Http\Requests\ReservaRequest;
use App\Http\Requests\ReservaSearchRequest;
use App\Reserva;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::all();
        return view('reserva.index',compact('reservas'));
    }

    public function create()
    {
        $tipos_habitaciones = DB::select('select distinct tipo, cant_camas, descripcion, precio_noche from habitaciones');
        return view('reserva.create',compact('tipos_habitaciones'));
    }

    public function search()
    {
        //
    }

    public function store(ReservaRequest $request)
    {

        /* Obtener RUT/PASAPORTE de pasajero */

        /* Generar id_reserva */
        $reservas = DB::select('SELECT * FROM reservas');
        $cantidad_reservas = 0;

        foreach ($reservas as $reserva) {
            $cantidad_reservas = $cantidad_reservas + 1;
        }

        // Se genera el código de Habitación //
        $valor_numerico = $cantidad_reservas + 1;
        $id_reserva = 'RES';
        $parte_numerica = '';

        if ($valor_numerico < 10){
            $parte_numerica = '00';
        }
        if ($valor_numerico > 9 && $valor_numerico < 100){
            $parte_numerica = '0';
        }
        if ($valor_numerico > 99) {
            $parte_numerica = '';
        }

        $id_reserva = $id_reserva . $parte_numerica . $valor_numerico;


        $reserva = new Reserva();
        $reserva->id_reserva = $id_reserva;
        $reserva->estado = 'Activa';
        $reserva->inicio = $request->fecha_llegada;
        $reserva->termino = $request->fecha_salida;

        /* Obtener ID_USUARIO */

        $usuario = Auth::user();
        $reserva->id_usuario = $usuario->id_usuario;

        /* Obtener ID_ESTADIA */

        $reserva->save();
        return back()->with('success','¡Reserva registrada con éxito!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(ReservaEditRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
