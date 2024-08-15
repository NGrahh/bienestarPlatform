@extends('layouts.app')
@section('title-page','Apoyos')
@section('content')

@include('layouts.header')
@include('layouts.menu')


<style>
    .container-cartas {
        display: grid;
        grid-template-columns: repeat(4, 12rem);
        grid-template-rows: repeat(2, 1fr);
    }
    .card-body{
        display: grid;
        place-items: center;
    }

    .c-1{
        grid-area: 1/1;
    }
    .c-2{
        grid-area: 1/3;
    }
    .c-3{
        grid-area: 1/5;
    }
    .c-4{
        grid-area: 2/2;
    }
    .c-5{
        grid-area: 2/4;
    }

    .btn {
        margin: 0;
       
    }

    img {
        margin: 0;
        border-radius: 10px;
    }

    .cartita:hover {
        cursor: pointer;
        padding: 0;
    }

    /*-----------*/

    .cuadro {
        height: 17.5rem;
        width: 17.5rem;
        overflow: hidden;
        position: relative;
        background-color: white;
        border-radius: 10px;

    }
    @media (max-width: 1430px) {
        .container-cartas {
        display: grid;
        grid-template-columns: repeat(4, 10rem);
        grid-template-rows: repeat(2, 1fr);
        grid-column-gap: 20px;
        grid-row-gap: 20px;
        
    }
    .c-1{
        grid-area: 1/1;
    }
    .c-2{
        grid-area: 1/3;
    }
    .c-3{
        grid-area: 2/1;
    }
    .c-4{
        grid-area: 2/3;
    }
    .c-5{
        grid-area: 3/2;
    }
    }

    @media (max-width: 705px) {
        .container-cartas {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-template-rows: repeat(5, 1fr);
        grid-column-gap: 20px;
        grid-row-gap: 20px;
        place-items: center;
        
    }
    .c-1{
        grid-area: 1/1;
    }
    .c-2{
        grid-area: 2/1;
    }
    .c-3{
        grid-area: 3/1;
    }
    .c-4{
        grid-area: 4/1;
    }
    .c-5{
        grid-area: 5/1;
    }
    }  
    
    @media (max-width: 350px){
        .cuadro {
        height: 16rem;
        width: 16rem;
        overflow: hidden;
        position: relative;
        background-color: white;
    }
    }

    .imag {
        width: 100%;
        height: 100%;
        margin-top: 0;
        transition: margin-top 1s;
    }

    .cuadro:hover .imag {
        margin-top: -120%;
    }

    .p {
        position: absolute;
        opacity: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        transition: opacity 0.3s;
    }

    .cuadro:hover .p {
        opacity: 1;
    }

    .para-link{
        text-decoration-line: underline;
        stroke-width: 6px;
        fill: transparent;
        stroke: red;
        stroke-dasharray: 50 400;
        stroke-dashoffset: -220;
        transition: 1s all ease;
    }

    .botones{
        width: 9rem;
        height: 3rem;
        background-color: black;
        color: white;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative; 
        overflow: hidden;
        margin-top: 50px;
        border-radius: 50px;
        border: none;
        margin-left: 4.5rem;
    }

    .botones span{
        z-index: 2;
        position: relative;
        
    }
    .botones::after{
        content: ""; 
        width: 2%;
        height: 2%;
        background: green;
        position: absolute; 
        z-index: 1;
        top: -30px;
        left: -50px;
        transition: .4s ease-in-out all;
        border-radius: 50%;
    }

 
    .botones:hover::after{
        width: 250%;
        height: 300%;
    }

   .apoyos{
        text-align: center;
   }

   .regular{
    margin-left: 3.8rem;
   }
   
