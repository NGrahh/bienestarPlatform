@extends('layouts.app')

@section('content')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">


    <div class="section">
        <div class=" row justify-content-center">
            <div class="col-lg-12 my-2">
                <div class="card mb-3">
                    <div align="center" class="card-body">
                        <div class="pt-4 pb-2">
                            <div align="justify" class="pagetitle">
                                <h1>¡Bienvenido/a a nuestra página de bienestar en la aprendiz!</h1>
                            </div><!-- End Page Title -->
                            <p align="justify" class="small">Aquí encontrarás un espacio dedicado a tu salud y equilibrio, donde podrás explorar diferentes consejos, información y recursos para mejorar tu bienestar físico, mental y emocional. Nuestro objetivo es acompañarte en tu camino hacia una vida más saludable y plena. ¡Explora, aprende y disfruta de todo lo que tenemos para ofrecerte!</p>
                        </div>
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
                                        <img src="https://cadenaser.com/resizer/U8f_GMYikwDB6TcQDajHRFsnheM=/990x743/filters:format(jpg):quality(70)/cloudfront-eu-central-1.images.arcpublishing.com/prisaradio/PUHDUWOGURLUJJSESSCUIPY7PE.jpg" class="d-block w-100" alt="Deportes">
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
                        <div class="row pt-4">
                            <div class="col-12 col-sm-6">
                                <div class="card bg-transparent h-100 mb-3 border-0 shadow-none">
                                    <div align="justify" class="card-body">
                                        <div class="pt-4 pb-2">
                                            <div class="pagetitle">
                                                <h1>Horarios de atención</h1>
                                            </div><!-- End Page Title -->
                                            <p class="small">
                                                Servicio Nacional de Aprendizaje (SENA) <br>Centro de Diseño e Innovación Tecnológica Industrial<br>Regional Risaralda<br>
                                                <strong>Dirección: </strong><a class="vinculos" href="https://www.google.com/maps?q=Transv.+7+Calle+26+Barrio+Santa+Isabel+Dosquebradas">Transv. 7 Calle 26 Barrio Santa Isabel Dosquebradas</a><br>
                                                Lunes A Viernes (--:-- a.m a --:-- a.m) - (--:-- p.m a --:-- p.m)
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
                                                <h1>Contacto</h1>
                                            </div><!-- End Page Title -->
                                            <p class="small">
                                                Beatriz Montealegre<br>
                                                Responsable de Bienestar al aprendiz<br>
                                                <p class="small mb-0"><strong>Correo: </strong> <a class="vinculos" href="mailto:bemontealegre@sena.edu.co">bemontealegre@sena.edu.co</a></p>
                                                <p class="small mb-0"><strong>N° telefónico: </strong> <a class="vinculos" href="whatsapp://send?phone=573104021404">+57-3104021404</a></p>
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

    
</main><!-- End #main -->


@endsection