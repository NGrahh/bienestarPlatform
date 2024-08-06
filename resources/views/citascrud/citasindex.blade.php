@extends('layouts.app')

@section('content')

@section('title-page','Información Citas')


@include('layouts.menu')
@include('layouts.header')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Operaciones de gestión de Citas</h1>
    </div>
    @include('compartido.alertas')
    <section class="section">
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-12 mt-3">
                            
                                
                                <form method="GET" action="{{ route('citas.index') }}" class="mb-3">
                                    <div class="alert alert-info" role="alert">
                                        <strong>Seleccione la Dimensión Correspondiente:</strong> 
                                        Por favor, elija la dimensión a la que pertenece para visualizar las citas solicitadas en esa categoría. Esto le permitirá filtrar las citas de acuerdo con la dimensión seleccionada y ver solo las citas relevantes.
                                    </div>
                                    <div class="input-group">
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <select name="dimension_id" class="form-select" onchange="this.form.submit()">
                                                    <option value="">Selecciona una dimensión</option>
                                                    @foreach($dimensions as $dimension)
                                                        <option value="{{ $dimension->id }}" {{ request('dimension_id') == $dimension->id ? 'selected' : '' }}>
                                                            {{ $dimension->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="table-responsive">
                            <table class="table datatable rounded-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col" >Dimensión</th>
                                        <th scope="col">C.electrónico</th>
                                        <th scope="col">Número T.</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Hora</th>
                                        <th scope="col">Asunto</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($citas as $cita)
                                    <tr>
                                        <td scope="row">{{$cita->id}}</td>
                                        <td scope="row" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 100px;">{{ $cita->name }} {{ $cita->lastname }}</td>
                                        <td scope="row" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 150px;">{{ $cita->typeDimensions ? $cita->typeDimensions->name : 'Sin tipo de dimensión' }}</td>
                                        <td scope="row" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 90px;"> {{ $cita->email }}</td>
                                        <td scope="row">{{ $cita->mobilenumber}}</td>
                                        <td scope="row" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 50px;">{{ $cita->date}}</td>
                                        <td scope="row">{{ $cita->hour}}</td>
                                        <td scope="row" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 150px;">{{ $cita->subjectCita }}</td>
                                        <td scope="row">
                                            {{-- CÓDIGO DE LA CITA:  --}}
                                            {{-- 0: Cita Pendiente --}}
                                            {{-- 1: Cita Confirmada --}}
                                            {{-- 2: Cita Pospuesta --}}
                                            {{-- 3: Cita Finalizada --}}
                                            @if($cita->status == 0 )
                                                <span class="badge bg-info text-dark"><i class="bi bi-info-circle me-1"></i> Pendiente</span>
                                            @elseif($cita->status == 1 )
                                                <span class="badge bg-success">Aceptada</span>
                                            @elseif($cita->status == 2 )
                                                <span class="badge bg-warning text-dark">Pospuesta</span>
                                            @elseif($cita->status == 3 )
                                                <span class="badge bg-danger">Rechazada</span>
                                            @endif



                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                {{-- Botón para abri modal --}}
                                                <button type="button" class="btn btn-ba-card px-2" data-bs-toggle="modal" data-bs-target="#showCitaModal{{ $cita->id }}" title="Visualizar Cita">
                                                    <i class="bx bxs-user-detail"></i>
                                                </button>
                        
                                                <!-- Modal de para visualizar cada cita -->
                                                <div class="modal fade" id="showCitaModal{{ $cita->id }}" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="card-title-ba text-center pb-0 fs-4">Cita</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card-body">
                                                                    <form class="row g-3 needs-validation pt-1" novalidate method="POST">
                                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label for="yourName" class="form-label">Nombre</label>
                                                                            <input value="{{$cita->name}}" type="text" name="name" class="form-control" id="yourName" disabled>
                                                                        </div>
                                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label for="yourlastname" class="form-label">Apellidos</label>
                                                                            <input value="{{$cita->lastname}}" type="text" name="lastname" class="form-control" id="yourlastname" disabled>
                                                                        </div>
                                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label for="yourdimensions" class="form-label">Dimensión solicitada</label>
                                                                            <select name="dimensions_id" class="form-select" id="yourdimensions" disabled>
                                                                                @foreach ($dimensions as $dimension)
                                                                                <option {{ $cita->dimensions_id == $dimension->id ? 'selected' : '' }} value="{{ $dimension->id }}">{{ $dimension->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                            <label for="yourEmail" class="form-label">Correo electrónico</label>
                                                                            <input value="{{$cita->email}}" type="email" name="email" class="form-control" id="yourEmail" disabled>
                                                                        </div>
                                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 pt-1">
                                                                            <label for="yournumber" class="form-label">Número telefónico</label>
                                                                            <input value="{{$cita->mobilenumber}}" type="number" name="mobilenumber" class="form-control" id="yournumber" disabled>
                                                                        </div>
                                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 pt-1">
                                                                            <div class="row mb-3">
                                                                                <label for="inputDate" class="form-label">Fecha</label>
                                                                                <div class="col-sm-12">
                                                                                    <input name="date" type="date" class="form-control" value="{{$cita->date}}" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 pt-1 mb-2">
                                                                            <div class="row mb-">
                                                                                <label for="inputTime" class="form-label">Hora</label>
                                                                                <div class="col-sm-12">
                                                                                    <input name="hour" type="time" class="form-control" value="{{$cita->hour}}" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 mb-5">
                                                                            <label for="yourSubject" class="form-label">Asunto</label>
                                                                            <textarea class="form-control" cols="30" rows="4" name="subjectCita" disabled>{{$cita->subjectCita}}</textarea >
                                                                        </div>
                                                                        <div class="modal-footer d-flex justify-content-center gap-2 ">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Fin del modal-->


                                                {{-- Botón para abri modal --}}
                                                <button type="button" class="btn btn-ba px-2" data-bs-toggle="modal" data-bs-target="#actionsCitaModal{{ $cita->id }}" title="Acciones cita">
                                                    <i class="bx bxs-layer-plus" style="color: white"></i>  
                                                </button>
                        
                                                <!-- Modal de Acciones -->
                                                <div class="modal fade" id="actionsCitaModal{{ $cita->id }}" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Confirmar acción</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>¿Estás seguro de que quieres proceder con la cita solicitada por <strong>{{ $cita->name }} {{ $cita->lastname }}</strong>? La cita está programada para la dimensión <strong>{{ $cita->typeDimensions->name }}</strong> y el asunto de la consulta es <strong>{{ $cita->subjectCita }}</strong>.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form method="POST" action="{{ route('citas.handleAction', ['id' => $cita->id]) }}" id="actionForm" class="mx-2 w-100" novalidate>
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="dimension_id" value="{{ request('dimension_id') }}">

                                                                    <div class="form-group">
                                                                        <label for="youractions" class="form-label"><strong>Acciones Cita</strong></label>
                                                                        <select name="actions" class="form-select" id="youractions" required>
                                                                            <option value="">Seleccionar...</option>
                                                                            @foreach ($acciones as $action)
                                                                                <option {{ $action->id == old('actions') ? 'selected' : '' }} value="{{ $action->id }}">{{ $action->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <div class="invalid-feedback">Ingrese la dimensión solicitada.</div>
                                                                        @error('actions')
                                                                            <li class="text-danger">{{ $message }}</li>
                                                                        @enderror

                                                                        <div id="reason-container" class="d-none mt-3">
                                                                            <div class="form-group">
                                                                                <label for="reason"><strong>Motivo: </strong></label>
                                                                                <textarea id="reason" name="reason" class="form-control" rows="3" placeholder="Escribe el motivo aquí...">{{ old('reason', $cita->reason ?? '') }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="text-center mt-3">
                                                                        <button type="submit" class="btn btn-ba">Enviar</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Fin del modal -->
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@include('layouts.footer')
@endsection