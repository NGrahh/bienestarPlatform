@extends('layouts.app')
{{-- @section('title','Agendacion cita') --}}
@section('content')

@include('layouts.header')
@include('layouts.menu')

{{--  --}}

<main id="main" class="main">
  <section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 my-5">
          <div class="card">
            <div class="card-body">
              <div align="center" class="pt-4 pb-2">
                
                <h1>Apoyo de Sostenimiento FIC</h1>
                <div class="contenedor">
                    <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/82662ded-f350-4d9b-810d-0cfed1b0fa4b/d7ncnog-a2f11467-c2fb-4d50-a29e-dfc2e68f934b.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzgyNjYyZGVkLWYzNTAtNGQ5Yi04MTBkLTBjZmVkMWIwZmE0YlwvZDduY25vZy1hMmYxMTQ2Ny1jMmZiLTRkNTAtYTI5ZS1kZmMyZTY4ZjkzNGIuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.h3Kg9WRtBT3Gpsbo3nXG1GzPA-vGVrdWo4gBXQCwzK4" alt="Descripción de la imagen" class="img-fluid imagen-ajustada">
                </div>
                <div class="descripcion">
                    <h2>Descripcion</h2>
                    <p class="text-center">
                      Es el desoembolso mensual de dinero que realiza a los Aprendices que sean formados en oficios y ocupaciones relacionados con la industria de la constriccion,
                      seleccionados como beneficiarios de este apoyo, durante el tiempo que dure respectivo programa de aprendizaje, para sufragar entro
                      otros: transporte, alimentacion y utiles para su formacion
                    </p>
                </div>
                <div class="botones mt-4 text-center">
                    <button class="btn btn-primary btn-lg mx-3" ><a href="{{route('login')}}" style="color: white">Postularse</a></button>
                    <button class="btn btn-primary btn-lg mx-3" type="button" data-toggle="collapse" data-target="#contenido" aria-expanded="false" aria-controls="contenido">
                      Requisitos
                    </button>
                    <div class="contenido collapse mt-3" id="contenido">
                      <div class="card card-body">
                        <p class="text-center">Requisitos para el apoyo fic</p>
                        <ul>
                          <li>Estar matriculado en uno de los programas de formacion profesional relacionados con el sector de la industria de la construccion, correspondiente a formacion titulada,
                            en jornada diurna o nocturna. No aplica para ofertas virtuales y articulacion con la media
                          </li>
                          <li>No poseer contrato de aprendizaje o laboral que le represente ingregos economicos, ni ser beneficiarios o titular de alguna pension</li>
                          <li>Haber culminado satisfactoriamente el primer trimestre de formacion</li>
                          <li>No estar o haber sido sancionado con condicionamiento de matricula por faltas academicas o diciplinarias durante el trimestre inmediatamente anterior</li>
                          <li>No ser o haber sido beneficiario de apotos de sostenimiento en otro programa de formacion</li>
                          <li>Foto de documento de identidad</li>
                          <li>No ser o haber sido beneficiario de apoyos de sostenimiento del FIC en otros programas de formacion</li>
                          <li>No tener otro tipo de subsidio asignado por alcaldia, Juntas Comunales, Organismos del estado (Jovenes en accion), ni otro apoyo del SENA</li>
                          <li>Soportes de la condicion de vulnerabilidad "en caso de ser si, se le pedira foto de la condicion"</li>
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
{{--  --}}


@endsection
