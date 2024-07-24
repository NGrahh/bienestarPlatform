@extends('layouts.app')

@section('title-page','Apoyo Monitorias')

@section('content')

@include('layouts.header')
@include('layouts.menu')
<style>
.btn{
    background-color: #39A900;
    border: none;
}
</style>

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
                                    <h2 align="center">Descripción:</h2>
                                    <p align="justify" class="text-center">
                                        El aprendiz debe realizar 60 horas mensuales cumpliendo con las actividades de Monitoria. El valor del estímulo económico que se le pagará al aprendiz es del 50% del salario mínimo legal mensual vigente, para esta vigencia es de seiscientos cincuenta mil pesos ($650,000)</p>
                                </div>
                                <div class="botones mt-4 text-center">
                                @if(session('rol_id') == 5)
                                    <a href="{{ route('formulario-inscripcion-apoyos') }}"><button class="btn btn-ba mx-3">Postularse</button></a>
                                @elseif(session('rol_id') == 1 || session('rol_id') == 2 || session('rol_id') == 3 || session('rol_id') == 4)
                                    <p></p>
                                @else
                                    <a href="{{ route('login') }}"><button class="btn btn-ba mx-3">Iniciar sesión</button></a>
                                @endif

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
@include('layouts.footer')
@endsection