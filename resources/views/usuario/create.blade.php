@extends('layouts.app')
@section('main')

    <div class="row">
        <div class="col-6 offset-3">
            <div class="card mt-5 shadow mb-4">
                <div class="card-header bg-secondary text-white">
                    <h4>Registro de usuario</h4>
                </div>
                <div class="card-body">
                    <p class="card-title text-secondary">Ingrese sus datos</>
                    <form method="POST" action="{{ route('usuario.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="id_habitacion">ID usuario:</label>
                            <input type="text" class="form-control" name="id_usuario" value="{{ $id_usuario }}" placeholder="{{ $id_usuario }}" readonly>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control  @error('nombre') is-invalid @enderror" maxlength="50" id="nombre" name="nombre" value="{{ old('nombre') }}">
                            </div>
                            <div class="col">
                                <label for="apellido">Apellido:</label>
                                <input type="text" class="form-control @error('apellido') is-invalid @enderror" maxlength="50" id="apellido" name="apellido" value="{{ old('apellido') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" maxlength="50" id="email" name="email" placeholder="nombre@ejemplo.com" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" maxlength="50" id="password" name="password">
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
