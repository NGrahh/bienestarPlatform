<style>
    /* Footer */
    
    .sector-empleo {
        padding: 0.7rem 1.7rem;
        background-color: var(--alternate-background);
    }
    
    .sector-empleo__text {
        margin: auto;
        max-width: var(--web-margin);
        color: var(--color-info);
        display: flex;
        gap: 0.625rem;
        justify-items: center;
        align-items: center;
    }
    
    .entidades {
        margin: auto;
        max-width: var(--web-margin);
        display: grid;
        grid-template-columns: 1.88fr repeat(4, 1fr);
        gap: 24px;
        align-items: center;
        padding: 3rem 1.7rem;
        justify-items: start;
    }
    
    .entidades__link-img {
        filter: grayscale(100%);
        transition: filter 0.2s ease-in-out; 
    }
    
    .entidades__link-img:hover {
        filter: none;
    }
    
    
    .gobierno {
        background-color: var(--alternate-background);
    }
    
    .gobierno__container {
        max-width: var(--web-margin);
        margin: auto;
        display: grid;
        grid-template-columns: 3fr repeat(6, 1fr);
        align-items: center;
        padding: 3rem 1.7rem;
        gap: 24px;
    }
    
    .gobierno__ministerio-container {
        display: flex;
        font-size: 12px;
        flex-direction: column;
        gap: 6px;
        align-items: flex-end;
    }
    
    .gobierno__ministerio-container--img {
        align-items: flex-start;
    
    }
    
    .gobierno__img {
        max-width: 20.875rem;
    }
    
    .gobierno__ministerios-circle {
        width: 0.8rem;
        height: 0.8rem;
        border-radius: 20%;
        display: inline-block;
    }
    
    .gobierno__link {
        text-decoration: none;
        width: 109px;
    }
    
    .gobierno__link:hover {
        text-decoration: underline;
    }
    
    .more-information {
        background-color: white;
        font-size: 0.75rem;
        padding: 3rem 1.7rem;
        
    }
    
    .more-information__container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
    }
    
    .more-information__item {
        flex-direction: column;
    }
    .more-information__item--text{
        color:var(--alternate-background);
        font-weight: bold;
    }
    
    .more-information__item--img {
        justify-content: center;
        align-items: end;
    }
    
    .more-information__icontec-img {
        height: 7.813rem;
    }
    
    .more-information__icontec {
        padding: 0.9rem;
        justify-content: end;
    }
    
    /* Reutilizable */
    
    .more-information__icontec .more-information__item,
    .gobierno__ministerios,
    .footer__text {
        display: flex;
    }
    
    .more-information,
    .gobierno__link,
    .footer__container {
        color: var(--color-info)
    }
    
    .more-information__container,
    .footer__text {
        margin: auto;
    }
    
    .gobierno__ministerios {
        gap: 0.75rem;
    }
    
    .more-information__icontec,
    .gobierno__ministerios,
    .footer__text {
        align-items: center;
    }
    
    .more-information__container,
    .footer__text {
        max-width: var(--web-margin);
    }
    
    .entidades__link-img {
        width: 100%;
    }
    
    .gobierno__img,
    .gobierno__ministerios--img {
        width: 100%
    }
    
    .more-information__container {
        flex-direction: column;
    }
    
    @media (max-width: 1200px) {
    
        .entidades {
            grid-template-columns: repeat(4, 1fr);
            justify-items: center;
        }
        
        .entidades__link--ministerio {
            grid-column: 1/-1;
        }
        
        .gobierno__container {
            grid-template-columns: repeat(3, 1fr);
            align-items: center;
        }
        
        .gobierno__ministerio-container {
            align-items: center;
        }
        
        .gobierno__ministerio-container--img {
            align-items: center;
            margin: auto;
            grid-column: span 3;
            width: 100%;
            display: flex;
            align-items: center;
        }
    
    
        .gobierno__ministerios {
            font-size: 0.80rem;
        }
        
        .gobierno__ministerios--img {
            justify-content: center;
        }
        
        .more-information__container {
            display: flex;
    
        }
        
        .more-information__item--text {
            align-items: start;
        }
        
        /* Reutilizable */
        
        
        .more-information__container,
        .more-information__item {
            align-items: center;
        }
        
        .more-information__icontec-img,
        .gobierno__img {
            width: 100%;
        }
        
        .more-information__container {
            gap: 1.5rem;
        }
        
    }
    
    @media (max-width: 767px) {
    
        .entidades {
            grid-template-columns: repeat(2, 1fr);
            justify-items: center;
        }
    
        .gobierno__container {
            grid-template-columns: repeat(auto-fit, minmax(164px, 2fr));
        }
    
        .gobierno__ministerio-container--img {
            grid-column: 1/-1;
        }
    
        .gobierno__ministerios {
            font-size: 0.688rem;
        }
        
        .gobierno__ministerio-container {
            width: 100%;
        }
    }
