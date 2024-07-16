@extends('layouts.app')
@section('title-page','Apoyos de sostenimiento')
@section('content')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">
    <div class="section">
        <div class="row justify-content-center">
            <div class="col-lg-12 my-2">
                <div class="card mb-3">
                    <div align="center" class="card-body">
                        <div class="pt-4 pb-2">
                            <div align="justify" class="pagetitle">
                                <h1>¡Bienvenido/a a nuestra página de bienestar en la aprendiz!</h1>
                            </div><!-- End Page Title -->
                            <p align="justify" class="small">Aquí encontrarás un espacio dedicado a tu salud y equilibrio, donde podrás explorar diferentes consejos, información y recursos para mejorar tu bienestar físico, mental y emocional. Nuestro objetivo es acompañarte en tu camino hacia una vida más saludable y plena. ¡Explora, aprende y disfruta de todo lo que tenemos para ofrecerte!</p>
                        </div>

                        <div class="row pt-4">
                            <div class="col-md-4">
                                <div class="card" style="width: 18rem;" onmouseover="hideCardBody(this)">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body card-bodys" id="cardBody">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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

@include('layouts.footer')
@endsection
















































{{-- @extends('layouts.app')
@section('title-page','Apoyos de sostenimiento')
@section('content')

@include('layouts.header')
@include('layouts.menu')


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Apoyos de sostenimiento</h1>
    </div><!-- End Page Title -->

    <div class="section">
        <div class="row justify-content-center">
            <div class="col-lg-12 my-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="pt-4 pb-2 container-cartas">
                            <!-- Carta de apoyos FIC -->
                            <!-- <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded cartitan" style="width: 18rem;">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfPDpbwWPqvDEZ0yA2_KD4EmkUdcvzcYBC5g&s" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title text-center">FIC</h5>
                                    <p class="card-text"></p>
                                    <a href="{{route('formulario-inscripcion-apoyos')}}" class="btn btn-ba w-100 hidden">Inscribirse</a>
                                </div>
                            </div> -->
                            <div class="container mt-5">
                                <div class="card shadow-lg p-1 mb-5 bg-body-tertiary" style="width: 18rem;">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfPDpbwWPqvDEZ0yA2_KD4EmkUdcvzcYBC5g&s" class="card-img-top" alt="Imagen de apoyo">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Apoyo fic</h5>
                                        <a href="{{route('Apoyo-fic')}}" class="btn btn-primary">Ver</a>
                                    </div>
                                </div>
                            </div>


                            <!-- Carta apoyo regular -->
                            <!-- <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded cartita" style="width: 18rem;">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Sena_Colombia_logo.svg/2090px-Sena_Colombia_logo.svg.png" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title text-center"> Regular</h5>
                                    <p class="card-text"></p>
                                    <a href="{{route('formulario-inscripcion-apoyo-regular')}}" class="btn btn-ba w-100 hidden">Inscribirse</a>
                                </div>
                            </div> -->
                            <div class="cuadro shadow-lg p-1 mb-5 bg-body-tertiary">

                                <img class="imag" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Sena_Colombia_logo.svg/2090px-Sena_Colombia_logo.svg.png" alt="">
                                <div class="apoyos">
                                    <h1>Apoyo Regular</h1>
                                    <a href="{{route('Apoyo-regular')}}"><button class="botones holiio"><span>Ver</span></button></a>

                                </div>
                            </div>


                            <!-- Carta apoyo transporte -->
                            <!-- <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded cartita" style="width: 18rem;">
                                <img src="https://upload.wikimedia.org/wikipedia/en/a/a1/Megabus_Pereira_logo.png" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title text-center"> Transporte</h5>
                                    <p class="card-text"></p>
                                    <a href="{{route('formulario-inscripcion-apoyo-transporte')}}" class="btn btn-ba w-100 hidden">Inscribirse</a>
                                </div>
                            </div> -->
                            <div class="cuadro shadow-lg p-1 mb-5 bg-body-tertiary">

                                <img class="imag" src="https://upload.wikimedia.org/wikipedia/en/a/a1/Megabus_Pereira_logo.png" alt="">
                                <div class="apoyo">
                                    <h1>Apoyo de Transporte</h1>
                                    <a href="{{route('Apoyo-transporte')}}"><button class="botones holiio"><span>Ver</span></button></a>

                                </div>
                            </div>


                            <!-- Carta apoyo de alimentacion -->
                            <!-- <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded cartita" style="width: 18rem;">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Sena_Colombia_logo.svg/2090px-Sena_Colombia_logo.svg.png" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title text-center"> Alimentación</h5>
                                    <p class="card-text"></p>
                                    <a href="{{route('formulario-inscripcion-apoyo-alimentacion')}}" class="btn btn-ba w-100 hidden">Inscribirse</a>
                                </div>
                            </div> -->
                            <div class="cuadro shadow-lg p-1 mb-5 bg-body-tertiary">

                                <img class="imag" src="https://www.recreaciondidactica.com/wp-content/uploads/2019/02/refrigerios-bogota-10.jpg" alt="">
                                <div class="apoyos">
                                    <h1>Apoyo de Alimentación</h1>
                                    <a href="{{route('Apoyo-alimentacion')}}"><button class="botones holiio"><span>Ver</span></button></a>

                                </div>
                            </div>


                            <!-- Carta apoyo de plan de datos -->
                            <!-- <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded cartita" style="width: 18rem;">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Sena_Colombia_logo.svg/2090px-Sena_Colombia_logo.svg.png" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title text-center"> Plan de datos</h5>
                                    <p class="card-text"></p>
                                    <a href="{{route('formulario-inscripcion-apoyo-plan-datos')}}" class="btn btn-ba w-100 hidden">Inscribirse</a>
                                </div>
                            </div> -->
                            <div class="cuadro shadow-lg p-1 mb-5 bg-body-tertiary">

                                <img class="imag" src="https://i.blogs.es/3ce24a/wifi-datos/450_1000.webp" alt="">
                                <div class="apoyos">
                                    <h1>Apoyo Plan de datos</h1>
                                    <a href="{{route('Apoyo-datos')}}"><button class="botones holiio"><span>Ver</span></button></a>

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
    </div>
</main><!-- End #main -->
@include('layouts.footer')
@endsection --}}