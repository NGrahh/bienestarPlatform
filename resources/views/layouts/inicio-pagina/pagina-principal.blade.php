@extends('layouts.app')

@section('content')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">
    @include('compartido.alertas')
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
                                <!-- Indicadores del carrusel -->
                                <div class="carousel-indicators">
                                    @foreach($images as $key => $image)
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $key + 1 }}"></button>
                                    @endforeach
                                </div>
                        
                                <!-- Elementos del carrusel -->
                                <div class="carousel-inner">
                                    @foreach($images as $key => $image)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ route('carousel.getImages', ['image' => basename($image->image)]) }}" class="d-block w-100 rounded" alt="Imagen {{ $key + 1 }}">
                        
                                            <!-- Botón de eliminación debajo de la imagen -->
                                            @if(in_array($userID, [1, 2, 3, 4]))
                                                <div class="carousel-item-overlay">
                                                    <form action="{{ route('images.delete', ['id' => $image->id]) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta imagen?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar Imagen</button>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                        
                                <!-- Controles del carrusel -->
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Anterior</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Siguiente</span>
                                </button>
                            </div><!-- End Slides with indicators -->
                        </div>
                        
                        <!-- CSS para posicionar el botón debajo de la imagen -->
                        <style>
                        .carousel-item {
                            position: relative;
                        }
                        
                        .carousel-item-overlay {
                            position: absolute;
                            bottom: 30px;
                            left: 30%;
                            transform: translateX(-50%);
                            width: 100%;
                            text-align: center;
                        }
                        
                        .carousel-item-overlay form {
                            margin: 0;
                        }
                        </style>
                        
                            <!-- Formulario para subir imágenes -->
                        
                        @if(in_array($userID, [1, 2, 3, 4]))
                        <div class="container">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center pt-2">
                                    <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                                        @csrf
                                        <div class="mb-3">
                                            <div class="pagetitle">
                                                <h1>Subir nueva imagen al carrusel</h1>
                                            </div><!-- End Page Title -->
                                            <!-- Aquí aplicamos clases de validación de Bootstrap -->
                                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" required>
                                            
                                        </div>
                                        <button type="submit" class="btn btn-ba">Subir Imagen</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                        
            

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
                                                Lunes A Viernes (8 a.m a 12 p.m) - (1 p.m a 8 p.m)
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
@include('layouts.footer')
@endsection