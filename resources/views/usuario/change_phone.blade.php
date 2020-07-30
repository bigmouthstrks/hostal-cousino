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
            <form class="rounded p-0 p-md-4" method="POST" action="{{ route('usuarios.update_phone', Auth::user()->id_usuario) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="current_phone">Teléfono actual</label>
                    <br>
                    <label id="current_phone">{{ Auth::user()->telefono }}</label>
                </div>
                <div class="form-group">
                    <label for="new_phone">Número de teléfono</label>
                    <input type="number" id="new_phone" name="new_phone" placeholder="Ingrese su nuevo número" class="form-control">
                </div>
                <button type="submit" class="btn btn-info mr-1">Confirmar</button>
                <a href="{{ route('usuarios.edit', Auth::user()->id_usuario) }}" class="btn btn-light">Cancelar</a>
            </form>
        </div>
    </div>

@endsection
