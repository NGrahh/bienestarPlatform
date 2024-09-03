@extends('layouts.app')

<!-- Preloader -->
<div class="preloader-it">
    <div class="loader-pendulums"></div>
</div>
<!-- /Preloader -->

@section('content')

@section('title-page','Mis Citas')

@include('layouts.header_Crud')
@include('layouts.menu')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Gestión de Citas</h1>
    </div><!-- End Page Title -->
    @include('compartido.alertas')
    <section class="section">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Mis Citas</h5>
                        <div class="table-responsive">
                            <table class="table datatable rounded-table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Dimensión</th>
                                        <th>C.electrónico</th>
                                        <th>Número</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Asunto</th>
                                        <th>Acciones</th>
                                        <th>Motivo</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($citas as $cita)
                                    <tr>
                                        
                                        <td style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 100px;">{{ $cita->name }} {{ $cita->lastname }}</td>
                                        <td style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 150px;">{{ $cita->typeDimensions ? $cita->typeDimensions->name : 'Sin tipo de dimensión' }}</td>
                                        <td style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 90px;"> {{ $cita->email }}</td>
                                        <td>{{ $cita->numberphone}}</td>
                                        <td style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 50px;">{{ $cita->date}}</td>
                                        <td>{{ $cita->hour}}</td>
                                        <td style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 150px;">{{ $cita->subjectCita }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <div class="d-flex gap-2">
                                                
                                                        {{-- Botón para abri modal --}}
                                                <button type="button" class="btn btn-ba-amarillo px-2" data-bs-toggle="modal" data-bs-target="#updateCitaModal{{ $cita->id }}" title="Editar Cita">
                                                    <i class="bi bi-file-earmark-person-fill"></i>
                                                </button>
                        
                                                <!-- Modal de para visualizar cada cita -->
                                                <div class="modal fade" id="updateCitaModal{{ $cita->id }}" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="card-title-ba text-center pb-0 fs-4">Cita</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card-body">
                                                                    <form action="{{ route('citas.update', ['id' => $cita->id]) }}" class="row g-3 needs-validation" novalidate method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <label for="yourName" class="form-label"><strong>Nombre</strong></label>
                                                                            <input value="{{$cita->name}}" type="text" name="name" class="form-control" id="yourName" disabled>
                                                                        </div>
                                                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <label for="yourlastname" class="form-label"><strong>Apellidos</strong></label>
                                                                            <input value="{{$cita->lastname}}" type="text" name="lastname" class="form-control" id="yourlastname" disabled>
                                                                        </div>
                                                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <label for="yournumber" class="form-label"><strong>Número telefónico</strong></label>
                                                                            <input value="{{$cita->numberphone}}" type="number" name="mobilenumber" class="form-control" id="yournumber" disabled>
                                                                        </div>
                                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label for="yourdimensions" class="form-label"><strong>Dimensión solicitada</strong></label>
                                                                            <select name="dimensions_id" class="form-select" id="yourdimensions" disabled>
                                                                                @foreach ($dimensions as $dimension)
                                                                                <option {{ $cita->dimensions_id == $dimension->id ? 'selected' : '' }} value="{{ $dimension->id }}">{{ $dimension->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                            <label for="yourEmail" class="form-label"><strong>Correo electrónico</strong></label>
                                                                            <input value="{{$cita->email}}" type="email" name="email" class="form-control" id="yourEmail" disabled>
                                                                        </div>
                                                                        
                                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 pt-1">
                                                                            <div class="row mb-3">
                                                                                <label for="inputDate" class="form-label"><strong>Fecha</strong></label>
                                                                                <div class="col-sm-12">
                                                                                    <input name="date" type="date" class="form-control" value="{{$cita->date}}" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 pt-1 mb-2">
                                                                            <div class="row mb-">
                                                                                <label for="inputTime" class="form-label"><strong>Hora</strong></label>
                                                                                <div class="col-sm-12">
                                                                                    <input name="hour" type="time" class="form-control" value="{{$cita->hour}}" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 mb-5">
                                                                            <label for="yourSubject" class="form-label"><strong>Asunto</strong></label>
                                                                            <textarea class="form-control" cols="30" rows="4" name="subjectCita" required>{{$cita->subjectCita}}</textarea >
                                                                        </div>
                                                                        <div class="modal-footer d-flex justify-content-center gap-2">
                                                                            @if ($cita->status !== '1')
                                                                                <button type="submit" class="btn btn-ba px-2">Actualizar Cita</button>
                                                                            @endif
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                        </div>
                                                                        
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Fin del modal-->
                                                </div>
                                            </div>   
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <div class="d-flex gap-2">
                                                    @if ($cita->status === '2' || $cita->status === '3')
                                                        {{-- Botón para abri modal --}}
                                                        <button type="button" class="btn btn-ba-card px-2" data-bs-toggle="modal" data-bs-target="#showMiCitaModal{{ $cita->id }}" title="Visualizar Cita">
                                                            <i class="bx bxs-user-detail"></i>
                                                        </button>
                                
                                                        <!-- Modal de para visualizar cada cita -->
                                                        <div class="modal fade" id="showMiCitaModal{{ $cita->id }}" tabindex="-1">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="card-title-ba text-center pb-0 fs-4">Información!</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="card-body">
                                                                            <form class="row g-3 needs-validation pt-1" novalidate >
                                                                                <div class="col-sm-12 mb-5">
                                                                                    <label for="yourSubject" class="form-label"><strong>Asunto: </strong></label>
                                                                                    <textarea class="form-control" cols="30" rows="4" name="subjectCita" disabled>{{$cita->reason}}</textarea >
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
                                                    @else
                                                        No aplica
                                                    @endif
                                                </div>
                                            </div>   
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center pt-2">
                                                @if($cita->status == 0 )
                                                    <span class="badge bg-info text-dark"><i class="bi bi-info-circle me-1"></i> Pendiente</span>
                                                @elseif($cita->status == 1 )
                                                    <span class="badge bg-success">Aceptada</span>
                                                @elseif($cita->status == 2 )
                                                    <span class="badge bg-warning text-dark">Pospuesta</span>
                                                @elseif($cita->status == 3 )
                                                    <span class="badge bg-danger">Rechazada</span>
                                                @endif
                                            </div>
                                        </td>
                                        











                                        
                                        
                                        {{-- <tr>
                                            <td>{{ $cita->id }}</td>
                                            <td>{{ $cita->hour }}</td>
                                            <td>{{ $cita->date }}</td>
                                            <td>{{ $cita->subjectCita }}</td>
                                            
                                        </tr>
                                        <td>
                                            @if($cita->status == 0 )
                                                <span class="badge bg-info text-dark"><i class="bi bi-info-circle me-1"></i> Pendiente</span>
                                            @elseif($cita->status == 1 )
                                                <span class="badge bg-success">Aceptada</span>
                                            @elseif($cita->status == 2 )
                                                <span class="badge bg-warning text-dark">Pospuesta</span>
                                            @elseif($cita->status == 3 )
                                                <span class="badge bg-danger">Rechazada</span>
                                            @endif
                                        </td> --}}
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                            <div class="col-lg-12 ml-2">
                        <div class="d-grid gap-1 d-md-flex justify-content-md-end mt-5 mb-5">
                            <a  href="{{route('form-appointment')}}"><button class="btn btn-ba">Solicitar Cita</button></a>
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