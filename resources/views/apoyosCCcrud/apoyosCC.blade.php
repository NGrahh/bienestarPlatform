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
                                        {{-- @if ($apoyos_created->appoiment_status) @else --}}
                                        <button type="button" class="btn btn-ba px-2" data-bs-toggle="modal" data-bs-target="#disableUserModal{{ $apoyos_created->id }}" title="Habilitar Apoyo">
                                            <i class="ri-chat-check-line"></i> 
                                        </button>
                                        
                                    
                                        <!-- Botón para abrir el modal de deshabilitar -->
                                        {{-- @endif--}} 
                                        <button type="button" class="btn btn-ba-rojo px-2" data-bs-toggle="modal" data-bs-target="#disableUserModal{{ $apoyos_created->id }}" title="Deshabilitar Apoyo">
                                            <i class="ri-admin-line"></i> 
                                        </button> 
                                        </td>                                           
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

                                <!-- Botón para abrir el modal de creación nuevo usuario -->
                                <button type="button" class="btn btn-ba me-md-2" data-bs-toggle="modal" data-bs-target="#newUserModal" >
                                    Crear Cuenta
                                </button>

                                <!-- Modal de creación para usuario -->
                                <div class="modal fade" id="newUserModal" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="card-title-ba text-center pb-0 fs-4">Crear nuevo Usuario</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="card-body">
                                                    <div class="pt-2 pb-2">
                                                        <h5 class="text-center card-title-ba-azul">Ingrese los datos personales para crear una cuenta</h5>
                                                    </div>
                                                    
                                                    {{-- <form id="form-new-user" action="{{route('auth.store')}}" class="row g-3 needs-validation registro-usuario" novalidate method="POST" >
                                                        @csrf
                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="yourName" class="form-label">Nombre</label>
                                                            <input value="{{old('name')}}" type="text" name="name" class="form-control" id="yourName" required>
                                                            <div class="invalid-feedback">Ingrese el nombre.</div>
                                                            @error('name')
                                                                <li class="text-danger text-inputs">{{ $message}}</li>
                                                            @enderror
                                                        </div>
                                                    
                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="yourlastname" class="form-label">Apellidos</label>
                                                            <input value="{{old('lastname')}}" type="text" name="lastname"class="form-control" id="yourlastname" required>
                                                            <div class="invalid-feedback">Ingrese los apellidos.</div>
                                                            @error('lastname')
                                                                <li class="text-danger">{{ $message}}</li>
                                                            @enderror
                                                        </div>
                                                    
                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="yourTypeDoc" class="form-label"> Tipo documento</label>
                                                            <select name="type_document_id" class="form-select" id="yourTypeDoc" required>
                                                                <option value="">- Seleccione -</option>
                                                                @foreach ($type_documents as $type_document)
                                                                    <option  {{ $type_document->id == old('type_document_id') ? 'selected' : '' }} value="{{ $type_document->id }}">{{ $type_document->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">Ingrese el tipo de documento.</div>
                                                            @error('type_document_id')
                                                                <li class="text-danger">{{ $message}}</li>
                                                            @enderror
                                                        </div>
                                                    
                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="yourDocument" class="form-label"> N° documento</label>
                                                            <div class="input-group has-validation">
                                                                <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                                <input value="{{old('document')}}" type="text" name="document" class="form-control" id="yourDocument" required>
                                                                <div class="invalid-feedback">Ingrese el número de documento.</div>
                                                            </div>
                                                            @error('document')
                                                                <li class="text-danger">{{ $message}}</li>
                                                            @enderror
                                                        </div>
                                                    
                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="yourEmail" class="form-label">Correo electrónico</label>
                                                            <input value="{{old('email')}}" type="email" name="email" class="form-control" id="yourEmail" required>
                                                            <div class="invalid-feedback">Ingrese una dirección de correo electrónico válida.</div>
                                                            @error('email')
                                                                <li class="text-danger">{{ $message}}</li>
                                                            @enderror
                                                        </div>
                                                    
                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="yourRol" class="form-label">Rol</label>
                                                            <select name="rol_id" class="form-select rol_create" id="yourRol" required>
                                                                <option value="">- Seleccione -</option>
                                                                @foreach ($roles as $role)
                                                                <option {{ $role->id == old('rol_id') ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">Ingrese un rol.</div>
                                                            @error('rol_id')
                                                            <li class="text-danger">{{ $message}}</li>
                                                            @enderror
                                                        </div>
                                                    
                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 inputs-to-create" id="training_program" style="{{ old('rol_id') != 5 ? 'display: none;' : '' }}">
                                                            <label for="yourTraining" class="form-label">Programa de formación</label>
                                                            <select name="Program_id" class="form-control" id="yourTraining" required {{ old('rol_id') != 5 ? 'disabled' : '' }}>
                                                                <option value="">- Seleccione -</option>
                                                                @foreach ($programas as $programa)
                                                                <option {{ $programa->id == old('Program_id') ? 'selected' : '' }} value="{{ $programa->id }}">{{ $programa->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">Por favor ingrese el programa de formación.</div>
                                                            @error('Program_id')
                                                            <li class="text-danger">{{ $message}}</li>
                                                            @enderror
                                                        </div>
                                                    
                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 inputs-to-create" id="token_number" style="{{ old('rol_id') != 5 ? 'display: none;' : '' }}">
                                                            <label for="yourToken" class="form-label">Número de ficha</label>
                                                            <input value="{{ old('yourToken') }}" type="text" name="yourToken" class="form-control" id="yourToken" required {{ old('rol_id') != 5 ? 'disabled' : '' }}>
                                                            <div class="invalid-feedback">Por favor ingrese el numero de ficha.</div>
                                                            @error('yourToken')
                                                            <li class="text-danger">{{ $message}}</li>
                                                            @enderror
                                                        </div>
                                                    
                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="yourTypeRh" class="form-label"> Tipo de sangre (RH)</label>
                                                            <select name="type_rh_id" class="form-select" id="yourTypeRh" required>
                                                                <option value="">- Seleccione -</option>
                                                                @foreach ($type_rhs as $type_rh)
                                                                <option  {{ $type_rh->id == old('type_rh_id') ? 'selected' : '' }} value="{{ $type_rh->id }}">{{ $type_rh->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">Ingrese el tipo de sangre (RH).</div>
                                                            @error('type_rh_id')
                                                                <li class="text-danger">{{ $message}}</li>
                                                            @enderror
                                                        </div>
                                                    
                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="yourPassword" class="form-label">Contraseña</label>
                                                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                                                            <div class="invalid-feedback">Por favor ingresa la contraseña.</div>
                                                            @error('password')
                                                            <li class="text-danger">{{ $message}}</li>
                                                            @enderror
                                                        </div>
                                                    
                                                        <div class="modal-footer d-flex justify-content-center gap-2">
                                                            <button type="submit" class="btn btn-ba px-2">Crear usuario</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </form>
                                                     --}}
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