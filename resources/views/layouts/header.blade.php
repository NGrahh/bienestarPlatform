<header id="header" class="header fixed-top d-flex align-items-center" >

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('pagina-principal')}}" class="logo d-flex align-items-center">
        <img style="max-height: 50px" src="{{asset('img/Bienestar-al-Aprendiz-header.png')}}" >
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
  
    {{-- <div style="justify-content: center"  class="search-bar">
      <form  class="search-form d-flex align-items-center" method="POST" action="#">
        <input style="type="text name="query" placeholder="- Buscar -" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->
   --}}
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
  
        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
        <li class="nav-item dropdown pe-3">
        @if(auth()->check())
  
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            @if (Auth::user()->perfil && Auth::user()->perfil->pictureuser)
                <img src="{{ asset('images/profile/' . Auth::user()->perfil->pictureuser) }}" alt="Profile" class="rounded-circle" style="width: 40px; height: 50px; object-fit: cover;">
            @else
                <img src="{{ asset('assets/img/perfil_predeterminado.png') }}" alt="Default Profile" class="rounded-circle">
            @endif
            <span class="d-none d-md-block dropdown-toggle ps-2" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 150px;">{{session('name')}} {{session('lastname')}}</span>
          </a><!-- End Profile Iamge Icon -->
  
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6 >{{session('name') }} {{session('lastname')}}</h6>
            {{-- <span>{{session(['rol_id' => $user->rol_id->name]);}}</span> --}}
          </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('perfil.index')}}">
                <i class="bi bi-person"></i>
                <span>Mi Perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
  
            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-gear"></i>
                <span>Ajustes</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
  
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('auth.logout')}}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar sesión</span>
              </a>
            </li>
  
          </ul><!-- End Profile Dropdown Items -->
          @else
          <a class="vinculos" href="{{route('login')}}">
            <span >Iniciar Sesión</span>
          </a><!-- End Profile Iamge Icon -->
          @endif
        </li><!-- End Profile Nav -->
      </ul> 
    </nav><!-- End Icons Navigation -->
  
  </header><!-- End Header -->