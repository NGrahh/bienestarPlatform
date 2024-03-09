@extends('layouts.app')

{{-- @section('title','login') --}}

@section('content')
<div class="container">

    <section class="section register vh-75 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="d-flex justify-content-center py-4">
                        <a  class="logo d-flex align-items-center w-auto">
                            <img style="max-height: 60px" src="{{asset('img/Bienestar-al-Aprendiz.png')}}" alt="Bienestar al Aprendiz" >
                        </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title-ba text-center pb-0 fs-4">Cambiar contraseña</h5>
                            </div>

                            @include('compartido.alertas')

                            <form action="{{route('pass.restablecercontrasena')}}" class="row g-3 needs-validation" novalidate method="POST">
                                @csrf
                                <div class="col-12">
                                    <label for="yourCodigo" class="form-label">Codigo:</label>
                                    <input value="{{ old('code') }}" type="code" name="code" class="form-control {{$errors->has('code')?'is-invalid':''}}" id="yourCodigo" required>
                                    <div class="invalid-feedback">Por favor ingresa el codigo.</div>
                                    @error('code')
                                        <li class="text-danger">{{ $message}}</li>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Contraseña:</label>
                                    <input value="{{old('password')}}" type="password" name="password" class="form-control {{$errors->has('password')?'is-invalid':''}}" id="yourPassword" required>
                                    <div class="invalid-feedback">Por favor ingresa la contraseña.</div>
                                    @error('password')
                                    <li class="text-danger">{{ $message}}</li>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-ba w-100" type="submit">Solicitar cambio</button>
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