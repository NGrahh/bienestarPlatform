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
                            <table class="table datatable rounded-table">
                                <input type="hidden" id="currentPage" name="currentPage" value="">
                                <thead>
                                    <tr class="TableDatas"> 
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>N° Telefonico</th>
                                        <th>Formato Usuario</th>
                                        <th>Fotocopia Doc.</th>
                                        <th>Recibo Pago</th>
                                        <th>Sisben</th>
                                        <th>Soporte Con.</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($apoyos as $apoyo)
                                        <tr>
                                            <td>{{$apoyo->id}}</td>
                                            <td>{{ $apoyo->user->name }} {{ $apoyo->user->lastname }}</td>
                                            <td>{{ $apoyo->mobilenumber}}</td>
                                            
                                            <td class="ellipsis">
                                                @php
                                                    $fileExtension = pathinfo($apoyo->formatuser, PATHINFO_EXTENSION);
                                                    $fileUrl = asset('images/archivos/' . $apoyo->formatuser);
                                                    
                                                @endphp
                                        
                                            </td>
                                            
                                            
                                            <!-- Fotocopia Doc -->
                                            <td class="ellipsis">
                                                @if(pathinfo($apoyo->photocopy, PATHINFO_EXTENSION) == 'pdf')
                                                    <embed src="{{ asset('images/apoyos/' . $apoyo->photocopy) }}" width="100" height="100" type="application/pdf">
                                                @elseif(in_array(pathinfo($apoyo->photocopy, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                                    <img src="{{ asset('images/apoyos/' . $apoyo->photocopy) }}" width="100" height="100">
                                                @else
                                                    <a href="{{ asset('images/apoyos/' . $apoyo->photocopy) }}">Ver Imagen</a>
                                                @endif
                                            </td>
                                            
                                            <!-- Recibo Pago -->
                                            <td class="ellipsis">
                                                @if(pathinfo($apoyo->receipt, PATHINFO_EXTENSION) == 'pdf')
                                                    <embed src="{{ asset('images/apoyos/' . $apoyo->receipt) }}" width="100" height="100" type="application/pdf">
                                                @elseif(in_array(pathinfo($apoyo->receipt, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                                    <img src="{{ asset('images/apoyos/' . $apoyo->receipt) }}" width="100" height="100">
                                                @else
                                                    <a href="{{ asset('images/apoyos/' . $apoyo->receipt) }}">Ver Imagen</a>
                                                @endif
                                            </td>
                                            
                                            <!-- Sisben -->
                                            <td class="ellipsis">
                                                @if(pathinfo($apoyo->sisben, PATHINFO_EXTENSION) == 'pdf')
                                                    <embed src="{{ asset('images/apoyos/' . $apoyo->sisben) }}" width="100" height="100" type="application/pdf">
                                                @elseif(in_array(pathinfo($apoyo->sisben, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                                    <img src="{{ asset('images/apoyos/' . $apoyo->sisben) }}" width="100" height="100">
                                                @else
                                                    <a href="{{ asset('images/apoyos/' . $apoyo->sisben) }}">Ver Imagen</a>
                                                @endif
                                            </td>
                                            
                                            <!-- Soporte Con -->
                                            <td class="ellipsis">
                                                @if(pathinfo($apoyo->support, PATHINFO_EXTENSION) == 'pdf')
                                                    <embed src="{{ asset('images/apoyos/' . $apoyo->support) }}" width="100" height="100" type="application/pdf">
                                                @elseif(in_array(pathinfo($apoyo->support, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                                    <img src="{{ asset('images/apoyos/' . $apoyo->support) }}" width="100" height="100">
                                                @else
                                                    <a href="{{ asset('images/apoyos/' . $apoyo->support) }}">Ver Archivo</a>
                                                @endif
                                            </td>
                                            
                                
                                            <td>
                                                <div class="d-flex justify-content-center align-items-center pt-2">
                                                    @if ($apoyo->status ==1 )
                                                        <span class="badge" style="background-color: #39A900">Activo</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactivo</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <div class="d-flex gap-2">
                                                            <!-- Botón para abrir el modal para actualizar el usuario-->
                                                            <button type="button" class="btn btn-ba-amarillo px-2 " data-bs-toggle="modal" data-bs-target="#editUserModal{{ $apoyo->id }}" title="Editar usuario">
                                                                <i class="ri-article-line"></i>
                                                            </button>
        
                                                            
        
                                                            @if ($apoyo->status)
                                                                <button type="button" class="btn btn-ba px-2" data-bs-toggle="modal" data-bs-target="#disableSupportModal{{ $apoyo->id }}" title="Habilitar Usuario">
                                                                    <i class="ri-chat-check-line"></i> 
                                                                </button>
                                                            @else
                                                                <button type="button" class="btn btn-ba-rojo px-2" data-bs-toggle="modal" data-bs-target="#disableSupportModal{{ $apoyo->id }}" title="Deshabilitar Usuario">
                                                                    <i class="ri-admin-line"></i> 
                                                                </button>
                                                            @endif   
                                                                
                                                            
        
                                                            <!-- Modal de deshabilitación para cada usuario -->
                                                            <div class="modal fade" id="disableSupportModal{{ $apoyo->id }}" tabindex="-1">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title d-evento">
                                                                                <strong>¿Estás seguro de que deseas deshabilitar este Apoyo?</strong>
                                                                            </h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="card-body">
                                                                                <form action="{{ route('apoyos.disable', ['id' => $apoyo->id]) }}" method="POST">
                                                                                    @csrf
                                                                                    @method('PATCH')
                                                                                    <div class="modal-footer d-flex justify-content-center gap-2">
                                                                                        <button type="submit" class="btn {{ $apoyo->status ? 'btn-ba-rojo' : 'btn-ba' }} px-2">
                                                                                            {{ $apoyo->status ? 'Deshabilitar' : 'Habilitar' }}
                                                                                        </button>
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                            {{--///////////////////////////////////////////////////////////////////////////--}}
                            {{-- Script para capturar la pagina en la cula se ubica el usuario a modificar --}}
                            {{-- <script>
                                $(document).ready(function() {
                                    var table = $('.datatable').DataTable();
                            
                                    // Capturar la página actual al enviar el formulario
                                    $('form').on('submit', function() {
                                        var pageInfo = table.page.info();
                                        $('#currentPage').val(pageInfo.page);
                                    });
                                });
                            </script> --}}
                            {{--///////////////////////////////////////////////////////////////////////////--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@include('layouts.footer')
@endsection