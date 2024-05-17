@extends('layouts.app')
@section('content')

@section('title-page','Información Usuarios')

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
                        <h5 class="card-title">Información de usuarios</h5>
                        
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
                                            <div class="d-flex gap-2">
                                                <a class="btn btn-ba-amarillo px-2" href="{{route('users.edit', ['id' => $user->id])}}"><i class="bx bxs-user-detail"></i></a>

                                                <form action="{{route('users.destroy', ['id' => $user->id])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-ba-rojo px-2"><i class="bx bxs-user-x"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-grid gap-1 d-md-flex justify-content-md-end">
                                <a class="btn btn-ba me-md-2" href="{{route('auth.register')}}">Crear Cuenta</a>
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