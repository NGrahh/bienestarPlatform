@extends('layouts.app')

{{-- @section('title','login') --}}

@section('content')

<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="d-flex justify-content-center py-4">
                        <a href="{{route('welcome')}}"class="logo d-flex align-items-center w-auto">
                            <img style="max-height: 60px" src="{{asset('img/Bienestar-al-Aprendiz.png')}}" alt="Bienestar al Aprendiz">
                        </a>
                    </div><!-- End Logo -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h5 class="card-title-ba text-center pb-0 fs-4">Crear cuenta</h5>
                                <p class="text-center small">Ingrese los datos personales para crear una cuenta</p>
                            </div>
                            @include('compartido.alertas')

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
                                        <option value="">Seleccionar...</option>
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
                                        <option value="">Seleccionar...</option>
                                        @foreach ($roles as $role)
                                        <option id="optionRol"  {{ $role->id == old('rol_id') ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Ingrese un rol.</div>
                                    @error('rol_id')
                                        <li class="text-danger">{{ $message}}</li>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="display: none;" id="training_program">
                                    <label for="yourPassword" class="form-label">Programa de formación</label>
                                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                                    <div class="invalid-feedback">Por favor ingrese el programa de formación.</div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="display: none;" id="token_number">
                                    <label for="yourPassword" class="form-label">Número de ficha</label>
                                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                                    <div class="invalid-feedback">Por favor ingrese el numero de ficha.</div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <label for="yourTypeRh" class="form-label"> Tipo de sangre (RH)</label>
                                    <select name="type_rh_id" class="form-select" id="yourTypeRh" required>
                                        <option value="">Seleccionar...</option>
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
                                </div>


                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <button class="btn btn-ba w-100" type="submit">Crear cuenta</button>
                                </div>  
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <p class="small mb-0">Ya tiene cuenta? <a class="vinculos" href="{{route('login')}}">Iniciar sesión</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection