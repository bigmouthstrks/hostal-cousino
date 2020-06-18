<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservaEditRequest;
use App\Http\Requests\ReservaRequest;
use App\Reserva;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::all();
        return view('reserva.index',compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reserva.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservaEditRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
