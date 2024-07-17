@extends('layouts.app')
{{-- @section('title','Agendacion cita') --}}
@section('content')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Servicio deportes</h1>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12 my-5">
          <div class="card mb-3">
            <div class="card-body">
              <div align="center" class="pt-4 pb-2">
                <h1 class="mt-3 mb-3 me-5">Deportes</h1>
                <div class="todo_contenido">
                  <div class="row separacion">
                    <div class="col-lg-6 contenido">
                      <h3 class="Descripcion">Descripción</h3>
                      <div class="contenido-descripcion">
                        <p class="text-start">
                          Conjunto de actividades relacionadas con el acondicionamiento físico, promoción de la actividad física, hábitos de vida saludable para el mejorar la calidad de vida, bienestar y salud de todo grupo poblacional.
                        </p>
                      </div>
                      <div class="caja">
                        <h3 class="horarios mt-4">Horarios de atención</h3>
                        <div class="horas" >
                          <p style="text-align: center" class="text-start" >Los horarios de atención se les informarán a los aprendices por medio de WhatsApp. Se les informará tanto el horario como lo que se hace cada día y sus horas.</p>
                        </div>
                        <!-- <button class="btn btn-success"><a href="{{route('login')}}" class="solicitar" style="color: white;">Asistencia</a></button> -->
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
