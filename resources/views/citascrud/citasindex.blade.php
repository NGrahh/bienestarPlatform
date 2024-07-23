@extends('layouts.app')

@section('content')

@section('title-page','Información Citas')


@include('layouts.menu')
@include('layouts.header')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Operaciones de gestión de Citas</h1>
    </div><!-- End Page Title -->
    @include('compartido.alertas')
    <section class="section">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Información de Citas</h5>
                        <div class="table-responsive">
                            <table class="table datatable table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Dimensión solicitada</th>
                                        <th>C.electrónico</th>
                                        <th>Número telefónico</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Asunto</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($citas as $cita)
                                    <tr>
                                        <td>{{$cita->id}}</td>
                                        <td style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 100px;">{{ $cita->name }} {{ $cita->lastname }}</td>
                                        <td style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 150px;">{{ $cita->typeDimensions ? $cita->typeDimensions->name : 'Sin tipo de dimensión' }}</td>
                                        <td style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 90px;"> {{ $cita->email }}</td>
                                        <td>{{ $cita->mobilenumber}}</td>
                                        <td style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 50px;">{{ $cita->date}}</td>
                                        <td>{{ $cita->hour}}</td>
                                        <td style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 150px;">{{ $cita->subjectCita }}</td>
                                        <td>
                                            @if ($cita->status ==1 )
                                                <span class="badge" style="background-color: #39A900">C. Aceptada</span>
                                            @else
                                                <span class="badge bg-danger">C. Rechazada</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
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
                                                                    <div class="pt-2 pb-2">
                                                                        <h5 class="card-title-ba-azul"></h5>
                                                                    </div>
                                                                    <form class="row g-3 needs-validation" novalidate method="POST">
                                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label for="yourName" class="form-label">Nombre</label>
                                                                            <input value="{{$cita->name}}" type="text" name="name" class="form-control" id="yourName" disabled>
                                                                            <div class="invalid-feedback">Ingrese el nombre.</div>
                                                                            @error('name')
                                                                            <li class="text-danger">{{ $message}}</li>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label for="yourlastname" class="form-label">Apellidos</label>
                                                                            <input value="{{$cita->lastname}}" type="text" name="lastname" class="form-control" id="yourlastname" disabled>
                                                                            <div class="invalid-feedback">Ingrese los apellidos.</div>
                                                                            @error('lastname')
                                                                            <li class="text-danger">{{ $message}}</li>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label for="yourdimensions" class="form-label">Dimensión solicitada</label>
                                                                            <select name="dimensions_id" class="form-select" id="yourdimensions" disabled>
                                                                                @foreach ($dimensions as $dimension)
                                                                                <option {{ $cita->dimensions_id == $dimension->id ? 'selected' : '' }} value="{{ $dimension->id }}">{{ $dimension->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <div class="invalid-feedback">Ingrese la dimensión solicitada.</div>
                                                                            @error('dimensions_id')
                                                                            <li class="text-danger">{{ $message}}</li>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                            <label for="yourEmail" class="form-label">Correo electrónico</label>
                                                                            <input value="{{$cita->email}}" type="email" name="email" class="form-control" id="yourEmail" disabled>
                                                                            <div class="invalid-feedback">Ingrese una dirección de correo electrónico válida.</div>
                                                                            @error('email')
                                                                            <li class="text-danger">{{ $message}}</li>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                                            <label for="yournumber" class="form-label">Número telefónico</label>
                                                                            <input value="{{$cita->mobilenumber}}" type="number" name="mobilenumber" class="form-control" id="yournumber" disabled>
                                                                            <div class="invalid-feedback">Ingrese un número telefónico.</div>
                                                                            @error('mobilenumber')
                                                                            <li class="text-danger">{{ $message}}</li>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                                            <div class="row mb-3">
                                                                                <label for="inputDate" class="form-label">Fecha</label>
                                                                                <div class="col-sm-12">
                                                                                    <input name="date" type="date" class="form-control" value="{{$cita->date}}" disabled>
                                                                                    <div class="invalid-feedback">Ingrese una fecha.</div>
                                                                                    @error('date')
                                                                                    <li class="text-danger">{{ $message}}</li>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                                            <div class="row mb-">
                                                                                <label for="inputTime" class="form-label">Hora</label>
                                                                                <div class="col-sm-12">
                                                                                    <input name="hour" type="time" class="form-control" value="{{$cita->hour}}" disabled>
                                                                                    <div class="invalid-feedback">Ingrese una hora.</div>
                                                                                    @error('hour')
                                                                                    <li class="text-danger">{{ $message}}</li>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <label for="yourSubject" class="form-label">Asunto</label>
                                                                            <textarea class="form-control" cols="30" rows="4" name="subjectCita" disabled>{{$cita->subjectCita}}</textarea >
                                                                            <div class="invalid-feedback">Ingrese un asunto.</div>
                                                                            @error('subjectCita')
                                                                            <li class="text-danger">{{ $message}}</li>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="modal-footer d-flex justify-content-center gap-2">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Fin del modal-->
                                                @if ($cita->status) 
                                                <button type="button" class="btn btn-ba px-2" data-bs-toggle="modal" data-bs-target="#disableUserModal{{ $cita->id }}" title="Deshabilitar cita">
                                                    <i class="ri-eye-off-line"></i> 
                                                </button>
                                                @else
                                                <!-- Botón para abrir el modal de deshabilitar -->
                                                <button type="button" class="btn btn-ba-rojo px-2" data-bs-toggle="modal" data-bs-target="#disablecitaModal{{ $cita->id }}" title="Habilitar cita">
                                                    <i class="bi bi-check-circle"></i>
                                                </button>
                                                @endif
                        
                                                <!-- Modal de deshabilitar -->
                                                <div class="modal fade" id="disablecitaModal{{ $cita->id }}" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Confirmar acción</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>¿Estás seguro de que quieres habilitar la cita <strong>{{ $cita->subjectCita }}</strong> de <strong>{{ $cita->name }} {{ $cita->lastname }}</strong>?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                {{-- <form method="POST" action="{{ route('habilitar.cita', ['id' => $cita->id]) }}"> --}}
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-primary">Habilitar</button>
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