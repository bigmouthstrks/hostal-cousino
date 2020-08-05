@extends('layouts.app')
@section('main')

    @php
        $usuarios = DB::select('SELECT * FROM usuarios');
        $cantidad_usuarios = 0;

        foreach ($usuarios as $usuario) {
            if (strpos($usuario->id_usuario, 'USU') !== false) {
                $cantidad_usuarios = $cantidad_usuarios + 1;
            }
        }

        // Se genera el código de Usuario //
        $valor_numerico = $cantidad_usuarios + 1;
        $id_usuario = 'USU';
        $parte_numerica = '';

        if ($valor_numerico < 10) {
            $parte_numerica = '00';
        }
        if ($valor_numerico > 9 && $valor_numerico < 100) {
            $parte_numerica = '0';
        }
        if ($valor_numerico > 99) {
            $parte_numerica = '';
        }

        $id_usuario = $id_usuario . $parte_numerica . $valor_numerico;
    @endphp

    <div class="row">
        <div class="col-8 offset-2">
            <div class="card mt-5 shadow mb-4">
                @include('partials.flash-message')
                <div class="card-header bg-secondary text-white">
                    <h4>Registro de reservante</h4>
                </div>
                <div class="card-body">
                    <p class="card-title text-secondary">Ingrese los datos del reservante</>
                    <form method="POST" action="{{ route('usuario.storeReservante') }}">
                        @csrf
                        <div class="form-group" hidden>
                            <label for="id_habitacion">ID usuario:</label>
                            <input type="text" class="form-control" name="id_usuario" value="{{ $id_usuario }}" placeholder="{{ $id_usuario }}" readonly>
                        </div>
                        @php
                            \Session::put('id_reservante',$id_usuario);
                        @endphp
                        <div class="form-group form-row">
                            <div class="col">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control  @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Primer Nombre">
                            </div>
                            <div class="col">
                                <label for="apellido_paterno">Apellido Paterno:</label>
                                <input type="text" class="form-control @error('apellido_paterno') is-invalid @enderror" id="apellido_paterno" name="apellido_paterno" value="{{ old('apellido_paterno') }}" placeholder="Apellido Paterno">
                            </div>
                            <div class="col">
                                <label for="apellido_materno">Apellido Materno:</label>
                                <input type="text" class="form-control @error('apellido_materno') is-invalid @enderror" id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno') }}" placeholder="Apellido Materno">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="nombre@ejemplo.com" value="{{ old('email') }}">
                        </div>
                        
                        <div class="form-row">
                            <div class="col text-right">
                                <button type="submit" class="btn btn-secondary">Registrar Reservante</button>
                            </div>
                        </div>

                        {{-- MENSAJES DE ERROR --}}
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        {{-- FIN MENSAJES DE ERROR --}}


                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection