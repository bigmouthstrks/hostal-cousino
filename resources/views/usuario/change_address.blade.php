@extends('layouts.app')
@section('main')

    <div class="container row justify-content-center m-2">
        <div class="col-12 col-md-8 d-inline shadow rounded pt-2 pb-4 pl-4 pr-4">
            <div class="d-inline">
                {{-- Mostrar mensajes de error si existen --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @include('partials.flash-message')

            <h5 class="text-center">Cambiar contraseña</h5>
            </div>
            <form class="rounded p-0 p-md-4" method="POST" action="{{ route('usuarios.update_address', Auth::user()->id_usuario) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="current_address">Dirección actual</label>
                    <br>
                    <label id="current_address">{{ Auth::user()->direccion . ', ciudad de ' . Auth::user()->ciudad . ', ' . Auth::user()->pais }}</label>
                </div>
                <div class="form-group">
                    <label for="new_city">Ciudad</label>
                    <input type="text" id="new_city" name="new_city" placeholder="Ingrese ciudad de residencia" class="form-control">
                </div>
                <div class="form-group">
                    <label for="new_address">Calle y número</label>
                    <input type="text" id="new_address" name="new_address" placeholder="Ingrese calle y número de su domicilio" class="form-control">
                </div>
                <div class="form-group">
                    <label for="new_country">País</label>
                    <input type="text" id="new_country" name="new_country" placeholder="Ingrese su país de residencia" class="form-control">
                </div>
                <br>
                <button type="submit" class="btn btn-info mr-1">Confirmar</button>
                <a href="{{ route('usuarios.edit', Auth::user()->id_usuario) }}" class="btn btn-light">Cancelar</a>
            </form>
        </div>
    </div>

@endsection
