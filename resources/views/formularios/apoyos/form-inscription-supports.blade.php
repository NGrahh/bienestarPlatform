@extends('layouts.app')

@section('title-page','Postulación')

@section('content')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">
  
  <div class="pagetitle">
    <h1>Postulación Apoyo</h1>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row justify-content-center">
      <div class="col-lg-12 my-2">
        <div class="card mb-3">
          <div class="card-body">
            <div class="pt-4 pb-2">
              <p class="small"><strong>Nota: </strong>Complete el siguiente formulario para postularse.</p>
            </div>

            @include('compartido.alertas')
            
            <div class="col-sm-12">
              <h5 class="card-title" align="justify">Autorización y consentimiento para el tratamiento de datos personales.</h5>
              <p class="card-text" align="justify">El Servicio Nacional de Aprendizaje - SENA, Establecimiento Público del Orden Nacional, con domicilio principal en la ciudad de Bogotá, se permite informar que en cumplimiento de la Ley Estatutaria 1581 del 2012, por la cual se estable el ‘Régimen General de Protección de Datos’ y el Decreto Reglamentario 1377 del 2013”, demanda respetuosamente su autorización para que de manera libre, previa, clara, expresa, voluntaria y debidamente informada permita a la Entidad recolectar, recaudar, almacenar, usar, procesar, compilar, intercambiar con otras Entidades Públicas, dar tratamiento, actualizar y disponer de los datos que serán suministrados y que se incorporen en nuestras bases de datos. Esta información es y será utilizada en el desarrollo de las funciones propias de la Entidad.</p>
            </div>

            <div class="col-sm-12 mt-4">
              <h5 class="card-title" align="justify">¿Autoriza a la institución la entrega de su información con la finalidad de verificar la información presentada en este formato (Personas naturales o jurídicas, entidades públicas o privadas)?</h5>
              <p class="card-text" align="justify">Con el envío de su información personal a través de este formulario, se entiende que está manifestando expresamente su autorización al SENA para proceder al tratamiento de sus datos personales en los términos arriba expuestos.</p>
              
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="check_si" name="option" value="something" required>
                <label class="form-check-label" for="check_si"><strong>Estoy de acuerdo.</strong></label>
              </div>
              <br>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="check_no" name="option" value="something" required>
                <label class="form-check-label" for="check_no"> <strong>No estoy de acuerdo.</strong></label>
              </div>
              <br>
              
              <div class="col-12">
                <button class="btn btn-ba w-100" id="button_volver" style="display: none;" type="submit">Volver al inicio</button>
              </div>
              
              <div id="form" style="display: none;">
                <hr class="my-4" style="border-top: 2px solid #007bff;">
                <form action="{{ route('apoyos.store_user') }}" class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data">
                  @csrf
                  <!-- Campo oculto para el ID del apoyo -->
                  <input type="hidden" name="apoyo_id" value="{{ $apoyo_id }}">
                  <input type="hidden" name="id" value="{{ $user->id }}">

                  <div class="mb-5" >
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-triangle me-1"></i>
                        Por favor, proceda a descargar el formato socioeconómico y complete la información solicitada en su totalidad, <a href="https://bienestarccysregatl.com.co/apoyo-sost/formato_reg_soc.docx">Descargar</a>
                        
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-12 col-md-6">
                      <label for="yourName" class="form-label"><strong>Nombre</strong> </label>
                      <input value="{{ $user->name }}" type="text" name="name" class="form-control" id="yourName" disabled>
                    </div>

                    <div class="col-12 col-md-6">
                      <label for="yourlastname" class="form-label"><strong>Apellidos</strong></label>
                      <input value="{{ $user->lastname }}" type="text" name="lastname" class="form-control" id="yourlastname" disabled>
                    </div>
                    <div class="col-12 col-md-6">
                      <label for="yourEmail" class="form-label"><strong>Correo electrónico</strong></label>
                      <input value="{{ $user->email }}" type="email" name="email" class="form-control" id="yourEmail" disabled>
                    </div>

                    <div class="col-12 col-md-6">
                      <label for="yournumber" class="form-label"><strong>Número telefónico</strong></label>
                      <input value="{{ $user->numberphone }}" type="number" name="numberphone" class="form-control" id="yournumber" disabled>
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col-12 col-md-6 mt-2">
                      <label for="yourformat" class="form-label"><strong>Formato socioeconómico</strong></label>
                      <input value="{{old('formatuser')}}" type="file" name="formatuser" class="form-control" id="yourformat" required>
                      <div class="invalid-feedback">Ingrese un formato de registro.</div>
                      @error('formatuser')
                        <li class="text-danger">{{ $message }}</li>
                      @enderror
                    </div>

                    <div class="col-12 col-md-6 mt-2">
                      <label for="yourphotocopy" class="form-label"><strong>Foto documento de identidad</strong></label>
                      <input value="{{old('photocopy')}}" type="file" name="photocopy" class="form-control" id="yourphotocopy" required>
                      <div class="invalid-feedback">Ingrese la fotocopia del documento de identidad</div>
                      @error('photocopy')
                        <li class="text-danger">{{ $message }}</li>
                      @enderror
                    </div>

                    <div class="col-12 col-md-6 mt-2">
                      <label for="yoursisben" class="form-label"><strong>Sisbén</strong></label>
                      <input value="{{old('sisben')}}" type="file" name="sisben" class="form-control" id="yoursisben" required>
                      <div class="invalid-feedback">Ingrese la foto del sisben</div>
                      @error('sisben')
                        <li class="text-danger">{{ $message }}</li>
                      @enderror
                    </div>

                    <div class="col-12 col-md-6 mt-2">
                      <label for="yourreceipt" class="form-label"><strong>Fotocopia Recibo público</strong></label> 
                      <label style="color:#332c2c9a">&nbsp (Evidenciar estrato).</label>
                      <input value="{{old('receipt')}}" type="file" name="receipt" class="form-control" id="yourreceipt" required>
                      <div class="invalid-feedback">Ingrese la fotocopia del recibo público.</div>
                      @error('receipt')
                        <li class="text-danger">{{ $message }}</li>
                      @enderror
                    </div>

                    
                  </div>
                  <div class="col-12 mt-3">
                    <label class="mt-3" style="color:#2c2222">Tenga en cuenta que este soporte es opcional. Sin embargo, si decide proceder, le solicitamos anexar la foto.</label>
                    <label for="yoursupport" class="form-label mt-4"><strong>Soportes de las condiciones de vulnerabilidad señaladas en el formato</strong></label>
                    <input value="{{old('support')}}" type="file" name="support" class="form-control" id="yoursupport">
                    <div class="invalid-feedback">Ingrese la foto del soporte de las condiciones.</div>
                    @error('support')
                      <li class="text-danger">{{ $message }}</li>
                    @enderror
                  </div>

                  <div align="center" class="col-12 mt-5">
                    <button class="btn btn-ba w-50" type="submit">Enviar</button>
                  </div>
                </form>

                

              </div> <!-- End form -->
            </div> <!-- End col-sm-12 -->
          </div> <!-- End card-body -->
        </div> <!-- End card -->
      </div> <!-- End col-lg-12 -->
    </div> <!-- End row -->
  </section> <!-- End section -->
</main>

@include('layouts.footer')
@endsection