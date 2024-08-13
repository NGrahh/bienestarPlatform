@extends('layouts.app')
@section('title-page','Apoyo Datos')
@section('content')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Apoyo de datos</h1>
    </div><!-- End Page Title -->

    <!-- Main Section -->
    <div class="section">
        <div class="row justify-content-center">
            <div class="col-lg-12 my-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <!-- Nota -->
                        @if (Auth::check())
                            @if ($tipo_apoyo_id == 3 && $status == '1')
                                <p class="small mt-3">
                                    <strong>Nota:</strong> Actualmente, las inscripciones para el apoyo de datos están abiertas. Puedes proceder con la inscripción. Para más información, por favor, efectua la inscripción ¡Buena Suerte!.
                                </p>
                            @else
                                <p class="small mt-3">
                                    <strong>Nota:</strong> Actualmente, las inscripciones para el apoyo de datos están cerradas. Te recomendamos que permanezcas atento a futuras actualizaciones sobre la apertura de inscripciones. Para más información, por favor, contacta con la administración.
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
                                <img src="{{ asset('imagenesApoyos/Apoyo_Datos.png') }}" class="img-fluid rounded shadow-lg" alt="Apoyo Fic" style="max-width: 50%;">
                            </div>

                            <div class="col-lg-12 mt-5">
                                <div class="pagetitle mx-3">
                                    <h1>¿De qué trata el apoyo de transporte?</h1>
                                </div>
                                <p class="text-justify mx-3">
                                    Es aquel que suministra al aprendiz una cantidad modesta de $50,000 pesos durante un trimestre completo (3 meses), en los cuales la idea principal es que el aprendiz use esta cantidad en un plan de datos que pueda utilizar mediante un operador como Tigo, Claro, Wom, etc
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
                                                    <li class="list-group-item mt-4"><i class="bi bi-collection me-1 text-primary"></i><strong>Estar matriculados en un programa de formacion de los niveles técnico o tecnólogos</strong></li>
                                                    <li class="list-group-item"><i class="bi bi-collection me-1 text-primary"></i><strong>Haber logrado como mínimo el 25% de los resultados de aprendizaje, establecidos en el programa de formacion</strong></li>
                                                    <li class="list-group-item"><i class="bi bi-collection me-1 text-primary"></i><strong>Ser aprendiz SENA con una antigüedad minima de tres(3) meses</strong></li>
                                                    <li class="list-group-item"><i class="bi bi-collection me-1 text-primary"></i><strong>No tener medidas formativas, condicionamiento de matricula, faltas academicas o diciplinarias durante el trimestre inmediatamente anterior a la apertura de la convocatoria</strong></li>
                                                    <li class="list-group-item"><i class="bi bi-collection me-1 text-primary"></i><strong>Tener disponibilidad para ser monitor de programas de formacion en los lugares requeridos por el Centro de Formacion o en la institucion educativa, y en los horarios previstos para ello</strong></li>
                                                    <li class="list-group-item"><i class="bi bi-collection me-1 text-primary"></i><strong>No tener vinculos de parentesco con algun servidor publico o contratista del respectivo centro, dentro del segundo grado de consaguinidad, segundo de afinidad o primero civil</strong></li>
                
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
                                @if ($tipo_apoyo_id == 3 && $status == '1')
                                    <p class="text-justify mx-3">
                                        Actualmente, el apoyo de datos se encuentra habilitado para nuevas inscripciones.
                                    </p>
                                    <div class="d-flex justify-content-center align-items-center pt-2">
                                        <!-- Enlace con el ID del apoyo en la URL -->
                                        <a href="{{ route('formulario_p', ['apoyo_id' => $apoyo_id]) }}" class="btn btn-ba">
                                            Inscribirse Ahora
                                        </a>
                                    </div>
                                @else
                                    <p class="text-justify mx-3">
                                        Actualmente, el apoyo de datos no se encuentra habilitado para nuevas inscripciones. Por favor, mantente atento a las futuras actualizaciones o contacta con la administración para más detalles.
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