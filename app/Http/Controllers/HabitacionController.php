<?php

namespace App\Http\Controllers;

use App\Habitacion;
use App\Imagen;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HabitacionRequest;
use App\Http\Requests\HabitacionEditRequest;

class HabitacionController extends Controller
{
    public function index()
    {
        $habitaciones = Habitacion::all();
        return view('habitacion.index',compact('habitaciones'));
    }

    public function create()
    {
        $habitaciones = DB::select('select * from habitaciones');
        $cantidad_habitaciones = 0;

        foreach ($habitaciones as $habitacion) {
            $cantidad_habitaciones = $cantidad_habitaciones + 1;
        }

        // Se genera el código de Habitación //
        $valor_numerico = $cantidad_habitaciones + 1;
        $id_habitacion = 'HAB';
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

        $id_habitacion = $id_habitacion . $parte_numerica . $valor_numerico;

        return view('habitacion.create',compact('id_habitacion'));
    }

    public function store(HabitacionRequest $request)
    {
        // Registrar habitación y sus respectivos datos en la base de datos //
        $habitacion = new Habitacion();
        $habitacion->id_habitacion = $request->id_habitacion;
        $habitacion->estado = ucwords($request->estado);
        $habitacion->cant_camas = $request->cant_camas;
        $habitacion->tipo = ucwords($request->tipo);
        $habitacion->precio_noche = $request->precio_noche;
        $habitacion->tamaño = $request->tamaño;
        $habitacion->numero = $request->numero;
        $habitacion->descripcion = $request->descripcion;
        $habitacion->imagen = $request->imagen->store('public/imagenes');

        // Almacenar imágenes de la respectiva habitación //
        /*
        $imagen_1 = new Imagen();
        $imagen_1->id_imagen = 'IMG01_' . $habitacion->id_habitacion;
        $imagen_1->ruta_imagen = $request->imagen_1->store('public/imagenes');

        $imagen_2 = new Imagen();
        $imagen_2->id_imagen = 'IMG02_' . $habitacion->id_habitacion;
        $imagen_2->ruta_imagen = $request->imagen_2->store('public/imagenes');

        $imagen_3 = new Imagen();
        $imagen_3->id_imagen = 'IMG03_' . $habitacion->id_habitacion;
        $imagen_3->ruta_imagen = $request->imagen_2->store('public/imagenes');

        $imagen_4 = new Imagen();
        $imagen_4->id_imagen = 'IMG04_' . $habitacion->id_habitacion;
        $imagen_4->ruta_imagen = $request->imagen_2->store('public/imagenes');


        $imagen_1->save();
        $imagen_2->save();
        $imagen_3->save();
        $imagen_4->save();
        */
        $habitacion->save();
        return back()->with('success','Habitación creada exitosamente');
    }

    public function show(Habitacion $habitacion)
    {
        return view('habitacion.show', compact('habitacion'));
    }

    public function edit(Habitacion $habitacion)
    {
        $estados = array('Disponible','Ocupada','Bloqueada');
        $tipos_hab = array('Single','Doble Twin','Doble Matrimonial','Triple','Familiar');
        $tamaños = array('Pequeña','Mediana','Grande');

        return view('habitacion.edit', compact('habitacion','estados','tipos_hab','tamaños'));
    }

    public function update(HabitacionEditRequest $request, Habitacion $habitacion)
    {
        $habitacion->estado = $request->estado;
        $habitacion->cant_camas = $request->cant_camas;
        $habitacion->tipo = $request->tipo;
        $habitacion->precio_noche = $request->precio_noche;
        $habitacion->tamaño = $request->tamaño;
        $habitacion->numero = $request->numero;
        $habitacion->descripcion = $request->descripcion;
        $habitacion->imagen = $request->imagen->store('public/imagenes');

        // Almacenar imágenes de la respectiva habitación //
        /*
        $imagen_1 = new Imagen();
        $imagen_1->id_imagen = 'IMG01_' . $habitacion->id_habitacion;
        $imagen_1->ruta_imagen = $request->imagen_1->store('public/imagenes');

        $imagen_2 = new Imagen();
        $imagen_2->id_imagen = 'IMG02_' . $habitacion->id_habitacion;
        $imagen_2->ruta_imagen = $request->imagen_2->store('public/imagenes');

        $imagen_3 = new Imagen();
        $imagen_3->id_imagen = 'IMG03_' . $habitacion->id_habitacion;
        $imagen_3->ruta_imagen = $request->imagen_2->store('public/imagenes');

        $imagen_4 = new Imagen();
        $imagen_4->id_imagen = 'IMG04_' . $habitacion->id_habitacion;
        $imagen_4->ruta_imagen = $request->imagen_2->store('public/imagenes');


        $imagen_1->save();
        $imagen_2->save();
        $imagen_3->save();
        $imagen_4->save();
        */
        $habitacion->save();
        return redirect()->route('habitaciones.index');
    }

    public function destroy(Habitacion $habitacion)
    {
        $habitacion->delete();
        return redirect()->route('habitaciones.index');
    }
}
