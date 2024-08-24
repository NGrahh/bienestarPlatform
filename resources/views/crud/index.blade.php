@extends('layouts.app')

<!-- Preloader -->
<div class="preloader-it">
    <div class="loader-pendulums"></div>
</div>
<!-- /Preloader -->

@section('content')
@section('title-page','Información Usuarios')
@include('layouts.header_Crud')
@include('layouts.menu')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Operaciones de gestión de Usuarios</h1>
    </div><!-- End Page Title -->
    @include('compartido.alertas')
    
    <section class="section">
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-info mt-4 mb-5" role="alert">
                            <strong>¡Bienvenido a la sección de gestión de usuarios!</strong><br>
                            Aquí podrás administrar todos los aspectos relacionados con los usuarios de manera eficiente y sencilla. Ya sea que estés creando un nuevo usuario, actualizando detalles, o des/habilitando usuarios que ya no sean necesarios.
                        </div>
                        <div class="table-responsive">
                            <table class="table datatable rounded-table">
                                <input type="hidden" id="currentPage" name="currentPage" value="">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>T.identificación</th>
                                        <th>N.identificación</th>
                                        <th>C.electrónico</th>
                                        <th>N.telefónico</th>
                                        <th>Rol</th>
                                        <th>Estado</th> 
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td class="ellipsis">
                                            <div class="d-flex justify-content-center align-items-center pt-2">
                                                <strong>{{$user->id}}</strong>
                                            </div>
                                        </td>
                                        <td class="ellipsis">{{ $user->name }} {{ $user->lastname }}</td>
                                        <td class="ellipsis">{{ $user->TypeDocument->name }}</td>
                                        <td class="ellipsis">{{ $user->document }}</td>
                                        <td class="ellipsis">{{ $user->email }}</td>
                                        <td class="ellipsis">{{ $user->numberphone }}</td>
                                        <td class="ellipsis">{{ $user->role->name }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center pt-2">
                                                @if ($user->status ==1 )
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
                                                        <button type="button" class="btn btn-ba-amarillo px-2 " data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}" title="Editar usuario">
                                                            <i class="ri-article-line"></i>
                                                        </button>
                                                        

                                                        <!-- Modal de actualizar para cada usuario -->
                                                        <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="card-title-ba text-center pb-0 fs-4">Editar Usuario</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="card-body">
                                                                            <div class="pt-2 pb-2">
                                                                                <h5 class="text-center card-title-ba-azul">Ingrese los datos personales para editar la cuenta</h5>
                                                                            </div>

                                                                            <form action="{{ route('users.update', ['id' => $user->id]) }}" class="row g-3 needs-validation" novalidate method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <input type="hidden" id="currentPage" name="currentPage" value="">
                                                                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <label for="yourName" class="form-label"><strong>Nombre</strong></label>
                                                                                    <input value="{{$user->name }}" type="text" name="name" class="form-control" id="yourName" required>
                                                                                    <div class="invalid-feedback">Ingrese el nombre.</div>
                                                                                    @error('name')
                                                                                    <li class="text-danger">{{ $message}}</li>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <label for="yourlastname" class="form-label"><strong>Apellidos</strong></label>
                                                                                    <input value="{{$user->lastname }}" type="text" name="lastname" class="form-control" id="yourlastname" required>
                                                                                    <div class="invalid-feedback">Ingrese los apellidos.</div>
                                                                                    @error('lastname')
                                                                                    <li class="text-danger">{{ $message}}</li>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <label for="yourTypeDoc" class="form-label"><strong>Tipo documento</strong></label>
                                                                                    <select name="type_document_id" class="form-select" id="yourTypeDoc" required>
                                                                                        <option value="">- Seleccione -</option>
                                                                                        @foreach ($type_documents as $type_document)
                                                                                        <option {{ $user->type_document_id == $type_document->id ? 'selected' : '' }} value="{{ $type_document->id }}">{{ $type_document->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <div class="invalid-feedback">Ingrese el tipo de documento.</div>
                                                                                    @error('type_document_id')
                                                                                    <li class="text-danger">{{ $message }}</li>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <label for="yourDocument" class="form-label"><strong>Número documento</strong></label>
                                                                                    <div class="input-group has-validation">
                                                                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                                                        <input value="{{$user->document}}" type="text" name="document" class="form-control" id="yourDocument" required>
                                                                                        <div class="invalid-feedback">Ingrese el número de documento.</div>
                                                                                    </div>
                                                                                    @error('document')
                                                                                    <li class="text-danger">{{ $message}}</li>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                                    <label for="yourEmail" class="form-label"><strong>Correo electrónico</strong></label>
                                                                                    <input value="{{$user->email}}" type="email" name="email" class="form-control" id="yourEmail" required>
                                                                                    <div class="invalid-feedback">Ingrese una dirección de correo electrónico válida.</div>
                                                                                    @error('email')
                                                                                    <li class="text-danger">{{ $message}}</li>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                                    <label for="yourRol_update" class="form-label"><strong>Rol</strong></label>
                                                                                    <select name="rol_id" data-id-user="{{$user->id}}" class="form-select rol_edit" id="yourRol_update" required>
                                                                                        <option value="">- Seleccione -</option>
                                                                                        @foreach ($roles as $role)
                                                                                            <option {{ $user->rol_id == $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <div class="invalid-feedback">Ingrese un rol.</div>
                                                                                    @error('rol_id')
                                                                                    <li class="text-danger">{{ $message}}</li>
                                                                                    @enderror
                                                                                </div>









                                                                                
                                                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 inputs-to-rol-{{$user->id}}" id="training_program_update" style="{{ $user->rol_id != 5 ? 'display: none;' : '' }}">
                                                                                    <label for="yourTraining_update" class="form-label"><strong>Programa de formación</strong></label>
                                                                                    <select name="Program_id" class="form-select" id="yourTraining_update" required {{ $user->rol_id != 5 ? 'disabled' : '' }}>
                                                                                        <option value="">- Seleccione -</option>
                                                                                        @foreach ($programas as $programa)
                                                                                            <option {{ $user->Program_id == $programa->id ? 'selected' : '' }} value="{{ $programa->id }}">{{ $programa->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <div class="invalid-feedback">Por favor ingrese el programa de formación.</div>
                                                                                    @error('Program_id')
                                                                                        <li class="text-danger">{{ $message }}</li>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 inputs-to-rol-{{$user->id}}" id="token_number_update" style="{{ $user->rol_id != 5 ? 'display: none;' : '' }}">
                                                                                    <label for="yourToken_update" class="form-label"><strong>Número de ficha</strong></label>
                                                                                    <input value="{{$user->yourToken}}" type="text" name="yourToken" class="form-control" id="yourToken_update" required {{ $user->rol_id != 5 ? 'disabled' : '' }}>
                                                                                    <div class="invalid-feedback">Por favor ingrese el número de ficha.</div>
                                                                                    @error('yourToken')
                                                                                    <li class="text-danger">{{ $message}}</li>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                                    <label for="yourTypeRh" class="form-label"><strong>Tipo de sangre (RH)</strong> </label>
                                                                                    <select name="type_rh_id" class="form-select" id="yourTypeRh" required>
                                                                                        <option value="">- Seleccione -</option>
                                                                                        @foreach ($type_rhs as $type_rh)
                                                                                        <option {{ $user->type_rh_id == $type_rh->id ? 'selected' : '' }} value="{{ $type_rh->id }}">{{ $type_rh->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <div class="invalid-feedback">Ingrese el tipo de sangre (RH).</div>
                                                                                    @error('type_rh_id')
                                                                                    <li class="text-danger">{{ $message}}</li>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                                    <label for="phonenumber" class="form-label"><Strong>Número telefónico</Strong> </label>
                                                                                    <input value="{{$user->numberphone}}" type="number" name="numberphone" class="form-control" id="phonenumber" required>
                                                                                    <div class="invalid-feedback">Por favor ingresa el número telefónico.</div> 
                                                                                    @error('numberphone')
                                                                                    <li class="text-danger">{{ $message}}</li>
                                                                                    @enderror
                                                                                </div>

                                                                                <div class="modal-footer d-flex justify-content-center gap-2">
                                                                                    <button type="submit" class="btn btn-ba px-2">Actualizar usuario</button>
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                                </div>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Fin del modal de actualizar -->

                                                        @if ($user->status)
                                                            <!-- Botón para abrir el modal de Des-habilitar -->
                                                            <button type="button" class="btn btn-ba px-2" data-bs-toggle="modal" data-bs-target="#disableUserModal{{ $user->id }}" title="Deshabilitar Usuario">
                                                                <i class="ri-chat-check-line"></i> 
                                                            </button>
                                                        @else
                                                            <!-- Botón para abrir el modal de Habilitar -->
                                                            <button type="button" class="btn btn-ba-rojo px-2" data-bs-toggle="modal" data-bs-target="#disableUserModal{{ $user->id }}" title="Habilitar Usuario">
                                                                <i class="ri-admin-line"></i> 
                                                            </button>
                                                        @endif
                                                        

                                                        <!-- Modal de deshabilitación para cada usuario -->
                                                        <div class="modal fade" id="disableUserModal{{ $user->id }}" tabindex="-1">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title d-evento">
                                                                            <strong>¿Estás seguro de que deseas deshabilitar este usuario?</strong>
                                                                        </h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="card-body">
                                                                            <form action="{{ route('users.disable', ['id' => $user->id]) }}" method="POST">
                                                                                @csrf
                                                                                @method('PATCH')

                                                                                <p>El usuario <strong>{{ $user->name }} {{ $user->lastname }}</strong>, 
                                                                                    identificado con el documento de tipo <strong>{{ $user->TypeDocument->name }}</strong>
                                                                                    y número <strong>{{ $user->document }}</strong>, será deshabilitado.
                                                                                    Si necesitas recuperar información o tomar alguna medida antes de proceder con la deshabilitación,
                                                                                    ten en cuenta que su correo electrónico es <strong>{{ $user->email }}</strong>
                                                                                    y desempeña el rol de <strong>{{ $user->role->name }}</strong> en nuestra organización.</p>

                                                                                    <div class="modal-footer d-flex justify-content-center gap-2">
                                                                                        <button type="submit" class="btn {{ $user->status ? 'btn-ba-rojo' : 'btn-ba' }} px-2">
                                                                                            {{ $user->status ? 'Deshabilitar' : 'Habilitar' }}
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
                                                        
                                                </div>
                                            </div>
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
                            
                            <div class="d-grid gap-1 d-md-flex justify-content-md-end mt-5 mb-5">
                                
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
                                                    
                                                    <form id="form-new-user" action="{{route('auth.store')}}" class="row g-3 needs-validation registro-usuario" novalidate method="POST" >
                                                        @csrf
                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="yourName" class="form-label"><strong>Nombre</strong></label>
                                                            <input value="{{old('name')}}" type="text" name="name" class="form-control" id="yourName" required>
                                                            <div class="invalid-feedback">Ingrese el nombre.</div>
                                                            @error('name')
                                                                <li class="text-danger text-inputs">{{ $message}}</li>
                                                            @enderror
                                                        </div>
                                                    
                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="yourlastname" class="form-label"><strong>Apellidos</strong></label>
                                                            <input value="{{old('lastname')}}" type="text" name="lastname"class="form-control" id="yourlastname" required>
                                                            <div class="invalid-feedback">Ingrese los apellidos.</div>
                                                            @error('lastname')
                                                                <li class="text-danger">{{ $message}}</li>
                                                            @enderror
                                                        </div>
                                                    
                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="yourTypeDoc" class="form-label"><strong>Tipo documento</strong> </label>
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
                                                            <label for="yourDocument" class="form-label"><strong>Número documento</strong></label>
                                                            <div class="input-group has-validation">
                                                                <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                                <input value="{{old('document')}}" type="text" name="document" class="form-control border-end" id="yourDocument" required>
                                                                <div class="invalid-feedback">Ingrese el número de documento.</div>
                                                            </div>
                                                            @error('document')
                                                                <li class="text-danger">{{ $message}}</li>
                                                            @enderror
                                                        </div>
                                                    
                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="yourEmail" class="form-label"><strong>Correo electrónico</strong></label>
                                                            <input value="{{old('email')}}" type="email" name="email" class="form-control" id="yourEmail" required>
                                                            <div class="invalid-feedback">Ingrese una dirección de correo electrónico válida.</div>
                                                            @error('email')
                                                                <li class="text-danger">{{ $message}}</li>
                                                            @enderror
                                                        </div>
                                                    
                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="yourRol" class="form-label"><strong>Rol</strong></label>
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
                                                    
                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 inputs-to-created" style="{{ old('rol_id') != 4 ? 'display: none;' : '' }}" >
                                                            <label for="type_dimensions_id" class="form-label"><strong>Rol en el Área de Bienestar</strong></label>
                                                            <select name="type_dimensions_id" class="form-select" id="type_dimensions_id" required  {{ old('rol_id') != 4 ? 'disabled' : '' }}>
                                                                <option value="">- Seleccione -</option>
                                                                @foreach ($type_dimensions as $type_dimension)
                                                                    <option {{ $user->type_dimensions_id == $type_dimension->id ? 'selected' : '' }} value="{{ $type_dimension->id }}">{{ $type_dimension->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">Por favor ingrese el type_dimension de formación.</div>
                                                            @error('type_dimensions_id')
                                                                <li class="text-danger">{{ $message }}</li>
                                                            @enderror
                                                        </div>
                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 inputs-to-create" id="training_program" style="{{ old('rol_id') != 5 ? 'display: none;' : '' }}">
                                                            <label for="yourTraining" class="form-label"><strong>Programa de formación</strong></label>
                                                            <select name="Program_id" class="form-select" id="yourTraining" required {{ old('rol_id') != 5 ? 'disabled' : '' }}>
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
                                                            <label for="yourToken" class="form-label"><strong>Número de ficha</strong></label>
                                                            <input value="{{ old('yourToken') }}" type="text" name="yourToken" class="form-control" id="yourToken" required {{ old('rol_id') != 5 ? 'disabled' : '' }}>
                                                            <div class="invalid-feedback">Por favor ingrese el numero de ficha.</div>
                                                            @error('yourToken')
                                                            <li class="text-danger">{{ $message}}</li>
                                                            @enderror
                                                        </div>
                                                    
                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="yourTypeRh" class="form-label"> <strong>Tipo de sangre (RH)</strong></label>
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
                                                            <label for="phonenumber" class="form-label"><Strong>Número telefónico</Strong> </label>
                                                            <input  value="{{ old('numberphone') }}" type="number" name="numberphone" class="form-control" id="phonenumber" required>
                                                            <div class="invalid-feedback">Por favor ingresa el número telefónico.</div> 
                                                            @error('numberphone')
                                                            <li class="text-danger">{{ $message}}</li>
                                                            @enderror
                                                        </div>
                                                    
                                                        <div class="modal-footer d-flex justify-content-center gap-2 ">
                                                            <button type="submit" class="btn btn-ba px-2 mt-4">Crear usuario</button>
                                                            <button type="button" class="btn btn-secondary mt-4" data-bs-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin del modal de creación para usuario-->

                                <!-- Botón para abrir el modal de creación nuevo usuario -->
                                <button type="button" class="btn btn-ba me-md-2" data-bs-toggle="modal" data-bs-target="#importuser" >
                                    Importar Usuarios
                                </button>

                                <!-- Modal de creación para usuario -->
                                <div class="modal fade" id="importuser" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="card-title-ba text-center pb-0 fs-4">Importar Usuarios</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="card-body">
                                                    <div class="pt-2 pb-2">
                                                        <h5 class="text-center card-title-ba-azul">Anexe el archvio Excel para importar los datos</h5>
                                                    </div>
                                                    
                                                    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        {{-- <input type="file" name="file"  /> --}}
                                                        

                                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-5">
                                                            <label for="importuser" class="form-label"><strong>Archivo Excel</strong></label>
                                                            <input type="file" name="file" class="form-control" id="importuser" accept=".xlsx,.csv" required>
                                                            <div class="invalid-feedback">Ingrese un archivo.</div>
                                                            @error('file')
                                                            <li class="text-danger">{{ $message }}</li>
                                                            @enderror
                                                        </div>
                                                        {{-- <button type="submit" class="btn btn-ba">Importar</button> --}}
                                                        <div class="modal-footer d-flex justify-content-center gap-2 ">
                                                            <button type="submit" class="btn btn-ba px-2 mt-4">Importar usuario</button>
                                                            <button type="button" class="btn btn-secondary mt-4" data-bs-dismiss="modal">Cerrar</button>
                                                        </div>


                                                    </form>
                                                    
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

@include('layouts.footer')import.form
@endsection