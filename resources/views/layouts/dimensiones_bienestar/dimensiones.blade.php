@extends('layouts.app')
@section('title-page','Nuestras Dimensiones')
@section('content')
@include('layouts.header')
@include('layouts.menu')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Nuestras Dimensiones</h1>
    </div>


    
    {{-- 1 --}} {{-- Izquierda --}}
    <section class="section slide-in-left">
        <div class="row justify-content-center">
            <div class="col-lg-12 my-2">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="text-center pt-4 pb-2">
                            <div class="row pt-4">
                                <div class="col-12 col-md-8">
                                    <div class="card bg-transparent h-100 mb-3 border-0 shadow-none">
                                        <div align="justify" class="card-body text-justify">
                                            <div class="pt-4 pb-2">
                                                <div class="pagetitle">
                                                    <h1>Promoción de la salud y el cuidado y prevención de la enfermedad:</h1>
                                                </div>
                                                <p class="small">
                                                    Desarrolla acciones relacionadas con la promoción de la salud física, mental y del cuidado de los aprendices, así como con la prevención de la enfermedad.
                                                </p>
                                                <p>
                                                    <a href="{{route('form-appointment')}}"><button class="btn btn-ba" >Solicitar Cita</button></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="card" style="width: 100%; max-width: 300px; margin: 0 auto;">
                                        <img src="{{asset('assets/img/cuidadparatodos.png')}}" alt="Imagen promocional" class="img-thumbnail" style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 2 --}} {{-- Derecha--}}
    <section class="section slide-in-right">
        <div class="row justify-content-center">
            <div class="col-lg-12 my-2">
                <div class="card mb-3">
                    <div class="card-body">
                        <div align="center" class="pt-4 pb-2">
                            <div class="row pt-4">
                                <div class="col-12 col-md-4 mt-2">
                                    <div class="card" style="width: 100%; max-width: 300px; margin: 0 auto;">
                                        <img src="{{asset('assets/img/consejeriaorientacion.png')}}" alt="Imagen promocional" class="img-thumbnail" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <div class="card bg-transparent h-100 mb-3 border-0 shadow-none">
                                        <div align="justify" class="card-body">
                                            <div class="pt-4 pb-2">
                                                <div class="pagetitle">
                                                    <h1>Consejería y orientación: </h1>
                                                </div><!-- End Page Title -->
                                                <p class="small">
                                                    La consejería desarrolla actividades de acompañamiento individual y grupal, que permitan a los aprendices auto-conocerse, manejar sus emociones, enfrentar situaciones complejas de manera asertiva, tener la capacidad de relacionarse positivamente con los demás e identificar factores de riesgo asociados a la deserción. La orientación, deberá guiar y atender a los aprendices que presentan dificultades o requerimientos específicos concernientes a su experiencia dentro de la entidad y hacer seguimiento a aquellos en riesgo de deserción
                                                </p>


                                                <p>
                                                    <a href="{{route('form-appointment')}}"><button class="btn btn-ba" >Solicitar Cita</button></a>
                                                </p>
                                                
                                        
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
    </section>

    {{-- 3 --}} {{-- Izquierda --}}
    <section class="section slide-in-left">
        <div class="row justify-content-center">
            <div class="col-lg-12 my-2">
                <div class="card mb-3">
                    <div class="card-body">
                        <div align="center" class="pt-4 pb-2">

                            <div class="row pt-4">
                                <div class="col-12 col-sm-8">
                                    <div class="card bg-transparent h-100 mb-3 border-0 shadow-none">
                                        <div align="justify" class="card-body">
                                            <div class="pt-4 pb-2">
                                                <div class="pagetitle">
                                                    <h1>Expresión cultural y artística:</h1>
                                                </div><!-- End Page Title -->
                                                <p class="small">
                                                    Fomenta la expresión artística y cultural de los aprendices,partiendo del reconocimiento de la diversidad de la comunidad SENA y fortaleciendo las tradiciones culturales propias de cada región.
                                                </p>
                                                <p class="small">
                                                    <a href="https://chat.whatsapp.com/CVVXlVZlMgn8QzTHmHCLBA"><button class="btn btn-ba" >Unete!</button></a>
                                                </p>


                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mt-2">
                                    <div class="card" style="width: 100%; max-width: 300px; margin: 0 auto;">
                                        <img src="{{asset('assets/img/arteycultura.png')}}" alt="Imagen promocional" class="img-thumbnail" style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 4 --}} {{-- Derecha--}}
    <section class="section slide-in-right">
        <div class="row justify-content-center">
            <div class="col-lg-12 my-2">
                <div class="card mb-3">
                    <div class="card-body">
                        <div align="center" class="pt-4 pb-2">

                            <div class="row pt-4">
                                <div class="col-12 col-md-4 mt-2">
                                    <div class="card" style="width: 100%; max-width: 300px; margin: 0 auto;">
                                        <img src="{{asset('assets/img/actividadrecre.png')}}" class="img-thumbnail" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <div class="card bg-transparent h-100 mb-3 border-0 shadow-none">
                                        <div align="justify" class="card-body">
                                            <div class="pt-4 pb-2">
                                                <div class="pagetitle">
                                                    <h1> Fomento de la actividad física, el deporte y la recreación:</h1>
                                                </div><!-- End Page Title -->
                                                <p class="small">
                                                    Fomenta la actividad física, el deporte y la recreación, con el fin de incentivar el espíritu de superación, la disciplina y la sana competencia.
                                                </p>
                                                <p class="small">
                                                    
                                                    <a href=" https://forms.office.com/pages/responsepage.aspx?id=gcPCyy4vk02R0VBskxas55CAmxbfHURDgvW0CQc1h4VUQkpBWE1SSjZHVUpUMlM1RE1IUDRQWFlaUi4u"><button class="btn btn-ba">Inscribirse</button></a>
                                                </p>
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
    </section>

    {{-- 5 --}}{{-- Izquierda --}}
    <section class="section slide-in-left">
        <div class="row justify-content-center">
            <div class="col-lg-12 my-2">
                <div class="card mb-3">
                    <div class="card-body">
                        <div align="center" class="pt-4 pb-2">
                            <div class="row pt-4">
                                <div class="col-12 col-sm-8">
                                    <div class="card bg-transparent h-100 mb-3 border-0 shadow-none">
                                        <div align="justify" class="card-body">
                                            <div class="pt-4 pb-2">
                                                <div class="pagetitle">
                                                    <h1>Construcción de comunidad SENA:</h1>
                                                </div><!-- End Page Title -->
                                                <p class="small">
                                                    Fomenta el desarrollo de las habilidades socioemocionales en los aprendices, con el fin de promover su sentido de pertenencia hacia la institución, la sana convivencia, el relacionamiento positivo con el entorno y la construcción de espacios para el liderazgo, la representación y participación.
                                                </p>
                                                <p>
                                                    <a href="{{route('form-appointment')}}"><button class="btn btn-ba" >Solicitar Cita</button></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mt-2">
                                    <div class="card" style="width: 100%; max-width: 300px; margin: 0 auto;">
                                        <img src="{{asset('assets/img/exelencia.png')}}" class="img-thumbnail" style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 6 --}} {{-- Derecha--}}
    <section class="section slide-in-right">
        <div class="row justify-content-center">
            <div class="col-lg-12 my-2">
                <div class="card mb-3">
                    <div class="card-body">
                        <div align="center" class="pt-4 pb-2">

                            <div class="row pt-4">
                                <div class="col-12 col-md-4 mt-2">
                                    <div class="card" style="width: 100%; max-width: 300px; margin: 0 auto;">
                                        <img src="{{asset('assets/img/construccion.png')}}" class="img-thumbnail" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <div class="card bg-transparent h-100 mb-3 border-0 shadow-none">
                                        <div align="justify" class="card-body">
                                            <div class="pt-4 pb-2">
                                                <div class="pagetitle">
                                                    <h1>Reconocimiento a la excelencia:</h1>
                                                </div><!-- End Page Title -->
                                                <p class="small">
                                                    Propende por la permanencia de los aprendices a través de reconocimientos de tipo social otorgados a aquellos que se destaquen dentro de su proceso de formación. Además, contempla la gestión de alianzas y convenios que brinden estímulos para exaltar la excelencia académica, según la normatividad vigente.
                                                </p>
                                                <p>
                                                    <a href="{{route('form-appointment')}}"><button class="btn btn-ba" >Solicitar Cita</button></a>
                                                </p>
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
    </section>





</main><!-- End #main -->
@include('layouts.footer')
@endsection