@extends('layouts.app')
{{-- @section('title','Agendacion cita') --}}
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
                
                <h1>Apoyo de alimentacion</h1>
                <div class="contenedor">
                    <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/82662ded-f350-4d9b-810d-0cfed1b0fa4b/d7ncnog-a2f11467-c2fb-4d50-a29e-dfc2e68f934b.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzgyNjYyZGVkLWYzNTAtNGQ5Yi04MTBkLTBjZmVkMWIwZmE0YlwvZDduY25vZy1hMmYxMTQ2Ny1jMmZiLTRkNTAtYTI5ZS1kZmMyZTY4ZjkzNGIuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.h3Kg9WRtBT3Gpsbo3nXG1GzPA-vGVrdWo4gBXQCwzK4" alt="Descripción de la imagen" class="img-fluid imagen-ajustada">
                </div>
                <div class="descripcion">
                    <h2>Descripcion</h2>
                    <p class="text-center">
                      Es aquel que otorga a los aprendices tecnicos y tegnologos de todas las modalidades y jornadas, 
                      que cumplen requisitos y cuyo proposito es apoyar la permanecia del aprendiz en su proceso formativo
                    </p>
                </div>
                <div class="botones mt-4 text-center">
                    <button class="btn btn-primary btn-lg mx-3" ><a href="{{route('login')}}" style="color: white">Postularse</a></button>
                    <button class="btn btn-primary btn-lg mx-3" type="button" data-toggle="collapse" data-target="#contenido" aria-expanded="false" aria-controls="contenido">
                      Requisitos
                    </button>
                    <div class="contenido collapse mt-3" id="contenido">
                      <div class="card card-body">
                        <p class="text-center">Requisitos para apoyo de alimentacion</p>
                        <ul>
                          <li>Diligenciar el formato de registro socioeconomico</li>
                          <li>Estar en estado "Induccion" o "En formacion" en el reglamento al aprendiz</li>
                          <li>No ser beneficiario de ningun apoto de sostenimiento</li>
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



@endsection
