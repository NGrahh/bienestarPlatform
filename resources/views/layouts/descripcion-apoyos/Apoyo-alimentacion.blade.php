@extends('layouts.app')

@section('content')

@section('title-page','Apoyo de alimentación')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Apoyo de alimentación</h1>
    </div><!-- End Page Title -->

    <!-- Main Section -->
    <div class="section">
        <div class="row justify-content-center">
            <div class="col-lg-12 my-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <!-- Nota -->
                        @if (Auth::check())
                            @if ($tipo_apoyo_id == 2 && $status == '1')
                                <p class="small mt-3">
                                    <strong>Nota:</strong> Actualmente, las inscripciones para el apoyo de alimentación están abiertas. Puedes proceder con la inscripción. Para más información, por favor, efectua la inscripción ¡Buena Suerte!.
                                </p>
                            @else
                                <p class="small mt-3">
                                    <strong>Nota:</strong> Actualmente, las inscripciones para el apoyo de alimentación están cerradas. Te recomendamos que permanezcas atento a futuras actualizaciones sobre la apertura de inscripciones. Para más información, por favor, contacta con la administración.
                                </p>
                            @endif
                        @else
                            <!-- Usuario no autenticado -->
                            <div class="pt-4 pb-2">
                                <p class="small">
                                    <strong>Nota:</strong> Se hace constar que, para proceder con la postulación, es indispensable contar con <strong>una cuenta activa.</strong>
                                </p>
                            </div>
                        @endif


                        <!-- Contenido Principal -->
                        <div class="row">
                            <!-- Imagen -->
                            <div class="col-lg-12 d-flex justify-content-center align-items-center my-4">
                                <img src="{{ url('Apoyos/Apoyo_Alimentacion.png') }}" class="img-fluid rounded shadow-lg" alt="Apoyo Fic" style="max-width: 50%;">
                            </div>

                            <div class="col-lg-12 mt-5">
                                <div class="pagetitle mx-3">
                                    <h1>¿De qué trata el apoyo de transporte?</h1>
                                </div>
                                <p class="text-justify mx-3">
                                    Es aquel que otorga a los aprendices técnicos y tecnólogos de todas las modalidades y jornadas, que cumplen con los requisitos y cuyo propósito es apoyar la permanencia del aprendiz en su proceso formativo
                                </p>
                            </div>

                            <div class="col-lg-12 mt-3">
                                <!-- Requisitos -->
                                <div class="accordion accordion-flush mx-3" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <strong>Requisitos</strong>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <ul class="list-group" style="text-align: justify">
                                                    <li class="list-group-item mt-4"><i class="bi bi-collection me-1 text-primary"></i><strong>Estar matriculados en un programa de formación de los niveles técnico o tecnólogos</strong></li>
                                                    <li class="list-group-item"><i class="bi bi-collection me-1 text-primary"></i><strong>Diligenciar el formato de registro socioeconómico</strong></li>
                                                    <li class="list-group-item"><i class="bi bi-collection me-1 text-primary"></i><strong>Estar en estado "Inducción" o "En formación" en el reglamento al aprendiz</strong></li>
                                                    <li class="list-group-item"><i class="bi bi-collection me-1 text-primary"></i><strong>No ser beneficiario de ningun apoyo de sostenimiento</strong></li>
                
                                                </ul><!-- End List group Numbered -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12  mt-5">
                                <div class="pagetitle mx-3">
                                    <h1>Información Importante!</h1>
                                </div><!-- End Page Title -->
                                @if ($tipo_apoyo_id == 2 && $status == '1' && $mostrarBoton)
                                <p class="text-justify mx-3">
                                    Actualmente, el apoyo de alimentación se encuentra habilitado para nuevas inscripciones.
                                </p>
                                <div class="d-flex justify-content-center align-items-center pt-2">
                                    <!-- Verificar si el usuario ya está inscrito -->
                                    @if($inscrito)
                                        <button class="btn btn-success" disabled>Ya estás inscrito</button>
                                    @else
                                        @if (auth()->user()->rol_id == 5)
                                            <!-- Enlace con el ID del apoyo en la URL -->
                                            <a href="{{ route('formulario_p', ['apoyo_id' => $apoyo_id]) }}" class="btn btn-ba">
                                                Inscribirse Ahora
                                            </a>
                                        @endif
                                    @endif
                                </div>
                            @else
                                <p class="text-justify mx-3">
                                    Actualmente, el apoyo de alimentación no se encuentra habilitado para nuevas inscripciones. Por favor, mantente atento a las futuras actualizaciones o contacta con la administración para más detalles.
                                </p>
                            @endif
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('layouts.footer')
@endsection