@extends('layouts.app')

@section('title-page','Iniciar Sesión')

@section('content')
<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="d-flex justify-content-center py-4">
                        <a  class="logo d-flex align-items-center w-auto">
                            <img style="max-height: 80px" src="{{asset('img/Bienestar-al-Aprendiz.png')}}" alt="Bienestar al Aprendiz" >
                        </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="mt-2">
                                <h5 class="card-title-ba text-center fs-5">¡Bienvenido a BACONNECT!</h5>
                                <p class="text-center small">Ingresa tus credenciales para continuar</p>
                            </div>

                            @include('compartido.alertas')

                            <form action="{{route('auth.login')}}" class="row g-3 needs-validation mt-3" novalidate method="POST">
                                @csrf
                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Correo electrónico</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input value="{{old('email')}}" type="text" name="email" class="rounded-right form-control {{$errors->has('email') ? 'is-invalid':''}}" id="yourUsername" required>
                                        <div class="invalid-feedback">Ingrese una dirección de correo electrónico válida.</div>
                                        @error('email')
                                        <li class="text-danger">{{ $message}}</li>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Contraseña</label>
                                    <div class="input-group has-validation">
                                        <input value="{{old('password')}}" type="password" name="password" class="rounded form-control {{$errors->has('password') ? 'is-invalid':''}}" id="yourPassword" required>
                                        <div class="invalid-feedback">Por favor ingresa la contraseña.</div>
                                    @error('password')
                                    <li class="text-danger">{{ $message }}</li>
                                    @enderror
                                    </div>
                                    
                                </div>
                                
                                
                                










                                <div class="col-12">
                                    <button class="btn btn-ba w-100" type="submit">Ingresar</button>
                                </div>
                                <div class="col-12" style="text-align: center">
                                    <a class="small vinculos" href="{{route('pass.recuperarcontrasena')}}">Recuperar contraseña</a>
                                </div> 
                                {{-- <div class="col-12">
                                    <p class="small mb-0">No tiene cuenta? <a class="vinculos" href="{{route('auth.registerform')}}">Crear cuenta</a></p>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

{{-- 
    col-12: Esta clase se aplica a todas las pantallas y hace que la columna ocupe todo el ancho disponible.
--}}

{{-- 
    invalid-feedback se usa para mostrar mensajes de error en campos de formulario que no cumplen con la validación, (CAMPOS VACIOS) 
--}}

{{-- text-danger, cambia el color del texto a rojo para indicar un error. --}}

{{-- 
    @error -> para verificar si hay errores de validación asociados con un campo específico, en el cual se deben de cumplir las especificaciones que se le dieron, ya sea el tamaño minimo, maximo o que sea una cadena de texto, o un campo numerico, por ende, en casa de no cumplir con ello, saldra una alerta, indicando lo necesario para suplir el campo
--}}