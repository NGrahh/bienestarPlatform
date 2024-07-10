{{-- REQUERIMIENTOS FUNCIONALES USUARIO / Actor:  USUARIO --}}

{{----------------------------------------------------------------------------------------}}

{{-- Item Eventos Proximos y Pasados --}} {{-- RF_USUARIO _01, RF_USUARIO 02 --}}
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

{{-- Item Acceder a las distintas secciones del sitio web --}} {{-- RF_USUARIO 03 --}}
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
{{-- Final Item Acceder a las distintas secciones del sitio web --}}
{{----------------------------------------------------------------------------------------}}


{{-- Item Visualizar las dimensiones de bienestar al aprendiz --}} {{-- RF_USUARIO 04 --}}
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


{{-- REQUERIMIENTOS FUNCIONALES APRENDIZ --}} {{-- Actor APR --}}

{{-- Acceso a las funciones del rol de usuario --- RF_APR _01 | Cumple: Si | --}}
{{-- Iniciar sesión --- RF_APR _02 | Cumple: Si | --}}
{{-- Cerrar sesión --- RF_APR_03  | Cumple: Si | --}}
{{-- Solicitud de agendamiento de una cita --- RF_APR_04  | Cumple: Si | --}}

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#citas-nav" data-bs-toggle="collapse" href="#">
        <i class="ri-customer-service-line"></i><span>Agendar Cita</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="citas-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        {{-- <li>
            <a href="{{route('form-appointment')}}">
                <i class="bi bi-circle">Solcitar mi cita</i><span></span>
            </a>
        </li> --}}
        <li>
            <a href="{{route('form-appointment')}}">
                <i class="bi bi-circle"></i><span>Solicitar mi cita</span>
            </a>
        </li>
    </ul>
</li>
{{-- Final Item --}}
{{----------------------------------------------------------------------------------------}}