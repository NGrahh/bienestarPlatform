@extends('layouts.app')

@section('title-page','Apoyo Regular')

@section('content')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Apoyo de Sostenimiento Regular</h1>
    </div><!-- End Page Title -->

    <!-- Main Section -->
    <div class="section">
        <div class="row justify-content-center">
            <div class="col-lg-12 my-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <!-- Nota -->
                        @if (Auth::check())
                            @if ($tipo_apoyo_id == 4 && $status == '1')
                                <p class="small mt-3">
                                    <strong>Nota:</strong> Actualmente, las inscripciones para el apoyo de sostenimiento regular están abiertas. Puedes proceder con la inscripción. Para más información, por favor, efectua la inscripción ¡Buena Suerte!.
                                </p>
                            @else
                                <p class="small mt-3">
                                    <strong>Nota:</strong> Actualmente, las inscripciones para el apoyo de sostenimiento regular están cerradas. Te recomendamos que permanezcas atento a futuras actualizaciones sobre la apertura de inscripciones. Para más información, por favor, contacta con la administración.
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
                                <img src="{{ url('Apoyos/Apoyo_Sostenimiento.png') }}" class="img-fluid rounded shadow-lg" alt="Apoyo Fic" style="max-width: 50%;">
                            </div>

                            <div class="col-lg-12 mt-5">
                                <div class="pagetitle mx-3">
                                    <h1>¿De qué trata el apoyo de sostenimiento regular?</h1>
                                </div>
                                <p class="text-justify mx-3">
                                    Los apoyos de sostenimiento regular son recursos en dinero equivalentes al cincuenta por ciento (50 %) del Salario Mínimo Legal Mensual Vigente (SMLMV), que se les entregan mensualmente a los aprendices en condiciones de vulnerabilidad y que están matriculados en un programa de formación técnico laboral o tecnológico.
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
                                                    <li class="list-group-item mt-4"><i class="bi bi-collection me-1 text-primary"></i><strong>Estar en estado "en formación"</strong></li>
                                                    <li class="list-group-item"><i class="bi bi-collection me-1 text-primary"></i><strong>Pertenecer a estratos 1 o 2</strong></li>
                                                    <li class="list-group-item"><i class="bi bi-collection me-1 text-primary"></i><strong>No tener vínculo laboral, contrato de aprendizaje, patrocinio o práctica que genere ingresos</strong></li>
                                                    <li class="list-group-item"><i class="bi bi-collection me-1 text-primary"></i><strong>No ser beneficiario de Renta joven</strong></li>
                                                    <li class="list-group-item"><i class="bi bi-collection me-1 text-primary"></i><strong>No ser ni haber sido beneficiario de apoyos de sostenimiento en otros programas</strong></li>
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
                                @if ($tipo_apoyo_id == 4 && $status == '1'  && $mostrarBoton )
                                <p class="text-justify mx-3">
                                    Actualmente, el apoyo de sostenimiento regular se encuentra habilitado para nuevas inscripciones.
                                </p>
                                <div class="d-flex justify-content-center align-items-center pt-2">
                                    @if($inscrito)
                                        <button class="btn btn-success" disabled>Ya estás inscrito</button>
                                    @else
                                        <!-- Enlace con el ID del apoyo en la URL -->
                                        <a href="{{ route('formulario_p', ['apoyo_id' => $apoyo_id]) }}" class="btn btn-ba">
                                            Inscribirse Ahora
                                        </a>
                                    @endif
                                </div>
                                @else
                                <p class="text-justify mx-3">
                                    Actualmente, el apoyo de sostenimiento regular no se encuentra habilitado para nuevas inscripciones. Por favor, mantente atento a las futuras actualizaciones o contacta con la administración para más detalles.
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