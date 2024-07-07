<!-- @extends('layouts.app')
{{-- @section('title','Agendacion cita') --}}
@section('content')

@include('layouts.header')
@include('layouts.menu')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<style>

.mayor{

  height: 23rem;
  width: 45rem;
}

.imagennn{
  width: 100%;
  height: 100%;
  background-repeat: no-repeat; 
}

.informe{
  margin-top: 1rem;
}

hr{
  border: 1px solid black;
}

.tiempo{
  display: flex;
  justify-content: space-between;
  height: 12rem;
  width: 40rem;
  margin-left: 6rem;
}

.calen{
  width: 12rem;
  height: 12rem;
  margin-left: 2rem;
}

.dia{
  margin-top: 30px;
}

h2{
  font-weight: bold;
  color: green;
  font-size: 3rem
}

.boton{
  width: 17rem;
  margin-right: 7rem;
}

.lugar{
  color: black;
  margin-top: 50px;
  font-size: 2rem;
}

.hotia{
  color: white;
  background-color: green;
  border: 1px solid black;
  width: 10rem;
  font-size: 23px;
  border-radius: 4px;
  box-shadow: 5px 3px 7px black;
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

                  <div class="mayor">
                    <img src="https://hips.hearstapps.com/hmg-prod/images/fotos-1533279584.jpg?crop=0.5xw:1xh;center,top&resize=1200:*" alt="" class="imagennn">
                  </div>
                  <div class="informe">
                    <h1>Titulo evento</h1>
                    <hr>
                    <div class="tiempo">
                        <div class="calen">
                          <h3 class="dia">miercoles</h3>
                          <h2>05</h2>
                          <h3>junio 2024</h3>
                        </div>
                        <div class="boton">
                          <h2 class="lugar">centro</h2>
                          <a href=""><button class="hotia">Incribirse</button></a>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@include('layouts.footer')
@endsection -->
