<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticuloController extends Controller
{
    public function index()
    {
        $articulos = Articulo::all();
        return view('articulo.index', compact('articulos'));
    }

    public function create()
    {
        return view('articulo.create');
    }

    public function store(Request $request)
    {
        $articulos = DB::select('select * from articulos');
        $cantidad_articulos = 0;

        foreach ($articulos as $articulo) {
            $cantidad_articulos = $cantidad_articulos + 1;
        }

        // Se genera el código de Articulo //
        $valor_numerico = $cantidad_articulos + 1;
        $id_articulo = 'ART';
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

        $id_articulo = $id_articulo . $parte_numerica . $valor_numerico;

        $articulo = new Articulo();
        $articulo->id_articulo = $id_articulo;
        $articulo->nombre_articulo = $request->nombre_articulo;

        $articulo->save();
        return back()->with('success','Articulo registrado exitosamente');

    }

    public function show(Articulo $articulo)
    {
        return view('articulo.show', compact('articulo'));
    }

    public function edit(Articulo $articulo)
    {
        return view('articulo.edit', compact('articulo'));
    }

    public function update(Request $request, Articulo $articulo)
    {
        $articulo->nombre_articulo = $request->nombre_articulo;
        $articulo->save();
        return redirect()->route('articulo.index');
    }

    public function destroy(Articulo $articulo)
    {
        $articulo->delete();
        return redirect()->route('articulo.index');
    }
}
