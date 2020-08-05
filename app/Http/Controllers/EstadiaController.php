<?php

namespace App\Http\Controllers;

use App\Estadia;
use App\ServicioEstadia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadiaController extends Controller
{
    public function __construct(){
        $this->middleware('funcionario');
        //->except(['index'])
    }

    public function index()
    {
        $estadias = Estadia::all();
        return view('estadia.index', compact('estadias'));
    }

    public function create()
    {
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


        return view('estadia.create', compact('id_estadia'));
    }

    public function show(Estadia $estadia)
    {
        $servicios_estadia = DB::table('servicio_estadia')->select('servicio_id')->where('estadia_id', $estadia->id_estadia)->get();

        return view('estadia.show', compact('estadia'));
    }

    public function add_service(Estadia $estadia)
    {
        $servicios = DB::table('servicios')->select('nombre_servicio','id_servicio')->get();
        return view('estadia.add_service', compact('estadia','servicios'));
    }

    public function store_service(Request $request)
    {
        $servicio_estadia = new ServicioEstadia();
        $servicio_estadia->servicio_id = $request->servicio_id;
        $servicio_estadia->estadia_id = $request->estadia_id;
        $servicio_estadia->cantidad = $request->cantidad;

        $servicio_estadia->save();
        return back()->with('success','Servicio registrado correctamente en la estadía');
    }
}
