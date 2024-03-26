@extends('layouts.app')

@section('content')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Creación de eventos</h1>
    </div><!-- End Page Title -->

    <div class="section">
        <div class="row justify-content-center">
            <div class="col-lg-12 my-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <p class="small"><strong>Nota: </strong>Para incribirse debera tener una cuenta activa.</p>
                        </div>
                        @include('compartido.alertas')
                        <div align="center" class="col-sm-12">
                            <div class="card" style="width: 80%;">
                                <img style="width: 50%; height:50%;" src="" class="card-img-top " alt="Imagen-apoyo-fic">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
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