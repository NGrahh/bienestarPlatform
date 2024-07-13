@extends('layouts.app')

@section('title-page','Apoyo Regular')

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
        <h1>Apoyo de sostenimiento regular</h1>
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
                            <div class="pt-4 pb-2">
                                <div align="center" class="contenedor">
                                    <img src="https://sena.edu.co/Style%20Library/alayout/images/logoSena.png" alt="Descripción de la imagen" class="img-fluid imagen-ajustada">
                                </div>
                                <div class="descripcion">
                                    <h2 align="center" class="text-start">Descripción:</h2>
                                    <p align="justify" class="text-start">
                                        Los apoyos de sostenimiento regular son recursos en dinero equivalentes al cincuenta por ciento (50 %) del Salario Mínimo Legal Mensual Vigente (SMLMV), que se les entregan mensualmente a los aprendices en condiciones de vulnerabilidad y que están matriculados en un programa de formación técnico laboral o tecnológico.
                                    </p>
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
                                                    <li class="list-group-item">Estar en estado "en formación"</li>
                                                    <li class="list-group-item">Pertenecer a estratos 1 o 2</li>
                                                    <li class="list-group-item">No tener vínculo laboral, contrato de aprendizaje, patrocinio o práctica que genere ingresos</li>
                                                    <li class="list-group-item">No ser beneficiario de Jóvenes en Acción</li>
                                                    <li class="list-group-item">No ser ni haber sido beneficiario de apoyos de sostenimiento en otros programas</li>
                                                </ol><!-- End List group Numbered -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="botones mt-4 text-center">
                                @if(session('rol_id') == 5)
                                    <a href="{{route('formulario-inscripcion-apoyos')}}"><button class="btn btn-ba mx-3">Postularse</button></a>
                                @else
                                    <a href="{{route('login')}}"><button class="btn btn-ba mx-3">Postularse</button></a>
                                @endif
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