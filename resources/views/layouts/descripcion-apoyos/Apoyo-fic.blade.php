@extends('layouts.app')

@section('title-page','Apoyo FIC')

@section('content')

@include('layouts.header')
@include('layouts.menu')


<main id="main" class="main">
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Apoyo de Sostenimiento FIC</h1>
    </div><!-- End Page Title -->

    <!-- Main Section -->
    <div class="section">
        <div class="row justify-content-center">
            <div class="col-lg-12 my-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <!-- Nota -->
                        @if (Auth::check())
                            @if ($tipo_apoyo_id == 1 && $status == '1')
                            
                                <p class="small mt-3">
                                    <strong>Nota:</strong> Actualmente, las inscripciones para el apoyo FIC están abiertas. Puedes proceder con la inscripción. Para más información, por favor, efectua la inscripción ¡Buena Suerte!.
                                </p>
                            @else
                                <p class="small mt-3">
                                    <strong>Nota:</strong> Actualmente, las inscripciones para el apoyo FIC están cerradas. Te recomendamos que permanezcas atento a futuras actualizaciones sobre la apertura de inscripciones. Para más información, por favor, contacta con la administración.
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
                                <img src="{{ url('Apoyos/Apoyo_Fic.png') }}" class="img-fluid rounded shadow-lg" alt="Apoyo Fic" style="max-width: 50%;">
                            </div>

                            <div class="col-lg-12 mt-5">
                                <div class="pagetitle mx-3">
                                    <h1>¿De qué trata el apoyo FIC?</h1>
                                </div>
                                <p class="text-justify mx-3">
                                    Es el desembolso mensual de dinero que se realiza a los aprendices que sean formados en oficios y ocupaciones relacionados con la industria de la construcción, seleccionados como beneficiarios de este apoyo, durante el tiempo que dure el respectivo programa de aprendizaje, para sufragar transporte, alimentación y útiles para su formación.
                                </p>
                                <p class="text-justify mx-3">
                                    Abajo podrás encontrar los requisitos necesarios para la postulación al apoyo FIC. Te recomendamos revisar todos los criterios cuidadosamente para asegurarte de cumplir con todos ellos antes de proceder con tu solicitud.
                                </p>
                                <p class="text-justify mx-3">
                                    Te recomendamos revisar todos los criterios cuidadosamente para asegurarte de cumplir con todos ellos antes de proceder con tu solicitud.
                                    Recuerda que cada requisito es fundamental para garantizar tu elegibilidad. Si tienes alguna duda sobre alguno de los puntos o necesitas asistencia adicional, no dudes en ponerte en contacto con el equipo de soporte.
                                    Tu diligencia en este proceso es clave para completar tu postulación de manera efectiva y eficiente. ¡Buena suerte!
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
                                                    <li class="list-group-item mt-4"><i class="bi bi-collection me-1 text-primary"></i><strong>Estar matriculado en uno de los programas de formación profesional relacionados con el sector de la industria de la construcción, correspondiente a formación titulada, en jornada diurna o nocturna (No aplica para ofertas virtuales y articulación con la media).</strong></li>
                                                    <li class="list-group-item"><i class="bi bi-collection me-1 text-primary"></i><strong>No poseer contrato de aprendizaje o laboral que le represente ingresos económicos, ni ser beneficiario o titular de alguna pensión.</strong></li>
                                                    <li class="list-group-item"><i class="bi bi-collection me-1 text-primary"></i><strong>Haber culminado satisfactoriamente el primer trimestre de formación.</strong></li>
                                                    <li class="list-group-item"><i class="bi bi-collection me-1 text-primary"></i><strong>No estar o haber sido sancionado con condicionamiento de matrícula por faltas académicas o disciplinarias durante el trimestre inmediatamente anterior.</strong></li>
                                                    <li class="list-group-item"><i class="bi bi-collection me-1 text-primary"></i><strong>No ser o haber sido beneficiario de apoyos de sostenimiento en otro programa de formación.</strong></li>
                                                    <li class="list-group-item"><i class="bi bi-collection me-1 text-primary"></i><strong>Foto de documento de identidad.</strong></li>
                                                    <li class="list-group-item"><i class="bi bi-collection me-1 text-primary"></i><strong>No ser o haber sido beneficiario de apoyos de sostenimiento del FIC en otros programas de formación.</strong></li>
                                                    <li class="list-group-item"><i class="bi bi-collection me-1 text-primary"></i><strong>No tener otro tipo de subsidio asignado por alcaldía, Juntas Comunales, Organismos del Estado (Jóvenes en Acción), ni otro apoyo del SENA.</strong></li>
                                                    <li class="list-group-item mb-3"><i class="bi bi-collection me-1 text-primary"></i><strong>Soportes de la condición de vulnerabilidad "en caso de ser así, se le pedirá foto de la condición."</strong></li>
                                                </ul><!-- End List group Numbered -->
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-5">
                                <div class="pagetitle mx-3">
                                    <h1>Información Importante!</h1>
                                </div>
                            
                                @if ($tipo_apoyo_id == 1 && $status == '1' && $mostrarBoton)
                                    <div class=" p-3 mb-3  rounded text-justify">
                                        <p class="text-dark">
                                            La inscripción ha dado inicio el día de hoy, <strong class="text-success">{{ $fecha_apertura }}</strong>, y estará disponible hasta la fecha límite establecida, <strong class="text-danger">{{ $fecha_clausura }}</strong>. Le recomendamos completar el proceso de inscripción dentro de este período para asegurar su participación.
                                        </p>
                                    </div>
                                
                                
                                    <p class="text-justify mx-3">
                                        

                                    <div class="d-flex justify-content-center align-items-center pt-2">
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
                                        Actualmente, el apoyo FIC no se encuentra habilitado para nuevas inscripciones. Por favor, mantente atento a las futuras actualizaciones o contacta con la administración para más detalles.
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


