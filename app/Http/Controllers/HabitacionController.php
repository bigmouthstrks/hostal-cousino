<?php

namespace App\Http\Controllers;

use App\Habitacion;

use App\Http\Requests\HabitacionRequest;
use App\Http\Requests\HabitacionEditRequest;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habitaciones = Habitacion::all();
        return view('habitacion.index',compact('habitaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cantidad_habitaciones = Habitacion::count();

        // Se genera el código de Habitación //
        $valor_numerico = $cantidad_habitaciones + 1;
        $id_habitacion = 'HAB';
        $parte_numerica = '';

        for ($i = 0;$i < 2; $i++) {
            $parte_numerica = $parte_numerica . '0';
        }

        $id_habitacion = $id_habitacion . $parte_numerica . $valor_numerico;

        return back()->with('success','¡Habitacion modificada con éxito!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HabitacionRequest $request)
    {
        $habitacion = new Habitacion();
        $habitacion->id_habitacion = $request->id_habitacion;
        $habitacion->estado = ucwords($request->estado);
        $habitacion->cant_camas = $request->cant_camas;
        $habitacion->tipo = ucwords($request->tipo);
        $habitacion->precio_noche = $request->precio_noche;
        $habitacion->tamaño = $request->tamaño;
        $habitacion->numero = $request->numero;
        $habitacion->save();
        return back()->with('success','La habitación ha sido agregada con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function show(Habitacion $habitacion)
    {
        return view('habitacion.show', compact('habitacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Habitacion $habitacion)
    {
        $estados = array('Disponible','Ocupada','Bloqueada');
        $tipos_hab = array('Single','Doble Twin','Doble Matrimonial','Triple','Familiar');
        $tamaños = array('Pequeña','Mediana','Grande');

        return view('habitacion.edit', compact('habitacion','estados','tipos_hab','tamaños'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function update(HabitacionEditRequest $request, Habitacion $habitacion)
    {
        $habitacion->estado = $request->estado;
        $habitacion->cant_camas = $request->cant_camas;
        $habitacion->tipo = $request->tipo;
        $habitacion->precio_noche = $request->precio_noche;
        $habitacion->tamaño = $request->tamaño;
        $habitacion-> numero = $request->numero;
        $habitacion->save();
        return redirect()->route('habitaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Habitacion $habitacion)
    {
        $habitacion->delete();
        return redirect()->route('habitaciones.index');
    }
}
