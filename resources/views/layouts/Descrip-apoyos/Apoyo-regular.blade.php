{{-- @extends('layouts.app')

@section('content')

@include('layouts.header')
@include('layouts.menu')



<main id="main" class="main">
  <section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 my-5">
          <div class="card">
            <div class="card-body">
              <div align="center" class="pt-4 pb-2">
                
                <h1>Apoyo de Sostenimiento Regular</h1>
                <div class="contenedor">
                    <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/82662ded-f350-4d9b-810d-0cfed1b0fa4b/d7ncnog-a2f11467-c2fb-4d50-a29e-dfc2e68f934b.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzgyNjYyZGVkLWYzNTAtNGQ5Yi04MTBkLTBjZmVkMWIwZmE0YlwvZDduY25vZy1hMmYxMTQ2Ny1jMmZiLTRkNTAtYTI5ZS1kZmMyZTY4ZjkzNGIuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.h3Kg9WRtBT3Gpsbo3nXG1GzPA-vGVrdWo4gBXQCwzK4" alt="Descripción de la imagen" class="img-fluid imagen-ajustada">
                </div>
                <div class="descripcion">
                    <h2>Descripcion</h2>
                    <p class="text-center">
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur vero voluptate eum ipsa repellendus explicabo inventore voluptatem! Pariatur, veniam. Similique, illum quam. Enim, tempore vel impedit consectetur accusantium perspiciatis optio.
                    </p>
                </div>
                <div class="botones mt-4 text-center">
                    <button class="btn btn-primary btn-lg mx-3" ><a href="{{route('login')}}" style="color: white">Postularse</a></button>
                    <button class="btn btn-primary btn-lg mx-3" type="button" data-toggle="collapse" data-target="#contenido" aria-expanded="false" aria-controls="contenido">
                      Requisitos
                    </button>
                    <div class="contenido collapse mt-3" id="contenido">
                      <div class="card card-body">
                        <p class="text-center">Requisitos para el apoyo regular</p>
                        <ul>
                          <li>Estar en estado "en formacion"</li>
                          <li>Pertenecer a estratos 1 o 2</li>
                          <li>No tener vinvulo labora, contrato de aprendizaje, patrocinio o practica que genere ingresos</li>
                          <li>No ser beneficiario de Jovenes en accion</li>
                          <li>No ser ni haber sido beneficiario de apoyos de sostenimiento en otros programas</li>
                        </ul>
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
</main>



@endsection --}}



@extends('layouts.app')


@section('content')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Creación de eventos</h1>
    </div><!-- End Page Title -->

    <div class="section">
        <div class="row justify-content-center">
            <div class="col-lg-12 my-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <p class="small"><strong>Nota: </strong>Complete el siguiente formulario para crear un nuevo evento.</p>
                        </div>
                        @include('compartido.alertas')
                        <div class="col-sm-12">
                            <div  class="pt-4 pb-2">

                                <h1 align="center">Apoyo de sostenimiento regular</h1>
                                <div align="center"  class="contenedor">
                                    <img src="https://sena.edu.co/Style%20Library/alayout/images/logoSena.png" alt="Descripción de la imagen" class="img-fluid imagen-ajustada">
                                </div>
                                <div class="descripcion">
                                    <h2 align="center">Descripcion</h2>
                                    <p align="justify" class="text-center">
                                       Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, repudiandae molestiae. Quia explicabo possimus neque error illum delectus distinctio assumenda ex eligendi debitis deserunt, quod impedit laborum nemo qui ad.Sed, 
                                       harum dignissimos tempora debitis quisquam porro veniam. Ab reiciendis dolor fuga suscipit fugit. Temporibus animi cumque est provident adipisci. Nesciunt rerum omnis amet adipisci iste consequatur facere, at id.
                                    </p>
                                </div>
                                <div class="botones mt-4 text-center">
                                    <a href="{{route('login')}}"><button class="btn btn-ba mx-3">Postularse</button></a>

                                </div>

                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                      <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                          Requisitos
                                        </button>
                                      </h2>
                                      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <!-- List group Numbered -->
                                            <ol class="list-group list-group-numbered" style="text-align: justify">
                                                <li class="list-group-item">Estar en estado "en formacion</li>
                                                <li class="list-group-item">Pertenecer a estratos 1 o 2</li>
                                                <li class="list-group-item" >No tener vinvulo labora, contrato de aprendizaje, patrocinio o practica que genere ingresos</li>
                                                <li class="list-group-item" >No ser beneficiario de Jovenes en accion</li>
                                                <li class="list-group-item" >No ser ni haber sido beneficiario de apoyos de sostenimiento en otros programas</li>
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
        </div>
    </div>
</main><!-- End #main -->

@endsection