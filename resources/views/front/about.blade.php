@extends('layouts.app')
@section('main')

    <h2 class="text-center">Acerca de Hostal cousiño</h2>
    {{--<img class="card-img-top" src="{{ asset('images/compromiso.jpg') }}" alt="card-img">--}}
    <div class="card-body d-flex row justify-content-center mt-3">
        <div class="col-10">
            <p class="text-center">
                <i>Hostal Cousiño</i> es una empresa de hospedaje que trabaja desde hace <i>16 años</i> para brindar la mejor experiencia posible para sus
                pasajeros y pasajeras, a través de una modalidad <i>Bed & Breakfast</i>, contando también con <a href="{{ route('front.services') }}">servicios adicionales</a>.
            </p>
            <p class="text-center">
                A través de los años nuestra atención y servicio siempre se ha caracterizado por ser súmamente personal, cordial y de excelencia. Transmitiendo <i>calidez y confianza</i> a nuestra distinguida clientela
                y staff de trabajo.
            </p>
            <p class="text-center">
                No sólo ofrecemos una <i>experiencia única</i> en cuanto al alojamiento, gracias a nuestra <i>excelente ubicación</i> nuestro pasajeros podrán recorrer los principales
                sitios de la ciudad jardín de Viña del Mar, entre ellos el <i>Museo Fonck, Plaza Sucre, Parroquia de Viña, Reloj de Flores, Anfiteatro Quinta Vergara.</i>
            </p>

            <div class="p-3 d-flex shadow rounded">
                <div class="d-flex align-items-center">
                    <h4 class="text-center p-2">Nuesto equipo</h4>
                    <h4 class="text-secondary">Our team</h4>
                </div>
                <div class="card ml-1 mr-1" style="width: 14rem;">
                    <img class="card-img-top" src="{{ asset('/images/staff/1.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Administradora</h5>
                        <p class="card-text text-secondary">Camila Díaz Cárdenas</p>
                    </div>
                </div>
                <div class="card ml-1 mr-1" style="width: 14rem;">
                    <img class="card-img-top" src="{{ asset('/images/staff/2.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Gerente general</h5>
                        <p class="card-text text-secondary">Paulina Elgueta</p>
                    </div>
                </div>
                <div class="card ml-1 mr-1" style="width: 14rem;">
                    <img class="card-img-top" src="{{ asset('/images/staff/3.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Recepcionista</h5>
                        <p class="card-text text-secondary">Jaime Baeza</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
