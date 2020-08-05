<?php

namespace App\Http\Controllers;

use App\Checkin;
use App\Estadia;
use App\Http\Requests\ReservaRequest;
use App\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckinController extends Controller
{

    public function index()
    {
        $lista_checkin = Checkin::all();
        return view('checkin.index', compact('lista_checkin'));
    }

    public function create(Reserva $reserva)
    {
        $checkin = Checkin::all();
        $cantidad_checkin = 0;

        foreach ($checkin as $checkin) {
            $cantidad_checkin = $cantidad_checkin + 1;
        }

        // Se genera el código de check in //
        $valor_numerico = $cantidad_checkin + 1;
        $id_checkin = 'CHKIN';
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

        $id_check_in = $id_checkin . $parte_numerica . $valor_numerico;

        $cant_noches = strtotime($reserva->termino) - strtotime($reserva->inicio); /* Esta linea retorna la diferencia en Segundos entre ambas fechas */
        $cant_noches = (($cant_noches/60)/60)/24;

        $id_reserva = $reserva->id_reserva;

        return view('checkin.create', compact('id_check_in','cant_noches','id_reserva'));
    }

    public function store(Request $request, Checkin $checkin)
    {
        $checkin = new Checkin();
        $checkin->id_check_in = $request->id_check_in;
        $checkin->fecha_llegada = $request->fecha_llegada;
        $checkin->hora_llegada = $request->hora_llegada;
        $checkin->cant_noches = $request->cant_noches;
        $id_reserva = $request->id_reserva;
        $checkin->save();

        $reserva = Reserva::where('id_reserva', $id_reserva);
        $reserva->delete();

        /*
        // Asignar ID Estadía //
        $estadias = DB::select('select * from estadias');
        $cantidad_estadias = 0;

        foreach ($estadias as $estadia) {
            $cantidad_estadias = $cantidad_estadias + 1;
        }

        // Se genera el código de Estadía //
        $valor_numerico = $cantidad_estadias + 1;
        $id_estadia = 'EST';
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

        $id_estadia = $id_estadia . $parte_numerica . $valor_numerico;

        $estadia = new Estadia();
        $estadia->id_estadia = $request->id_estadia;
        $estadia->fecha_inicio = $request->fecha_llegada;

        $estadia->termino;
        $estadia->pasajero_id;
        $estadia->check_out_id;
        $estadia->habitacion;

        $estadia->check_in_id = $request->id_check_in;
        $estadia->id_habitacion = $request->id_habitacion;
        $estadia->save();



        */
        return redirect()->route('front.index');
    }

    public function show(Checkin $checkin)
    {
        return view('checkin.show', compact('checkin'));
    }
}
