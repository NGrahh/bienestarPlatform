@extends('layouts.app')

@section('content')

@section('title-page','Información Eventos')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Gestión de eventos</h1>
    </div><!-- End Page Title -->
    @include('compartido.alertas')
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
                                                <button type="button" class="btn btn-ba-amarillo px-2 " data-bs-toggle="modal" data-bs-target="#editEventModal{{ $event->id }}" title="Editar usuario">
                                                    <i class="bx bxs-user-detail"></i>
                                                </button>

                                                <!-- Modal de edición para cada evento -->
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
                                                                    
                                                                    <form action="{{ route('events.update', ['id' => $event->id]) }}" class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')

                                                                        <div class="col-12">
                                                                            <label for="eventname" class="form-label">Nombre del evento</label>
                                                                            <input value="{{ $event->eventname }}" type="text" name="eventname" class="form-control" id="eventname" required>
                                                                            <div class="invalid-feedback">Ingrese el nombre del evento.</div>
                                                                            @error('eventname')
                                                                            <li class="text-danger">{{ $message }}</li>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="col-12 col-md-6">
                                                                            <label for="eventlimit" class="form-label">Aforo</label>
                                                                            <input value="{{ $event->eventlimit }}" type="text" name="eventlimit" class="form-control" id="eventlimit" required>
                                                                            <div class="invalid-feedback">Ingrese un aforo.</div>
                                                                            @error('eventlimit')
                                                                            <li class="text-danger">{{ $message }}</li>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="col-12 col-md-6">
                                                                            <label for="eventdate" class="form-label">Fecha del evento</label>
                                                                            <input value="{{ $event->eventdate }}" type="text" name="eventdate" class="form-control" id="eventdate" required>
                                                                            <div class="invalid-feedback">Ingrese una fecha.</div>
                                                                            @error('eventdate')
                                                                            <li class="text-danger">{{ $message }}</li>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="col-12 text-center">
                                                                            <label for="picture" class="form-label"><strong>Foto del evento</strong></label>
                                                                            <div class="mb-3 image-container">
                                                                                <img src="{{ asset('images/' . $event->picture) }}" alt="Imagen actual del evento" class="img-fluid">
                                                                            </div>
                                                                            <input type="file" name="picture" class="form-control" id="picture">
                                                                            <div class="invalid-feedback">Ingrese una foto relacionada al evento.</div>
                                                                            @error('picture')
                                                                            <li class="text-danger">{{ $message }}</li>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="col-12 col-md-6">
                                                                            <label for="datestar" class="form-label">Fecha Inicio (Inscripciones)</label>
                                                                            <input value="{{ $event->datestar }}" type="text" name="datestar" class="form-control" id="datestar" required>
                                                                            <div class="invalid-feedback">Ingrese una fecha inicial.</div>
                                                                            @error('datestar')
                                                                            <li class="text-danger">{{ $message }}</li>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="col-12 col-md-6">
                                                                            <label for="dateendevent" class="form-label">Fecha Final (Inscripciones)</label>
                                                                            <input value="{{ $event->dateendevent }}" type="text" name="dateendevent" class="form-control" id="dateendevent" required>
                                                                            <div class="invalid-feedback">Ingrese una fecha final.</div>
                                                                            @error('dateendevent')
                                                                            <li class="text-danger">{{ $message }}</li>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="col-12">
                                                                            <label for="Subjectevent" class="form-label">Descripción del evento</label>
                                                                            <textarea class="form-control" cols="30" rows="4" name="Subjectevent" id="Subjectevent" required>{{ $event->Subjectevent }}</textarea>
                                                                            <div class="invalid-feedback">Ingrese una descripción del evento.</div>
                                                                            @error('Subjectevent')
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
                                                            
                                                            <div class="modal-body">
                                                                <div class="card-body">
                                                                    <form action="{{ route('events.destroy', ['id' => $event->id]) }}" method="POST">
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
                                <!-- Botón para abrir el modal de creación nuevo usuario -->
                                <button type="button" class="btn btn-ba me-md-2" data-bs-toggle="modal" data-bs-target="#newUserModal">
                                    Crear Evento
                                </button>
                                <!-- Modal de creación para cada usuario -->
                                <div class="modal fade" id="newUserModal" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="card-title-ba text-center pb-0 fs-4">Crear nuevo Evento</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="card-body">
                                                    <div class="pt-2 pb-2">
                                                        <h5 class="text-center card-title-ba-azul">Ingrese los datos para crear un evento</h5>
                                                    </div>

                                                    <form action="{{ route('eventos.store') }}" class="row g-3 needs-validation py-4" novalidate method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="nameevent" class="form-label">Nombre del evento</label>
                                                            <input value="{{ old('eventname') }}" type="text" name="eventname" class="form-control" id="nameevent" required>
                                                            <div class="invalid-feedback">Ingrese el nombre del evento.</div>
                                                            @error('eventname')
                                                            <li class="text-danger">{{ $message }}</li>
                                                            @enderror
                                                        </div>
                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="pictureevent" class="form-label">Foto del evento</label>
                                                            <input type="file" name="picture" class="form-control" id="pictureevent" required>
                                                            <div class="invalid-feedback">Ingrese una foto relacionada al evento.</div>
                                                            @error('picture')
                                                            <li class="text-danger">{{ $message }}</li>
                                                            @enderror
                                                        </div>

                                                        <div class="col-12 col-sm-4 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="dateevent" class="form-label">Fecha del evento</label>
                                                            <input value="{{ old('eventdate') }}" type="date" name="eventdate" class="form-control" id="dateevent" required>
                                                            <div class="invalid-feedback">Ingrese la fecha del evento.</div>
                                                            @error('eventdate')
                                                            <li class="text-danger">{{ $message }}</li>
                                                            @enderror
                                                        </div>
                                                        <div class="col-12 col-sm-4 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="limitcapacity" class="form-label">Aforo</label>
                                                            <input value="{{ old('eventlimit') }}" type="number" name="eventlimit" class="form-control" id="limitcapacity">
                                                            @error('eventlimit')
                                                            <li class="text-danger">{{ $message }}</li>
                                                            @enderror
                                                        </div>
                                                        <div class="col-12 col-sm-4 col-md-6 col-lg-6 col-xl-6">
                                                            <div class="row mb-3">
                                                                <label for="datestarevent" class="form-label">Fecha Inicio de inscripción</label>
                                                                <div class="col-sm-12">
                                                                    <input name="datestar" type="date" class="form-control" required>
                                                                    <div class="invalid-feedback">Ingrese la fecha de inicio de inscripción</div>
                                                                    @error('datestar')
                                                                    <li class="text-danger">{{ $message }}</li>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-4 col-md-6 col-lg-6 col-xl-6">
                                                            <div class="row mb-">
                                                                <label for="dateendevent" class="form-label">Fecha fin de inscripcion</label>
                                                                <div class="col-sm-12">
                                                                    <input name="dateendevent" type="date" class="form-control" required>
                                                                    <div class="invalid-feedback">Ingrese una fecha fin de inscripcion</div>
                                                                    @error('dateendevent')
                                                                    <li class="text-danger">{{ $message }}</li>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label for="yourSubject" class="form-label">Descripción del evento</label>
                                                            <textarea class="form-control" cols="30" rows="4" name="Subjectevent" required></textarea>
                                                            <div class="invalid-feedback">Ingrese un asunto.</div>
                                                            @error('Subjectevent')
                                                            <li class="text-danger">{{ $message }}</li>
                                                            @enderror
                                                        </div>

                                                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                            <div class="row mb-"></div>
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center gap-2">
                                                            <button type="submit" class="btn btn-ba px-2">Actualizar evento</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
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