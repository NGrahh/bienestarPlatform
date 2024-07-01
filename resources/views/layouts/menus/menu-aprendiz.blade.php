<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#events-nav" data-bs-toggle="collapse" href="#">
        <i class="ri-pages-line"></i><span>Eventos</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="events-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{route('events.viewevent')}}">
                <i class="bi bi-circle"></i>Eventos próximos<span></span>
            </a>
        </li>
        <li>
            <a href="{{route('evento_anterior')}}">
                <i class="bi bi-circle"></i><span>Eventos pasados</span>
            </a>
        </li>
    </ul>
</li><!-- End Tables Nav -->
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
            <a href="#">
                <i class="bi bi-circle"></i><span>Apoyos de sostenimiento</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="bi bi-circle"></i><span>Liderazgo</span>
            </a>
        </li>
    </ul>
</li>
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

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#cita-nav" data-bs-toggle="collapse" href="#">
        <i class="ri-customer-service-line"></i><span>Formularios</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="cita-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{route('form-appointment')}}">
                <i class="bi bi-circle"></i>Agendar cita<span></span>
            </a>
        </li>

        <li>
            <a href="{{route('formularios-apoyos-inscr')}}">
                <i class="bi bi-circle"></i>Apoyos<span></span>
            </a>
        </li>





        
    </ul>
</li>



