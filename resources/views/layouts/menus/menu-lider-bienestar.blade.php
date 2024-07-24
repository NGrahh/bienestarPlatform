{{-- REQUERIMIENTOS FUNCIONALES USUARIO / Actor:  USUARIO --}}

{{-- Item Eventos Proximos y Pasados --}} {{-- RF_USUARIO _01, RF_USUARIO 02 | Cumple: Si |--}}
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#events-nav" data-bs-toggle="collapse" href="#">
        <i class="ri-pages-line"></i><span>Eventos</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="events-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{route('events.viewEventUser')}}">
                <i class="bi bi-circle"></i>Eventos | Próximos / Pasados<span></span>
            </a>
        </li>
    </ul>
</li>
{{-- Final Item Eventos Proximos y Pasados --}}
{{----------------------------------------------------------------------------------------}}

{{-- Item Acceder a las distintas secciones del sitio web --}} {{-- RF_USUARIO 03  | Cumple: Si | --}}
<li class="nav-item">
      <a class="nav-link collapsed" href="{{route('apoyos-sostenimiento')}}">
        <i class="ri-pantone-line"></i>
        <span>Apoyos de sostenimiento</span>
      </a>
</li>
{{-- Final Item Acceder a las distintas secciones del sitio web | Cumple: Si | --}}
{{----------------------------------------------------------------------------------------}}


{{-- Item Visualizar las dimensiones de bienestar al aprendiz --}} {{-- RF_USUARIO 04 | Cumple: Si | --}}
<li class="nav-item">
    <a class="nav-link collapsed" href="{{route('Dimensiones')}}">
        <i class="ri-home-2-line"></i>
        <span>Nuestra Dimensiones</span>
    </a>
</li>
{{-- Final Item  Visualizar las dimensiones de bienestar al aprendiz --}}
{{----------------------------------------------------------------------------------------}}

{{-- REQUERIMIENTOS FUNCIONALES MIEMBRO DE BIENESTAR AL APRENDIZ --}} {{-- Actor MIEMBRO_BA --}}


{{-- Acceso a las funciones del rol de usuario --- RF_MIEMBRO_BA _01 | Cumple: Si | --}}

{{-- Iniciar sesión --- RF_MIEMBRO_BA_02 | Cumple: Si |--}}

{{-- Cerrar sesión --- RF_MIEMBRO_BA _03 | Cumple: Si |--}}

{{-- Item, Cargar un evento, Editar un evento, Eliminar un evento, Poner/Quitar un límite de aforo, Habilitar/Deshabilitar la opción de inscribirse a un evento, Visualizar inscritos en eventos --}} {{-- RF_MIEMBRO_BA _04, RF_MIEMBRO_BA _05, RF_MIEMBRO_BA _06, RF_MIEMBRO_BA _07, RF_MIEMBRO_BA_08, RF_MIEMBRO_BA_09 | Cumple: Si | --}}

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#eventsBa-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Información Eventos</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="eventsBa-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{route('events.index')}}">
                <i class="bi bi-circle"></i><span>Portal de Eventos</span>
            </a>
        </li>
    </ul>
</li>
{{-- Final Item --}}

{{-- Determinar horarios de atención al público --}} {{-- RF_MIEMBRO_BA_10 | Cumple: Proceso | --}}
{{-- Aceptar o posponer cita --}} {{-- RF_MIEMBRO_BA_11  | Cumple: Proceso |--}}
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
{{----------------------------------------------------------------------------------------}}