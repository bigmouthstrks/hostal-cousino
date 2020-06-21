@extends('layouts.mail')
@section('contenido-correo')

    <h2>{{ $nombre }} ha dejado un mensaje</h2>
    <div>
        <p><strong>Contenido</strong></p>
        <p >{{ $mensaje }}</p>
    </div>
    <p><strong></strong>Responder a: {{ $correo }}</strong></p>

@endsection
