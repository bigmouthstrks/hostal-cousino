<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MensajeController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['create','send']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mensaje.create');
    }

    public function send(Request $request)
    {
        $datos = array(
            'nombre' => $request->nombre,
            'mensaje' => $request->mensaje,
            'correo' => $request->correo,
        );

        Mail::send('mensaje.formato_mail', $datos, function ($message) {
            $message->from('benjamin.caceres.ra@gmail.com', 'Hostal Cousiño');
            $message->to('benjamin.caceres.ra@gmail.com', 'Hostal Cousiño')->subject('Hostal Cousiño - Nuevo Mensaje');
        });

        return view('mensaje.create')->with('success','Mensaje enviado correctamente!');
    }
}
