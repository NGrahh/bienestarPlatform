@extends('layouts.app')

{{-- @section('title','Agendacion cita') --}}

@section('content')
<div class="container">
  <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 col-md-6 d-flex flex-column align-items-center justify-content-center">
          <div class="d-flex justify-content-center py-4">
            <a class="logo d-flex align-items-center w-auto">
              <img style="max-height: 60px" src="{{asset('img/Bienestar-al-Aprendiz.png')}}" alt="Bienestar al Aprendiz">
            </a>
          </div><!-- End Logo -->

          <div class="card mb-3">
            <div class="card-body">
              <div class="pt-4 pb-2">
                <h5 class="card-title-ba text-center pb-0 fs-4">Por favor diligencie el siguiente formulario para la solicitud de su Cita</h5>
                <p class="text-center small"></p>
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
                      <button class="btn btn-ba w-100" id="button_volver" style="display: none;" type="submit">Volver al inicio</button>
                    </div>
                    <div id="form_appointment" style="display: none;">
                      <form action="{{route('formularios.form-appointment')}}" class="row g-3 needs-validation" novalidate method="POST">
                        @csrf
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"></div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                          <label for="yourName" class="form-label">Nombres</label>
                          <input value="{{old('name')}}" type="text" name="name" class="form-control" id="yourName" required>
                          <div class="invalid-feedback">Ingrese el nombre.</div>
                          @error('name')
                          <li class="text-danger">{{ $message}}</li>
                          @enderror
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                          <label for="yourlastname" class="form-label">Apellidos</label>
                          <input value="{{old('lastname')}}" type="text" name="lastname" class="form-control" id="yourlastname" required>
                          <div class="invalid-feedback">Ingrese los apellidos.</div>
                          @error('lastname')
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
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <label for="yournumber" class="form-label">Número telefónico</label>
                            <input value="{{old('mobilenumber')}}" type="number" name="mobilenumber" class="form-control" id="yournumber" required>
                            <div class="invalid-feedback">Ingrese un número telefónico.</div>
                            @error('mobilenumber')
                            <li class="text-danger">{{ $message}}</li>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                          <div class="row mb-3">
                            <label for="inputDate" class="form-label">Aqui viene texto y sus inputs para colocar y para las firmas digitales</label>
                            <div class="col-sm-12">
                              <input name="date" type="texto" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <label for="yourEmail" class="form-label">Foto del documento de identidad</label>
                            <input value="{{old('email')}}" type="file" name="email" class="form-control" id="yourEmail" required>
                            <div class="invalid-feedback">Ingrese la foto del documento de identidad</div>
                            @error('email')
                            <li class="text-danger">{{ $message}}</li>
                            @enderror
                          </div>
                          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <label for="yourEmail" class="form-label">Sisben</label>
                            <input value="{{old('email')}}" type="file" name="email" class="form-control" id="yourEmail" required>
                            <div class="invalid-feedback">Ingrese la foto del sisben</div>
                            @error('email')
                            <li class="text-danger">{{ $message}}</li>
                            @enderror
                          </div>

                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4"><div class="row mb-"></div></div>
                        <div align="center" class="col-12">
                          <button  class="btn btn-ba w-50" type="submit">Enviar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection