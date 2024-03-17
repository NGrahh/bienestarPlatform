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
                                <h5 class="card-title-ba text-center pb-0 fs-4">Recuperar contraseña</h5>
                            </div>

                            @include('compartido.alertas')

                            <form action="{{route('pass.recuperarcontrasenasolicitud')}}" class="row g-3 needs-validation" novalidate method="POST">
                                @csrf
                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Correo electrónico</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input value="{{session()->get('email')}}" type="text" name="email" class="form-control {{$errors->has('email') ? 'is-invalid':''}}" id="yourUsername" required>
                                        <div class="invalid-feedback">Ingrese una dirección de correo electrónico válida.</div>
                                        @error('email')
                                        <li class="text-danger">{{ $message}}</li>
                                        @enderror
                                    </div>
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
    vh-75: Esta es una clase de Bootstrap que establece la altura de la sección al 75% del tamaño de la ventana (vh significa "viewport height").  
--}}
{{-- 
    d-flex: Esta es otra clase de Bootstrap que se utiliza para hacer que el contenedor sea un contenedor flexible (flex container) 
--}}

{{-- 
    flex-column: Esta clase de Bootstrap se utiliza para hacer que los elementos dentro del contenedor se apilen verticalmente en lugar de horizontalmente. Esto es útil cuando quieres que los elementos se muestren uno encima del otro. 
--}}

{{-- 
    align-items-center: Esta clase de Bootstrap se utiliza para alinear verticalmente los elementos del contenedor en el centro. En este caso, los elementos dentro de la sección se alinearán verticalmente en el centro de la sección 
--}}

{{-- 
    justify-content-center: Esta clase de Bootstrap se utiliza para alinear horizontalmente los elementos del contenedor en el centro. En este caso, los elementos dentro de la sección se alinearán horizontalmente en el centro de la sección 
--}}

{{-- 
    py-4: Esta es una clase de Bootstrap que establece un padding vertical (py) de tamaño 4 (equivalente a 1rem o 16px). Esto agrega espacio vertical alrededor del contenido dentro de la sección. 
--}}
