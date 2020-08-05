@extends('layouts.app')
@section('main')


<h2 class="text-center">Registrar Servicio</h2>
<div class="row d-flex justify-content-center pb-5">
    <div class="shadow col-6 mt-3">
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

        <form class="p-4" method="POST" action="{{  route('servicio.store', $id_servicio)  }}">
            @csrf
            <div class="form-group" hidden>
                <label for="id_servicio">ID Servicio</label>
                <input type="text" name="id_servicio" id="id_servicio" class="form-control" value="{{ $id_servicio }}">
            </div>
            <div class="form-group">
                <label for="nombre_servicio">Nombre Servicio</label>
                <input type="text" name="nombre_servicio" id="nombre_servicio" class="form-control @error('nombre_servicio') is-invalid @enderror" placeholder="Ingrese nombre del servicio">
            </div>
            <div class="form-group">
                <label for="nombre_servicio">Precio Servicio</label>
                <input type="number" name="precio_servicio" id="precio_servicio" class="form-control @error('precio_servicio') is-invalid @enderror" placeholder="Ingrese precio del servicio">
            </div>
            <button type="submit" class="btn btn-info">Agregar</button>
            <a href="{{ route('servicio.index') }}" class="btn btn-warning">Cancelar</a>
        </form>
    </div>
</div>

@endsection
