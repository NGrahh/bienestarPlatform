@extends('layouts.app')

@section('content')

@section('title-page','Información Citas')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Operaciones de gestión de Citas</h1>
    </div><!-- End Page Title -->

    <section class="section">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Información de inscritos a Apoyos</h5>
                        <div class="table-responsive">
                        <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>C.electrónico</th>
                                        <th>Número telefónico</th>
                                        <th>formato registro</th>
                                        <th>foto documento</th>
                                        <th>foto sisben</th>
                                        <th>foto recibo publico</th>
                                        <th>foto condiciones vulnerables</th>
                                    </tr>
                                </thead>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@include('layouts.footer')
@endsection