<<<<<<< HEAD
}
</style>

<footer id="footer" class="footer">
    <div class="sector-empleo">
        <div class="sector-empleo__text">
            <img loading="lazy" src="https://zajuna.sena.edu.co/img/icons/trabajo-icon.svg" alt="icono-trabajo">
            <h3>Sector Empleo</h3>
        </div>
    </div>
    <div class="entidades">
        <a target="_blank" href="https://www.mintrabajo.gov.co/web/guest/inicio" class="entidades__link--ministerio"><img loading="lazy" src="{{asset('img/ministerio-logo-color.svg')}}" alt="ministerio logo" class="entidades__link-img "></a>
        <a target="_blank" href="https://www.unidadsolidaria.gov.co/"><img loading="lazy" src="{{asset('img/iOss-logo-color.svg')}}" alt="oss logo" class="entidades__link-img "></a>
        <a target="_blank" href="https://www.serviciodeempleo.gov.co/portada" class="entidades__link"><img loading="lazy" src="{{asset('img/iEmpleo-logo-color.svg')}}" alt="empleo logo" class="entidades__link-img "></a>
        <a target="_blank" href="https://www.ssf.gov.co/" class="entidades__link"><img loading="lazy" src="{{asset('img/iSuperSubsidio-logo-color.svg)}}" alt="supersubsidio logo" class="entidades__link-img "></a>
        <a target="_blank" href="https://www.colpensiones.gov.co/" class="entidades__link"><img loading="lazy" src="{{asset(img/iColpensiones-logo-color.svg')}}" alt="solpensiones logo" class="entidades__link-img "></a>
    </div>
    <div class="gobierno">
        <div class="gobierno__container">

            <div class="gobierno__ministerio-container gobierno__ministerio-container--img">
                <img loading="lazy" src="{{asset('img/logoGovCol-logo.svg')}}" alt="logogovcol logo" class="gobierno__img">
            </div>
            <div class="gobierno__ministerio-container">
                <a href="https://petro.presidencia.gov.co" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #c61720;"></span>
                    Presidencia</a>
                <a href="https://www.minjusticia.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #01630c;"></span>
                    MinJusticia</a>
                <a href="https://www.mininterior.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #3e6300;"></span>
                    MinInterior</a>
            </div>
            <div class="gobierno__ministerio-container">
                <a href="https://www.mintic.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #990001;"></span> MinTic</a>
                <a href="https://www.minsalud.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #410e99;"></span> MinSalud</a>
                <a href="https://www.mincultura.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #38170c;"></span>
                    MinCultura</a>
            </div>
            <div class="gobierno__ministerio-container">
                <a href="https://www.minminas.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #151f99;"></span> MinMinas</a>
                <a href="https://www.mindefensa.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #531400;"></span>
                    MinDefensa</a>
                <a href="https://www.mineducacion.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #531400;"></span>
                    MinEducación</a>
            </div>

            <div class="gobierno__ministerio-container">
                <a href="https://www.mintrabajo.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #0e3e99;"></span>
                    MinTrabajo</a>
                <a href="https://www.mintransporte.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #5c8301;"></span>
                    MinTransporte</a>
                <a href="https://www.urnadecristal.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #2b1399;"></span> Urna de
                    Cristal</a>
            </div>
            <div class="gobierno__ministerio-container">
                <a href="https://www.minhacienda.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #996201;"></span>
                    MinHacienda</a>
                <a href="https://www.mincit.gov.co/inicio" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #1e7373;"></span>
                    MinComercio</a>
                <a href="https://www.minvivienda.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #992900;"></span>
                    MinVivienda</a>
            </div>
            <div class="gobierno__ministerio-container">
                <a href="https://www.minagricultura.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #3b9901;"></span>
                    MinAgricultura</a>
                <a href="https://www.vicepresidencia.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #919191;"></span>
                    Vicepresidencia</a>
                <a href="https://www.minambiente.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #990001;"></span>
                    MinAmbiente</a>