</style>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Apoyos</h1>
    </div><!-- End Page Title -->

    <div class="section">
        <div class="row justify-content-center">
            <div class="col-lg-12 my-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="pt-4 pb-2 container-cartas">
                            <!-- Carta de apoyos FIC -->
                            <!-- <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded cartitan" style="width: 18rem;">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfPDpbwWPqvDEZ0yA2_KD4EmkUdcvzcYBC5g&s" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title text-center">FIC</h5>
                                    <p class="card-text"></p>
                                    <a href="{{route('formulario-inscripcion-apoyos')}}" class="btn btn-ba w-100 hidden">Inscribirse</a>
                                </div>
                            </div> -->
                            <div class="cuadro shadow-lg p-1 mb-5 bg-body-tertiary c-1">

                                <img class="imag" src="{{asset('img/fic.png')}}" alt="">
                                <div class="apoyos">
                                    <h1>Apoyo fic</h1>
                                    <a href="{{route('apoyo.fic')}}"><button class="botones holiio"><span>Ver</span></button></a>

                                </div>
                            </div>


                            <!-- Carta apoyo regular -->
                            <!-- <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded cartita" style="width: 18rem;">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Sena_Colombia_logo.svg/2090px-Sena_Colombia_logo.svg.png" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title text-center"> Regular</h5>
                                    <p class="card-text"></p>
                                    <a href="{{route('formulario-inscripcion-apoyo-regular')}}" class="btn btn-ba w-100 hidden">Inscribirse</a>
                                </div>
                            </div> -->
                            <div class="cuadro shadow-lg p-1 mb-5 bg-body-tertiary c-2">

                                <img class="imag" src="{{asset('img/regular.png')}}" alt="">
                                <div class="apoyos">
                                    <h1 >Apoyo Regular</h1>
                                    <a href="{{route('apoyo.sostenimiento')}}"><button class="botones holiio"><span>Ver</span></button></a>

                                </div>
                            </div>


                            <!-- Carta apoyo transporte -->
                            <!-- <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded cartita" style="width: 18rem;">
                                <img src="https://upload.wikimedia.org/wikipedia/en/a/a1/Megabus_Pereira_logo.png" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title text-center"> Transporte</h5>
                                    <p class="card-text"></p>
                                    <a href="{{route('formulario-inscripcion-apoyo-transporte')}}" class="btn btn-ba w-100 hidden">Inscribirse</a>
                                </div>
                            </div> -->
                            <div class="cuadro shadow-lg p-1 mb-5 bg-body-tertiary c-3">

                                <img class="imag" src="{{asset('img/mega.png')}}" alt="">
                                <div class="apoyo">
                                    <h1 class="regular">Apoyo de Transporte</h1>
                                    <a href="{{route('apoyo.transporte')}}"><button class="botones holiio"><span>Ver</span></button></a>

                                </div>
                            </div>


                            <!-- Carta apoyo de alimentacion -->
                            <!-- <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded cartita" style="width: 18rem;">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Sena_Colombia_logo.svg/2090px-Sena_Colombia_logo.svg.png" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title text-center"> Alimentación</h5>
                                    <p class="card-text"></p>
                                    <a href="{{route('formulario-inscripcion-apoyo-alimentacion')}}" class="btn btn-ba w-100 hidden">Inscribirse</a>
                                </div>
                            </div> -->
                            <div class="cuadro shadow-lg p-1 mb-5 bg-body-tertiary c-4">

                                <img class="imag" src="{{asset('img/alimentacion.png')}}" alt="">
                                <div class="apoyos">
                                    <h1>Apoyo de Alimentación</h1>
                                    <a href="{{route('apoyo.alimentacion')}}"><button class="botones holiio"><span>Ver</span></button></a>

                                </div>
                            </div>


                            <!-- Carta apoyo de plan de datos -->
                            <!-- <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded cartita" style="width: 18rem;">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Sena_Colombia_logo.svg/2090px-Sena_Colombia_logo.svg.png" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title text-center"> Plan de datos</h5>
                                    <p class="card-text"></p>
                                    <a href="{{route('formulario-inscripcion-apoyo-plan-datos')}}" class="btn btn-ba w-100 hidden">Inscribirse</a>
                                </div>
                            </div> -->
                            <div class="cuadro shadow-lg p-1 mb-5 bg-body-tertiary c-5">

                                <img class="imag" src="{{asset('img/datos.png')}}" alt="">
                                <div class="apoyos">
                                    <h1>Apoyo Plan de datos</h1>
                                    <a href="{{route('apoyo.datos')}}"><button class="botones holiio"><span>Ver</span></button></a>

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
    </div>
    </div>
</main><!-- End #main -->
@include('layouts.footer')
@endsection