{{-- REQUERIMIENTOS FUNCIONALES MIEMBRO DE BIENESTAR AL APRENDIZ ENCARGADO DE LOS APOYOS / Actor MIEMBRO_BA_APO --}}

{{-- Acceso a las funciones de anteriores roles RF_MIEMBRO_BA _APO_01 | Cumple: Si | --}}

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
    <a class="nav-link collapsed" data-bs-target="#supports-nav" data-bs-toggle="collapse" href="#">
        <i class="ri-pantone-line"></i><span>Apoyos</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="supports-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{route('Apoyo-fic')}}">
                <i class="bi bi-circle"></i>Apoyo de sostenimiento FIC<span></span>
            </a>
        </li>
        <li>
            <a href="{{route('Apoyo-regular')}}">
                <i class="bi bi-circle"></i><span>Apoyo de sostenimiento regular</span>
            </a>
        </li>
        <li>
            <a href="{{route('Apoyo-transporte')}}">
                <i class="bi bi-circle"></i><span>Apoyos de transporte</span>
            </a>
        </li>
        <li>
            <a href="{{route('Apoyo-alimentacion')}}">
                <i class="bi bi-circle"></i><span>Apoyo de alimentación</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="bi bi-circle"></i><span>Centros de convivencia</span>
            </a>
        </li>
        <li>
            <a href="{{route('Apoyo-datos')}}">
                <i class="bi bi-circle"></i><span>Plan de datos</span>
            </a>
        </li>
    </ul>
</li>
{{-- Final Item Acceder a las distintas secciones del sitio web | Cumple: Si | --}}
{{----------------------------------------------------------------------------------------}}


{{-- Item Visualizar las dimensiones de bienestar al aprendiz --}} {{-- RF_USUARIO 04 | Cumple: Si | --}}
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#services-nav" data-bs-toggle="collapse" href="#">
        <i class="ri-customer-service-line"></i><span>Dimensiones de bienestar al aprendiz</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="services-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{route('Servicio-deportes')}}">
                <i class="bi bi-circle"></i><span>Deportes</span>
            </a>
        </li>
        <li>
            <a href="{{route('Servicio-enfermeria')}}">
                <i class="bi bi-circle"></i><span>Promoción y prevención de salud</span>
            </a>
        </li>
        <li>
            <a href="{{route('Servicio-Psicologia')}}">
                <i class="bi bi-circle"></i><span>Consejería y atención psicosocial</span>
            </a>
        </li>
        <li>
            <a href="{{route('Servicio-Musica')}}">
                <i class="bi bi-circle"></i><span>Arte y cultura</span>
            </a>
        </li>
        <li>
            <a href="{{route('Servicio-Consejeria')}}">
                <i class="bi bi-circle"></i><span>Liderazgo</span>
            </a>
        </li>
    </ul>
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

{{-- Determinar horarios de atención al público --}} {{-- RF_MIEMBRO_BA_10 | Cumple: No | --}}

{{-- Aceptar o posponer cita --}} {{-- RF_MIEMBRO_BA_11  | Cumple: No |--}}





{{-- Iniciar sesión --- RF_MIEMBRO_BA_APO_02 | Cumple: Si |--}}

{{-- Cerrar sesión --- RF_MIEMBRO_BA_APO_03 | Cumple: Si |--}}

{{-- Activar y/o desactivar la opción de postularse --- RF_MIEMBRO_BA _APO_04  | Cumple: No | --}}
{{-- Visualizar las respuestas de los formularios --- RF_MIEMBRO_BA _APO_05 | Cumple: No | --}}
{{-- Visualizar los archivos adjuntados --- RF_MIEMBRO_BA _APO_06 | Cumple: No | --}}




