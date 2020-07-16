@extends('layouts.app')
@section('main')


    <h2 class="text-center">Perfil de usuario</h2>
    <div class="container row justify-content-center m-2">
        <div class="col-8 d-inline shadow rounded pt-2 pb-4 pl-4 pr-4">
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
            <form class="rounded p-4" method="POST" action="{{ route('usuarios.update', Auth::user()->id_usuario) }}">
                @csrf
                @method('PUT')
                <h3>{{ $usuario_actual->nombre }}  {{ $usuario_actual->apellido }}</h3>
                <div class="form-group d-flex row">
                    <div class="col-12">
                        <label for="email">Correo Electrónico</label>
                    </div>
                    <div class="col-10">
                        <input class="form-control" type="email" id="email" name="email" value="{{ $usuario_actual->email }}" readonly>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-light text-info" id="edit-email" onclick="editarCampo('email')"><i class="fa fa-edit fa-lg"></i></button>
                    </div>
                </div>
                <div class="form-group d-flex row">
                    <div class="col-12">
                        <label for="email">Contraseña</label>
                    </div>
                    <div class="col-10">
                        <input class="form-control" onclick="editarCampo('password')" type="password" id="password" name="password" value="{{ $usuario_actual->password }}" readonly>
                    </div>
                    <div class="col-2">
                        <a class="btn btn-light text-info" href="#"><i class="fa fa-edit fa-lg"></i></a>
                    </div>
                </div>
                <label for="email">Dirección</label>
                <div class="form-group d-flex row">
                    <div class="col-5">
                        <input class="form-control" type="text" id="ciudad" name="ciudad" value="" readonly>
                    </div>
                    <div class="col-5">
                        <input class="form-control" type="text" id="pais" name="pais" value="{{-- $usuario_actual->password --}}" readonly>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-light text-info" id="edit-address" onclick="editarCampos('ciudad','pais','direccion')"><i class="fa fa-edit fa-lg"></i></button>
                    </div>
                    <div class="col-10">
                        <input class="form-control mt-2" type="text" id="direccion" name="direccion" value="{{-- $usuario_actual->password --}}" readonly>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-5">
                    <a href="#" class="btn bg-light text-danger mr-2">
                        <i class="fa fa-cancel"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-info">
                        <i class="fa fa-check"></i> Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function checkFields(field1, field2, field3){
            let campo1 = document.getElementById(field1);
            let campo2 = document.getElementById(field2);
            let campo3 = document.getElementById(field3);

            if (campo1.value == '' && campo2.value == '' && campo3.value == ''){
                console.log('hola');
                campo1.readOnly = false;
                campo2.readOnly = false;
                campo3.readOnly = false;
                document.getElementById('edit-address').disabled = true;
                document.getElementById(field1).placeholder = "Ciudad";
                document.getElementById(field2).placeholder = "País";
                document.getElementById(field3).placeholder = "Calle y número";
            }
        }

        function editarCampo(campo){
            if (campo == 'password'){
                document.getElementById(campo).value = '';
            }

            document.getElementById(campo).readOnly = false;
        }

        function editarCampos(campo1, campo2, campo3){
            document.getElementById(campo1).readOnly = false;
            document.getElementById(campo2).readOnly = false;
            document.getElementById(campo3).readOnly = false;
        }


        checkFields('ciudad','pais','direccion');
    </script>

@endsection
