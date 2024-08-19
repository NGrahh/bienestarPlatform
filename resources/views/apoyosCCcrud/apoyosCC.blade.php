@extends('layouts.app')

<!-- Preloader -->
<div class="preloader-it">
    <div class="loader-pendulums"></div>
</div>
<!-- /Preloader -->

@section('content')
@section('title-page','Información Apoyos')
@include('layouts.header_Crud')
@include('layouts.menu')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Operaciones de gestión de Apoyos</h1>
    </div><!-- End Page Title -->
    @include('compartido.alertas')

    <section class="section">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Este apartado proporciona detalles sobre la apertura de inscripciones para los apoyos.</h5>
                        <div class="table-responsive">
                            <table class="table datatable rounded-table">
                                <input type="hidden" id="currentPage" name="currentPage" value="">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre apoyo</th>
                                        <th>Fecha apertura</th>
                                        <th>Fecha clausura</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($apoyos_created as $apoyos_created)
                                    <tr>
                                        <td>{{$apoyos_created->id}}</td>
                                        <td>{{$apoyos_created->tipoApoyo->name }}</td>
                                        <td>{{$apoyos_created->appoiment_date_start}}</td>
                                        <td>{{$apoyos_created->appoiment_date_end}}</td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center pt-2">
                                                @if ($apoyos_created->status == '1' )
                                                    <span class="badge mt-1" style="background-color: #39A900">Activo</span>
                                                @else
                                                    <span class="badge bg-danger mt-1">Inactivo</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center pt-2">
                                                @if ($apoyos_created->status)
                                                <!-- Botón para abrir el modal de Des-habilitar -->
                                                <button type="button" class="btn btn-ba px-2 me-2" data-bs-toggle="modal" data-bs-target="#disableApoyoModal{{ $apoyos_created->id }}" title="Deshabilitar Usuario">
                                                    <i class="ri-chat-check-line"></i>
                                                </button>
                                                @else
                                                <!-- Botón para abrir el modal de Habilitar -->
                                                <button type="button" class="btn btn-ba-rojo px-2 me-2" data-bs-toggle="modal" data-bs-target="#disableApoyoModal{{ $apoyos_created->id }}" title="Habilitar Usuario">
                                                    <i class="ri-admin-line"></i>
                                                </button>
                                                @endif


                                                <!-- Modal de deshabilitación para cada usuario -->
                                                <div class="modal fade" id="disableApoyoModal{{ $apoyos_created->id }}" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title d-evento">
                                                                    <strong>
                                                                        @if ($apoyos_created->status)
                                                                        ¿Estás seguro de que deseas deshabilitar esta inscripción?

                                                                        @else
                                                                        ¿Estás seguro de que deseas Habilitar esta inscripción?
                                                                        @endif
                                                                    </strong>
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card-body">
                                                                    <form action="{{ route('apoyos_created.disable', ['id' => $apoyos_created->id]) }}" method="POST">
                                                                        @csrf
                                                                        @method('PATCH')



                                                                        <div class="d-flex justify-content-center gap-2">
                                                                            <button type="submit" class="btn {{ $apoyos_created->status ? 'btn-ba-rojo' : 'btn-ba' }} px-2">
                                                                                {{ $apoyos_created->status ? 'Deshabilitar' : 'Habilitar' }}
                                                                            </button>
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Fin del modal de deshabilitación -->

                                                <button type="button" class="btn btn-ba-amarillo px-2 " data-bs-toggle="modal" data-bs-target="#editEventModal{{ $apoyos_created->id }}" title="Editar Evento">
                                                    <i class="ri-article-line"></i>
                                                </button>
                                                <!-- Modal de edición para cada evento -->
                                                <div class="modal fade" id="editEventModal{{ $apoyos_created->id }}" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="card-title-ba text-center pb-0 fs-4">Editar apertura de inscripciones</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card-body">
                                                                    <div class="pt-2 pb-2">
                                                                        <h5 class="text-center card-title-ba-azul">Ingrese los datos para editar apertura de inscripciones</h5>
                                                                    </div>
                                                                    
                                                                    <form id="form-new-user" action="{{ route('apoyos.update', $apoyos_created->id) }}" class="row g-3 needs-validation registro-usuario" novalidate method="POST">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label for="apoyoSelect" class="form-label">Apoyo al cual se le abre inscripción</label>
                                                                            <select name="tipo_apoyo_id" class="form-select" id="apoyoSelect" required>
                                                                                <option value="" selected>Seleccione un apoyo</option>
                                                                                @foreach($tipos_apoyos as $tipo)
                                                                                    <option value="{{ $tipo->id }}" {{ (old('tipo_apoyo_id') ?? $apoyos_created->tipo_apoyo_id) == $tipo->id ? 'selected' : '' }}>
                                                                                        {{ $tipo->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            <div class="invalid-feedback">Seleccione un apoyo.</div>
                                                                            @error('tipo_apoyo_id')
                                                                                <li class="text-danger text-inputs">{{ $message }}</li>
                                                                            @enderror
                                                                        </div>
                                                                    
                                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label for="appoiment_date_start" class="form-label">Fecha de Inicio</label>
                                                                            <input
                                                                                type="date"
                                                                                name="appoiment_date_start"
                                                                                class="form-control"
                                                                                id="appoiment_date_start"
                                                                                value="{{ old('appoiment_date_start') ?? $apoyos_created->appoiment_date_start }}"
                                                                                required>
                                                                            <div class="invalid-feedback">Ingrese la fecha de inicio.</div>
                                                                            @error('appoiment_date_start')
                                                                                <li class="text-danger">La fecha de inicio de las inscripciones debe ser una fecha posterior o igual a hoy.</li>
                                                                            @enderror
                                                                        </div>
                                                                    
                                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label for="appoiment_date_end" class="form-label">Fecha de Fin</label>
                                                                            <input
                                                                                type="date"
                                                                                name="appoiment_date_end"
                                                                                class="form-control"
                                                                                id="appoiment_date_end"
                                                                                value="{{ old('appoiment_date_end') ?? $apoyos_created->appoiment_date_end }}"
                                                                                required>
                                                                            <div class="invalid-feedback">Ingrese la fecha de fin.</div>
                                                                            @error('appoiment_date_end')
                                                                                <li class="text-danger">La fecha de finalización debe ser posterior o igual a la fecha de inicio.</li>
                                                                            @enderror
                                                                        </div>
                                                                    
                                                                        <div class="modal-footer d-flex justify-content-center gap-2">
                                                                            <button type="submit" class="btn btn-ba px-2">Actualizar Inscripción</button>
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                        </div>
                                                                    </form>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Fin del modal de editar -->





                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-grid gap-1 d-md-flex justify-content-md-end">

                                <!-- Botón para abrir el modal de creación nuevo usuario -->
                                <button type="button" class="btn btn-ba me-md-2" data-bs-toggle="modal" data-bs-target="#newinsModal">
                                    Abri Inscripción
                                </button>

                                <!-- Modal de creación para usuario -->
                                <div class="modal fade" id="newinsModal" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="card-title-ba text-center pb-0 fs-4">Abrir Inscripción</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="card-body">
                                                    <div class="pt-2 pb-2">
                                                        <h5 class="text-center card-title-ba-azul">Por favor, introduzca la información necesaria para administrar la apertura del apoyo</h5>
                                                    </div>

                                                    <form id="form-new-user" action="{{ route('apoyos.store') }}" class="row g-3 needs-validation registro-usuario" novalidate method="POST">
                                                        @csrf
                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="apoyoSelect" class="form-label">Apoyo al cual se le abre inscripción</label>
                                                            <select name="tipo_apoyo_id" class="form-select" id="apoyoSelect" required>
                                                                <option value="" selected>Seleccione un apoyo</option>
                                                                @foreach($tipos_apoyos as $tipo)
                                                                <option value="{{ $tipo->id }}" {{ old('tipo_apoyo_id') == $tipo->id ? 'selected' : '' }}>
                                                                    {{ $tipo->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">Seleccione un apoyo.</div>
                                                            @error('tipo_apoyo_id')
                                                            <li class="text-danger text-inputs">{{ $message }}</li>
                                                            @enderror
                                                        </div>


                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="appoiment_date_start" class="form-label">Fecha de Inicio</label>
                                                            <input
                                                                type="date"
                                                                name="appoiment_date_start"
                                                                class="form-control"
                                                                id="appoiment_date_start"
                                                                value="{{ old('appoiment_date_start') }}"
                                                                required>
                                                            <div class="invalid-feedback">Ingrese la fecha de inicio.</div>
                                                            @error('appoiment_date_start')
                                                            <li class="text-danger">La fecha de inicio de las inscripciones debe ser una fecha posterior o igual a hoy.</li>
                                                            @enderror
                                                        </div>

                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="appoiment_date_end" class="form-label">Fecha de Fin</label>
                                                            <input
                                                                type="date"
                                                                name="appoiment_date_end"
                                                                class="form-control"
                                                                id="appoiment_date_end"
                                                                value="{{ old('appoiment_date_end') }}"
                                                                required>
                                                            <div class="invalid-feedback">Ingrese la fecha de fin.</div>
                                                            @error('appoiment_date_end')
                                                            <li class="text-danger">La fecha de finalización debe ser posterior o igual a la fecha de inicio.</li>
                                                            @enderror
                                                        </div>

                                                        <div class="modal-footer d-flex justify-content-center gap-2">
                                                            <button type="submit" class="btn btn-ba px-2">Abrir Inscripción</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Fin del modal de creación para usuario-->

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@include('layouts.footer')
@endsection