@extends('layouts.app')
{{-- @section('title','Agendacion cita') --}}
@section('content')

@include('layouts.header')
@include('layouts.menu')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    .linea{
        border: 1px solid gray;
        height: 1px;
        width: 54rem;
        margin-top: 2rem;
    }
    .linea2{
        border: 1px solid gray;
        height: 1px;
        width: 54rem;
    }

    .vista{
        display: flex;
        justify-content: space-between;
        list-style: none;
        width: 54rem;
        font-weight: bold;

    }
    .nombre{
        margin-left: -90px;
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
                  <h1>Inscritos a Eventos</h1>
                  <div class="linea"></div>
                  <div class="vista">
                  <li>Id</li>
                  <li class="nombre">Nombre</li>
                  <li>Apellido</li>
                  <li>Ficha</li>
                  <li>Correo</li>
                  <li>Jornada</li>
                  </div>
                  <div class="linea2"></div>
                      
  
  
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