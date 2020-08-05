<?php

namespace App\Http\Controllers;

use App\Checkin;
use App\Estadia;
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
        $checkins = DB::select('SELECT * FROM checkin');

        $cantidad_checkin = count($checkins);

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


        // Asignar ID Estadía //
        $estadias = DB::select('select * from estadias');
        $cantidad_estadias = count($estadias);

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
        $estadia->id_estadia = $id_estadia;
        $estadia->fecha_inicio = $request->fecha_llegada;

        $estadia->fecha_termino = $request->fecha_llegada;
        $estadia->pasajero_id = 'PAX_ID';
        $estadia->check_in_id = $request->id_check_in;
        $estadia->check_out_id = '';

        $id_habitacion_estadia = DB::table('reservas')->select('habitacion_id')->where('id_reserva', $id_reserva)->get();

        $id_habitacion = '';
        foreach($id_habitacion_estadia as $e){
            $id_habitacion = $e->habitacion_id;
        }

        $estadia->habitacion_id = $id_habitacion; // aqui lo asigno a la estadia actual //
        $estadia->reserva_id = $id_reserva;
        $estadia->save();

        /* ESTO MUESTRA ERROR */
        $reserva = Reserva::where('id_reserva', $id_reserva)->get();
        $reserva->delete();
        /* */

        return redirect()->route('front.index');
    }

    public function show(Checkin $checkin)
    {
        return view('checkin.show', compact('checkin'));
    }
}
