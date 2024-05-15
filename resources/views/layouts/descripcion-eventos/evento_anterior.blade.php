@extends('layouts.app')
{{-- @section('title','Agendacion cita') --}}
@section('content')

@include('layouts.header')
@include('layouts.menu')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>

.col-slider{
  width: 100%;
  height: 300px;
  background-color:gray;
}
.contaniner-contenidos-info{
  background-color: gray;
  color: white;
  max-width: 40%;
  border-radius: 5px;
}
.mt-5{
  display: flex;
  justify-content: space-between;
}
.container-contenidos-fecha{
  margin-left: 30px;
  height: 50px 
}
.container-contenidos-lugar{
  margin-right: 30px;
}
.col-comentarios{

}
.comentarios-contenidos{
  background-color: gray;
  width: 60%;
  height: 400px;
  overflow: scroll;
}
</style>

<main id="main" class="main">
  <section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 my-5">
          <div class="card">
            <div class="card-body">
              <div align="center" class="pt-4 pb-2">
                <div class="max-conten">
                <main> <!-- Inicio Slider -->
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
                      </div>
            <div class="row mt-5">
                <div class="col-md-6 contaniner-contenidos-info container-contenidos-fecha">
                    <div class="fecha-contenidos">Fecha</div>
                </div>
                <div class="col-md-6 contaniner-contenidos-info container-contenidos-lugar">
                    <div class="lugar-contenidos">Lugar</div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col col-comentarios">
                    <div class="comentarios-contenidos text-center"><h3>Comentarios</h3>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore reprehenderit numquam, distinctio doloremque quod delectus fugit sapiente eius cumque iusto quibusdam? Iste, officiis. Nihil dignissimos quo architecto illo repudiandae voluptate!
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab provident facere necessitatibus, eligendi velit architecto corrupti sed, sequi ipsum et impedit consectetur hic voluptas voluptatum, deleniti quo minima recusandae maxime.
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente rem cumque, eius velit soluta perspiciatis, quae commodi aperiam distinctio ratione culpa, libero cupiditate autem necessitatibus maxime officia nostrum. Voluptas, molestias.
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. A esse temporibus similique placeat minima suscipit non? Odit porro autem consequuntur, aut ex magni eaque consequatur commodi quis, assumenda, asperiores cum.
                      Nobis beatae odit vero nemo, corrupti quo sint in accusantium dolores velit sunt ipsum officia perspiciatis, consequuntur non. Accusamus repudiandae sit blanditiis eius deleniti repellat rem beatae magnam ipsa perferendis.
                      Eius aliquid debitis aspernatur, facilis eligendi nemo ut odit nisi id dicta minus modi enim rerum cupiditate velit cumque earum libero! Aspernatur fuga aliquid adipisci maxime obcaecati nulla voluptatibus illo.
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                  <!-- Se eliminan herramientas administrativas -->
                    <!-- <div class="herramientas-admin-contenido d-flex justify-content-center">
                        <div class="editar-contenidos text-center">Editar</div>
                        <div class="eliminar-contenidos text-center">Eliminar</div>
                    </div> -->
                </div>
            </div>
        </div>
    </main>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endsection
