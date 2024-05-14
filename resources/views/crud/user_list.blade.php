@extends('layouts.app')
@section('content')

@include('layouts.header')
@include('layouts.menu')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Operaciones de gestión de recursos</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datatables</h5>
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>T.identificación</th>
                                        <th>N.identificación</th>
                                        <th>C.electrónico</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }} {{ $user->lastname }}</td>
                                        <td>{{ $user->TypeDocument->name }}</td>
                                        <td>{{ $user->document }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-ba-amarillo px-2" data-bs-toggle="modal" data-bs-target="#largeModal1">
                                                <i class="bx bxs-user-detail"></i> 
                                            </button>
        
                                            <div class="modal fade" id="largeModal1" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Large Modal</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta at et reprehenderit. Placeat autem numquam et fuga numquam. Tempora in facere consequatur sit dolor ipsum. Consequatur nemo amet incidunt est facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                            <button type="button" class="btn btn-ba">Guardar cambios</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- End Large Modal-->
                                            <button type="button" class="btn btn-ba-rojo px-2" data-bs-toggle="modal" data-bs-target="#largeModal2">
                                                <i class="bx bxs-user-x"></i> 
                                            </button>
        
                                            <div class="modal fade" id="largeModal2" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Large Modal</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                        
                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">Nombre</label>
                                                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="lastname" class="form-label">Apellido</label>
                                                                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="document" class="form-label">Documento</label>
                                                                    <input type="text" class="form-control" id="document" name="document" value="{{ $user->document }}">
                                                                </div>
                                                                
                                                        
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-ba">Guardar cambios</button>
                                                            </form>
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                            <button type="button" class="btn btn-ba">Guardar cambios</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- End Large Modal-->
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</main>
@include('layouts.footer')
@endsection