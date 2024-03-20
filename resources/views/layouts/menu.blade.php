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

    @endif

  </ul>
</aside>
  