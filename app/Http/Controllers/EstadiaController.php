<?php

namespace App\Http\Controllers;

use App\Estadia;
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

    public function store(Request $request)
    {
        //
    }

    public function show(Estadia $estadia)
    {
        //
    }


    public function edit(Estadia $estadia)
    {
        //
    }

    public function update(Request $request, Estadia $estadia)
    {
        //
    }

    public function destroy(Estadia $estadia)
    {
        //
    }
}
