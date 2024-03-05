@extends('layouts.app')

{{-- @section('title','login') --}}

@section('content')

<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="d-flex justify-content-center py-4">
                        <a href="index.html" class="logo d-flex align-items-center w-auto">
                            <img style="max-height: 60px" src="{{asset('img/Bienestar-al-Aprendiz.png')}}" alt="Bienestar al Aprendiz">
                        </a>
                    </div><!-- End Logo -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h5 class="card-title-ba text-center pb-0 fs-4">Crear cuenta</h5>
                                <p class="text-center small">Ingrese sus datos personales para crear una cuenta</p>
                            </div>
                            @include('compartido.alertas')
                            <form action="{{route('auth.store')}}" class="row g-3 needs-validation" novalidate method="POST">
                                @csrf
                                <div class="col-12">
                                    <label for="yourName" class="form-label">Nombre</label>
                                    <input value="{{old('name')}}" type="text" name="name" class="form-control" id="yourName" required>
                                    <div class="invalid-feedback">Por favor, ingrese su nombre!</div>
                                    @error('name')
                                        <li class="text-danger">{{ $message}}</li>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="yourEmail" class="form-label">Correo electrónico</label>
                                    <input value="{{old('email')}}" type="email" name="email" class="form-control" id="yourEmail" required>
                                    <div class="invalid-feedback">Ingrese una dirección de correo electrónico válida!</div>
                                    @error('email')
                                        <li class="text-danger">{{ $message}}</li>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="yourTypeDoc" class="form-label"> Tipo documento</label>
                                    <select value="{{old('type_document')}}" name="type_document" class="form-select" id="yourTypeDoc" required>
                                        <option value="">Seleccionar...</option>
                                        <option value="ti">Tarjeta de Identidad</option>
                                        <option value="cc">Cédula de Ciudadanía</option>
                                        <option value="ce">Cédula de Extranjería</option>
                                        <option value="pep">PEP</option>
                                        <option value="ppt">Permiso por Protección Temporal</option>
                                    </select>
                                    <div class="invalid-feedback">Ingrese su tipo de documento</div>
                                    @error('type_document')
                                        <li class="text-danger">{{ $message}}</li>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="yourDocument" class="form-label"> N° documento</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                        <input value="{{old('document')}}" type="text" name="document" class="form-control" id="yourDocument" required>
                                        <div class="invalid-feedback">Ingrese su número de documento</div>
                                    </div>
                                    @error('document')
                                        <li class="text-danger">{{ $message}}</li>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="yourRol" class="form-label">Rol</label>
                                    <select value="{{old('rol_id')}}" name="rol_id" class="form-select" id="yourRol" required>
                                        <option value="">Seleccionar...</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Ingrese su tipo de documento</div>
                                    @error('rol_id')
                                        <li class="text-danger">{{ $message}}</li>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Contraseña</label>
                                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                                    <div class="invalid-feedback">• Por favor ingresa la contraseña!</div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-ba w-100" type="submit">Crear cuenta</button>
                                </div>  
                                <div class="col-12">
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