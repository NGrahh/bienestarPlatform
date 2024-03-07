@extends('layouts.app')

@section('content')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Inicio</h1>

    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p>Hola, bienvenidos a Bienestar al aprendiz.
                            aquí podrás encontrar los servicios que
                            ofrecemos..</p>

                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://www.educaciontrespuntocero.com/wp-content/uploads/2020/04/mejores-bancos-de-imagenes-gratis.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://img.freepik.com/foto-gratis/tranquila-puesta-sol-verano-sobre-silueta-montana-generada-ia_188544-19648.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://www.educaciontrespuntocero.com/wp-content/uploads/2020/04/mejores-bancos-de-imagenes-gratis.jpg" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                        
                        <div class="row">
                            <div class="col-12" style="text-align: center; margin-top: 15px;margin-bottom: 15px">
                                <h1>Servicios</h1>
                            </div> 
                            <div class="col-sm-4">
                                <div class="card" style="width: 18rem;">
                                    <img src="https://www.65ymas.com/uploads/s1/76/67/77/foto.jpeg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card" style="width: 18rem;">
                                    <img src="https://www.65ymas.com/uploads/s1/76/67/77/foto.jpeg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card" style="width: 18rem;">
                                    <img src="https://www.65ymas.com/uploads/s1/76/67/77/foto.jpeg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                            {{-- -------------------------- --}}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <div class="row g-0">
                                          <div class="col-md-4">
                                            <img style="height: 100%; width: 100%" src="https://pxbar.com/wp-content/uploads/2023/11/foto-de-perfil-para-whatsapp-para-hombre-1024x1024.jpg" class="img-fluid rounded-start" alt="...">
                                          </div>
                                          <div class="col-md-8">
                                            <div class="card-body">
                                              <h5 class="card-title">Card title</h5>
                                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="col-sm-6">
                                </div>

                        </div>
                        <h2 class="apoyos-titulo">Apoyo</h2>

                       <div class="apoyos-regulares" style="display: flex">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                              <div class="col-md-4">
                                <img  src="https://pxbar.com/wp-content/uploads/2023/11/foto-de-perfil-para-whatsapp-para-hombre-1024x1024.jpg" class="img-fluid rounded-start" alt="...">
                              </div>
                              <div class="col-md-8">
                                <div class="card-body">
                                  <h5 class="card-title">Apoyo de sostenimiento</h5>
                                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                  <a href="" class="boton-apoyo">Ver</a>
                                </div>
                              </div>
                            </div>
                        </div>

                          <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                              <div class="col-md-4">
                                <img style="border-radius: 50% "  src="https://www.65ymas.com/uploads/s1/76/67/77/foto.jpeg" class="img-fluid rounded-start" alt="..." style="border-radius: 500px">
                              </div>
                              <div class="col-md-8">
                                <div class="card-body">
                                  <h5 class="card-title">Apoyo de sostenimiento</h5>
                                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                  <a href="" class="boton-apoyo">Ver</a>
                                </div>
                              </div>
                            </div>
                          </div>                      
                                </div>
                              </div>
                            </div>
                            <h2>Eventos</h2>
                            <div class="eventos-pasado futuro" style="display: flex">
                              <div class="card text-center" style="width: 18rem;" href="">
                                <a class="card-body" href="">
                                 <h5 class="card-title">Foto evento</h5>
                                 <p class="card-text">Evento pasado</p>
                                 <input type="text" placeholder="fecha evento">
                                 </a>
                                </div>
  
                                <div class="card text-center" style="width: 18rem;" href="">
                                  <a class="card-body" href="">
                                   <h5 class="card-title">Foto evento</h5>
                                   <p class="card-text">Evento pasado</p>
                                   <input type="text" placeholder="fecha evento">
                                   </a>
                                  </div>
                            </div>
                            


                        </div>
                      </div> +
                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->


@endsection