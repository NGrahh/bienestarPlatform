<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    {{-- Item Inicio --}}
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('pagina-principal')}}">
        <i class="ri-home-2-line"></i>
        <span>Inicio</span>
      </a>
    </li>
    {{-- Final Item Inicio --}}
    
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


    {{-- RF_USUARIO 03 --}}
    {{-- Item Acceder a las distintas secciones del sitio web --}}
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('Nosotros')}}">
        <i class="ri-open-arm-line"></i>
        <span>¿Quiénes somos?</span>
      </a>
    </li>
    {{--Final Item Acceder a las distintas secciones del sitio web --}}
    

  </ul>

</aside>