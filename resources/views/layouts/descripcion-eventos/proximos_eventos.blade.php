@extends('layouts.app')

@section('content')
@section('title-page', 'Visualizar Eventos')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Eventos</h1>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-lg-12 my-2">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="pt-4 pb-2">
                        <p class="small">
                            <strong>Nota: </strong>Para inscribirse y asistir a este evento, 
                            necesita una cuenta activa en nuestra plataforma. 
                            Esto nos permite comunicarnos eficazmente y asegurar que solo las personas 
                            registradas accedan a nuestros eventos. Si no tiene una cuenta, le recomendamos solicitar la creación pronto. 
                            El registro es rápido y le dará acceso a una variedad de eventos y recursos exclusivos. Con su cuenta activa, 
                            podrá inscribirse en los eventos y disfrutar de todas las ventajas que ofrecemos.
                        </p>
                    </div>
                    <div class="pagetitle">
                        <h1>Eventos Próximos</h1>
                    </div>
                    
                    

                    {{-- Eventos Próximos --}}
                    <div class="row">

                        
                        @forelse($upcomingEvents as $event)
                        <div class="col-sm-4 mt-4">
                            <div class="eventocard card" style="width: 100%; max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset('files/eventoimg/imgs/' . $event->picture) }}" class="rounded-start img-fluid" style="object-fit: cover; width: 100%; height: 100%;" width="100px" height="200px">


                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title" style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $event->eventname }}</h5>
                                            <div class="justify-content-center align-items-center fondo">
                                                <div class="event-date">
                                                    <p class="eventday">{{ $event->dayOfWeek }}</p>
                                                    <div class="eventnumero day">{{ date('d', strtotime($event->eventdate)) }}</div>
                                                    <p class="eventmonth">{{ $event->monthName }} </p>
                                                    <p class="eventyear">{{ $event->year }} </p>
                                                </div>
                                            </div>
                                            @auth
                                                <button type="button" class="btn btn-ba-card w-100" data-bs-toggle="modal" data-bs-target="#largeModal{{ $event->id }}">
                                                    Inscribirse
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-ba-card w-100" data-bs-toggle="modal" data-bs-target="#largeModal{{ $event->id }}">
                                                    - Ver más - 
                                                </button>
                                                
                                            @endauth
                                            
                                            <div class="modal fade" id="largeModal{{ $event->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class=" imagen-modal col-md-6">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title d-evento" ><strong>➥ Imagen del Evento</strong></h5>
                                                                    </div>
                                                                    <div class="modal-body d-flex flex-column justify-content-center align-items-center mt-4">
                                                                        <div class="container-fluid mt-5" style="overflow: hidden;">
                                                                            <img src="{{ asset('files/eventoimg/imgs/' . $event->picture) }}" alt="Imagen de ejemplo" class="img-fluid mx-auto shadow-sm p-3 mb-5 rounded" style="object-fit: cover; width: 100%; height: 100%;" width="100px" height="200px">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title d-evento"><strong>{{ $event->eventname }}</strong></h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p class="d-evento"><strong>Nombre del Evento: </strong> </p>
                                                                        <h6>{{ $event->eventname }}</h6>
                                                                        <p class="d-evento"><strong>Fecha del Evento: </strong> </p>
                                                                        <h6>{{ $event->eventdate }}</h6>
                                                                        <p class="d-evento"><strong>Aforo Limite: </strong> </p>
                                                                        <h6>{{ $event->eventlimit }}</h6>
                                                                        <p class="d-evento"><strong>Fecha Inicial de Inscripción: </strong> </p>
                                                                        <h6>{{ $event->datestar }}</h6>
                                                                        <p class="d-evento"><strong>Fecha Final de la Inscripción: </strong> </p>
                                                                        <h6>{{ $event->dateendevent }}</h6>
                                                                        <p class="d-evento"><strong> Asunto: </strong></p>
                                                                        <h6>{{ $event->Subjectevent }}</h6>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                    
                                                                        @auth
                                                                            <button type="button" class="btn btn-ba">
                                                                                <a style="color: white" href="{{ route('events.registerForm', ['id' => $event->id]) }}">Inscribirse</a>
                                                                            </button>
                                                                        @else
                                                                            <button type="button" class="btn btn-ba">
                                                                                <a style="color: white" href="{{ route('login') }}">Iniciar Sesión</a>
                                                                            </button>
                                                                        @endauth
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
                        <h5>No hay eventos próximos disponibles.</h5>
                        @endforelse
                    </div>

                    {{-- Eventos Pasados --}}
                    <div class="row mt-4">

                        <div class="pagetitle">
                            <h1>Eventos Pasados</h1>

                        </div>
                        @forelse($pastEvents as $event)
                        <div class="col-sm-4 mt-4">
                            <div class="eventocard card" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset('files/eventoimg/imgs/' . $event->picture) }}"  class="rounded-start img-fluid" style="object-fit: cover; width: 100%; height: 100%; aspect-ratio: 1/1" width="100px" height="200px">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title" style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $event->eventname }}</h5>
                                            <div class="text-center">
                                                <div class="event-date">
                                                    <p class="eventday">{{ $event->dayOfWeek }}</p>
                                                    <div class="eventnumero day">{{ date('d', strtotime($event->eventdate)) }}</div>
                                                    <p class="eventmonth">{{ $event->monthName }} </p>
                                                    <p class="eventyear">{{ $event->year }} </p>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-ba-card w-100" data-bs-toggle="modal" data-bs-target="#largeModal{{ $event->id }}">
                                                Ver detalles
                                            </button>
                                            <div class="modal fade" id="largeModal{{ $event->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class=" imagen-modal col-md-6">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title d-evento" ><strong>➥ Imagen del Evento</strong></h5>
                                                                    </div>
                                                                    <div class="modal-body d-flex flex-column justify-content-center align-items-center mt-4">
                                                                        <div class="container-fluid mt-5" style="overflow: hidden;">
                                                                            <img src="{{ asset('files/eventoimg/imgs/' . $event->picture) }}" alt="Imagen de ejemplo" class="img-fluid mx-auto shadow-sm p-3 mb-5 rounded" style="object-fit: cover; width: 100%; height: 100%;" width="100px" height="200px">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title d-evento"><strong>{{ $event->eventname }}</strong></h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p class="d-evento"><strong>Nombre del Evento: </strong> </p>
                                                                        <h6>{{ $event->eventname }}</h6>
                                                                        <p class="d-evento"><strong>Fecha del Evento: </strong> </p>
                                                                        <h6>{{ $event->eventdate }}</h6>
                                                                        <p class="d-evento"><strong>Aforo Limite: </strong> </p>
                                                                        <h6>{{ $event->eventlimit }}</h6>
                                                                        <p class="d-evento"><strong>Fecha Inicial de Inscripción: </strong> </p>
                                                                        <h6>{{ $event->datestar }}</h6>
                                                                        <p class="d-evento"><strong>Fecha Final de la Inscripción: </strong> </p>
                                                                        <h6>{{ $event->dateendevent }}</h6>
                                                                        <p class="d-evento"><strong> Asunto: </strong></p>
                                                                        <h6>{{ $event->Subjectevent }}</h6>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
                        <h5>No hay eventos pasados disponibles.</h5>
                        @endforelse
                    </div>

                    {{-- Paginación --}}
                    <div class="row mt-4">
                        <nav aria-label="...">
                            <ul class="pagination pagination-sm justify-content-center">
                                {{-- Previous Page Link --}}
                                <li class="page-item {{ $upcomingEvents->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $upcomingEvents->previousPageUrl() }}" aria-label="Previous">
                                        <i class="ri-arrow-drop-left-line"></i>
                                    </a>
                                </li>

                                {{-- Pagination Elements --}}
                                @foreach ($upcomingEvents->links()->elements as $element)
                                {{-- "Three Dots" Separator --}}
                                @if (is_string($element))
                                <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                                @endif

                                {{-- Array Of Links --}}
                                @if (is_array($element))
                                @foreach ($element as $page => $url)
                                <li class="page-item {{ $upcomingEvents->currentPage() == $page ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                                @endforeach
                                @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                <li class="page-item {{ !$upcomingEvents->hasMorePages() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $upcomingEvents->nextPageUrl() }}" aria-label="Next">
                                        <i class="ri-arrow-drop-right-line"></i>
                                    </a>
                                </li>
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