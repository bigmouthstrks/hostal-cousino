<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicioRequest;
use App\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();
        return view('servicio.index', compact('servicios'));
    }

    public function create()
    {
        $servicios = DB::select('select * from servicios');
        $cantidad_servicios = 0;

        foreach ($servicios as $servicio) {
            $cantidad_servicios = $cantidad_servicios + 1;
        }

        // Se genera el código de servicio //
        $valor_numerico = $cantidad_servicios + 1;
        $id_servicio = 'SER';
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

        $id_servicio = $id_servicio . $parte_numerica . $valor_numerico;

        return view('servicio.create', compact('id_servicio'));
    }

    public function store(ServicioRequest $request)
    {
        $servicio = new Servicio();
        $servicio->id_servicio = $request->id_servicio;
        $servicio->nombre_servicio = $request->nombre_servicio;
        $servicio->precio_servicio = $request->precio_servicio;

        $servicio->save();
        return back()->with('success','Servicio registrado correctamente');
    }

    public function show(Servicio $servicio)
    {
        return view('servicio.show', compact('servicio'));
    }

    public function edit(Servicio $servicio)
    {
        return view('servicio.edit', compact('servicio'));
    }

    public function update(ServicioRequest $request, Servicio $servicio)
    {
        $servicio->nombre_servicio = $request->nombre_servicio;
        $servicio->precio_servicio = $request->precio_servicio;

        $servicio->save();
        return back()->with('success','Servicio modificado correctamente');
    }

    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
        return redirect()->route('servicio.index');
    }
}
