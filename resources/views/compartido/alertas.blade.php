@if($msj = Session::get('success'))
    <div class="floating-alert-container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Éxito!<br></strong> {{ $msj }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
@if($msj = Session::get('error'))
    <div class="floating-alert-container">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>¡Ups! Surgió un error. <br></strong> {{ $msj }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
@if($msj = Session::get('info'))
    <div class="floating-alert-container">
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong>Información <br></strong> {{ $msj }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif