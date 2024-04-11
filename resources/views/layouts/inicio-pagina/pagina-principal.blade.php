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
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://media.timeout.com/images/105766961/750/422/image.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://e1.pxfuel.com/desktop-wallpaper/935/276/desktop-wallpaper-for-facebook-cover-new-fb-cover.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://marketplace.canva.com/EAE_GhIIl_Q/1/0/1600w/canva-portada-de-facebook-flor-rosa-CWiP-dCBLv0.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
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
                                            <p class="small">Servicio Nacional de Aprendizaje Sena Centro de Diseño e Innovación Tecnológica Industrial     Regional Risaralda<br>
                                                Dirección: Transv. 7 Calle 26 Barrio Santa Isabel Dosquebradas <br>
                                                Oficina de Bienestar, 3er Piso.<br>
                                                Lunes A Viernes (--:-- a.m a --:-- p.m)
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
                                                <strong>Beatriz Montealegre</strong><br>
                                                <strong>Responsable de Bienestar al aprendiz</strong><br>
                                                <p class="small mb-0">Correo: <a class="vinculos" href="#">bemontealegre@sena.edu.co</a></p>
                                                <p class="small mb-0">N° telefónico <a class="vinculos" href="#">+57 3104021404</a></p>
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