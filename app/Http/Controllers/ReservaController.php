<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservaEditRequest;
use App\Http\Requests\ReservaRequest;
use App\Reserva;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
                            ->where('usuario_id', $id_usuario)
                            ->get();
        }else{
            if ($tipo_usuario == 'F'){
                /* Si el usuario logeado es un funcionario se mostrará la totalidad de las reservas en el sistema */
                $reservas = Reserva::orderBy('created_at')->get();
            }
        }

        return view('reserva.index',compact('reservas'));
    }

    public function create()
    {
        $tipos_habitaciones = DB::select('select distinct tipo, cant_camas, descripcion, precio_noche from habitaciones');
        return view('reserva.create',compact('tipos_habitaciones'));
    }

    public function createReservante()
    {
        $tipos_habitaciones = DB::select('select distinct tipo, cant_camas, descripcion, precio_noche from habitaciones');
        return view('reserva.create',compact('tipos_habitaciones'));
    }

    public function search(String $tipo)
    {
        $habitaciones = DB::table('habitaciones')
                            ->where('tipo', $tipo)
                            ->get();

        $hoy = Carbon::now();
        $hoy = $hoy->addDays(1);
        $hoy = $hoy->toDateString();

        return view('reserva.search', compact('tipo','habitaciones','hoy'));
    }

    public function consultar(ReservaRequest $request)
    {
        $fechas = array();
        $reservas = DB::table('reservas')
                            ->where('habitacion_id', $request->id_habitacion)
                            ->get();
        foreach ($reservas as $reserva) {
            $inicio = $reserva->inicio;
            $termino = $reserva->termino;
            $inicio1 = Carbon::createFromFormat('Y-m-d', $inicio);
            $termino1 = Carbon::createFromFormat('Y-m-d', $termino);
            // dd($inicio1, $termino1);

            $diferencia = $inicio1->diffInDays($termino1);
            // dd($diferencia);

            $fechas[] = $inicio1->toDateString();
            for ($i=1; $i <= $diferencia ; $i++) {
                $inicio1 = $inicio1->addDays(1);
                $fechas[] = $inicio1->toDateString();
            }
        }

        $llegada_reserva = $request->fecha_llegada;
        $salida_reserva = $request->fecha_salida;
        $llegada_reserva1 = Carbon::createFromFormat('Y-m-d', $llegada_reserva);
        $salida_reserva1 = Carbon::createFromFormat('Y-m-d', $salida_reserva);
        $diferencia_reserva = $llegada_reserva1->diffInDays($salida_reserva1);
        $fechas_reserva[] = $llegada_reserva1->toDateString();
            for ($i=1; $i <= $diferencia_reserva ; $i++) {
                $llegada_reserva1 = $llegada_reserva1->addDays(1);
                $fechas_reserva[] = $llegada_reserva1->toDateString();
            }


        $cant_fechas = count($fechas_reserva);
        $validar = true;

        for ($i=0; $i < $cant_fechas ; $i++) {
            if (in_array($fechas_reserva[$i], $fechas)) {
                $validar = false;
                return back()->with('error','La habitacion no está disponible para esa fecha');
            }
        }
        if ($validar = true) {
            // si //
            $llegada = $fechas_reserva[0];
            $salida = $fechas_reserva[$cant_fechas-1];
            $habitacion = DB::table('habitaciones')
                            ->where('id_habitacion', $request->id_habitacion)
                            ->get();
            return view('reserva.registrar', compact('llegada','salida','habitacion'));
        }
        else {
            // no //
            return back()->with('error','La habitacion no está disponible para esa fecha');
        }
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
        $reserva->habitacion_id = $request->id_habitacion;

        /* Obtener ID_USUARIO */

        $usuario = Auth::user();
        $reserva->usuario_id = $usuario->id_usuario;

        $reserva->save();
        return redirect()->route('reservas.index');
    }

    public function storeFuncReservante(ReservaRequest $request)
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
        $reserva->habitacion_id = $request->id_habitacion;

        /* Obtener ID_USUARIO */

        $usuario = Auth::user();
        $reserva->usuario_id = \Session::get('id_reservante');

        $reserva->save();
        return redirect()->route('reservas.index');
    }

    public function show(Reserva $reserva)
    {
        return view('reserva.show', compact('reserva'));
    }

    public function edit(Reserva $reserva)
    {
        $habitacion = DB::table('habitaciones')
                        ->where('id_habitacion',$reserva->habitacion_id)
                        ->get();

        return view('reserva.edit', compact('reserva','habitacion'));
    }

    public function update(ReservaEditRequest $request, Reserva $reserva)
    {
        // $fechas = array();
        // $reservas = DB::table('reservas')
        //                     ->where('habitacion_id', $request->id_habitacion)
        //                     ->get();
        // foreach ($reservas as $reserva_) {
        //     $inicio = $reserva_->inicio;
        //     $termino = $reserva_->termino;
        //     $inicio1 = Carbon::createFromFormat('Y-m-d', $inicio);
        //     $termino1 = Carbon::createFromFormat('Y-m-d', $termino);
        //     // dd($inicio1, $termino1);

        //     $diferencia = $inicio1->diffInDays($termino1);
        //     // dd($diferencia);

        //     $fechas[] = $inicio1->toDateString();
        //     for ($i=1; $i <= $diferencia ; $i++) {
        //         $inicio1 = $inicio1->addDays(1);
        //         $fechas[] = $inicio1->toDateString();
        //     }
        // }

        // $llegada_reserva = $request->fecha_llegada;
        // $salida_reserva = $request->fecha_salida;
        // $llegada_reserva1 = Carbon::createFromFormat('Y-m-d', $llegada_reserva);
        // $salida_reserva1 = Carbon::createFromFormat('Y-m-d', $salida_reserva);
        // $diferencia_reserva = $llegada_reserva1->diffInDays($salida_reserva1);
        // $fechas_reserva[] = $llegada_reserva1->toDateString();
        //     for ($i=1; $i <= $diferencia_reserva ; $i++) {
        //         $llegada_reserva1 = $llegada_reserva1->addDays(1);
        //         $fechas_reserva[] = $llegada_reserva1->toDateString();
        //     }


        // $cant_fechas = count($fechas_reserva);
        // $validar = true;

        // for ($i=0; $i < $cant_fechas ; $i++) {
        //     if (in_array($fechas_reserva[$i], $fechas)) {
        //         $validar = false;
        //         return back()->with('error','La habitacion no está disponible para esa fecha');
        //     }
        // }
        // if ($validar = true) {
        //     // si //
        //     $fechaActual = date('Y-m-d H:i:s');
        //     $reserva->inicio = $request->fecha_llegada;
        //     $reserva->termino = $request->fecha_salida;
        //     $reserva->updated_at = $fechaActual;

        //     $reserva->save();
        //     return back()->with('success','¡Reserva modificada con éxito!');
        // }
        // else {
        //     // no //
        //     return back()->with('error','La habitacion no está disponible para esa fecha');
        // }





        $fechaActual = date('Y-m-d H:i:s');
        $reserva->inicio = $request->fecha_llegada;
        $reserva->termino = $request->fecha_salida;
        $reserva->updated_at = $fechaActual;

        $reserva->save();
        return back()->with('success','¡Reserva modificada con éxito!');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservas.index');
    }

    // public function registrar()
    // {
    //     return view('reserva.registrar');
    // }

    public function FuncionarioUsuario()
    {
        return view('reserva.funcionario_usuario','id_usuario');
    }
}
