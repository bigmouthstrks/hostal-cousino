<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservaEditRequest;
use App\Http\Requests\ReservaRequest;
use App\Reserva;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function index()
    {
        /* TIPO DEL USUARIO LOGEADO ACTUALMENTE */
        $tipo_usuario = Auth::user()->tipo;

        /* ID DEL USUARIO LOGEADO ACTUALMENTE */
        $id_usuario = Auth::user()->id_usuario;

        if ($tipo_usuario == 'U'){
            /* Si el usuario logeado es cliente se mostrarán sólo las reservas realizadas por dicho usuario */
            $reservas = DB::table('reservas')
                            ->where('id_usuario', $id_usuario)
                            ->get();
        }else{
            if ($tipo_usuario == 'F'){
                /* Si el usuario logeado es un funcionario se mostrará la totalidad de las reservas en el sistema */
                $reservas = Reserva::all();
            }
        }

        return view('reserva.index',compact('reservas'));
    }

    public function create()
    {
        $tipos_habitaciones = DB::select('select distinct tipo, cant_camas, descripcion, precio_noche from habitaciones');
        return view('reserva.create',compact('tipos_habitaciones'));
    }

    public function search(String $tipo)
    {
        return view('reserva.search', compact('tipo'));
    }

    public function store(ReservaRequest $request)
    {

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
        $reserva->inicio = $request->fecha_llegada;
        $reserva->termino = $request->fecha_salida;

        /* Obtener ID_USUARIO */

        $usuario = Auth::user();
        $reserva->id_usuario = $usuario->id_usuario;

        /* Obtener ID_ESTADIA */

        $reserva->save();
        return back()->with('success','¡Reserva registrada con éxito!');
    }

    public function show(Reserva $reserva)
    {
        return view('reserva.show', compact('reserva'));
    }

    public function edit(Reserva $reserva)
    {
        return view('reserva.edit', compact('reserva'));
    }

    public function update(ReservaEditRequest $request, Reserva $reserva)
    {
        $reserva->save();
        return back()->with('success','¡Reserva registrada con éxito!');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservas.index');
    }
}
