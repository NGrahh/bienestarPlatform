@extends('layouts.app')

@section('content')

@section('title-page', 'Crear Evento')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Creación de eventos</h1>
  </div><!-- End Page Title -->

  <div class="row justify-content-center">
    <div class="col-lg-11 my-5">
      <div class="card mb-3">
        <div class="card-body">
          <div class="pt-4 pb-2">
            <p class="small"><strong>Nota: </strong>Complete el siguiente formulario para crear un nuevo evento.</p>
          </div>
          @include('compartido.alertas')
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <form action="{{ route('eventos.store') }}" class="row g-3 needs-validation py-4" novalidate method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <label for="nameevent" class="form-label">Nombre del evento</label>
                    <input value="{{ old('eventname') }}" type="text" name="eventname" class="form-control" id="nameevent" required>
                    <div class="invalid-feedback">Ingrese el nombre del evento.</div>
                    @error('eventname')
                    <li class="text-danger">{{ $message }}</li>
                    @enderror
                  </div>
                  <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <label for="pictureevent" class="form-label">Foto del evento</label>
                    <input type="file" name="picture" class="form-control" id="pictureevent" required>
                    <div class="invalid-feedback">Ingrese una foto relacionada al evento.</div>
                    @error('picture')
                    <li class="text-danger">{{ $message }}</li>
                    @enderror
                  </div>

                  <div class="col-12 col-sm-4 col-md-6 col-lg-6 col-xl-6">
                    <label for="dateevent" class="form-label">Fecha del evento</label>
                    <input value="{{ old('eventdate') }}" type="date" name="eventdate" class="form-control" id="dateevent" required>
                    <div class="invalid-feedback">Ingrese la fecha del evento.</div>
                    @error('eventdate')
                    <li class="text-danger">{{ $message }}</li>
                    @enderror
                  </div>
                  <div class="col-12 col-sm-4 col-md-6 col-lg-6 col-xl-6">
                    <label for="limitcapacity" class="form-label">Aforo</label>
                    <input value="{{ old('eventlimit') }}" type="number" name="eventlimit" class="form-control" id="limitcapacity">
                    @error('eventlimit')
                    <li class="text-danger">{{ $message }}</li>
                    @enderror
                  </div>
                  <div class="col-12 col-sm-4 col-md-6 col-lg-6 col-xl-6">
                    <div class="row mb-3">
                      <label for="datestarevent" class="form-label">Fecha Inicio de inscripción</label>
                      <div class="col-sm-12">
                        <input name="datestar" type="date" class="form-control" required>
                        <div class="invalid-feedback">Ingrese la fecha de inicio de inscripción</div>
                        @error('datestar')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="col-12 col-sm-4 col-md-6 col-lg-6 col-xl-6">
                    <div class="row mb-">
                      <label for="dateendevent" class="form-label">Fecha fin de inscripcion</label>
                      <div class="col-sm-12">
                        <input name="dateendevent" type="date" class="form-control" required>
                        <div class="invalid-feedback">Ingrese una fecha fin de inscripcion</div>
                        @error('dateendevent')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <label for="yourSubject" class="form-label">Descripción del evento</label>
                    <textarea class="form-control" cols="30" rows="4" name="Subjectevent" required></textarea>
                    <div class="invalid-feedback">Ingrese un asunto.</div>
                    @error('Subjectevent')
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
</main>
@endsection
