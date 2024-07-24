@extends('layouts.app')

@section('content')

@section('title-page','Edición usuario')

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
        <h1>Apoyo de alimentación</h1>
    </div><!-- End Page Title -->

    <div class="section">
        <div class="row justify-content-center">
            <div class="col-lg-12 my-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <p class="small"><strong>Nota: </strong>Se hace constar que, para proceder con la postulación, es indispensable contar <strong>con una cuenta activa.</strong></p>
                        </div>
                        @include('compartido.alertas')
                        <div class="col-sm-12">
                            <div  class="pt-4 pb-2">
                                {{-- <h1 align="center"></h1> --}}
                                <div align="center"  class="contenedor">
                                    <img src="https://sena.edu.co/Style%20Library/alayout/images/logoSena.png" alt="Descripción de la imagen" class="img-fluid imagen-ajustada">
                                </div>
                                <div class="descripcion">
                                    <h2>Descripción: </h2>
                                    <p align="justify" class="text-start">
                                        Es aquel que otorga a los aprendices técnicos y tecnólogos de todas las modalidades y jornadas, que cumplen con los requisitos y cuyo propósito es apoyar la permanencia del aprendiz en su proceso formativo
                                    </p>
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
                                          <strong>Requisitos</strong>
                                        </button>
                                      </h2>
                                      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <!-- List group Numbered -->
                                            <ol class="list-group list-group-numbered" style="text-align: justify">
                                              <li class="list-group-item">Estar matriculados en un programa de formación de los niveles técnico o tecnólogos</li>
                                              <li class="list-group-item">Diligenciar el formato de registro socioeconómico</li>
                                              <li class="list-group-item">Estar en estado "Inducción" o "En formación" en el reglamento al aprendiz</li>
                                              <li class="list-group-item">No ser beneficiario de ningun apoyo de sostenimiento</li>
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