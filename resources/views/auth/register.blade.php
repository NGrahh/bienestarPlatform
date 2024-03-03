@extends('layouts.app')

@section('title','login')

@section('content')

<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                        <a href="index.html" class="logo d-flex align-items-center w-auto">
                            <img src="assets/img/logo.png" alt="">
                            <span class="d-none d-lg-block">NiceAdmin</span>
                        </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                <p class="text-center small">Enter your personal details to create account</p>
                            </div>

                            @include('compartido.alertas')

                            <form action="{{route('auth.store')}}" class="row g-3 needs-validation" novalidate method="POST">
                                @csrf
                                <div class="col-12">
                                    <label for="yourName" class="form-label">Your Name</label>
                                    <input value="{{old('name')}}" type="text" name="name" class="form-control" id="yourName" required>
                                    @error('name')
                                        <li class="text-danger">{{ $message}}</li>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="yourEmail" class="form-label">Your Email</label>
                                    <input value="{{old('email')}}" type="email" name="email" class="form-control" id="yourEmail" required>
                                    @error('email')
                                        <li class="text-danger">{{ $message}}</li>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Document</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                                        <input value="{{old('document')}}" type="text" name="document" class="form-control" id="yourUsername" required>
                                        @error('document')
                                            <li class="text-danger">{{ $message}}</li>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                                    <div class="invalid-feedback">Please enter your password!</div>
                                </div>

                            
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">Already have an account? <a href="{{route('login')}}">Log in</a></p>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection