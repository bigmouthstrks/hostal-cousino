@extends('layouts.app')
@section('main')

    <div class="row">
        <div class="col-6 offset-3">
            <div class="card mt-5">
                <div class="card-header bg-secondary text-white">REGISTRAR USUARIO</div>
                <div class="card-body">
                    <h5 class="card-title">Ingrese sus datos</h5>
                    <form method="POST" action="{{ route('usuario.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="id_habitacion">ID usuario:</label>
                            <input type="text" class="form-control" name="id_usuario" value="{{ $id_usuario }}" placeholder="{{ $id_usuario }}" readonly>
                        <div class="form-row">
                            <div class="col">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}">
                            </div>
                            <div class="col">
                                <label for="apellido">Apellido:</label>
                                <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" value="{{ old('apellido') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="nombre@ejemplo.com" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" class="form-control">
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <a href="{{ route('login') }}">¿Ya se encuentra registrado?</a>
                            </div>
                            <div class="col text-right">
                                <button type="submit" class="btn btn-secondary">Registrar Usuario</button>
                            </div>
                        </div>

                        <h5></h5>

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
