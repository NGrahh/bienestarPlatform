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
            <div class="col-lg-12 my-5">
                <div class="card mb-3">
                    <div class="card-body">
                        <div align="center" class="pt-4 pb-2">
                            <div class="col-12 col-sm-6">
                                <div class="card bg-transparent h-100 mb-3 border-0 shadow-none">
                                    <div align="justify" class="card-body">
                                        <div class="pt-4 pb-2">
                                            <img style="max-width: 100%;" src="{{asset('img/Bienestar-al-Aprendiz.png')}}" alt="Bienestar al Aprendiz">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row pt-4">
                                <div class="col-12 col-sm-6">
                                    <div class="card bg-transparent h-100 mb-3 border-0 shadow-none">
                                        <div align="justify" class="card-body">
                                            <div class="pt-4 pb-2">
                                                <div class="pagetitle">
                                                    <h1>¿Quiénes somos?</h1>
                                                </div><!-- End Page Title -->
                                                <p class="small">
                                                    Según el Artículo 1° de la Resolución 1228 DE 2018 “Por la cual se adopta el Plan Nacional Integral de Bienestar de los aprendices del Servicio Nacional de Aprendizaje- SENA” es definido como: El conjunto de acciones que realiza la entidad para potenciar el desarrollo personal de los aprendices, dando herramientas que permitan una relación favorable consigo mismos, con los demás miembros de la comunidad, con la naturaleza y con su entorno, lo que aporta al fortalecimiento de la formación profesional integral.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="card bg-transparent h-100 mb-3 border-0 shadow-none">
                                        <div align="justify" class="card-body">
                                            <div class="pt-4 pb-2">
                                                <div class="pagetitle">
                                                    <h1>¿Qué hace el área de Bienestar al Aprendiz?</h1>
                                                </div><!-- End Page Title -->
                                                <p class="small">
                                                    Según el Artículo 3° de la Resolución 1228 DE 2018, su objetivo general es: Contribuir al desarrollo humano integral de los aprendices, por medio de la definición de lineamientos que se implementen de manera articulada y gradual con el proceso de formación profesional integral, con el fin de fortalecer la cultura de bienestar entre los aprendices y la comunidad educativa.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row pt-4">
                                <div class="col-12 col-sm-6">
                                    <div class="card bg-transparent h-100 mb-3 border-0 shadow-none">
                                        <div align="justify" class="card-body">
                                            <div class="pt-4 pb-2">
                                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                                    <div class="accordion-item">

                                                        <button class="accordion-button collapsed pagetitle" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                            <h1 id="flush-headingOne">Objetivos específicos: </h1>
                                                        </button>

                                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                                <!-- List group Numbered -->
                                                                <ol class="list-group list-group-numbered" style="text-align: justify">
                                                                    <li class="list-group-item">
                                                                        Acompañar el proceso de formación profesional integral, a través del diseño y ejecución de programas que apropien la cultura de bienestar institucional y que se planeen de manera articulada con la ejecución de la formación, para aportar al desarrollo integral de los aprendices y su permanencia en la entidad.
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        Brindar consejería y orientación a los aprendices para apoyar el desarrollo del ser, a través de acciones que aporten a su calidad de vida.
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        Fomentar el desarrollo, expresión y disfrute de talentos, por medio de la implementación de agendas culturales y deportivas, para el aprovechamiento del tiempo libre y el cultivo de hábitos de vida saludable, que aporten al proceso de formación integral de los aprendices.
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        Desarrollar acciones de promoción y prevención para el fomento del autocuidado en los aprendices, con el fin de sensibilizarlos entorno a la importancia de adoptar hábitos que ayuden a preservar su salud física y mental.
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        Promover la apropiación de los principios y valores institucionales en el comportamiento de los aprendices, para que puedan aportar a la construcción de comunidad en cualquiera de los contextos en los que se desenvuelven, a través de programas de bienestar enfocados a la convivencia y al liderazgo positivo.
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        Desarrollar acciones enfocadas a la oferta y designación de apoyos socioeconómicos a los aprendices que según la reglamentación puedan ser beneficiarios, a través de incentivos para la excelencia, con el fin de procurar su permanencia en la entidad.
                                                                    </li>
                                                                </ol><!-- End List group Numbered -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="card bg-transparent h-100 mb-3 border-0 shadow-none">
                                        <div align="justify" class="card-body">
                                            <div class="pt-4 pb-2">
                                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                                    <div class="accordion-item">

                                                        <button class="accordion-button collapsed vinculos pagetitle" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                            <h1 class="accordion-header" id="flush-headingTwo">Principios:
                                                            </h1>
                                                        </button>

                                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                                <!-- List group Numbered -->
                                                                <ol class="list-group list-group-numbered" style="text-align: justify">
                                                                    <li class="list-group-item"><strong>Primero la vida: </strong>Cuidar y proteger la vida y la integridad del ser humano, con la promoción de los derechos humanos, la construcción de proyectos de vida, reconocer y valorar la riqueza cultural de nuestro país.
                                                                    </li>
                                                                    <li class="list-group-item"><strong>La dignidad del ser humano: </strong>Reconocer, valorar y respetar a cada persona integralmente entendida y aceptada, desde un enfoque de igualdad y de diferencia. Es estar comprometido fraternalmente con los demás, ser responsable consigo mismo y con el entorno, asegurando la convivencia pacífica.
                                                                    </li>
                                                                    <li class="list-group-item"><strong>Libertad con responsabilidad: </strong>Analizar, prever y asumir las consecuencias de nuestras decisiones y actos. Es cumplir con nuestros deberes, conocer y ejercer nuestros derechos. Significa estar convencido de que el trabajo dignifica, realiza, fortalece y desarrolla nuestro ser.
                                                                    </li>
                                                                    <li class="list-group-item"><strong>Integralidad: </strong>Pensar y obrar con rectitud, respeto, honestidad, responsabilidad, participación y justicia.
                                                                    </li>
                                                                    <li class="list-group-item"><strong>Formación para la vida y el trabajo: </strong>Brindar la Formación Profesional Integral a los trabajadores, forjando librepensadores, con sólidos conocimientos en la ciencia y la técnica, que aporten a la construcción de una sociedad mejor y al desarrollo económico del país.
                                                                    </li>
                                                                    <li class="list-group-item"><strong>Equidad: </strong>Se busca el bienestar de los aprendices con particular atención a aquellos que son vulnerables o presentan condiciones particulares que no han permitido el goce efectivo de sus derechos, como víctimas del conflicto armado, grupos étnicos, población con discapacidad y población de frontera.
                                                                    </li>
                                                                    <li class="list-group-item"><strong>Pertinencia: </strong>Las estrategias de bienestar deben estar orientadas por las particularidades de cada Centro de Formación de acuerdo con su contexto, necesidades, intereses y vigencia presupuestal.</li>
                                                                    <li class="list-group-item"><strong>Corresponsabilidad: </strong>El bienestar es una construcción colectiva y por tanto es responsabilidad de todos los actores de la institución. Los lineamientos emitidos por el Grupo de Bienestar del Aprendiz parten del reconocimiento del bienestar como un asunto estratégico para el cumplimiento de los objetivos misionales. Por tanto, las acciones de Bienestar al Aprendiz articulan y complementan los distintos programas de formación, los procesos formativos y las prácticas institucionales.
                                                                    </li>
                                                                    <li class="list-group-item"><strong>Coordinación: </strong>El bienestar de los aprendices debe conjugar acciones diversas para el desarrollo humano con el proceso de formación de competencias específicas con el fin de lograr un equilibrio de las dimensiones humanas en la formación del aprendiz.
                                                                    </li>
                                                                    <li class="list-group-item"><strong>Transparencia: </strong>El Grupo de Bienestar y Liderazgo al Aprendiz Se debe garantizar que los beneficios y servicios que se ofrezcan a los aprendices sean asignados con criterios de equidad y responsabilidad, teniendo un manejo óptimo de los recursos del programa.
                                                                    </li>
                                                                    <li class="list-group-item"><strong>Sentido Ecológico: </strong>Las acciones de bienestar al aprendiz deben partir desde el
                                                                        respeto y protección del medio ambiente, el uso racional y eficiente de los recursos
                                                                        naturales, y el desarrollo sostenible.
                                                                    </li>
                                                                    <li class="list-group-item"><strong>Igualdad: </strong>Promover de manera focalizada la igualdad de condiciones socioeconómicas
                                                                        de los aprendices para que estos puedan permanecer y cumplir con los procesos de
                                                                        formación.
                                                                    </li>
                                                                </ol><!-- End List group Numbered -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div align="center" class="pagetitle">
                                    <h1>Conoce nuestro equipo!</h1>
                                </div><!-- End Page Title -->
                            <div class="col-12 col-lg-8">
                                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{asset('img/Beatriz.png')}}" class="d-block w-100" alt="Deportes">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="https://colegioruzafa.com/wp-content/uploads/El-papel-de-un-auxiliar-de-enfermer%C3%ADa-en-un-hospital-1080x675.jpg" class="d-block w-100" alt="Enfermería">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="https://static.wikia.nocookie.net/psicologia/images/7/73/Que-es-psicologia.jpg/revision/latest/scale-to-width-down/1200?cb=20181002142724&path-prefix=es" class="d-block w-100" alt="Psicología">
                                        </div>
                                        {{-- ///// --}}
                                        <div class="carousel-item">
                                            <img src="https://concepto.de/wp-content/uploads/2020/03/musica-e1584123209397.jpg" class="d-block w-100" alt="Música">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="https://www.enfoquealafamilia.com/wp-content/uploads/2021/01/Consejeria-Ecuador-10-.png" class="d-block w-100" alt="Consejería">
                                        </div>
                                    </div>

                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>

                                </div><!-- End Slides with indicators -->
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection