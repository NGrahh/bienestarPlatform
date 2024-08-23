{{-- REQUERIMIENTOS FUNCIONALES USUARIO / Actor:  USUARIO --}}

{{-- Item Eventos Proximos y Pasados --}} {{-- RF_USUARIO _01, RF_USUARIO 02 | Cumple: Si |--}}
<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#events-nav" data-bs-toggle="collapse" href="#">
      <i class="ri-pages-line"></i><span>Información eventos</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="events-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
          <a href="{{route('events.viewEventUser')}}">
              <i class="bi bi-circle"></i>Eventos | Próximos / Pasados<span></span>
          </a>
      </li>
      <li>
          <a href="{{route('events.index')}}">
              <i class="bi bi-circle"></i><span>Portal de Eventos</span>
          </a>
      </li>
  </ul>
</li>
{{-- Final Item Eventos Proximos y Pasados --}}
{{----------------------------------------------------------------------------------------}}
{{-- Final Item --}}

{{-- Determinar horarios de atención al público --}} {{-- RF_MIEMBRO_BA_10 | Cumple: No | --}}
{{-- Aceptar o posponer cita --}} {{-- RF_MIEMBRO_BA_11  | Cumple: No |--}}
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#citas-nav" data-bs-toggle="collapse" href="#">
      <i class="ri-chat-3-line"></i><span>Citas</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="citas-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{route('citas.index')}}">
          <i class="bi bi-circle"></i>Información Citas<span></span>
        </a>
      </li>
    </ul>
  </li>
  {{-- Final Item --}}
  {{-- Final Item Acceder a las distintas secciones del sitio web | Cumple: Si | --}}
{{----------------------------------------------------------------------------------------}}
{{-- Acceso a las funciones de los anteriores roles --- RF_ADMIN_01  | Cumple: Si | --}}
{{-- Iniciar sesión --- RF_ADMIN_02 | Cumple: Si | --}}
{{-- Cerrar sesión --- RF_ADMIN  _03 | Cumple: Si | --}}
{{-- Administrar cuentas --- RF_ADMIN_04 | Cumple: Si | --}}
{{-- Visualizar cuentas --- RF_ADMIN_05  | Cumple: Si | --}}
{{-- Buscar cuentas --- RF_ADMIN_06  | Cumple: Si | --}}
{{-- Filtrar cuentas --- RF_ADMIN_07 | Cumple: Si | --}}
{{-- Crear cuentas --- RF_ADMIN_08 | Cumple: Si | --}}
{{-- Editar cuentas --- RF_ADMIN_09 | Cumple: Si | --}}
{{-- Desactivar/activar cuentas --- RF_ADMIN_010 | Cumple: Si | --}}
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#account-nav" data-bs-toggle="collapse" href="#">
      <i class="bx bxs-user-account"></i><span>Cuentas</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="account-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{route('users.index')}}">
          <i class="bi bi-circle"></i>Información Usuarios<span></span>
        </a>
      </li>
    </ul>
  </li>
  {{-- Final Item --}}
  {{----------------------------------------------------------------------------------------}}
  {{----------------------------------------------------------------------------------------}}
{{-- Item Acceder a las distintas secciones del sitio web --}} {{-- RF_USUARIO 03  | Cumple: Si | --}}




<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#supports-nav" data-bs-toggle="collapse" href="#">
      <i class="ri-pantone-line"></i><span>Apoyos</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="supports-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="{{route('apoyos-sostenimiento')}}">
          <i class="bi bi-circle"></i>
          <span>Apoyos de sostenimiento</span>
        </a>
    </li>
    <li>
        <a href="{{route('apoyosCreated.index')}}">
          <i class="bi bi-circle"></i>Información Apoyos<span></span>
        </a>
    </li>
  </ul>
</li>


{{-- Item Visualizar las dimensiones de bienestar al aprendiz --}} {{-- RF_USUARIO 04 | Cumple: Si | --}}
<li class="nav-item">
  <a class="nav-link collapsed" href="{{route('Dimensiones')}}">
    <i class="ri-home-2-line"></i>
    <span>Nuestras dimensiones</span>
  </a>
</li>


{{-- Final Item  Visualizar las dimensiones de bienestar al aprendiz --}}
{{----------------------------------------------------------------------------------------}}



{{-- REQUERIMIENTOS FUNCIONALES MIEMBRO DE BIENESTAR AL APRENDIZ --}} {{-- Actor MIEMBRO_BA --}}

{{-- Acceso a las funciones del rol de usuario --- RF_MIEMBRO_BA _01 | Cumple: Si | --}}
{{-- Iniciar sesión --- RF_MIEMBRO_BA_02 | Cumple: Si |--}}
{{-- Cerrar sesión --- RF_MIEMBRO_BA _03 | Cumple: Si |--}}
{{-- Item, Cargar un evento, Editar un evento, Eliminar un evento, Poner/Quitar un límite de aforo, Habilitar/Deshabilitar la opción de inscribirse a un evento, Visualizar inscritos en eventos --}} {{-- RF_MIEMBRO_BA _04, RF_MIEMBRO_BA _05, RF_MIEMBRO_BA _06, RF_MIEMBRO_BA _07, RF_MIEMBRO_BA_08, RF_MIEMBRO_BA_09 | Cumple: Si | --}}


{{-- Final Item --}}

{{-- REQUERIMIENTOS FUNCIONALES MIEMBRO DE BIENESTAR AL APRENDIZ ENCARGADO DE LOS APOYOS / Actor MIEMBRO_BA_APO --}}
{{-- Acceso a las funciones de anteriores roles RF_MIEMBRO_BA _APO_01 | Cumple: Si | --}}
{{-- Iniciar sesión --- RF_MIEMBRO_BA_APO_02 | Cumple: Si |--}}
{{-- Cerrar sesión --- RF_MIEMBRO_BA_APO_03 | Cumple: Si |--}}
{{-- Activar y/o desactivar la opción de postularse --- RF_MIEMBRO_BA _APO_04  | Cumple: No | --}}
{{-- Visualizar las respuestas de los formularios --- RF_MIEMBRO_BA _APO_05 | Cumple: No | --}}
{{-- Visualizar los archivos adjuntados --- RF_MIEMBRO_BA _APO_06 | Cumple: No | --}}




