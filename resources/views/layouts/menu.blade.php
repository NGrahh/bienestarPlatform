<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="{{route('home')}}">
        <i class="bi bi-grid"></i>
        <span>Inicio</span>
      </a>
    </li>

    @if(session('rol_id') == 1)
      @include('layouts.menus.menu-admin')
      @include('layouts.menus.menu-usuarios')
    @endif

    {{-- @if(session('rol_id') == 2)
      @include()
    @endif

    @if(session('rol_id') == 3)
      @include()
    @endif

    @if(session('rol_id') == 4)
      @include()
    @endif

    @if(session('rol_id') == 5)
      @include()
    @endif --}}
  </ul>
</aside>