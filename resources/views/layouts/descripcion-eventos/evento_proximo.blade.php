@extends('layouts.app')
{{-- @section('title','Agendacion cita') --}}
@section('content')

@include('layouts.header')
@include('layouts.menu')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">



<style>
    
.card-body{
  padding: 0;
}
.anadirevento{
  
}
.col-anadirevento{
  display: grid;
}
.col-anadirevento h3{
  grid-column: 1 / 4;
  grid-row: 1;
}
.col-anadirevento h5{
  grid-column: 3 / 4;
  grid-row: 1;
  margin-left: 40%;
  margin-right: 0px;
}
.col-anadirevento img{
  grid-column: 3 / 3;
  grid-row: 1;
  margin-right: 0px;
  margin-left: 0px;
  justify-self: end;
}
.contenido{
  width: 100%;
  height: 100%;
  margin: 0 auto;
  display: flex;
  justify-content: space-around;
  margin-top: 20px;
}
.calendario{
  background-color: blue;
  width: 300px;
  max-width: 40%;
  height: 400px;
  display: inline-block;
}

.imagen{
  background-color: gray;
  width: 500px;
  height: 400px;
  display: inline-block;
}
.col button{
  border-radius: 10px;
  background-color: gray;
  border: none;
  width: 35%;
  height: 45px;
}
.contenidos-evento{
  display: flex;
  flex-direction: row;
  gap: 25px;
  margin-top: 20px;
}
.contenidos-evento .col{
  border-radius: 10px;
  background-color: gray;
  border: 1px solid black;
  max-width: 20%;
  margin: 0 auto;
}
.contenidos-admin .col{
  margin-top: 20px;
}
.contenidos-admin{
  width: 100%;
  height: 100%;
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

    <div class="container margenes-main">
        <div class="anadirevento row">
            <div class="col col-anadirevento">
                <h3>EVENTO</h3>
                <!-- <img src="IMG/plus-circle-regular-24.png" alt="logosumarevento">
                <h5>Añadir evento</h5> -->
            </div>
        </div>
        <div class="contenido row">
            <div class="calendario col-md-6">
                <h3>CALENDARIO</h3>
            </div>
            <div class="imagen col-md-6">
                <h3>IMAGEN</h3>
            </div>
        </div>
        <div class="contenidos-evento row">
            <div class="col">
                <h5>AFORO</h5>
            </div>
            <div class="col">
                <h5>LUGAR</h5>
            </div>
            <div class="col">
                <h5>FECHA Y HORA</h5>
            </div>
        </div>
        <div class="contenidos-admin row">
            <div class="col col-botones">
            @if(session('rol_id') == 1)
              <a href="{{route('login')}}">
                <button>INCRIBIRSE</button>
              </a>
            @elseif(session('rol_id') == 5)
              <a href="{{route('form-inscription-event')}}">
                <button>INCRIBIRSE</button>
              </a>
            @endif

                
            
            </div>
            <!-- <div class="col col-botones">
                <button>EDITAR</button>
            </div>
            <div class="col col-botones">
                <button>ELIMINAR</button>
            </div> -->
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endsection
