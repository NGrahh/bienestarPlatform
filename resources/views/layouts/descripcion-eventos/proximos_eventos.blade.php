{{-- @extends('layouts.app')

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

                            <!-- Your event listing -->
                            @forelse($events as $event)
                            <div class="col">
                                <div class="card h-60">
                                    <img src="{{ asset('images/' . $event->picture) }}">
alt="Imagen del evento"
class="card-img-top">
<div class="card-body">
    <h5 class="card-title"></h5>
    <h5 class="card-text">{{ $event->date }}</h5>
    <h5 class="card-text">
        <small class="text-muted">Fecha del Evento: {{ $event->eventdate }}</small>
    </h5>
</div>
</div>
</div>
@empty
<h5>No hay eventos disponibles.</h5>
@endforelse

</div>

<!-- Small Sizing Pagination -->
<nav aria-label="...">
    <ul class="pagination pagination-sm justify-content-center">

        @if ($events->onFirstPage())
        <li class="page-item disabled"><span class="page-link">Previous</span></li>
        @else
        <li class="page-item"><a class="page-link" href="{{ $events->previousPageUrl() }}">Previous</a></li>
        @endif


        @foreach ($events->links()->elements as $element)

        @if (is_string($element))
        <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
        @endif


        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $events->currentPage())
        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
        @else
        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach


        @if ($events->hasMorePages())
        <li class="page-item"><a class="page-link" href="{{ $events->nextPageUrl() }}">></a></li>
        @else
        <li class="page-item disabled"><span class="page-link">>/span></li>
        @endif
    </ul>
</nav>

</div>

</div>
</div>
</div>
</div>
</main>
@include('layouts.footer')
@endsection --}}















@extends('layouts.app')

@section('content')
@section('title-page', 'Visualizar Eventos')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Eventos disponibles</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-12 my-2">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="pt-4 pb-2">
                        <p class="small">
                            <strong>Nota: </strong>Complete la inscripción para ser parte del evento.
                        </p>
                    </div>
                    <div class="row">
                        @forelse($events as $event)

                        <div class="col-sm-4">
                            <div class="eventocard card" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset('images/' . $event->picture) }}" class="rounded-start img-fluid" style="object-fit: cover; width: 100%; height: 100%; aspect-ratio: 1/1" width="100px" height="200px">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $event->eventname }}</h5>
                                            <div class="text-center">
                                                <div class="event-date">
                                                    <p class="eventday">{{ $event->dayOfWeek }}</p>
                                                    <div class="eventnumero day">{{ date('d', strtotime($event->eventdate)) }}</div>
                                                    <p class="eventyear">{{ $event->monthName }} </p>
                                                </div>
                                            </div>
                                        
                                            <button type="button" class="btn btn-ba-card w-100" data-bs-toggle="modal" data-bs-target="#largeModal{{ $event->id }}">
                                                Inscribirse Modal
                                            </button>

                                            <div class="modal fade" id="largeModal{{ $event->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-6 text-center">
                                                                    <img src="{{ asset('images/'. $event->picture) }}" alt="Imagen de ejemplo" 
                                                                    class="img-fluid pt-3" style="width: 70%; height: auto; margin: 0 auto;">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Evento</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p class="text-muted">Nombre del Evento:</p>
                                                                        <h6>{{ $event->eventname }}</h6>
                                                                        <p class="text-muted">Fecha del Evento:</p>
                                                                        <h6>{{ $event->eventdate }}</h6>
                                                                        <p class="text-muted">Aforo Limite:</p>
                                                                        <h6>{{ $event->eventlimit }}</h6>
                                                                        <p class="text-muted">Fecha Incial de Inscripcion:</p>
                                                                        <h6>{{ $event->datestar }}</h6>
                                                                        <p class="text-muted">Fecha Final de la Inscripción:</p>
                                                                        <h6>{{ $event->dateendevent }}</h6>
                                                                        <p class="text-muted">Asunto:</p>
                                                                        <h6>{{ $event->Subjectevent }}</h6>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-ba btn-block"><a href="{{route('showStudyTime')}}">Inscribirse</a></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            









                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @empty
                        <h5>No hay eventos disponibles.</h5>
                        @endforelse
                        <!-- Small Sizing Pagination -->
                        <nav aria-label="...">
                            <ul class="pagination pagination-sm justify-content-center">
                                {{-- Previous Page Link --}}
                                @if ($events->onFirstPage())
                                <li class="page-item disabled"><span class="page-link"><i class="ri-arrow-drop-left-line"></i></span></li>
                                @else
                                <li class="page-item"><a class="page-link" href="{{ $events->previousPageUrl() }}"><i class="ri-arrow-drop-left-line"></i></a></li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($events->links()->elements as $element)
                                {{-- "Three Dots" Separator --}}
                                @if (is_string($element))
                                <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                                @endif

                                {{-- Array Of Links --}}
                                @if (is_array($element))
                                @foreach ($element as $page => $url)
                                @if ($page == $events->currentPage())
                                <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                                @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                                @endforeach
                                @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($events->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $events->nextPageUrl() }}"><i class="ri-arrow-drop-right-line"></i></a></li>
                                @else
                                <li class="page-item disabled"><span class="page-link"><i class="ri-arrow-drop-right-line"></i></span></li>
                                @endif
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
@include('layouts.footer')
@endsection