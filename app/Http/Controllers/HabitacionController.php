<?php

namespace App\Http\Controllers;

use App\Habitacion;
use Illuminate\Http\Request;

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

        return view('habitacion.create',compact('id_habitacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $habitacion = new Habitacion();
        $habitacion->id_habitacion = $request->id_habitacion;
        $habitacion->estado = $request->estado;
        $habitacion->cant_camas = $request->cant_camas;
        $habitacion->tipo = $request->tipo;
        $habitacion->precio_noche = $request->precio_noche;
        $habitacion->tamaño = $request->tamaño;
        $habitacion-> numero = $request->numero;
        $habitacion->save();
        return redirect(route('habitacion.index'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Habitacion $habitacion)
    {
        //
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
