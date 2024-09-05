@extends('layouts.app')

@section('content')

@section('title-page','Mi perfil')

@include('layouts.header')
@include('layouts.menu')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Mi perfil</h1>
    </div><!-- End Page Title -->
    @include('compartido.alertas')
    <section class="section profile">
        <div class="row">


            <div class="col-12">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            @if (Auth::check())
                            @if (!Auth::user()->perfil)
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-create">Crear Perfil</button>
                            </li>
                            @else
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar perfil</button>
                            </li>
                            @endif
                            @endif


                            {{-- <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Ajustes</button>
                            </li> --}}

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Cambiar la contraseña</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <div class="alert alert-warning" role="alert">
                                    <strong>Atención:</strong> Si desea actualizar su información, por favor diríjase a la oficina de bienestar en el horario establecido. Para más detalles, consulte el calendario de atención o comuníquese con el personal autorizado.
                                </div>
                                <form action="{{ route('perfil.update', ['perfil' => auth()->user()->id]) }}" class="row g-3 needs-validation mt-3" novalidate method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3 ">
                                        <label for="pictureuser" class="col-md-4 col-lg-3 form-label">Foto de Perfil</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="file" name="pictureuser" class="form-control" id="pictureuser">
                                        </div>
                                        <div class="invalid-feedback">Ingrese una foto relacionada.</div>
                                        @error('pictureuser')
                                        <li class="text-danger">{{ $message }}</li>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-lg-3 form-label">Nombre completo</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="name" value="{{session('name')}} {{session('lastname')}}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="rol_id" class="col-md-4 col-lg-3 form-label">Rol</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="rol_id" type="text" class="form-control" id="rol_id" value="{{ Auth::user()->role->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 form-label">Correo electrónico</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="email" value="{{session('email')}}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-lg-3 form-label">N. Telefónico </label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="name" value="{{ Auth::user()->numberphone}}" disabled>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-ba">Actualizar Perfil</button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <form action="{{ route('perfil.cambiarcontrasena') }}" class="row g-3 needs-validation mt-3" novalidate method="POST">
                                    @csrf
                                    @method('PATCH')
                                
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Contraseña actual</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="currentPassword" required>
                                            <div class="invalid-feedback">Por favor ingrese la contraseña actual.</div>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                
                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nueva contraseña</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control @error('newpassword') is-invalid @enderror" id="newPassword" required>
                                            <small id="passwordHelp" class="form-text text-muted mt-4">
                                                <ul id="passwordRequirements">
                                                    <li id="length" class="invalid"><strong>8 caracteres mínimos</strong></li>
                                                    <li id="lowercase" class="invalid"><strong>Al menos una letra minúscula</strong></li>
                                                    <li id="uppercase" class="invalid"><strong>Al menos una letra mayúscula</strong></li>
                                                    <li id="number" class="invalid"><strong>Al menos un número</strong></li>
                                                    <li id="special" class="invalid"><strong>Al menos un carácter especial (@$!%*?&)</strong></li>
                                                </ul>
                                            </small>
                                            <div class="invalid-feedback">Por favor ingrese la nueva contraseña.</div>
                                            @error('newpassword')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                
                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-ingrese nueva contraseña</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control @error('renewpassword') is-invalid @enderror" id="renewPassword" required>
                                            <div class="invalid-feedback">Por favor Re-ingrese la nueva contraseña.</div>
                                            @error('renewpassword')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-ba">Cambiar la contraseña</button>
                                    </div>
                                </form>
                                
                            </div>

                            <div class="tab-pane fade profile-create pt-3 mt-5" id="profile-create">
                                <form action="{{ route('perfil.store')}}" class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Campo oculto para enviar el ID del usuario autenticado -->
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <div class="row mb-3 mt-2">
                                        <label for="pictureuser" class="col-md-4 col-lg-3 form-label">Foto de Perfil</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="file" name="pictureuser" class="form-control" id="pictureuser">
                                        </div>
                                        <div class="invalid-feedback">Ingrese una foto de perfil.</div>
                                        @error('pictureuser')
                                        <li class="text-danger">{{ $message }}</li>
                                        @enderror
                                    </div>

                                    <div class="row mb-3 ">
                                        <label for="name" class="col-md-4 col-lg-3 form-label">Nombre completo</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="name" value="{{session('name')}} {{session('lastname')}}" disabled>
                                        </div>

                                    </div>
                                    <div class="row mb-3">
                                        <label for="rol_id" class="col-md-4 col-lg-3 form-label">Rol</label>
                                        <div class="col-md-8 col-lg-9">
                                            @if(Auth::check() && Auth::user()->role)
                                            <input name="rol_id" type="text" class="form-control" id="rol_id" value="{{ Auth::user()->role->name }}" disabled>
                                            @else
                                            <h3>Rol no asignado</h3>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 form-label">Correo electrónico</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="email" value="{{session('email')}}" disabled>
                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <label for="phone_number" class="col-md-4 col-lg-3 form-label">Teléfono</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone_number" type="text" class="form-control" id="phone_number" value="{{ Auth::user()->numberphone }}" disabled>
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-ba">Crear Perfil</button>
                                    </div>
                                </form>
                            </div>

                            <div align="center" class="pt-4 pb-2">
                                <div class="col-12 col-sm-6">
                                    <div class="d-flex justify-content-center align-items-center pt-2">
                                        <img style="max-width: 100%;" src="{{asset('img/Bienestar-al-Aprendiz.png')}}" alt="Bienestar al Aprendiz">
                                    </div>
                                </div>
                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        @if (Auth::user()->perfil && Auth::user()->perfil->pictureuser)
                        <img src="{{ asset('images/profile/' . Auth::user()->perfil->pictureuser) }}" alt="Profile"  style="border-radius: 50%; width: 150px; height: 120px; object-fit: cover;">
                        @else
                        <img src="{{ asset('assets/img/perfil_predeterminado.png') }}" alt="Default Profile" style="border-radius: 50%; width: 150px; height: 150px; object-fit: cover;">

                        @endif
                        <h2>{{ session('name') }} {{ session('lastname') }}</h2>
                        <h3 class="mt-4">{{ Auth::user()->role->name }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('layouts.footer')
@endsection