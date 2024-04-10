      @extends('layouts.app')

@section('content')

    @include('layouts.header')
    @include('layouts.menu')
    <link rel="stylesheet" href="public\assets\css\micodigosebas.css">

    <style>
      .row-2{
        margin-left: 4.2rem;
        text-align: center;
      }
      
      .columna-1{
        margin-left: -4rem;
      }

      .columna-2{
        margin-left: 1.9rem;
      }

      .columna-3{
        margin-left: 2rem;
      }

      .columna-4{
        margin-left: 1rem;
      }

      .columna-5{
        margin-left: 4rem;
      }

      .apoyos-regulares {
        flex-basis: 50%; /* Para ocupar el 50% del ancho del contenedor padre */
        padding: 0.5rem; /* Añade un poco de espacio entre los elementos */
    }

  
        .apoyos-regulares {
            flex-basis: 100%; /* En pantallas más pequeñas, ocuparán el 100% del ancho */
        }
    

        .botones a{
          border: 1px solid black;
          width: 7rem;
          height: 2rem;
          display: flex;
          justify-content: center;
          align-items: center;
          background-color: black;
          color: white;
          margin-left: 5rem;
        }

        .card-body h3{
          display: inline-block;
          justify-content: center;
          margin-top: 3px;
        }
      
        .contenedor-imagen {
    width: 300px; /* Ancho deseado del div */
    height: 200px; /* Alto deseado del div */
    background-image: url('https://img.freepik.com/vector-premium/linda-pequena-abeja-dibujos-animados-volando_188253-3805.jpg');
    background-size: cover; /* La imagen se ajustará para cubrir el área del div */
    background-position: center; /* La imagen se centrará dentro del div */
}

    .conten-t{
      display: flex;
      justify-content: center;
      align-content: center;
      text-align: center;
      margin-top: 1rem;
    }

    main h1{
      display: flex;
      justify-content: center;
      align-items: center;
    }

    section{
      justify-content: center;
      align-content: center;
      text-align: center;
      align-items: center;
    }

    

    
    </style>

    <main id="main" class="main">

        <div class="pagetitle">
        </div><!-- End Page Title -->
    
        <section class="section">
          <div class="row justify-content-center">
            <div class="col-lg-11 my-5">
                <div class="card mb-3">
                    <div class="card-body">
                      <div align="center" class="pt-4 pb-2">

                        <img  style="max-height: auto" src="{{asset('img/Bienestar-al-Aprendiz.png')}}" alt="Bienestar al Aprendiz" >
                      </div>
                      
                    </div>
                  </div>
            </div>
    
          </div>
    
        
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
    
                            
                            <div class="row row-2" style="">
                              <div class="col-12" style="text-align: center; margin-top: 15px; margin-bottom: 15px">
                                  <h1>Servicios</h1>
                              </div> 
                              <div class="col-sm-4 columna-1">
                                  <a href="{{route('Servicio-deportes')}}">
                                      <div class="card" style="width: 18rem;">
                                          <img src="https://www.65ymas.com/uploads/s1/76/67/77/foto.jpeg" class="card-img-top" >
                                          <div class="card-body">
                                            <h3>Deportes</h3>
                                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          </div>
                                      </div>
                                  </a>
                              </div>
                              <div class="col-sm-4 columna-2">
                                  <a href="{{route('Servicio-enfermeria')}}">
                                      <div class="card " style="width: 18rem;">
                                          <img src="https://www.65ymas.com/uploads/s1/76/67/77/foto.jpeg" class="card-img-top" >
                                          <div class="card-body">
                                            <h3>Enfermeria</h3>
                                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          </div>
                                      </div>
                                  </a>
                              </div>
                              <div class="col-sm-4 columna-3">
                                  <a href="{{route('Servicio-Psicologia')}}">
                                      <div class="card" style="width: 18rem;">
                                          <img src="https://www.65ymas.com/uploads/s1/76/67/77/foto.jpeg" class="card-img-top" >
                                          <div class="card-body">
                                            <h3>Psicologia</h3>
                                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          </div>
                                      </div>
                                  </a>
                              </div>
                              {{-- -------------------------- --}}
                          </div>
                          <div class="row row-2" style="">
                              <div class="col-sm-4 columna-1">
                                  <a href="{{route('Servicio-Musica')}}">
                                      <div class="card" style="width: 18rem;">
                                          <img src="https://www.65ymas.com/uploads/s1/76/67/77/foto.jpeg" class="card-img-top" >
                                          <div class="card-body">
                                            <h3>Musica</h3>
                                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          </div>
                                      </div>
                                  </a>
                              </div>
                              <div class="col-sm-4 columna-2">
                                  <a href="{{route('Servicio-Consejeria')}}">
                                      <div class="card " style="width: 18rem;">
                                          <img src="https://www.65ymas.com/uploads/s1/76/67/77/foto.jpeg" class="card-img-top" >
                                          <div class="card-body">
                                            <h3>Consejeria</h3>
                                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          </div>
                                      </div>
                                  </a>
                              </div>
                              <div class="col-sm-4 columna-3">
                                  <a href="#">
                                      <div class="card" style="width: 18rem;">
                                          <img src="https://www.65ymas.com/uploads/s1/76/67/77/foto.jpeg" class="card-img-top">
                                          <div class="card-body">
                                            <h3>Apoyos</h3>
                                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          </div>
                                      </div>
                                  </a>
                              </div>
                              {{-- -------------------------- --}}
                          </div>
                          
                            <h1 class="apoyos-titulo">Apoyo</h1>
    
                          <div class="apoyos-regulares" style="display: flex; ">
                            <div class="apoyos-regulares" style="display: flex">
                              <div class="card mb-3" style="max-width: 540px; ">
                                  <div class="row g-0" >
                                    <div class="col-md-4">
                                      <img  src="https://pxbar.com/wp-content/uploads/2023/11/foto-de-perfil-para-whatsapp-para-hombre-1024x1024.jpg" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                      <div class="card-body">
                                        <h5 class="card-title">Apoyo de sostenimiento FIC</h5>
                                        <p class="card-text">Es el desoembolso mensual de dinero que realiza a los Aprendices que sean formados en oficios y ocupaciones relacionados con la industria...</p>
                                        <div class="botones">
                                          <a href="">Ver</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>                    
                            </div>
    
                            <div class="apoyos-regulares" style="display: flex">
                              <div class="card mb-3" style="max-width: 540px; ">
                                  <div class="row g-0" >
                                    <div class="col-md-4">
                                      <img  src="https://pxbar.com/wp-content/uploads/2023/11/foto-de-perfil-para-whatsapp-para-hombre-1024x1024.jpg" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                      <div class="card-body">
                                        <h5 class="card-title">Apoyo de sostenimiento regular</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        <div class="botones">
                                          <a href="">Ver</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>                    
                            </div>
                          </div>

                           <div class="apoyos-regulares" style="display: flex;">
                            <div class="apoyos-regulares" style="display: flex">
                              <div class="card mb-3" style="max-width: 540px; ">
                                  <div class="row g-0" >
                                    <div class="col-md-4">
                                      <img  src="https://pxbar.com/wp-content/uploads/2023/11/foto-de-perfil-para-whatsapp-para-hombre-1024x1024.jpg" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                      <div class="card-body">
                                        <h5 class="card-title">Apoyo de transporte</h5>
                                        <p class="card-text">Es un servicio otordado a los aprendices de formación presencia en convenido con el servicio de transporte MEGABUS (Por ningun motivo se...</p>
                                        <div class="botones">
                                          <a href="">Ver</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>                    
                            </div>
    
                            <div class="apoyos-regulares" style="display: flex">
                              <div class="card mb-3" style="max-width: 540px; ">
                                  <div class="row g-0" >
                                    <div class="col-md-4">
                                      <img  src="https://pxbar.com/wp-content/uploads/2023/11/foto-de-perfil-para-whatsapp-para-hombre-1024x1024.jpg" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                      <div class="card-body">
                                        <h5 class="card-title">Apoyo de alimentacion</h5>
                                        <p class="card-text">Es aquel que otorga a los aprendices tecnicos y tegnologos de todas las modalidades y jornadas, que cumplen requisitos... </p>
                                        <div class="botones">
                                          <a href="">Ver</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>                    
                            </div>
                           </div>

                           <div class="apoyos-regulares" style="display: flex;">
                            <div class="apoyos-regulares" style="display: flex">
                              <div class="card mb-3" style="max-width: 540px; ">
                                  <div class="row g-0" >
                                    <div class="col-md-4">
                                      <img  src="https://pxbar.com/wp-content/uploads/2023/11/foto-de-perfil-para-whatsapp-para-hombre-1024x1024.jpg" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                      <div class="card-body">
                                        <h5 class="card-title">Centro de convivencia</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        <div class="botones">
                                          <a href="">Ver</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>                    
                            </div>
    
                            <div class="apoyos-regulares" style="display: flex">
                              <div class="card mb-3" style="max-width: 540px; ">
                                  <div class="row g-0" >
                                    <div class="col-md-4">
                                      <img  src="https://pxbar.com/wp-content/uploads/2023/11/foto-de-perfil-para-whatsapp-para-hombre-1024x1024.jpg" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                      <div class="card-body">
                                        <h5 class="card-title">Apoyo de datos</h5>
                                        <p class="card-text">Es el desoembolso mensual de dinero que realiza a los Aprendices que sean formados en oficios y ocupaciones relacionados con la industria</p>
                                        <div class="botones">
                                          <a href="">Ver</a>
                                        </div>  
                                      </div>
                                    </div>
                                  </div>
                              </div>                    
                            </div>

                           </div>
                                </div>
                                <h1>Eventos</h1>
                                <div class="conten-t">
                                  <a href="">
                                    <div class="eventos-pasado futuro" style="display: flex">
                                      <div class="card" style="width: 18rem; box-shadow: 0 2px 4px rgba(0, 0, 3, 1.2);">
                                        <div class="contenedor-imagen">
                                        </div>
                                        <div class="card-body ">
                                            <h5 class="card-title">Título del Evento Pasado</h5>
                                            <p class="card-text">Fecha: 10 de Abril, 2022</p>
                                        </div>
                                    </div>
                                  </a>
  
                                  <a href="">
                                    <div class="eventos-pasado futuro" style="display: flex">
                                      <div class="card" style="width: 18rem; box-shadow: 0 2px 4px rgba(2, 1, 5, 5); margin-left: 2rem">
                                        <div class="contenedor-imagen">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Título del Evento Pasado</h5>
                                            <p class="card-text">Fecha: 10 de Abril, 2022</p>
                                        </div>
                                      </div>
                                    </div>
                                  </a>
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
