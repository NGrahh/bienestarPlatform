@extends('layouts.app')

@section('title-page','Apoyo Transporte')

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
        <h1>Apoyo de transporte</h1>
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

                                {{-- <h1 align="center"></h1> --}}
                                <div align="center"  class="contenedor">
                                    <img src="https://sena.edu.co/Style%20Library/alayout/images/logoSena.png" alt="Descripción de la imagen" class="img-fluid imagen-ajustada">
                                </div>
                                <div class="descripcion">
                                    <h2>Descripcion:</h2>
                                    <p align="justify" class="text-start">
                                      Es un servicio otorgado a los aprendices de formación con modalidad en presencial. En convenido con el servicio de transporte público masivo <strong>MEGABUS </strong> (Por ningun motivo se entrega dinero a los aprendices)
                                      consta de 40 pasajes al mes durante 4 meses
                                    </p>
                                </div>
                                <div class="botones mt-4 text-center">
                                @if(session('rol_id') == 5)
                                <button class="btn btn-success mt-3"><a href="{{route('formulario-inscripcion-apoyo-regular')}}" class="solicitar" style="color: white;">Solicitar</a></button>
                                @else
                                <button class="btn btn-success ms-2"><a href="{{route('login')}}" class="solicitar" style="color: white;">Inscribirse</a></button>
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
                                                <li class="list-group-item">Estar en estado "Inducción" o "Es formación" en etapa lectiva o practica en el aplicativo Sofia Plus</li>
                                                <li class="list-group-item">No tener condicionamiento de matricula conforme a lo estipulado en el reglamento al aprendiz</li>
                                                <li class="list-group-item" >No ser beneficiario de ningun otro apoyo de sostenimiento</li>
                                                <li class="list-group-item" >Digilenciar adecuadamente el formato de registro socioeconomico</li>
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