@extends('layouts.app')
{{-- @section('title','Agendacion cita') --}}
@section('content')

@include('layouts.header')
@include('layouts.menu')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<style>
  .imagen-ajustada {
    max-width: 150%;
    max-height: 450px; /* Ajusta la altura máxima según sea necesario */
    object-fit: contain;
  }
</style>

<main id="main" class="main">
  <section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 my-5">
          <div class="card">
            <div class="card-body">
              <div align="center" class="pt-4 pb-2">
                
                <h1>Apoyo de Monitoria</h1>
                <div class="contenedor">
                    <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/82662ded-f350-4d9b-810d-0cfed1b0fa4b/d7ncnog-a2f11467-c2fb-4d50-a29e-dfc2e68f934b.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzgyNjYyZGVkLWYzNTAtNGQ5Yi04MTBkLTBjZmVkMWIwZmE0YlwvZDduY25vZy1hMmYxMTQ2Ny1jMmZiLTRkNTAtYTI5ZS1kZmMyZTY4ZjkzNGIuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.h3Kg9WRtBT3Gpsbo3nXG1GzPA-vGVrdWo4gBXQCwzK4" alt="Descripción de la imagen" class="img-fluid imagen-ajustada">
                </div>
                <div class="descripcion">
                    <h2>Descripcion</h2>
                    <p class="text-center">
                      El aprendiz debe realizar 60 horas mensuales cumpliendo con las actividades de Monitoria.
                      El valor del estimulo economico que se le pagara al aprendiz es del 50% del salario minimo legal mensual vigente,
                      para esta vigencia es de Aeicientos cincuenta mil pesos ($650.000)
                    </p>
                </div>
                <div class="botones mt-4 text-center">
                    <button class="btn btn-primary btn-lg mx-3" ><a href="{{route('login')}}" style="color: white">Postularse</a></button>
                    <button class="btn btn-primary btn-lg mx-3" type="button" data-toggle="collapse" data-target="#contenido" aria-expanded="false" aria-controls="contenido">
                      Requisitos
                    </button>
                    <div class="contenido collapse mt-3" id="contenido">
                      <div class="card card-body">
                        <p class="text-center">Requisitos para el apoyo de monitoria</p>
                        <ul>
                          <li>Estar matriculados en un programa de formacion de los niveles técnico o tecnólogos</li>
                          <li>Apellido</li>
                          <li>Haber logrado como mínimo el 25% de los resultados de aprendizaje, establecidos en el programa de formacion</li>
                          <li>Ser aprendiz SENA con una antigüedad minima de tres(3) meses</li>
                          <li>No tener medidas formativas, condicionamiento de matricula, faltas academicas o diciplinarias durante el trimestre inmediatamente anterior a la apertura de la convocatoria</li>
                          <li>Tener disponibilidad para ser monitor de programas de formacion en los lugares requeridos por el Centro de Formacion o en la institucion educativa, y en los horarios previstos para ello</li>
                          <li>No tener vinculos de parentesco con algun servidor publico o contratista del respectivo centro, dentro del segundo grado de consaguinidad, segundo de afinidad o primero civil</li>
                          </ul>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endsection
