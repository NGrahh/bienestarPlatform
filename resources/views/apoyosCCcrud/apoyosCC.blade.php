@extends('layouts.app')

@section('content')

@section('title-page','Información Apoyos')

@include('layouts.header')
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
                        <h5 class="card-title">Información de Apoyos</h5>
                        <div class="table-responsive">
                            <table class="table datatable table-striped">
                                <input type="hidden" id="currentPage" name="currentPage" value="">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre apoyo</th>
                                        <th>Fecha apetura</th>
                                        <th>Fecha fin</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($apoyos_created as $apoyos_created)
                                    <tr>
                                        <td>{{$apoyos_created->id}}</td>
                                        <td>{{$apoyos_created->appoiment->appoiment_name}}</td>
                                        <td>{{$apoyos_created->appoiment_date_start}}</td>
                                        <td>{{$apoyos_created->appoiment_date_end}}</td>
                                        <td>
                                            @if ($apoyos_created->appoiment_status ==1 )
                                                <span class="badge" style="background-color: #39A900">Activo</span>
                                            @else
                                                <span class="badge bg-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td>
                                    @if ($apoyos_created->appoiment_status == 2) 
                                    <button type="button" class="btn btn-ba px-2" data-bs-toggle="modal" data-bs-target="#disableAppoimentModal{{ $apoyos_created->id }}" title="Deshabilitar Usuario">
                                        <i class="ri-chat-check-line"></i> 
                                    </button>                                        
                                    @else
                                    <!-- Botón para abrir el modal de deshabilitar -->
                                    <button type="button" class="btn btn-ba-rojo px-2" data-bs-toggle="modal" data-bs-target="#disableAppoimentModal{{ $apoyos_created->id }}" title="Habilitar Usuario">
                                        <i class="ri-admin-line"></i> 
                                    </button>
                                    @endif
                                        </td>
                                                    <!-- Modal de deshabilitación para cada usuario -->
                                                    <div class="modal fade" id="disableAppoimentModal{{ $apoyos_created->id }}" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title d-evento">
                                                                        <strong>¿Estás seguro de que deseas deshabilitar este apoyo?</strong>
                                                                    </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <form action="{{ route('apoyos_created.disable', ['id' => $apoyos_created->id]) }}" method="POST">
                                                                            @csrf
                                                                            @method('PATCH')

                                                                            <p>El apoyo <strong>{{ $apoyos_created->appoiment_name }}</strong>, 
                                                                                <div class="modal-footer d-flex justify-content-center gap-2">
                                                                                    <button type="submit" class="btn {{ $apoyos_created->appoiment_status ? 'btn-ba-rojo' : 'btn-ba' }} px-2">
                                                                                        {{ $apoyos_created->appoiment_status ? 'Deshabilitar' : 'Habilitar' }}
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
                                        </form>                           
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{--///////////////////////////////////////////////////////////////////////////--}}
                            {{-- Script para capturar la pagina en la cula se ubica el usuario a modificar --}}
                            <script>
                                $(document).ready(function() {
                                    var table = $('.datatable').DataTable();
                            
                                    // Capturar la página actual al enviar el formulario
                                    $('form').on('submit', function() {
                                        var pageInfo = table.page.info();
                                        $('#currentPage').val(pageInfo.page);
                                    });
                                });
                            </script>
                            {{--///////////////////////////////////////////////////////////////////////////--}}
                            
                            <div class="d-grid gap-1 d-md-flex justify-content-md-end">

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