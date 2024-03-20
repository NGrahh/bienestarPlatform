@extends('layouts.app')

@section('content')

    @include('layouts.header')
    @include('layouts.menu')

    <main id="main" class="main">
        <div class="pagetitle">
          <h1>Creación de eventos</h1>
        </div><!-- End Page Title -->
    
        <div class="section">
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <p class="small"><strong>Nota: </strong>Complete el siguiente formulario para crear un nuevo evento.</p>
                  </div>
                  @include('compartido.alertas')
                  <div class="col-sm-12">
                    <div class="card">
                      <div class="card-body">
                        <form action="{{ route('index') }}" class="row g-3 needs-validation py-4" novalidate method="POST">
                          @csrf
                          {{-- <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"></div>
                          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"></div> --}}
                          <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                            <label for="yourName" class="form-label">Nombre del evento</label>
                            <input value="{{ old('name') }}" type="text" name="name" class="form-control" id="yourName" required>
                            <div class="invalid-feedback">Ingrese el nombre del evento.</div>
                            @error('name')
                              <li class="text-danger">{{ $message }}</li>
                            @enderror
                          </div>
                          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <label for="yourEmail" class="form-label">Foto del evento</label>
                            <input value="{{ old('email') }}" type="file" name="email" class="form-control" id="yourEmail" required>
                            <div class="invalid-feedback">Ingrese una foto del evento.</div>
                            @error('email')
                              <li class="text-danger">{{ $message }}</li>
                            @enderror
                          </div>
          
                          <div class="col-12 col-sm-4 col-md-6 col-lg-6 col-xl-6">
                            <label for="yourlastname" class="form-label">Fecha del evento</label>
                            <input value="{{ old('lastname') }}" type="date" name="lastname" class="form-control" id="yourlastname" required>
                            <div class="invalid-feedback">Ingrese la fecha del evento.</div>
                            @error('lastname')
                              <li class="text-danger">{{ $message }}</li>
                            @enderror
                          </div>
                          <div class="col-12 col-sm-4 col-md-6 col-lg-6 col-xl-6">
                            <div class="row mb-3">
                              <label for="inputDate" class="form-label">Fecha Inicio de inscripción</label>
                              <div class="col-sm-12">
                                <input name="date" type="date" class="form-control" required>
                                <div class="invalid-feedback">Ingrese la fecha de inicio de inscripción</div>
                                @error('date')
                                  <li class="text-danger">{{ $message }}</li>
                                @enderror
                              </div>
                            </div>
                          </div>
          
                          <div class="col-12 col-sm-4 col-md-6 col-lg-6 col-xl-6">
                            <div class="row mb-">
                              <label for="inputTime" class="form-label">Fecha fin de inscripcion</label>
                              <div class="col-sm-12">
                                <input name="hour" type="date" class="form-control" required>
                                <div class="invalid-feedback">Ingrese una fecha fin de inscripcion</div>
                                @error('hour')
                                  <li class="text-danger">{{ $message }}</li>
                                @enderror
                              </div>
                            </div>
                          </div>
          
                          <div class="col-12 col-sm-4 col-md-6 col-lg-6 col-xl-6">
                            <label for="yournumber" class="form-label">Aforo</label>
                            <input value="{{ old('mobilenumber') }}" type="number" name="mobilenumber" class="form-control" id="yournumber">
                            @error('mobilenumber')
                              <li class="text-danger">{{ $message }}</li>
                            @enderror
                          </div>
          
                          <div class="col-sm-12">
                            <label for="yourSubject" class="form-label">Descripción del evento</label>
                            <textarea class="form-control" cols="30" rows="4" name="SubjectCita" required></textarea>
                            <div class="invalid-feedback">Ingrese un asunto.</div>
                            @error('SubjectCita')
                              <li class="text-danger">{{ $message }}</li>
                            @enderror
                          </div>
                          
                          <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <div class="row mb-"></div>
                          </div>
                          <div align="center" class="col-12">
                            <button class="btn btn-ba w-50" type="submit">Enviar</button>
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
    </main><!-- End #main -->
@endsection