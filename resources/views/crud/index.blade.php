@extends('layouts.app')

@section('content')

@section('title-page','Información Usuarios')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Operaciones de gestión de Usuarios</h1>
    </div><!-- End Page Title -->
    
    <section class="section">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Información de usuarios</h5>
                        <div class="table-responsive">
                            <table class="table datatable table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>T.identificación</th>
                                        <th>N.identificación</th>
                                        <th>C.electrónico</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{ $user->name }} {{ $user->lastname }}</td>
                                        <td>{{ $user->TypeDocument->name }}</td>
                                        <td>{{ $user->document }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role->name }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <!-- Botón para abrir el modal de ditar -->
                                                <button type="button" class="btn btn-ba-amarillo px-2 " data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}" title="Editar usuario">
                                                    <i class="bx bxs-user-detail"></i>
                                                </button>

                                                <!-- Modal de edición para cada usuario -->
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
                                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label for="yourName" class="form-label">Nombre</label>
                                                                            <input value="{{$user->name }}" type="text" name="name" class="form-control" id="yourName" required>
                                                                            <div class="invalid-feedback">Ingrese el nombre.</div>
                                                                            @error('name')
                                                                            <li class="text-danger">{{ $message}}</li>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label for="yourlastname" class="form-label">Apellidos</label>
                                                                            <input value="{{$user->lastname }}" type="text" name="lastname" class="form-control" id="yourlastname" required>
                                                                            <div class="invalid-feedback">Ingrese los apellidos.</div>
                                                                            @error('lastname')
                                                                            <li class="text-danger">{{ $message}}</li>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label for="yourTypeDoc" class="form-label">Tipo documento</label>
                                                                            <select name="type_document_id" class="form-select" id="yourTypeDoc" required>
                                                                                <option value="">Seleccionar...</option>
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
                                                                            <label for="yourDocument" class="form-label"> N° documento</label>
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
                                                                            <label for="yourEmail" class="form-label">Correo electrónico</label>
                                                                            <input value="{{$user->email}}" type="email" name="email" class="form-control" id="yourEmail" required>
                                                                            <div class="invalid-feedback">Ingrese una dirección de correo electrónico válida.</div>
                                                                            @error('email')
                                                                            <li class="text-danger">{{ $message}}</li>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                            <label for="yourRol_update" class="form-label">Rol</label>
                                                                            <select name="rol_id" class="form-select" id="yourRol_update" required>
                                                                                <option value="">Seleccionar...</option>
                                                                                @foreach ($roles as $role)
                                                                                    <option {{ $user->rol_id == $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <div class="invalid-feedback">Ingrese un rol.</div>
                                                                            @error('rol_id')
                                                                            <li class="text-danger">{{ $message}}</li>
                                                                            @enderror
                                                                        </div>
                                                                        
                                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6" id="training_program_update" style="{{ $user->rol_id != 5 ? 'display: none;' : '' }}">
                                                                            <label for="yourTraining_update" class="form-label">Programa de formación</label>
                                                                            <input value="{{$user->trainingProgram}}" type="text" name="trainingProgram" class="form-control" id="yourTraining_update" required {{ $user->rol_id != 5 ? 'disabled' : '' }}>
                                                                            <div class="invalid-feedback">Por favor ingrese el programa de formación.</div>
                                                                            @error('trainingProgram')
                                                                            <li class="text-danger">{{ $message}}</li>
                                                                            @enderror
                                                                        </div>
                                                                        
                                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6" id="token_number_update" style="{{ $user->rol_id != 5 ? 'display: none;' : '' }}">
                                                                            <label for="yourToken_update" class="form-label">Número de ficha</label>
                                                                            <input value="{{$user->yourToken}}" type="text" name="yourToken" class="form-control" id="yourToken_update" required {{ $user->rol_id != 5 ? 'disabled' : '' }}>
                                                                            <div class="invalid-feedback">Por favor ingrese el número de ficha.</div>
                                                                            @error('yourToken')
                                                                            <li class="text-danger">{{ $message}}</li>
                                                                            @enderror
                                                                        </div>
                                                                        
                                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                            <label for="yourTypeRh" class="form-label"> Tipo de sangre (RH)</label>
                                                                            <select name="type_rh_id" class="form-select" id="yourTypeRh" required>
                                                                                <option value="">Seleccionar...</option>
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
                                                                            <br><br>
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
                                                </div><!-- Fin del modal de editar -->

                                                <!-- Botón para abrir el modal de eliminación -->
                                                <button type="button" class="btn btn-ba-rojo px-2" data-bs-toggle="modal" data-bs-target="#deleteUserModal{{ $user->id }}" title="Eliminar Usuario">
                                                    <i class="bx bxs-user-x"></i>
                                                </button>

                                                <!-- Modal de eliminación para cada usuario -->
                                                <div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1">
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
                                                                    <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <p>El usuario <strong>{{ $user->name }} {{ $user->lastname }}</strong>, 
                                                                            identificado con el documento de tipo <strong>{{ $user->TypeDocument->name }}
                                                                            </strong> y número <strong>{{ $user->document }}</strong>, será eliminado.
                                                                            Si necesitas recuperar información o tomar alguna medida antes de proceder con la 
                                                                            eliminación, ten en cuenta que su correo electrónico es <strong>{{ $user->email }}
                                                                            </strong> y desempeña el rol de <strong>{{ $user->role->name }}</strong> 
                                                                            en nuestra organización.</p>
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
                                    Crear Cuenta
                                </button>
                                <!-- Modal de creación para cada usuario -->
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
                                                    
                                                    <form action="{{route('auth.store')}}" class="row g-3 needs-validation" novalidate method="POST">
                                                        @csrf
                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label for="yourName" class="form-label">Nombre</label>
                                                            <input value="{{old('name')}}" type="text" name="name" class="form-control" id="yourName" required>
                                                            <div class="invalid-feedback">Ingrese el nombre.</div>
                                                            @error('name')
                                                                <li class="text-danger">{{ $message}}</li>
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
                                                            <select name="rol_id" class="form-select" id="yourRol" required>
                                                                <option value="">- Seleccione -</option>
                                                                @foreach ($roles as $role)
                                                                <option id="optionRol"  {{ $role->id == old('rol_id') ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">Ingrese un rol.</div>
                                                            @error('rol_id')
                                                                <li class="text-danger">{{ $message}}</li>
                                                            @enderror
                                                        </div>
                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="{{ $user->rol_id != 5 ? 'display: none;' : '' }}" id="training_program" >
                                                            <label for="yourTraining" class="form-label">Programa de formación</label>
                                                            <input value="{{old('trainingProgram')}}"  type="text" name="trainingProgram" class="form-control" id="yourTraining" required {{ $user->rol_id != 5 ? 'disabled' : '' }}>
                                                            <div class="invalid-feedback">Por favor ingrese el programa de formación.</div>
                                                            @error('trainingProgram')
                                                            <li class="text-danger">{{ $message}}</li>
                                                            @enderror
                                                        </div>
                                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="{{ $user->rol_id != 5 ? 'display: none;' : '' }}" id="token_number" >
                                                            <label for="yourToken" class="form-label">Número de ficha</label>
                                                            <input value="{{old('yourToken')}}" type="text" name="yourToken" class="form-control" id="yourToken" required {{ $user->rol_id != 5 ? 'disabled' : '' }}>
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
                        
                        
                                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <button class="btn btn-ba w-100" type="submit">Crear cuenta</button>
                                                        </div>  
                                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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