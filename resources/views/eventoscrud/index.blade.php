@extends('layouts.app')

@section('content')

@section('title-page','Portal Eventos')

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
                        
                        <div class="alert alert-info" role="alert">
                            <strong>¡Bienvenido a la sección de gestión de eventos!</strong> 
                                Aquí podrás administrar todos los aspectos relacionados con tus eventos de manera eficiente y sencilla. Ya sea que estés creando un nuevo evento, actualizando detalles, revisando la lista de eventos existentes o des-habilitando eventos que ya no sean necesarios.
                        </div>
                        <div class="table-responsive">
                            <table class="table datatable rounded-table">
                                <thead>
                                    <tr>
                                        <th class="ellipsis_th" >Id</th>
                                        <th class="ellipsis_th" >Nombre Evento</th>
                                        <th class="ellipsis_th" >Fecha Evento</th>
                                        <th class="ellipsis_th" >Aforo</th>
                                        <th class="ellipsis_th" >Fecha Inicio I.</th>
                                        <th class="ellipsis_th" >Fecha Final I.</th>
                                        <th class="ellipsis_th" >Descripción</th>
                                        <th class="ellipsis_th" >Estado</th>
                                        <th class="ellipsis_th" >Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($events as $event)
                                    <tr>
                                        <td class="ellipsis" >{{ $event->id }}</td>
                                        <td class="ellipsis" >{{ $event->eventname }}</td>
                                        <td class="ellipsis" >{{ $event->eventdate }}</td>
                                        <td class="ellipsis" >{{ $event->eventlimit }}</td>
                                        <td class="ellipsis" >{{ $event->datestar }}</td>
                                        <td class="ellipsis" >{{ $event->dateendevent }}</td>
                                        <td class="ellipsis" >{{ $event->Subjectevent }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center pt-2">
                                                @if ($event->status ==1 )
                                                    <span class="badge" style="background-color: #39A900">Activo</span>
                                                @else
                                                    <span class="badge bg-danger">Inactivo</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <div class="d-flex gap-2">
                                                    <!-- Botón para abrir el modal de visualizar -->
                                                    <button type="button" class=" pl-3 btn btn-ba-view px-2 " data-bs-toggle="modal" data-bs-target="#viewEventModal{{ $event->id }}" title="Visualizar Evento">
                                                        <i class="ri-account-box-line"></i>
                                                    </button>

                                                    <!-- Modal de visualizar para cada evento -->
                                                    <div class="modal fade" id="viewEventModal{{ $event->id }}" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header gap-2">
                                                                    <h5 class="card-title-ba text-center pb-0 fs-4 ">Información Evento</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-body">

                                                                        <form class="row g-3 needs-validation">

                                                                            {{-- Imagen del evento --}}
                                                                            <div class="col-12 text-center">
                                                                                <label for="picture" class="form-label"><strong>Foto del evento</strong></label>
                                                                                <div class="mb-3 image-container">
                                                                                    <img src="{{ asset('images/' . $event->picture) }}" alt="Imagen actual del evento" class="img-fluid">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mt-4">
                                                                                {{-- Nombre del evento --}}
                                                                                <div class="col-12">
                                                                                    <label for="eventname" class="form-label">Nombre del evento</label>
                                                                                    <input value="{{ $event->eventname }}" type="text" name="eventname" class="form-control" id="eventname" disabled>
                                                                                </div>
                                                                            </div>
                                                                            

                                                                            {{-- Fechas del evento --}}
                                                                            <div class="row mt-4">
                                                                                <div class="col-12 col-md-6 col-lg-6 mb-3">
                                                                                    <label for="eventdate" class="form-label">Fecha del evento</label>
                                                                                    <input value="{{ $event->eventdate }}" type="date" name="eventdate" class="form-control" id="eventdate" disabled>
                                                                                </div>
                                                                                {{-- Aforo del evento --}}
                                                                                <div class="col-12 col-md-6 col-lg-6 mb-3">
                                                                                    <label for="eventlimit" class="form-label">Aforo</label>
                                                                                    <input value="{{ $event->eventlimit }}" type="text" name="eventlimit" class="form-control" id="eventlimit" disabled>
                                                                                </div>
                                                                                <div class="col-12 col-md-6 col-lg-6 mb-3">
                                                                                    <label for="datestar" class="form-label ">Fecha Inicio (Inscripción)</label>
                                                                                    <input value="{{ $event->datestar }}" type="date" name="datestar" class="form-control" id="datestar" disabled>
                                                                                </div>
        
                                                                                <div class="col-12 col-md-6 col-lg-6 mb-3">
                                                                                    <label for="dateendevent" class="form-label ">Fecha Final (Inscripción)</label>
                                                                                    <input value="{{ $event->dateendevent }}" type="date" name="dateendevent" class="form-control" id="dateendevent" disabled>
                                                                                </div>
                                                                                
                                                                            </div>

                                                                            <div class="row mt-4">
                                                                                <div class="col-12">
                                                                                <label for="Subjectevent" class="form-label">Descripción del evento</label>
                                                                                <textarea class="form-control" cols="30" rows="4" name="Subjectevent" id="Subjectevent" disabled>{{ $event->Subjectevent }}</textarea>
                                                                            </div></div>
                                                                            

                                                                            <div class=" modal-footer d-flex justify-content-center gap-2 col-12"></div>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Fin del modal de visualizar -->






                                                    <button type="button" class="btn btn-ba-amarillo px-2 " data-bs-toggle="modal" data-bs-target="#editEventModal{{ $event->id }}" title="Editar Evento">
                                                        <i class="ri-article-line"></i>
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
                                                                                <input value="{{ $event->eventdate }}" type="date" name="eventdate" class="form-control" id="eventdate" required>
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
                                                                                <input value="{{ $event->datestar }}" type="date" name="datestar" class="form-control" id="datestar" required>
                                                                                <div class="invalid-feedback">Ingrese una fecha inicial.</div>
                                                                                @error('datestar')
                                                                                <li class="text-danger">{{ $message }}</li>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="col-12 col-md-6">
                                                                                <label for="dateendevent" class="form-label">Fecha Final (Inscripciones)</label>
                                                                                <input value="{{ $event->dateendevent }}" type="date" name="dateendevent" class="form-control" id="dateendevent" required>
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
                                                    </div>
                                                    <!-- Fin del modal de editar -->

                                                    @if ($event->status) 
                                                        <button type="button" class="btn btn-ba px-2" data-bs-toggle="modal" data-bs-target="#deleteEventModal{{ $event->id }}" title="Deshabilitar Evento">
                                                            <i class="ri-chat-check-line"></i> 
                                                        </button>
                                                    @else
                                                        <!-- Botón para abrir el modal de deshabilitar -->
                                                        <button type="button" class="btn btn-ba-rojo px-2" data-bs-toggle="modal" data-bs-target="#deleteEventModal{{ $event->id }}" title="Habilitar Evento">
                                                            <i class="ri-admin-line"></i> 
                                                        </button>
                                                    @endif

                                                    <!-- Modal de eliminación para cada usuario -->
                                                    <div class="modal fade" id="deleteEventModal{{ $event->id }}" tabindex="-1">
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
                                                                        <form action="{{ route('events.disable', ['id' => $event->id]) }}" method="POST">
                                                                            @csrf
                                                                            @method('PATCH')
                                                                            <p>El evento <strong>{{ $event->eventname }}</strong>,
                                                                                programado para el <strong>{{ $event->eventdate }}</strong>,
                                                                                será deshabilitado.
                                                                                El tema del evento es <strong>{{ $event->Subjectevent }}</strong>.
                                                                                Si necesitas más información o tomar alguna medida antes de proceder con la deshabilitación,
                                                                                asegúrate de tener estos detalles a mano.</p>
                                                                            <div class="modal-footer d-flex justify-content-center gap-2">
                                                                                <button type="submit" class="btn {{ $event->status ? 'btn-ba-rojo' : 'btn-ba' }} px-2">
                                                                                    {{ $event->status ? 'Deshabilitar' : 'Habilitar' }}
                                                                                </button>
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Fin del modal de eliminación -->

                                                    <!-- Botón para abrir el modal de mirar inscritos -->
                                                    <button type="button" class="btn btn-ba-card px-2 " data-bs-toggle="modal" data-bs-target="#inscripEventModal{{ $event->id }}" title="Inscritos para Evento">
                                                        <i class=" ri-contacts-book-line"></i>
                                                    </button>
                                                    <!-- Modal de mirar inscritos para cada evento-->
                                                    <div class="modal fade" id="inscripEventModal{{ $event->id }}" tabindex="-1">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"><strong>Inscritos para {{ $event->eventname }}</strong></h5>
                                                                    
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        @if($event->registrations->isEmpty())
                                                                            <p>No hay inscritos para este evento.</p>
                                                                        @else
                                                                        <div class="table-responsive">
                                                                            <table class="table datatable rounded-table">
                                                                                <thead>
                                                                                    <tr class="custom-header">
                                                                                        <th>ID de Usuario</th>
                                                                                        <th>Nombre de Usuario</th>
                                                                                        <th>Tipo de Documento</th>
                                                                                        <th>Documento</th>
                                                                                        <th>Email</th>
                                                                                        <th>Rol</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach($event->registrations as $registration)
                                                                                        <tr>
                                                                                            <td>{{ $registration->user->id }}</td>
                                                                                            <td>{{ $registration->user->name }} {{ $registration->user->lastname }}</td>
                                                                                            <td>{{ $registration->user->TypeDocument->name }}</td>
                                                                                            <td>{{ $registration->user->document }}</td>
                                                                                            <td>{{ $registration->user->email }}</td>
                                                                                            <td>{{ $registration->user->role->name }}</td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Fin del modal de Inscripciones-->

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-grid gap-1 d-md-flex justify-content-md-end">

                                <!-- Botón para abrir el modal de creación nuevo Evento -->
                                <button type="button" class="btn btn-ba me-md-2" data-bs-toggle="modal" data-bs-target="#newEventModal" title="Crear Evento">
                                    Crear Evento
                                </button>

                                <!-- Modal de creación para Evento -->
                                <div class="modal fade" id="newEventModal" tabindex="-1">
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
                                                                    <input name="datestar" type="date" class="form-control" value="{{ old('datestar') }}" required>
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
                                                                    <input name="dateendevent" type="date" class="form-control"  value="{{ old('dateendevent') }}" required>
                                                                    <div class="invalid-feedback">Ingrese una fecha fin de inscripcion</div>
                                                                    @error('dateendevent')
                                                                    <li class="text-danger">{{ $message }}</li>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label for="yourSubject" class="form-label">Descripción del evento</label>
                                                            <textarea class="form-control" cols="30" rows="4" name="Subjectevent" required>{{ old('Subjectevent') }}</textarea>
                                                            <div class="invalid-feedback">Ingrese un asunto.</div>
                                                            @error('Subjectevent')
                                                            <li class="text-danger">{{ $message }}</li>
                                                            @enderror
                                                        </div>

                                                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                            <div class="row mb-"></div>
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center gap-2">
                                                            <button type="submit" class="btn btn-ba px-2">Crear Evento</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- Final modal de creación para Evento-->

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