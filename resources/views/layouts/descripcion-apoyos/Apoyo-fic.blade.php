@extends('layouts.app')

@section('title-page','Apoyo FIC')

@section('content')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Apoyo de sostenimiento FIC</h1>
    </div><!-- End Page Title -->

    <div class="section">
        <div class="row justify-content-center">
            <div class="col-lg-12 my-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <p class="small"><strong>Nota: </strong>Se hace constar que; para proceder con la postulación, es indispensable contar con <strong>una cuenta activa.</strong></p>
                        </div>
                        @include('compartido.alertas')
                        <div class="col-sm-12">
                            <div  class="pt-4 pb-2">

                                <h1 align="center"></h1>
                                <div align="center"  class="contenedor">
                                    <img src="https://sena.edu.co/Style%20Library/alayout/images/logoSena.png" alt="Descripción de la imagen" class="img-fluid imagen-ajustada">
                                </div>
                                <div class="descripcion">
                                    <h2>Descripcion: </h2>
                                    <p align="justify" class="text-start">
                                        Es el desembolso mensual de dinero que realiza a los Aprendices que sean formados en oficios y ocupaciones relacionados con la industria de la constricción,
                                        seleccionados como beneficiarios de este apoyo, durante el tiempo que dure respectivo programa de aprendizaje, para sufragar transporte, alimentacion y utiles para su formación
                                    </p>
                                </div>
                                <div class="botones mt-4 text-center">
                                @if(session('rol_id') == 5)
                                    <a href="{{route('formulario-inscripcion-apoyos')}}"><button class="btn btn-ba mx-3">Postularse</button></a>
                                @else
                                    <a href="{{route('login')}}"><button class="btn btn-ba mx-3">Postularse</button></a>
                                @endif
                                </div>
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                      <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                          <strong>Requisitos</strong>
                                        </button>
                                      </h2>
                                      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <!-- List group Numbered -->
                                            <ol class="list-group list-group-numbered" style="text-align: justify">
                                                <li class="list-group-item">Estar matriculado en uno de los programas de formacion profesional relacionados con el sector de la industria de la construccion, correspondiente a formacion titulada, en jornada diurna o nocturna. No aplica para ofertas virtuales y articulacion con la media
                                                </li>
                                                <li class="list-group-item">No poseer contrato de aprendizaje o laboral que le represente ingregos economicos, ni ser beneficiarios o titular de alguna pension</li>
                                                <li class="list-group-item">Haber culminado satisfactoriamente el primer trimestre de formacion</li>
                                                <li class="list-group-item" >No estar o haber sido sancionado con condicionamiento de matricula por faltas academicas o diciplinarias durante el trimestre inmediatamente anterior</li>
                                                <li class="list-group-item" >No ser o haber sido beneficiario de apotos de sostenimiento en otro programa de formacion</li>
                                                <li class="list-group-item" >Foto de documento de identidad</li>
                                                <li class="list-group-item" >No ser o haber sido beneficiario de apoyos de sostenimiento del FIC en otros programas de formacion</li>
                                                <li class="list-group-item" >No tener otro tipo de subsidio asignado por alcaldia, Juntas Comunales, Organismos del estado (Jovenes en accion), ni otro apoyo del SENA</li>
                                                <li class="list-group-item" >Soportes de la condicion de vulnerabilidad "en caso de ser si, se le pedira foto de la condicion"</li>
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