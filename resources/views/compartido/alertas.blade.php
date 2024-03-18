@if($msj = Session::get('success'))
<div class="col-12 alert alert-success alert-dismissible fade show mt-3" role="alert">
    <strong>Exitos!<br></strong> {{ $msj }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if($msj = Session::get('error'))
<div class="col-12 alert alert-danger alert-dismissible fade show mt-3" role="alert">
    <strong>Error!<br></strong> {{ $msj }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif