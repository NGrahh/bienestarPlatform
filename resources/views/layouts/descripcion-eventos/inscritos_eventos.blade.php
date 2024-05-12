@extends('layouts.app')
{{-- @section('title','Agendacion cita') --}}
@section('content')

@include('layouts.header')
@include('layouts.menu')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


<main id="main" class="main">
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 my-5">
                    <div class="card">
                        <div class="card-body">
                            <div align="center" class="pt-4 pb-2">
                                <div class="max-conten">
                                    <main>
                                        <!-- Contenido, listado de inscritos -->
                                        <h3>
                                            AQUÍ VAN LOS INSCRITOS A LOS EVENTOS
                                        </h3>
                                    </main>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endsection