@extends('layouts.app')
@section('main')

    <h2 class="text-center">Perfil de usuario</h2>
    <div class="container row justify-content-center m-2">
        <div class="col-8 d-inline shadow rounded pt-2 pb-4 pl-4 pr-4">
            <div class="d-inline">
                <h5 class="text-center">Datos personales</h5>
            </div>
            <div class="rounded border p-4">
                <h3>{{ $usuario_actual->nombre }}  {{ $usuario_actual->apellido }}</h3>
                <div class="form-group d-flex row">
                    <div class="col-12">
                        <label for="email">Correo Electrónico</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control" type="email" id="email" name="email" value="{{ $usuario_actual->email }}" readonly>
                    </div>
                    <div class="col-2">
                        <a class="btn btn-light text-info" href="#"><i class="fa fa-edit fa-lg"></i></a>
                    </div>
                </div>
                <div class="form-group d-flex row">
                    <div class="col-12">
                        <label for="email">Contraseña</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control" type="password" id="email" name="email" value="{{-- $usuario_actual->password --}}" readonly>
                    </div>
                    <div class="col-2">
                        <a class="btn btn-light text-info" href="#"><i class="fa fa-edit fa-lg"></i></a>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-5">
                    <a href="#" class="btn bg-light text-danger mr-2">
                        <i class="fa fa-cancel"></i> Cancelar
                    </a>
                    <a href="#" class="btn btn-info">
                        <i class="fa fa-check"></i> Guardar
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
