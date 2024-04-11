{{-- @extends('layouts.app')

@section('content')

@include('layouts.header')
@include('layouts.menu')



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



@endsection --}}



@extends('layouts.app')

@section('content')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Apoyo en monitoria</h1>
    </div><!-- End Page Title -->

    <div class="section">
        <div class="row justify-content-center">
            <div class="col-lg-12 my-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                          <p class="small"><strong>Nota: </strong>Se hace constar que, para proceder con la postulación, es indispensable contar con una cuenta activa.</p>
                        </div>
                        @include('compartido.alertas')
                        <div class="col-sm-12">
                            <div  class="pt-4 pb-2">
                                {{-- <h1 align="center"></h1> --}}
                                <div align="center"  class="contenedor">
                                    <img src="https://sena.edu.co/Style%20Library/alayout/images/logoSena.png" alt="Descripción de la imagen" class="img-fluid imagen-ajustada">
                                </div>
                                <div class="descripcion">
                                    <h2 align="center">Descripcion</h2>
                                    <p align="justify" class="text-center">
                                      El aprendiz debe realizar 60 horas mensuales cumpliendo con las actividades de Monitoria.
                                      El valor del estimulo economico que se le pagara al aprendiz es del 50% del salario minimo legal mensual vigente,
                                      para esta vigencia es de Aeicientos cincuenta mil pesos ($650.000)</p>
                                </div>
                                <div class="botones mt-4 text-center">
                                    <a href="{{route('login')}}"><button class="btn btn-ba mx-3">Postularse</button></a>

                                </div>

                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                      <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                          Requisitos
                                        </button>
                                      </h2>
                                      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <!-- List group Numbered -->
                                            <ol class="list-group list-group-numbered" style="text-align: justify">
                                              
                                              <li class="list-group-item">Estar matriculados en un programa de formacion de los niveles técnico o tecnólogos</li>
                                              <li class="list-group-item">Haber logrado como mínimo el 25% de los resultados de aprendizaje, establecidos en el programa de formacion</li>
                                              <li class="list-group-item">Ser aprendiz SENA con una antigüedad minima de tres(3) meses</li>
                                              <li class="list-group-item">No tener medidas formativas, condicionamiento de matricula, faltas academicas o diciplinarias durante el trimestre inmediatamente anterior a la apertura de la convocatoria</li>
                                              <li class="list-group-item">Tener disponibilidad para ser monitor de programas de formacion en los lugares requeridos por el Centro de Formacion o en la institucion educativa, y en los horarios previstos para ello</li>
                                              <li class="list-group-item">No tener vinculos de parentesco con algun servidor publico o contratista del respectivo centro, dentro del segundo grado de consaguinidad, segundo de afinidad o primero civil</li>
                                              </ol><!-- End List group Numbered -->
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><!-- End #main -->

@endsection