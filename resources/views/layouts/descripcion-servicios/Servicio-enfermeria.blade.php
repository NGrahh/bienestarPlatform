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
                <h1 class="mt-3 mb-3">Promoción y prevención a la salud</h1>
                <div class="todo_contenido">
                  <div class="row separacion">
                    <div class="col-lg-6 contenido">
                      <h3 class="Descripcion">Descripción</h3>
                      <div class="contenido-descripcion">
                        <p class="text-start">
                          Encargada de promover la salud, área de primeros auxilios, además de integrar a los aprendices mediante actividades relacionadas con el tema de la salud, oral, donación de sangre, etc.
                        </p>
                      </div>
                      <div class="caja">
                        <h3 class="horarios mt-4">Horarios de atención</h3>
                        <div class="horas">
                          <div class="dias-semana">
                            <ul style="list-style: none">
                              <li class="dias semana me-2">Lunes a viernes</li>
                              <li class="dias hora me-2">Horas</li>
                            </ul>
                          </div>
                          <div class="horas-dias">
                            <ul style="list-style: none">
                              <li class="dias sabado me-2">Sábados</li>
                              <li class="dias horas-sabado me-2">Horas</li>
                            </ul>
                          </div>
                        </div>
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
