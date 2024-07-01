@extends('layouts.app')
{{-- @section('title','Agendacion cita') --}}
@section('content')

@include('layouts.header')
@include('layouts.menu')


<main id="main" class="main">
  <section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-11 my-5">
          <div class="card mb-3">
            <div class="card-body">
              <div align="center" class="pt-4 pb-2">
                <h1 class="mt-3 mb-3">Consejería</h1>
                <div class="todo_contenido">
                  <div class="row separacion">
                    <div class="col-lg-6 contenido">
                      <h3 class="Descripcion">Descripción</h3>
                      <div class="contenido-descripcion">
                        <p class="text-start">
                          Nos encargamos de de impactar dentro de nuestra área, bienestar al aprendiz, encargados del seguimiento del cronograma de actividades direccionados en relación al tema de representante del centro, WorldSkills, SenaSoft y direccionamiento de giras técnicas.
                        </p>
                      </div>
                      <div class="caja">
                        <h3 class="horarios">Horarios de atención</h3>
                        <div class="horas">
                          <div class="dias-semana">
                            <ul style="list-style: none">
                              <li class="dias semana">Lunes a Viernes</li>
                              <li class="dias hora">Horas</li>
                            </ul>
                          </div>
                          <div class="horas-dias">
                            <ul style="list-style: none">
                              <li class="dias sabado">Sábados</li>
                              <li class="dias horas-sabado">Horas</li>
                            </ul>
                          </div>
                        </div>
                        @if(session('rol_id') == 5)
                          <button class="btn btn-success mt-3"><a href="{{route('form-appointment')}}" class="solicitar" style="color: black;">Solicitar</a></button>
                        @elseif(session('rol_id') == 5)
                          <button class="btn btn-success mt-3"><a href="{{route('Servicio-Consejeria')}}" class="solicitar" style="color: black;">Solicitar</a></button>
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
