{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="http://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Edit Post</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href={{ route('posts.index') }}>CRUDPosts</a>
<div class="justify-end ">
    <div class="col ">
        <a class="btn btn-sm btn-success" href={{ route('posts.create') }}>Add Post</a>
    </div>
</div>
</nav>
<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h3>Update Post</h3>
            <form action="{{ route('posts.update', $post->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea class="form-control" id="body" name="body" rows="3" required>{{ $post->body }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Post</button>
            </form>
        </div>
    </div>
</div>
</body>

</html> --}}
@extends('layouts.app')

@section('title-page','Edición usuario')

@section('content')

<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="d-flex justify-content-center py-4">
                        <a href="{{route('home')}}" class="logo d-flex align-items-center w-auto">
                            <img style="max-height: 60px" src="{{asset('img/Bienestar-al-Aprendiz.png')}}" alt="Bienestar al Aprendiz">
                        </a>
                    </div><!-- End Logo -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h5 class="card-title-ba text-center pb-0 fs-4">Crear cuenta</h5>
                                <p class="text-center small">Ingrese los datos personales para editar la cuenta</p>
                            </div>
                            @include('compartido.alertas')

                            <form action="{{ route('users.update', ['id' => $user->id]) }}" class="row g-3 needs-validation" novalidate method="POST">
                                @csrf   
                                @method('PUT') <!-- Agregar este campo para indicar que el método es PUT -->
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label for="yourName" class="form-label">Nombre</label>
                                    <input value="{{$user->name }}" type="text" name="name" class="form-control" id="yourName" required>
                                    <div class="invalid-feedback">Ingrese el nombre.</div>
                                    @error('name')
                                    <li class="text-danger">{{ $message}}</li>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label for="yourlastname" class="form-label">Apellidos</label>
                                    <input value="{{$user->lastname }}"  type="text" name="lastname"class="form-control" id="yourlastname" required>
                                    <div class="invalid-feedback">Ingrese los apellidos.</div>
                                    @error('lastname')
                                        <li class="text-danger">{{ $message}}</li>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label for="yourTypeDoc" class="form-label">Tipo documento</label>
                                    <select name="type_document_id" class="form-select" id="yourTypeDoc" required>
                                        <option value="">Seleccionar...</option>
                                        @foreach ($type_documents as $type_document)
                                            <option {{ $user->type_document == $type_document->id ? 'selected' : '' }} value="{{ $type_document->id }}">{{ $type_document->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Ingrese el tipo de documento.</div>
                                    @error('type_document_id')
                                        <li class="text-danger">{{ $message }}</li>
                                    @enderror
                                </div>

                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label for="yourDocument" class="form-label"> N° documento</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                        <input value="{{$user->document}}" type="text" name="document" class="form-control" id="yourDocument" required>
                                        <div class="invalid-feedback">Ingrese el número de documento.</div>
                                    </div>
                                    @error('document')
                                    <li class="text-danger">{{ $message}}</li>
                                    @enderror
                                </div>

                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <label for="yourEmail" class="form-label">Correo electrónico</label>
                                    <input value="{{$user->email}}" type="email" name="email" class="form-control" id="yourEmail" required>
                                    <div class="invalid-feedback">Ingrese una dirección de correo electrónico válida.</div>
                                    @error('email')
                                    <li class="text-danger">{{ $message}}</li>
                                    @enderror
                                </div>

                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <label for="yourRol" class="form-label">Rol</label>
                                    <select name="rol_id" class="form-select" id="yourRol" required>
                                        <option value="">Seleccionar...</option>
                                        @foreach ($roles as $role)
                                        <option id="optionRol" {{ $role->id == old('rol_id') ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Ingrese un rol.</div>
                                    @error('rol_id')
                                    <li class="text-danger">{{ $message}}</li>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="display: none;" id="training_program">
                                    <label for="yourTraining" class="form-label">Programa de formación</label>
                                    <input value="{{$user->trainingProgram}}" type="text" name="trainingProgram" class="form-control" id="yourTraining" required disabled>
                                    <div class="invalid-feedback">Por favor ingrese el programa de formación.</div>
                                    @error('trainingProgram')
                                    <li class="text-danger">{{ $message}}</li>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="display: none;" id="token_number">
                                    <label for="yourToken" class="form-label">Número de ficha</label>
                                    <input value="{{$user->yourToken}}" type="text" name="yourToken" class="form-control" id="yourToken" required disabled>
                                    <div class="invalid-feedback">Por favor ingrese el numero de ficha.</div>
                                    @error('yourToken')
                                    <li class="text-danger">{{ $message}}</li>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <label for="yourTypeRh" class="form-label"> Tipo de sangre (RH)</label>
                                    <select name="type_rh_id" class="form-select" id="yourTypeRh" required>
                                        <option value="">Seleccionar...</option>
                                        @foreach ($type_rhs as $type_rh)
                                        <option {{ $type_rh->id == old('type_rh_id') ? 'selected' : '' }} value="{{ $type_rh->id }}">{{ $type_rh->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Ingrese el tipo de sangre (RH).</div>
                                    @error('type_rh_id')
                                    <li class="text-danger">{{ $message}}</li>
                                    @enderror
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <button class="btn btn-ba w-100" type="submit">Actualizar usuario</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection



{{--
    col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6: Esta clase se utiliza para definir cómo se comportará la columna en diferentes tamaños de pantalla. En el sistema de rejilla de Bootstrap, las clases de columna están diseñadas para adaptarse a diferentes tamaños de pantalla. Aquí está desglosado el significado de cada parte:

    col-12: Esta clase se aplica a todas las pantallas y hace que la columna ocupe todo el ancho disponible.
    col-sm-6: Para pantallas pequeñas (sm), la columna ocupará la mitad del ancho disponible.
    col-md-6: Para pantallas medianas (md), la columna también ocupará la mitad del ancho disponible.
    col-lg-6: Para pantallas grandes (lg), la columna ocupará la mitad del ancho disponible.
    col-xl-6: Para pantallas extra grandes (xl), la columna ocupará la mitad del ancho disponible. 
--}}


{{--
    invalid-feedback se usa para mostrar mensajes de error en campos de formulario que no cumplen con la validación, (CAMPOS VACIOS) 
--}}

{{-- text-danger, cambia el color del texto a rojo para indicar un error. --}}



{{--
    @error -> para verificar si hay errores de validación asociados con un campo específico, en el cual se deben de cumplir las especificaciones que se le dieron, ya sea el tamaño minimo, maximo o que sea una cadena de texto, o un campo numerico, por ende, en casa de no cumplir con ello, saldra una alerta, indicando lo necesario para suplir el campo
--}}