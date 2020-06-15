<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservaEditRequest;
use App\Http\Requests\ReservaRequest;
use Illuminate\Http\Request;
use App\Reserva;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $reserva = new Reserva();
        /* Obtener RUT/PASAPORTE de pasajero */
        $reserva->estado = 'Activa';
        $reserva->fecha_realizacion = date("YYYY/mm/dd");
        $reserva->hora_realizacion = date("hh:mm:ss");
        $reserva->fecha_llegada = $request->fecha_llegada;
        $reserva->fecha_salida = $request->fecha_salida;
        /* Obtener ID_USUARIO */
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
