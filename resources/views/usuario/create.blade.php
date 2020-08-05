@extends('layouts.app')
@section('main')

    <div class="row">
        <div class="col-8 offset-2">
            <div class="card mt-5 shadow mb-4">
                @include('partials.flash-message')
                <div class="card-header bg-secondary text-white">
                    <h4>Registro de usuario</h4>
                </div>
                <div class="card-body">
                    <p class="card-title text-secondary">Ingrese sus datos</>
                    <form method="POST" action="{{ route('usuario.store') }}">
                        @csrf
                        <div class="form-group" hidden>
                            <label for="id_habitacion">ID usuario:</label>
                            <input type="text" class="form-control" name="id_usuario" value="{{ $id_usuario }}" placeholder="{{ $id_usuario }}" readonly>
                        </div>
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
                        <div class="form-group form-row">
                            <div class="col">
                                <label for="password">Contraseña:</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Ingrese su contraseña">
                            </div>
                            <div class="col">
                                <label for="password-confirmation">Confirmar contraseña:</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirme su contraseña">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <a href="{{ route('login') }}">¿Ya se encuentra registrado?</a>
                            </div>
                            <div class="col text-right">
                                <button type="submit" class="btn btn-secondary">Registrar Usuario</button>
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
