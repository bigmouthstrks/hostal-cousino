@extends('layouts.app')
@section('main')

    <h2 class="text-center">Perfil de usuario</h2>
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

            <h5 class="text-center">Datos personales</h5>
            </div>
            <div class="rounded p-0 p-md-4">
                <h3>{{ $usuario_actual->nombre . ' ' . $usuario_actual->apellido_paterno . ' ' . $usuario_actual->apellido_materno}}</h3>
                <div class="form-group d-flex row">
                    <div class="col-10">
                        <label for="email">Correo Electrónico</label>
                        <h5>{{ $usuario_actual->email }}</h5>
                    </div>
                    <div class="col-2">
                        <a class="btn btn-light text-info" href="{{ route('usuarios.change_email', $usuario_actual->id_usuario)}}"><i class="fa fa-edit fa-lg"></i></a>
                    </div>
                </div>
                <div class="form-group d-flex row">
                    <div class="col-10">
                        <label for="email">Contraseña</label>
                        <h5>**********</h5>
                    </div>
                    <div class="col-2">
                        <a class="btn btn-light text-info" href="{{ route('usuarios.change_password', $usuario_actual->id_usuario)}}"><i class="fa fa-edit fa-lg"></i></a>
                    </div>
                </div>
                <div class="form-group d-flex row">
                    <div class="col-10">
                        <label for="email">Dirección</label>
                        <h5>
                            @if($usuario_actual->ciudad == '' or $usuario_actual->pais == '' or $usuario_actual->direccion == '')
                                No registrada
                            @else
                                {{ $usuario_actual->direccion . ', ciudad de ' . $usuario_actual->ciudad . ', ' . $usuario_actual->pais }}
                            @endif
                        </h5>
                    </div>
                    <div class="col-2">
                        <a class="btn btn-light text-info" href="{{ route('usuarios.change_address', $usuario_actual->id_usuario)}}"><i class="fa fa-edit fa-lg"></i></a>
                    </div>
                </div>
                <div class="form-group d-flex row">
                    <div class="col-10">
                        <label for="email">Teléfono móvil</label>
                        <h5>
                            @if($usuario_actual->telefono == '0')
                                No registrado
                            @else
                                {{ $usuario_actual->telefono }}
                            @endif
                        </h5>
                    </div>
                    <div class="col-2">
                        <a class="btn btn-light text-info" href="{{ route('usuarios.change_phone', $usuario_actual->id_usuario)}}"><i class="fa fa-edit fa-lg"></i></a>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center p-2">
                <button type="button" class="btn btn-danger mr-2" data-toggle="modal" data-target="#confirmacion">Eliminar</button>
                <a href="{{ route('habitaciones.index') }}" class="btn btn-warning">Volver</a>
            </div>
        </div>
    </div>

    {{-- Modal de confirmación de eliminación --}}
    <div class="modal fade" id="confirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>¿Está seguro de que desea eliminar su cuenta?</h4>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('usuarios.destroy', Auth::user()->id_usuario) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Eliminar cuenta</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
        </div>
    </div>

@endsection
