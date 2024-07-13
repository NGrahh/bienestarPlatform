@extends('layouts.app')

@section('content')

@section('title-page','Mis Citas')

@include('layouts.header')
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
                            <table class="table datatable table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Dimensión solicitada</th>
                                        <th>C.electrónico</th>
                                        <th>Número telefónico</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Asunto</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($citas as $cita)
                                    <tr>
                                        
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