@extends('layouts.app')
@section('title-page','Apoyo Datos')
@section('content')

@include('layouts.header')
@include('layouts.menu')


<style>
.container-cartas{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: repeat(2, 1fr);
    grid-column-gap: 20px;
    grid-row-gap: 20px;
}
.btn{
    margin: 0;
    /* visibility: hidden; */
}
img{
    margin: 0;

}
.cartita:hover{
    cursor: pointer;
    padding: 0;
}
</style>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Apoyos de sostenimiento</h1>
    </div><!-- End Page Title -->

    <div class="section">
        <div class="row justify-content-center">
            <div class="col-lg-12 my-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="pt-4 pb-2 container-cartas">
                            <!-- Carta de apoyos FIC -->
                        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded cartitan" style="width: 18rem;">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfPDpbwWPqvDEZ0yA2_KD4EmkUdcvzcYBC5g&s" class="card-img-top" alt="">
                            <div class="card-body">
                            <h5 class="card-title text-center">FIC</h5>
                                <p class="card-text"></p>
                                <a href="#" class="btn btn-ba w-100 hidden">Inscribirse</a>
                                                </div>
                                            </div>
                                            <!-- Carta apoyo regular -->
                                            <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded cartita" style="width: 18rem;">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Sena_Colombia_logo.svg/2090px-Sena_Colombia_logo.svg.png" class="card-img-top" alt="">
                            <div class="card-body">
                            <h5 class="card-title text-center"> Regular</h5>
                                <p class="card-text"></p>
                                <a href="#" class="btn btn-ba w-100 hidden">Inscribirse</a>
                                                </div>
                                            </div>
                                            <!-- Carta apoyo transporte -->
                                            <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded cartita" style="width: 18rem;">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Sena_Colombia_logo.svg/2090px-Sena_Colombia_logo.svg.png" class="card-img-top" alt="">
                            <div class="card-body">
                            <h5 class="card-title text-center"> Transporte</h5>
                                <p class="card-text"></p>
                                <a href="#" class="btn btn-ba w-100 hidden">Inscribirse</a>
                                                </div>
                                            </div>
                                            <!-- Carta apoyo de alimentacion -->
                                            <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded cartita" style="width: 18rem;">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Sena_Colombia_logo.svg/2090px-Sena_Colombia_logo.svg.png" class="card-img-top" alt="">
                            <div class="card-body">
                            <h5 class="card-title text-center"> Alimentación</h5>
                                <p class="card-text"></p>
                                <a href="#" class="btn btn-ba w-100 hidden">Inscribirse</a>
                                                </div>
                                            </div>
                                            <!-- Carta apoyo de plan de datos -->
                                            <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded cartita" style="width: 18rem;">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Sena_Colombia_logo.svg/2090px-Sena_Colombia_logo.svg.png" class="card-img-top" alt="">
                            <div class="card-body">
                            <h5 class="card-title text-center"> Plan de datos</h5>
                                <p class="card-text"></p>
                                <a href="#" class="btn btn-ba w-100 hidden">Inscribirse</a>
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