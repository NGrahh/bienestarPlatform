@extends('layouts.app')

@section('content')
@section('title-page', 'Crear Evento')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Creación de eventos</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-12 my-2">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="pt-4 pb-2">
                        <p class="small">
                            <strong>Nota: </strong>Complete el siguiente formulario para crear un nuevo evento.
                        </p>
                    </div>
                    
                    <div class="container">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            @foreach($events as $event)
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="{{ asset('images/' . $event->picture) }}" 
                                            alt="Imagen del evento" 
                                            class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $event->eventname }}</h5>
                                            <p class="card-text">{{ $event->Subjectevent }}</p>
                                            <p class="card-text">
                                                <small class="text-muted">Fecha del Evento: {{ $event->eventdate }}</small>
                                            </p>
                                            <p class="card-text">
                                                <small class="text-muted">Aforo: {{ $event->eventlimit }}</small>
                                            </p>
                                            <p class="card-text">
                                                <small class="text-muted">Inicio Inscripción: {{ $event->datestar }}</small>
                                            </p>
                                            <p class="card-text">
                                                <small class="text-muted">Fin Inscripción: {{ $event->dateendevent }}</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>
@include('layouts.footer')
@endsection