=======
    </style>
    
    <footer id="footer" class="footer">
        <div class="sector-empleo">
            <div class="sector-empleo__text">
                <img loading="lazy" src="{{asset('img/trabajo-icon.svg')}}" alt="icono-trabajo">
                <h3>Sector Empleo</h3>
>>>>>>> 1078640099dd64fb331e3fdaff486f07e47881cf
            </div>
        </div>
        <div class="entidades">
            <a target="_blank" href="https://www.mintrabajo.gov.co/web/guest/inicio" class="entidades__link--ministerio"><img loading="lazy" src="{{asset('img/ministerio-logo-color.svg')}}" alt="ministerio logo" class="entidades__link-img "></a>
            <a target="_blank" href="https://www.unidadsolidaria.gov.co/"><img loading="lazy" src="{{asset('img/iOss-logo-color.svg')}}" alt="oss logo" class="entidades__link-img "></a>
            <a target="_blank" href="https://www.serviciodeempleo.gov.co/portada" class="entidades__link"><img loading="lazy" src="{{asset('img/iEmpleo-logo-color.svg')}}" alt="empleo logo" class="entidades__link-img "></a>
            <a target="_blank" href="https://www.ssf.gov.co/" class="entidades__link"><img loading="lazy" src="{{asset('img/iSuperSubsidio-logo-color.svg')}}" alt="supersubsidio logo" class="entidades__link-img "></a>
            <a target="_blank" href="https://www.colpensiones.gov.co/" class="entidades__link">
                <img loading="lazy" src="{{asset('img/iColpensiones-logo-color.svg')}}" alt="solpensiones logo" class="entidades__link-img "></a>
        </div>
        <div class="gobierno">
            <div class="gobierno__container">
    
                <div class="gobierno__ministerio-container gobierno__ministerio-container--img">
                    <img loading="lazy" src="{{asset('img/logoGovCol-logo.svg')}}" alt="logogovcol logo" class="gobierno__img">
                </div>
                <div class="gobierno__ministerio-container">
                    <a href="https://petro.presidencia.gov.co" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #c61720;"></span>
                        Presidencia</a>
                    <a href="https://www.minjusticia.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #01630c;"></span>
                        MinJusticia</a>
                    <a href="https://www.mininterior.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #3e6300;"></span>
                        MinInterior</a>
                </div>
                <div class="gobierno__ministerio-container">
                    <a href="https://www.mintic.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #990001;"></span> MinTic</a>
                    <a href="https://www.minsalud.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #410e99;"></span> MinSalud</a>
                    <a href="https://www.mincultura.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #38170c;"></span>
                        MinCultura</a>
                </div>
                <div class="gobierno__ministerio-container">
                    <a href="https://www.minminas.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #151f99;"></span> MinMinas</a>
                    <a href="https://www.mindefensa.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #531400;"></span>
                        MinDefensa</a>
                    <a href="https://www.mineducacion.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #531400;"></span>
                        MinEducación</a>
                </div>
    
                <div class="gobierno__ministerio-container">
                    <a href="https://www.mintrabajo.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #0e3e99;"></span>
                        MinTrabajo</a>
                    <a href="https://www.mintransporte.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #5c8301;"></span>
                        MinTransporte</a>
                    <a href="https://www.urnadecristal.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #2b1399;"></span> Urna de
                        Cristal</a>
                </div>
                <div class="gobierno__ministerio-container">
                    <a href="https://www.minhacienda.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #996201;"></span>
                        MinHacienda</a>
                    <a href="https://www.mincit.gov.co/inicio" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #1e7373;"></span>
                        MinComercio</a>
                    <a href="https://www.minvivienda.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #992900;"></span>
                        MinVivienda</a>
                </div>
                <div class="gobierno__ministerio-container">
                    <a href="https://www.minagricultura.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #3b9901;"></span>
                        MinAgricultura</a>
                    <a href="https://www.vicepresidencia.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #919191;"></span>
                        Vicepresidencia</a>
                    <a href="https://www.minambiente.gov.co/" class="gobierno__link" target="_blank"><span class="gobierno__ministerios-circle" style="background-color: #990001;"></span>
                        MinAmbiente</a>
                </div>
            </div>
    
        </div>
        
        <div class="more-information">
            <div class="more-information__container">
                <div class="more-information__item more-information__item--text">
                    Servicio Nacional de Aprendizaje SENA - Dirección General<br>
                    Calle 57 No. 8 - 69 Bogotá D.C. (Cundinamarca), Colombia<br>
                    Conmutador Nacional (57 1) 5461500 - Extensiones<br>
                    Atención presencial: lunes a viernes 8:00 a.m. a 5:30 p.m.<br>
                    <a style="color:#04324d;" href="http://www.sena.edu.co/es-co/sena/Paginas/directorio.aspx" target="_blank">Resto del país sedes y horarios</a><br>
                    Atención telefónica: lunes a viernes 7:00 a.m. a 7:00 p.m. - <br>sábados 8:00 a.m. a 1:00 p.m.<br>
                    Atención al ciudadano: Bogotá (57 1) 3430111 - Línea gratuita y resto del país 018000 910270<br>
                    Atención al empresario: Bogotá (57 1) 3430101 - Línea gratuita y resto del país 018000 910682<br>
                    <a href="http://sciudadanos.sena.edu.co/SolicitudIndex.aspx" target="_blank" style="color: #04324d">PQRS</a><br>
                    <a href="http://www.sena.edu.co/es-co/ciudadano/Paginas/chat.aspx" target="_blank" style="color: #04324d">Chat en línea</a><br>
                    Correo notificaciones judiciales: servicioalciudadano@sena.edu.co<br>
                    Todos los derechos 2017 SENA - <a href="http://www.sena.edu.co/es-co/Paginas/politicasCondicionesUso.aspx" target="_blank" style="color: #04324d">Políticas de privacidad y condiciones uso Portal Web SENA</a><br>
                    <a href="http://www.sena.edu.co/es-co/transparencia/Documents/proteccion_datos_personales_sena_2016.pdf" target="_blank" style="color: #04324d">Política de Tratamiento para Protección de Datos
                        Personales</a> - <a href="http://compromiso.sena.edu.co/index.php?text=inicio&amp;id=27" target="_blank" style="color:#04324d"><br>Política de seguridad y privacidad de la
                        información</a>
                </div>
                <div class="more-information__icontec">
                    <div class="more-information__item more-information__item more-information__item--img">
                        <img loading="lazy" class="more-information__icontec-img" src="{{asset('img/normas-iso-logos.svg')}}" alt="Certificación ISO 9001" title="Certificación ISO 9001">
    
                    </div>
                </div>
    
            </div>
        </div>
    
        <div class="gov" id="final">
            <div class="gov__container">
                <a href="https://www.gov.co/" target="_blank">
                    <img loading="lazy" src="{{asset('img/gov-logo.svg')}}" alt="Logo de la pagina gov.co" class="gov__img">
                </a>
    
            </div>
        </div>
    </footer><!-- End Footer -->