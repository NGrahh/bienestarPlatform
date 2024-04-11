@extends('layouts.app')

@section('content')

@include('layouts.header')
@include('layouts.menu')


<main id="main" class="main">

  <div class="pagetitle">
    {{-- <h1>Inicio</h1> --}}
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row justify-content-center">
      <div class="col-lg-6 my-5">
        <div class="card mb-3">
          <div class="card-body">
            <div align="center" class="pt-4 pb-2">

              <img style="max-height: auto" src="{{asset('img/Bienestar-al-Aprendiz.png')}}" alt="Bienestar al Aprendiz">
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection