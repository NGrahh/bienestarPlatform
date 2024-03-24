<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('home')}}">
        <i class="bi bi-grid"></i>
        <span>Inicio</span>
      </a>
    </li>

    @if(session('rol_id') == 0) {{-- Administrador --}}
      @include('layouts.menus.menu-usuarios')
    @endif  

    @if(session('rol_id') == 1) {{-- Administrador --}}
      @include('layouts.menus.menu-admin')
    @endif

    @if(session('rol_id') == 2) {{-- Lider Bienestar --}}
      @include('layouts.menus.menu-lider-bienestar')
    @endif

    @if(session('rol_id') == 3) {{-- Miembro Bienestar --}}
      @include('layouts.menus.menu-miembroBA')
    @endif

    @if(session('rol_id') == 4) {{-- Miembro Bienestar apoyo --}}
      @include('layouts.menus.menu-miembro-BA-apoyo')
    @endif

    @if(session('rol_id') == 5) {{-- Aprendiz --}}
      @include('layouts.menus.menu-aprendiz')
    @endif

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('home')}}">
        <i class="ri-body-scan-fill"></i>
        <span>Quienes somos?</span>
      </a>
    </li>


  </ul>

</aside>