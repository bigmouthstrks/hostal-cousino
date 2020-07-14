<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonioRequest;
use App\Testimonio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TestimonioController extends Controller
{

    public function index()
    {
        $testimonios = Testimonio::all();
        return view('testimonio.index',compact('testimonios'));
    }


    public function create()
    {
        // Obtener ID del usuario actual //
        $user = Auth::user();
        $id_usuario = $user->id_usuario;

        $testimonios = DB::select('select * from testimonios');
        $cantidad_testimonios = 0;

        foreach ($testimonios as $testimonio){
            $cantidad_testimonios = $cantidad_testimonios + 1;
        }

        // Se genera el código de Habitación //
        $valor_numerico = $cantidad_testimonios + 1;
        $id_testimoino = 'TES';
        $parte_numerica = '';

        if ($valor_numerico < 10){
            $parte_numerica = '00';
        }
        if ($valor_numerico > 9 && $valor_numerico < 100){
            $parte_numerica = '0';
        }
        if ($valor_numerico > 99){
            $parte_numerica = '';
        }

        $id_testimonio = $id_testimoino . $parte_numerica . $valor_numerico;

        return view('testimonio.create', compact('id_testimonio','id_usuario'));
    }

    public function store(TestimonioRequest $request)
    {
        // Registrar testimonio y un respectivos datos en la base de datos //
        $testimonio = new Testimonio();
        $testimonio->id_testimonio = $request->id_testimonio;
        $testimonio->id_usuario = $request->id_usuario;
        $testimonio->calificacion = $request->calificacion;
        $testimonio->comentario = $request->comentario;

        $testimonio->save();
        return back()->with('success','Testimonio registrado con éxito');
    }

    public function show(Testimonio $testimonio)
    {
        return view('testimonio.show', compact('testimonio'));
    }

    public function edit(Testimonio $testimonio)
    {
        //
    }

    public function update(Request $request, Testimonio $testimonio)
    {
        //
    }

    public function destroy(Testimonio $testimonio)
    {
        //
    }
}
