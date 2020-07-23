<?php

namespace App\Http\Controllers;
use Exception;
use App\Http\Requests\MensajeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MensajeController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['create','send']);
    }

    public function create()
    {
        return view('mensaje.create');
    }

    public function send(MensajeRequest $request)
    {

        try{
            $datos = array(
                'nombre' => $request->nombre,
                'mensaje' => $request->mensaje,
                'correo' => $request->correo,
            );
            Mail::send('mensaje.formato_mail', $datos, function ($message) {
                $message->from('benjamin.caceres.ra@gmail.com', 'Hostal Cousiño');
                $message->to('benjamin.caceres.ra@gmail.com', 'Hostal Cousiño')->subject('Hostal Cousiño - Nuevo Mensaje');
            });

            return back()->with('success','Mensaje enviado correctamente!');
        }catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
}
