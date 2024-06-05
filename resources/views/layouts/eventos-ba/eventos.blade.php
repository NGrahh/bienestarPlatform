@extends('layouts.app')

@section('content')

@section('title-page','Edición usuario')

@include('layouts.header')
@include('layouts.menu')

<style>

    .centrar{
        display: flex;
        justify-content: center;
    }

    h2{
        margin-left: 6rem;
        margin-top: 7px;
        font-size: 35px;
    }

    h4{
        font-size: 20px;
    }

.event{
    display: flex;
    
}
.eventoss {
    height: 18rem;
    position: relative;
    margin-top: 10px; 
    margin-left: 60px;
}

.evento1 {
    width: 19rem;
    height: 18rem;
    position: relative; 
    color: white;
}

.evento1 img {
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
    border-radius: 20px;
}

.texto {
    position: absolute; 
    top: 0%;
    width: 100%;
    height: 100%;
    left: 0; 
    padding: 5px;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.5) 50%, rgba(0, 0, 0, 0.8) 100%); /* Degradado que va de transparente a oscuro */
    border-radius: 20px;
}


.Evento{
    margin-top: 9rem;
    font-size: 2.2rem;
    margin-left: 8px;
}

.Ubi{
    font-size: 17px;
    margin-left: 10px;
    margin-top: 1rem;
}

.linea{
    margin-top: 1rem;
    width: 8rem;
    height: 1.5rem;
    background-color: orange;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    border-radius: 3px;
    font-size: 15px;
    margin-left: 5px;
}




    

</style>

<main id="main" class="main">
    <div class="section">
        <div class="row justify-content-center">
            <div class="col-lg-12 my-4">
                <div class="card mb-3">
                    <div class="card-body">
                        
                        <div class="centrar">
                            <div class="mayor">
                                <h2>Eventos para ti</h2>
                                <h4>Ve todos los eventos disponibles en estos momentos</h4>
                              </div>
                        </div>
                          <div class="event">
                            <div class="eventoss">
                                <div class="evento1">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqrIaOoNLKb_PGfc_nS4s3IVBC8x7x9nYOqQ&s" alt="">
                                    <div class="texto">
                                        <div class="color">
                                        <h3 class="Evento">El evento</h3>
                                        <h3 class="Ubi">Diviertete en esta actividad</h3>
                                        <a href=""><div class="linea">Ver más</div></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="eventoss">
                                <div class="evento1">
                                    <img src="https://previews.123rf.com/images/iriana88w/iriana88w1608/iriana88w160802179/62184689-habitaci%C3%B3n-sin-muebles-con-suelo-de-moqueta-paredes-de-color-verde-claro-y-mucho-espacio-noroeste.jpg" alt="">
                                    <div class="texto">
                                        <div class="color">
                                            <h3 class="Evento">El evento</h3>
                                        <h3 class="Ubi">Diviertete en esta actividad</h3>
                                        <a href=""><div class="linea">Ver más</div></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="eventoss">
                                <div class="evento1">
                                    <img src="https://previews.123rf.com/images/vencavolrab78/vencavolrab781310/vencavolrab78131000371/23194886-paisaje-de-primavera-con-el-%C3%A1rbol-en-forma-de-coraz%C3%B3n.jpg" alt="">
                                    <div class="texto">
                                        <div class="color">
                                            <h3 class="Evento">El evento</h3>
                                        <h3 class="Ubi">Diviertete en esta actividad</h3>
                                        <a href=""><div class="linea">Ver más</div></a>
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




