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
                            <img style="max-height: 60px" src="{{asset('img/Bienestar-al-Aprendiz.png')}}" alt="">
                        </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title-ba text-center pb-0 fs-4">Ingrese a su cuenta</h5>
                                <p class="text-center small">Ingrese su correo electrónico institucional y contraseña</p>
                            </div>

                            @include('compartido.alertas')

                            <form action="{{route('auth.login')}}" class="row g-3 needs-validation" novalidate method="POST">
                                @csrf
                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Correo electrónico</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input value="{{old('email')}}" type="text" name="email" class="form-control {{$errors->has('email') ? 'is-invalid':''}}" id="yourUsername" required>
                                        <div class="invalid-feedback">Ingrese una dirección de correo electrónico válida.</div>
                                        @error('email')
                                        <li class="text-danger">{{ $message}}</li>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Contraseña</label>
                                    <input value="{{old('password')}}" type="password" name="password" class="form-control {{$errors->has('password')?'is-invalid':''}}" id="yourPassword" required>
                                    <div class="invalid-feedback">Por favor ingresa la contraseña.</div>
                                    @error('password')
                                    <li class="text-danger">{{ $message}}</li>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Recordarme</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-ba w-100" type="submit">Ingresar</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">No tiene cuenta? <a class="vinculos" href="{{route('auth.registerform')}}">Crear cuenta</a></p>
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