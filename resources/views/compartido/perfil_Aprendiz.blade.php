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
            

            <div class="col-xl-9">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Descripción</button>
                            </li>
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

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                

                                
                                @if (Auth::check() && Auth::user()->perfil)
                                <h5 class="card-title">Detalles del perfil</h5>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-4  d-evento"><strong>Nombre completo: </strong></div>
                                        <div class="fst-italic" style="font-family: Arial, sans-serif; font-size: 15px;">{{ Auth::user()->perfil->user->name }} {{ Auth::user()->perfil->user->lastname }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-4 d-evento"><strong>Sobre mi: </strong></div>
                                        <p class="fst-italic" style="font-family: Arial, sans-serif; font-size: 15px;">{{ Auth::user()->perfil->about_me }}</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-4 d-evento"><strong>Rol: </strong></div>
                                        <div class="fst-italic" style="font-family: Arial, sans-serif; font-size: 15px;">{{ Auth::user()->role->name }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 col-md-4 d-evento"><strong>Teléfono: </strong></div>
                                        <div class="fst-italic" style="font-family: Arial, sans-serif; font-size: 15px;">{{ Auth::user()->perfil->phone_number }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 col-md-4 d-evento"><strong>Correo electrónico: </strong></div>
                                        <div class="fst-italic" style="font-family: Arial, sans-serif; font-size: 15px;">{{ Auth::user()->perfil->user->email }}</div>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="tab-pane fade profile-create pt-3 mt-5" id="profile-create">
                                <form action="{{ route('perfil.store')}}" class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data">
                                    @csrf
                                    

                                    <div class="row mb-3 ">
                                        <label for="name" class="col-md-4 col-lg-3 form-label">Nombre completo</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="name" value="{{session('name')}} {{session('lastname')}}" required disabled>
                                        </div>

                                    </div>
                                    <div class="row mb-3">
                                        <label for="rol_id" class="col-md-4 col-lg-3 form-label">Rol</label>
                                        <div class="col-md-8 col-lg-9">
                                            @if(Auth::check() && Auth::user()->role)
                                            <input name="rol_id" type="text" class="form-control" id="rol_id" value="{{ Auth::user()->role->name }}" required disabled>
                                            @else
                                                <h3>Rol no asignado</h3>
                                            @endif
                                            
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 form-label">Correo electrónico</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="email" value="{{session('email')}}" disabled required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="about_me" class="col-md-4 col-lg-3 form-label">Sobre mi</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="about_me" class="form-control" id="about_me" style="height: 100px">{{old('about_me')}}</textarea>
                                        </div>
                                        <div class="invalid-feedback">Ingrese una descripción.</div>
                                        @error('about_me')
                                        <li class="text-danger">{{ $message }}</li>
                                        @enderror
                                    </div>
                                    
                                    <div class="row mb-3 mt-5">
                                        <label for="pictureuser" class="col-md-4 col-lg-3 form-label">Foto de Perfil</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="file" name="pictureuser" class="form-control" id="pictureuser">
                                        </div>
                                        <div class="invalid-feedback">Ingrese una foto de perfil.</div>
                                        @error('pictureuser')
                                        <li class="text-danger">{{ $message }}</li>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <label for="phone_number" class="col-md-4 col-lg-3 form-label">Teléfono</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone_number" type="text" class="form-control" id="phone_number" value="{{old('phone_number')}}">
                                        </div>
                                        <div class="invalid-feedback">Ingrese un telefono de contacto.</div>
                                        @error('phone_number')
                                        <li class="text-danger">{{ $message }}</li>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Twitter_Profile" class="col-md-4 col-lg-3 form-label">Twitter</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="Twitter_Profile" type="text" class="form-control" id="Twitter_Profile" value="{{old('Twitter_Profile')}}">
                                        </div>
                                        <div class="invalid-feedback">Ingrese el link de la cuenta de twitter.</div>
                                        @error('Twitter_Profile')
                                        <li class="text-danger">{{ $message }}</li>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Linkedin_Profile" class="col-md-4 col-lg-3 form-label">Linkedin Perfil</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="Linkedin_Profile" type="text" class="form-control" id="Linkedin_Profile" value="{{old('Linkedin_Profile')}}">
                                        </div>
                                        <div class="invalid-feedback">Ingrese el link de la cuenta de Linkedin.</div>
                                        @error('Linkedin_Profile')
                                        <li class="text-danger">{{ $message }}</li>
                                        @enderror
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-lg-3 col-md-4"></div>
                                        <div class="col-lg-9 col-md-8">
                                            <div class="invalid-feedback">Ingrese correctamente los horarios de oficina.</div>
                                            @error('office_hours')
                                            <li class="text-danger">{{ $message }}</li>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-ba">Crear Perfil</button>
                                    </div>
                                </form>
                            </div>
                            
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{ route('perfil.update', ['perfil' => auth()->user()->id]) }}" class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3 ">
                                        <label for="pictureuser" class="col-md-4 col-lg-3 form-label">Foto de Perfil</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="file" name="picture" class="form-control" id="pictureuser">
                                        </div>
                                        <div class="invalid-feedback">Ingrese una foto relacionada al evento.</div>
                                        @error('picture')
                                        <li class="text-danger">{{ $message }}</li>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-lg-3 form-label">Nombre completo</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="name" value="{{session('name')}} {{session('lastname')}}" required disabled>
                                        </div>

                                    </div>
                                    <div class="row mb-3">
                                        <label for="rol_id" class="col-md-4 col-lg-3 form-label">Rol</label>
                                        <div class="col-md-8 col-lg-9">
                                            @if(Auth::check() && Auth::user()->role)
                                            <input name="rol_id" type="text" class="form-control" id="rol_id" value="{{ Auth::user()->role->name }}" required disabled>
                                            @else
                                                <h3>Rol no asignado</h3>
                                            @endif
                                            
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 form-label">Correo electrónico</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="email" value="{{session('email')}}" disabled required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="about_me" class="col-md-4 col-lg-3 form-label">Sobre mi</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="about_me" class="form-control" id="about_me" style="height: 100px">{{ Auth::user()->perfil->about_me ?? 'No hay una descripción existente!' }}</textarea>
                                        </div>
                                    </div>

                                    
                            

                                    <div class="row mb-3">
                                        <label for="phone_number" class="col-md-4 col-lg-3 form-label">Teléfono</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone_number" type="text" class="form-control" id="phone_number" value="{{ Auth::user()->perfil->phone_number ?? '' }}">
                                        </div>
                                        <div class="invalid-feedback">Ingrese un telefono de contacto.</div>
                                        @error('phone_number')
                                        <li class="text-danger">{{ $message }}</li>
                                        @enderror
                                    </div>

                                    

                                    <div class="row mb-3">
                                        <label for="Twitter_Profile" class="col-md-4 col-lg-3 form-label">Twitter</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="Twitter_Profile" type="text" class="form-control" id="Twitter_Profile" value="{{ Auth::user()->perfil->Twitter_Profile ?? '' }}">
                                        </div>
                                        <div class="invalid-feedback">Ingrese el link de la cuenta de twitter.</div>
                                        @error('Twitter_Profile')
                                        <li class="text-danger">{{ $message }}</li>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Linkedin_Profile" class="col-md-4 col-lg-3 form-label">Linkedin Perfil</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="Linkedin_Profile" type="text" class="form-control" id="Linkedin_Profile" value="{{ Auth::user()->perfil->Linkedin_Profile ?? '' }}">
                                        </div>
                                        <div class="invalid-feedback">Ingrese el link de la cuenta de Linkedin.</div>
                                        @error('Linkedin_Profile')
                                        <li class="text-danger">{{ $message }}</li>
                                        @enderror
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            {{-- <div class="tab-pane fade pt-3" id="profile-settings">

                                <!-- Settings Form -->
                                <form>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Notificaciónes de Correo Electrónico</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="changesMade" checked>
                                                <label class="form-check-label" for="changesMade">
                                                    Cambios realizados en su cuenta
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="newProducts" checked>
                                                <label class="form-check-label" for="newProducts">
                                                    Información sobre nuevos Eventos y Apoyos
                                                </label>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-ba">Guardar cambios</button>
                                    </div>
                                </form><!-- End settings Form -->

                            </div> --}}

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form action="{{ route('perfil.cambiarcontrasena')}}" class="row g-3 needs-validation mt-4" novalidate method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Contraseña actual</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control" id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nueva contraseña</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control" id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-ingrese nueva contraseña</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-ba">Cambiar la contraseña</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        @if (Auth::user()->perfil && Auth::user()->perfil->pictureuser)
                        <!-- Imagen de perfil -->
                        <!-- Imagen de perfil -->
                            <!-- Imagen de perfil -->
                            <img 
                            src="{{ asset('images/profile/' . Auth::user()->perfil->pictureuser) }}" 
                            alt="Profile" 
                            class="rounded-circle profile-img" 
                            style="width: 150px; height: 115px; object-fit: cover; cursor: pointer;"
                            data-bs-toggle="modal"
                            data-bs-target="#Profile{{ Auth::user()->id }}">

                            <!-- Modal de Bootstrap para mostrar la imagen -->
                            <div class="modal fade" id="Profile{{ Auth::user()->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content_perfil">
                                        <div class="modal-body_perfil p-0">
                                            <!-- Imagen dentro del modal -->
                                            <img 
                                                src="{{ asset('images/profile/' . Auth::user()->perfil->pictureuser) }}" 
                                                alt="Profile" 
                                                class="img-fluid_perfil"
                                                >
                                        </div>
                                    </div>
                                </div>
                            </div>








                        @else
                            <img src="{{ asset('assets/img/perfil_predeterminado.png') }}" alt="Default Profile" class="rounded-circle">
                        @endif
                        <h2 style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 200px;">{{ session('name') }} {{ session('lastname') }}</h2>
                        @if (Auth::check() && Auth::user()->role)
                            <h3>{{ Auth::user()->role->name }}</h3>
                        @else
                            <h3>Rol no asignado</h3>
                        @endif
                        <div class="social-links mt-2">
                            <a href="{{ Auth::user()->perfil->Twitter_Profile ?? 'No hay link!' }}" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="{{ Auth::user()->perfil->Linkedin_Profile ?? 'No hay link!' }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

</main>

@include('layouts.footer')
@endsection