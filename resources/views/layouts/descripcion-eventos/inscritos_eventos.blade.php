@extends('layouts.app')

@section('content')

    @include('layouts.header')
    @include('layouts.menu')

    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Listado de inscritos: </h1>
        </div><!-- End Page Title -->
    
        <section class="section">
          <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-body">
                      <div class="pt-4 pb-2">
                      </div>
                            <h3>LISTADO</h3>
                    </div>
                  </div>
            </div>
          </div>
        </section>
    
      </main><!-- End #main -->

@endsection
