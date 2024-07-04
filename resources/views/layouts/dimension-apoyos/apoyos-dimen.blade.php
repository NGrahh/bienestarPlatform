@extends('layouts.app')
{{-- @section('title','Agendacion cita') --}}
@section('content')

@include('layouts.header')
@include('layouts.menu')
<style>

    .cuadro {
        height: 18rem;
        width: 18rem;
        overflow: hidden;
        position: relative;
        background-color: white;
        

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

</style>


<main id="main" class="main">
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 my-5">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div align="center" class="pt-4 pb-2">

                                <div class="cuadro shadow-lg p-1 mb-5 bg-body-tertiary">
                                    
                                    <img class="imag" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfPDpbwWPqvDEZ0yA2_KD4EmkUdcvzcYBC5g&s" alt="">
                                    <div>
                                        <h1>Apoyo fic</h1>
                                        <a href=""><button class="botones holiio"><span>Inscribirse</span></button></a>
                                        
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
@include('layouts.footer')
@endsection