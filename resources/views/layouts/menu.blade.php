<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('pagina-principal')}}">
        <i class="ri-home-2-line"></i>
        <span>Inicio</span>
      </a>
    </li>

    @if(session('rol_id') == 1)
      {{-- Administrador --}}
      @include('layouts.menus.menu-admin')
    @elseif(session('rol_id') == 2)
        {{-- Lider Bienestar --}}
        @include('layouts.menus.menu-lider-bienestar')
    @elseif(session('rol_id') == 3)
        {{-- Miembro Bienestar --}}
        @include('layouts.menus.menu-miembroBA')
    @elseif(session('rol_id') == 4)
        {{-- Miembro Bienestar apoyo --}}
        @include('layouts.menus.menu-miembro-BA-apoyo')
    @elseif(session('rol_id') == 5)
        {{-- Aprendiz --}}
        @include('layouts.menus.menu-aprendiz')
    @else
        {{-- Menú Vacío --}}
        @include('layouts.menus.menu-usuarios')
    @endif

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('Nosotros')}}">
        <i class="ri-open-arm-line"></i>
        <span>¿Quiénes somos?</span>
      </a>
    </li>


  </ul>

</aside>