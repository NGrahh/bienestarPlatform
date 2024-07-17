@extends('layouts.app')
{{-- @section('title','Agendacion cita') --}}
@section('content')

@include('layouts.header')
@include('layouts.menu')

<style>
  li{
    list-style: none;
  }

  .horas{
    margin-left: -26px
  }
</style>

<main id="main" class="main">
  <section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-11 my-5">
          <div class="card mb-3">
            <div class="card-body">
              <div align="center" class="pt-4 pb-2">
                <h1 class="mt-3 mb-3">Consejería y atención psicosocial</h1>
                <div class="todo_contenido">
                  <div class="row separacion">
                    <div class="col-lg-6 contenido">
                      <h3 class="Descripcion">Descripción</h3>
                      <div class="contenido-descripcion">
                        <p class="text-start">
                          Promover la salud mental, el desarrollo integral humano dentro de las instalaciones, reduciendo la posibilidad de deseserción o retiro voluntario por medio de actividades psicolociales o integrales.
                        </p>
                      </div>
                      <div class="caja">
                        <h3 class="horarios mt-4">Horarios de atención</h3>
                        <div class="horas">
                          <div class="dias-semana">
                            <ul style="list-style: none">
                              <li class="dias semana me-2">Lunes a viernes</li>
                              <li class="dias hora me-2"> 8:30 am -- 1 pm || 1 pm -- 7 pm</li>
                            </ul>
                          </div>
                        </div>
                        @if(session('rol_id') == 5)
                          <button class="btn btn-success mt-3"><a href="{{route('form-appointment')}}" class="solicitar" style="color: white;">Solicitar</a></button>
                        @elseif(session('rol_id') == 4)
                          <button class="btn btn-success mt-3"><a href="{{route('Servicio-Consejeria')}}" class="solicitar" style="color: white;">Solicitar</a></button>
                        @else
                          <button class="invisible"></button>
                        @endif
                      </div>
                    </div>
                    <div class="col-lg-6 contenedor">
                      <img class="imagen mt-3" src="https://i.ibb.co/8scWv32/png-clipart-logo-servicio-nacional-de-aprendizaje-sena-symbol-national-training-service-dragon-ball.png" alt="Descripción de la imagen">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@include('layouts.footer')
@endsection
