<?php

namespace App\Http\Controllers;

use App\Habitacion;
use App\Http\Requests\ImagenEditRequest;
use App\Http\Requests\ImagenRequest;
use App\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImagenController extends Controller
{
    public function index()
    {
        $imagenes = Imagen::all();
        return view('imagen.index', compact('imagenes'));
    }

    public function create()
    {
        $imagenes = DB::select('select * from imagenes');
        $cantidad_imagenes = 0;

        foreach ($imagenes as $imagen) {
            $cantidad_imagenes = $cantidad_imagenes + 1;
        }

        // Se genera el código de imagen //
        $valor_numerico = $cantidad_imagenes + 1;
        $id_imagen = 'IMG';
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

        $id_imagen = $id_imagen . $parte_numerica . $valor_numerico;

        $habitaciones = Habitacion::all();
        return view('imagen.create', compact('id_imagen','habitaciones'));
    }

    public function store(ImagenRequest $request)
    {
        $imagen = new Imagen();
        $imagen->id_imagen = $request->id_imagen;
        $imagen->habitacion_id = $request->habitacion_id;
        $imagen->ruta_imagen = $request->ruta_imagen->store('public/imagenes');
        $imagen->save();
        return back()->with('success','Imagen registrada con éxito');
    }

    public function show(Imagen $imagen)
    {
        return view('imagen.show', compact('imagen'));
    }

    public function edit(Imagen $imagen)
    {
        $habitaciones = Habitacion::all();
        return view('imagen.edit', compact('imagen','habitaciones'));
    }

    public function update(ImagenEditRequest $request, Imagen $imagen)
    {
        $imagen->ruta_imagen = $request->ruta_imagen;
        $imagen->habitacion_id = $request->habitacion_id;

        $imagen->save();
        return back()->with('success','Imágen modificada exitosamente');
    }

    public function destroy(Imagen $imagen)
    {
        $imagen->delete();
        return redirect()->route('imagen.index');
    }
}


