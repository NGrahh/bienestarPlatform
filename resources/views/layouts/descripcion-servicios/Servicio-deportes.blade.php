@extends('layouts.app')
{{-- @section('title','Agendacion cita') --}}
@section('content')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Servicio deportes</h1>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12 my-5">
          <div class="card mb-3">
            <div class="card-body">
              <div align="center" class="pt-4 pb-2">
                <h1 class="titulo">Deportes</h1>
                <div class="todo_contenido">
                  <div class="row separacion">
                    <div class="col-lg-6 contenido">
                      <h3 class="Descripcion">Descripción</h3>
                      <div class="contenido-descripcion">
                        <p>
                          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum itaque amet incidunt aliquid nam velit nihil iste unde esse consectetur harum repellendus maiores, alias perspiciatis possimus aperiam error dolorem temporibus. Ab ea in reiciendis qui officia laudantium quibusdam, ipsam ex odit optio temporibus quisquam cumque inventore porro dolor animi esse, autem eos aspernatur obcaecati. Earum blanditiis labore quae. Ab, eaque. Suscipit praesentium eos dolorum saepe fugiat maxime, quae deserunt temporibus commodi, ratione laboriosam dolores natus, tempora ex facilis. Soluta porro repellat quo dolor officia provident aut mollitia cum reiciendis similique?
                        </p>
                      </div>
                      <div class="caja">
                        <h3 class="horarios">Horarios de Atención</h3>
                        <div class="horas" >
                          <p style="text-align: center" >Los horarios de atencion se le informaran 
                            a los Aprendices por medio de WhatsApp, se le informara 
                            tanto el Horario como que se hace cada dia y sus horas</p>
                        </div>
                        <button class="btn btn-success mt-3"><a href="{{route('login')}}" class="solicitar" style="color: black;">Asistencia</a></button>
                      </div>
                    </div>
                    <div class="col-lg-6 contenedor">
                      <img class="imagen" src="https://e7.pngegg.com/pngimages/440/795/png-clipart-logo-servicio-nacional-de-aprendizaje-sena-symbol-national-training-service-dragon-ball-logo-angle-text.png" alt="Descripción de la imagen">
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

@endsection
