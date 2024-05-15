@extends('layouts.app')
{{-- @section('title','Agendacion cita') --}}
@section('content')

@include('layouts.header')
@include('layouts.menu')



<main id="main" class="main">

  <div class="pagetitle">
    <h1>Inscripción a Evento</h1>
  </div><!-- End Page Title -->

  <section>
    <div class="row justify-content-center">
      <div class="col-lg-11 my-5">
          <div class="card mb-3">
              <div class="card-body">
                <div class="pt-4 pb-2">
                  <p class="small"><strong>Nota: </strong>Complete el siguiente formulario para inscribirse al evento.</p>
                </div>
  
                @include('compartido.alertas')
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title" align="justify">Autorización y consentimiento para el tratamiento de datos personales.</h5>
                      <p class="card-text" align="justify">El Servicio Nacional de Aprendizaje - SENA, Establecimiento Público del Orden Nacional, con domicilio principal en la ciudad de Bogotá, se permite informar que en cumplimiento de la Ley Estatutaria 1581 del 2012, por la cual se estable el ‘Régimen General de Protección de Datos’ y el Decreto Reglamentario 1377 del 2013”, demanda respetuosamente su autorización para que de manera libre, previa, clara, expresa, voluntaria y debidamente informada permita a la Entidad recolectar, recaudar, almacenar, usar, procesar, compilar, intercambiar con otras Entidades Públicas, dar tratamiento, actualizar y disponer de los datos que serán suministrados y que se incorporen en nuestras bases de datos. Esta información es y será utilizada en el desarrollo de las funciones propias de la Entidad.</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title" align="justify">¿Autoriza a la institución la entrega de su información con la finalidad de verificar la información presentada en este formato (Personas naturales o jurídicas, entidades públicas o privadas)?</h5>
                      <p class="card-text" align="justify">Con el envío de su información personal a través de este formulario, se entiende que está manifestando expresamente su autorización al SENA para proceder al tratamiento de sus datos personales en los términos arriba expuestos.</p>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="check_si" name="option" value="something" required>
                        <label class="form-check-label" for="check_si">Estoy de acuerdo.</label>
                      </div>
                      <br>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="check_no" name="option" value="something" required>
                        <label class="form-check-label" for="check_no">No estoy de acuerdo.</label>
                      </div>
                      <br>
                      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <button class="btn btn-ba w-100" id="button_volver" style="display: none;" href="{{route('inicio-pagina.pagina-principal')}}">Volver al inicio</button>
                      </div>
                      <div id="form" style="display: none;">
                        <form action="{{route('formularios.eventos.form-inscription-event')}}" class="row g-3 needs-validation" novalidate method="POST">
                          @csrf
                          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"></div>
                          <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label for="yourName" class="form-label">Nombre</label>
                            <input value="{{old('name')}}" type="text" name="name" class="form-control" id="yourName" required>
                            <div class="invalid-feedback">Ingrese el nombre.</div>
                            @error('name')
                            <li class="text-danger">{{ $message}}</li>
                            @enderror
                          </div>
                          <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label for="yourlastname" class="form-label">Apellidos</label>
                            <input value="{{old('lastname')}}" type="text" name="lastname" class="form-control" id="yourlastname" required>
                            <div class="invalid-feedback">Ingrese los apellidos.</div>
                            @error('lastname')
                            <li class="text-danger">{{ $message}}</li>
                            @enderror
                          </div>
                          <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label for="yourdaytraining" class="form-label">Jornada de formación</label>
                            <select name="day_training" class="form-select" id="yourdaytraining" required>
                              <option value="">Seleccionar...</option>
                              @foreach ($days_training as $day_training)
                              <option {{ $day_training->id == old('day_training') ? 'selected' : '' }} value="{{ $day_training->id }}">{{ $day_training->name }}</option>
                              @endforeach
                            </select>
                            <div class="invalid-feedback">Ingrese su Jornada de formación</div>
                            @error('day_training')
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
                            <label for="yournumber" class="form-label">Número telefónico</label>
                            <input value="{{old('mobilenumber')}}" type="number" name="mobilenumber" class="form-control" id="yournumber" required>
                            <div class="invalid-feedback">Ingrese un número telefónico.</div>
                            @error('mobilenumber')
                            <li class="text-danger">{{ $message}}</li>
                            @enderror
                          </div>
                          <div class="col-12">
                            <button class="btn btn-ba w-100" type="submit">Enviar</button>
                          </div>
                        </form>
                      </div>
              </div>
            </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection