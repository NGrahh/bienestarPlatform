@extends('layouts.app')

@section('content')

@section('title-page', 'Gestión de eventos')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Gestión de eventos</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Información de eventos</h5>

                        <div class="table-responsive">
                            <table class="table datatable table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre Evento</th>
                                        <th>Fecha Evento</th>
                                        <th>Aforo</th>
                                        <th>Fecha Inicio (inscripción)</th>
                                        <th>Fecha Final (inscripción)</th>
                                        <th>Descripción</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($events as $event)
                                    <tr>
                                        <td>{{ $event->id }}</td>
                                        <td>{{ $event->eventname }}</td>
                                        <td>{{ $event->eventdate }}</td>
                                        <td>{{ $event->eventlimit }}</td>
                                        <td>{{ $event->datestar }}</td>
                                        <td>{{ $event->dateendevent }}</td>
                                        <td>{{ $event->Subjectevent }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <!-- Botón para abrir el modal de ditar -->
                                                <button type="button" class="btn btn-ba-amarillo px-2 "  data-bs-toggle="modal" data-bs-target="#editEventModal{{ $event->id }}" title="Editar usuario">
                                                    <i class="bx bxs-user-detail"></i>
                                                </button>

                                                <!-- Modal de edición para cada usuario -->
                                                <div class="modal fade" id="editEventModal{{ $event->id }}" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="card-title-ba text-center pb-0 fs-4">Editar Evento</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card-body">
                                                                    <div class="pt-2 pb-2">
                                                                        <h5 class="text-center card-title-ba-azul">Ingrese los datos para editar el evento</h5>
                                                                    </div>
                                                                    @include('compartido.alertas')
                                                                    <form action="{{ route('events.update', ['id' => $event->id]) }}" class="row g-3 needs-validation" novalidate method="POST">
                                                                        @csrf
                                                                        @method('PUT') <!-- Agregar este campo para indicar que el método es PUT -->
                                                                        
                                                                        <div class="col-12">
                                                                            <label for="name" class="form-label">Nombre del evento</label>
                                                                            <input value="{{ $event->eventname }}" type="text" name="name" class="form-control" id="name" required>
                                                                            <div class="invalid-feedback">Ingrese el nombre del evento.</div>
                                                                            @error('name')
                                                                            <li class="text-danger">{{ $message }}</li>
                                                                            @enderror
                                                                        </div>
                                                                    
                                                                        <div class="col-12 col-md-6">
                                                                            <label for="limit" class="form-label">Aforo</label>
                                                                            <input value="{{ $event->eventlimit }}" type="text" name="limit" class="form-control" id="limit" required>
                                                                            <div class="invalid-feedback">Ingrese un aforo.</div>
                                                                            @error('limit')
                                                                            <li class="text-danger">{{ $message }}</li>
                                                                            @enderror
                                                                        </div>
                                                                    
                                                                        <div class="col-12 col-md-6">
                                                                            <label for="date" class="form-label">Fecha del evento</label>
                                                                            <input value="{{ $event->eventdate }}" type="text" name="date" class="form-control" id="date" required>
                                                                            <div class="invalid-feedback">Ingrese una fecha.</div>
                                                                            @error('date')
                                                                            <li class="text-danger">{{ $message }}</li>
                                                                            @enderror
                                                                        </div>
                                                                    
                                                                        <div class="col-12 text-center">
                                                                            <label for="picture" class="form-label"><strong>Foto del evento</strong></label>
                                                                            <div class="mb-3">
                                                                                <img src="{{ asset('images/' . $event->picture) }}" alt="Imagen actual del evento" class="img-fluid">
                                                                            </div>
                                                                            <input type="file" name="picture" class="form-control" id="picture">
                                                                            <div class="invalid-feedback">Ingrese una foto relacionada al evento.</div>
                                                                            @error('picture')
                                                                            <li class="text-danger">{{ $message }}</li>
                                                                            @enderror
                                                                        </div>
                                                                        
                                                                    
                                                                        <div class="col-12 col-md-6">
                                                                            <label for="start_date" class="form-label">Fecha Inicio (Inscripciones)</label>
                                                                            <input value="{{ $event->datestar }}" type="text" name="start_date" class="form-control" id="start_date" required>
                                                                            <div class="invalid-feedback">Ingrese una fecha inicial.</div>
                                                                            @error('start_date')
                                                                            <li class="text-danger">{{ $message }}</li>
                                                                            @enderror
                                                                        </div>
                                                                    
                                                                        <div class="col-12 col-md-6">
                                                                            <label for="end_date" class="form-label">Fecha Final (Inscripciones)</label>
                                                                            <input value="{{ $event->dateendevent }}" type="text" name="end_date" class="form-control" id="end_date" required>
                                                                            <div class="invalid-feedback">Ingrese una fecha final.</div>
                                                                            @error('end_date')
                                                                            <li class="text-danger">{{ $message }}</li>
                                                                            @enderror
                                                                        </div>
                                                                    
                                                                        <div class="col-12">
                                                                            <label for="description" class="form-label">Descripción del evento</label>
                                                                            <textarea class="form-control" cols="30" rows="4" name="description" required>{{ $event->Subjectevent }}</textarea>
                                                                            <div class="invalid-feedback">Ingrese una descripción del evento.</div>
                                                                            @error('description')
                                                                            <li class="text-danger">{{ $message }}</li>
                                                                            @enderror
                                                                        </div>
                                                                    
                                                                        <div class="col-12">
                                                                            <div class="modal-footer d-flex justify-content-center gap-2">
                                                                                <button type="submit" class="btn btn-ba px-2">Actualizar Evento</button>
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- Fin del modal de editar -->

                                                <!-- Botón para abrir el modal de eliminación -->
                                                <button type="button" class="btn btn-ba-rojo px-2" data-bs-toggle="modal" data-bs-target="#deleteUserModal{{ $event->id }}" title="Eliminar Usuario">
                                                    <i class="bx bxs-user-x"></i>
                                                </button>

                                                <!-- Modal de eliminación para cada usuario -->
                                                <div class="modal fade" id="deleteUserModal{{ $event->id }}" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">
                                                                    <strong>
                                                                        ¿Estás seguro de que deseas eliminar este usuario? Esta acción no se puede deshacer.
                                                                    </strong>
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            @include('compartido.alertas')
                                                            <div class="modal-body">
                                                                <div class="card-body">
                                                                    <form action="{{ route('users.destroy', ['id' => $event->id]) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <p>El usuario <strong></strong></p> {{--identificado con el documento de tipo <strong>{{ $user->TypeDocument->name }}</strong> y número <strong>{{ $user->document }}</strong>, será eliminado. Si necesitas recuperar información o tomar alguna medida antes de proceder con la eliminación, ten en cuenta que su correo electrónico es <strong>{{ $user->email }}</strong> y desempeña el rol de <strong>{{ $user->role->name }}</strong> en nuestra organización. --}}
                                                                        <div class="modal-footer d-flex justify-content-center gap-2">
                                                                        
                                                                            <button type="submit" class="btn btn-ba-rojo px-2">Eliminar</button>
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                            
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- Fin del modal de eliminación -->

                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-grid gap-1 d-md-flex justify-content-md-end">
                                <!-- Botón para abrir el modal de creación nuevo evento -->
                                <button type="button" class="btn btn-ba me-md-2" data-bs-toggle="modal" data-bs-target="#newEventModal">
                                    Crear Evento
                                </button>
                                <!-- Modal de creación para cada evento -->
                                <div class="modal fade" id="newEventModal" tabindex="-1">
                                    <!-- Contenido del modal de creación -->
                                </div><!-- End Large Modal-->

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
