@extends('layouts.app')

@section('title-page','Agendar Cita')

@section('content')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Creación de cita</h1>
  </div><!-- End Page Title -->
  @include('compartido.alertas')
  <section>
    <div class="row justify-content-center">
      <div class="col-lg-12 my-2">
        <div class="card mb-3">
          <div class="card-body">
            <div class="pt-4 pb-2">
              <p class="small"><strong>Nota: </strong>Complete el siguiente formulario para agendar una cita.</p>
            </div>
  
            @include('compartido.alertas')
            <h5 class="card-title px-3" align="justify">Autorización y consentimiento para el tratamiento de datos personales.</h5>
            <p class="card-text px-3" align="justify">El Servicio Nacional de Aprendizaje - SENA, Establecimiento Público del Orden Nacional, con domicilio principal en la ciudad de Bogotá, se permite informar que en cumplimiento de la Ley Estatutaria 1581 del 2012, por la cual se estable el ‘Régimen General de Protección de Datos’ y el Decreto Reglamentario 1377 del 2013”, demanda respetuosamente su autorización para que de manera libre, previa, clara, expresa, voluntaria y debidamente informada permita a la Entidad recolectar, recaudar, almacenar, usar, procesar, compilar, intercambiar con otras Entidades Públicas, dar tratamiento, actualizar y disponer de los datos que serán suministrados y que se incorporen en nuestras bases de datos. Esta información es y será utilizada en el desarrollo de las funciones propias de la Entidad.</p>
  
            <h5 class="card-title px-3" align="justify">¿Autoriza a la institución la entrega de su información con la finalidad de verificar la información presentada en este formato (Personas naturales o jurídicas, entidades públicas o privadas)?</h5>
            <p class="card-text px-3" align="justify">Con el envío de su información personal a través de este formulario, se entiende que está manifestando expresamente su autorización al SENA para proceder al tratamiento de sus datos personales en los términos arriba expuestos.</p>
            <div class="form-check px-5 pt-4">
              <input class="form-check-input" type="checkbox" id="check_si" name="option" value="something" required>
              <label class="form-check-label" for="check_si">Estoy de acuerdo.</label>
            </div>
            <br>
            <div class="form-check px-5">
              <input class="form-check-input" type="checkbox" id="check_no" name="option" value="something" required>
              <label class="form-check-label" for="check_no">No estoy de acuerdo.</label>
            </div>
            <br>
            <div class="col-6 col-sm-6 col-md-12 col-lg-12 col-xl-12">
              <button class="btn btn-ba w-100" id="button_volver" style="display: none;" type="submit">Volver al inicio</button>
            </div>
  
            <div id="form" style="display: none;" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5">
              <hr class="mt-4 mb-4 border-top border-dark" style="height: 3px;">
              <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <form action="{{ route('citas.store') }}" class="row g-3 needs-validation" novalidate method="POST">
                  @csrf
  
                  <div class="row mt-2">
                    <div class="col-12 col-md-6 mt-2">
                      <label for="yourName" class="form-label"><strong>Nombre</strong></label>
                      <input value="{{session('name')}}" type="text" name="name" class="form-control" id="yourName" disabled>
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                      <label for="yourlastname" class="form-label"><strong>Apellidos</strong></label>
                      <input value="{{session('lastname')}}" type="text" name="lastname" class="form-control" id="yourlastname" disabled>
                    </div>
                  </div>
  
                  <div class="row mt-2">
                    <div class="col-12 col-md-6 mt-2">
                      <label for="yourdimensions" class="form-label"><strong>Dimension solicitada</strong></label>
                      <select name="dimensions_id" class="form-select" id="yourdimensions" required>
                        <option value="">Seleccionar...</option>
                        @foreach ($dimensions_types as $dimensions_type)
                        <option {{ $dimensions_type->id == old('dimensions_id') ? 'selected' : '' }} value="{{ $dimensions_type->id }}">{{ $dimensions_type->name }}</option>
                        @endforeach
                      </select>
                      <div class="invalid-feedback">Ingrese la dimensión solicitada.</div>
                      @error('type_document_id')
                      <li class="text-danger">{{ $message}}</li>
                      @enderror
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                      <label for="yourEmail" class="form-label"><strong>Correo electrónico</strong></label>
                      <input value="{{session('email')}}" type="email" name="email" class="form-control" id="yourEmail" disabled>
                    </div>
                  </div>
  
                  <div class="row mt-2">
                    <div class="col-12 col-md-6 mt-2">
                      <label for="yournumber" class="form-label"><strong>Número telefónico</strong></label>
                      <input value="{{old('mobilenumber')}}" type="number" name="mobilenumber" class="form-control" id="yournumber" required>
                      <div class="invalid-feedback">Ingrese un número telefónico.</div>
                      @error('mobilenumber')
                      <li class="text-danger">{{ $message}}</li>
                      @enderror
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                      <label for="inputDate" class="form-label"><strong>Fecha</strong></label>
                      <input name="date" type="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}">
                      <div class="invalid-feedback">Ingrese una fecha.</div>
                      @error('date')
                      <li class="text-danger">{{ $message }}</li>
                      @enderror
                    </div>
                  </div>
  
                  <div class="row mt-2">
                    <div class="col-12 col-md-6 mt-2">
                      <label for="inputTime" class="form-label"><strong>Hora</strong></label>
                      <input name="hour" type="time" class="form-control @error('hour') is-invalid @enderror" value="{{ old('hour') }}">
                      <div class="invalid-feedback">Ingrese una hora.</div>
                      @error('hour')
                      <li class="text-danger">{{ $message }}</li>
                      @enderror
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                      <label for="yourSubject" class="form-label"><strong>Asunto</strong></label>
                      <textarea class="form-control @error('subjectCita') is-invalid @enderror" cols="30" rows="4" name="subjectCita">{{ old('subjectCita') }}</textarea>
                      <div class="invalid-feedback">Ingrese un asunto.</div>
                      @error('subjectCita')
                      <li class="text-danger">{{ $message }}</li>
                      @enderror
                    </div>
                  </div>
  
                  <div align="center" class="col-12 mt-4">
                    <button class="btn btn-ba w-50" type="submit">Solicitar</button>
                  </div>
                </form>
              </div>
            </div>
  
          </div>
        </div>
      </div>
    </div>
  </section>
  
  
</main>
@endsection