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


{{-- 
    col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6: Esta clase se utiliza para definir cómo se comportará la columna en diferentes tamaños de pantalla. En el sistema de rejilla de Bootstrap, las clases de columna están diseñadas para adaptarse a diferentes tamaños de pantalla. Aquí está desglosado el significado de cada parte:

    col-12: Esta clase se aplica a todas las pantallas y hace que la columna ocupe todo el ancho disponible.
    col-sm-6: Para pantallas pequeñas (sm), la columna ocupará la mitad del ancho disponible.
    col-md-6: Para pantallas medianas (md), la columna también ocupará la mitad del ancho disponible.
    col-lg-6: Para pantallas grandes (lg), la columna ocupará la mitad del ancho disponible.
    col-xl-6: Para pantallas extra grandes (xl), la columna ocupará la mitad del ancho disponible. 
--}}


{{-- 
    invalid-feedback se usa para mostrar mensajes de error en campos de formulario que no cumplen con la validación, (CAMPOS VACIOS) 
--}}

{{-- text-danger, cambia el color del texto a rojo para indicar un error. --}}



{{-- 
    @error -> para verificar si hay errores de validación asociados con un campo específico, en el cual se deben de cumplir las especificaciones que se le dieron, ya sea el tamaño minimo, maximo o que sea una cadena de texto, o un campo numerico, por ende, en casa de no cumplir con ello, saldra una alerta, indicando lo necesario para suplir el campo
--}}