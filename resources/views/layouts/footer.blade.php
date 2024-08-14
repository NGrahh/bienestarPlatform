<style>
    *{
        margin: 0;
        padding: 0;
    }
    :root{
        --alternate-background: #04324d;
        --gov-background: #3366cc;
    }
    .footer{
        
    }
    img{
        height: 1.5rem;
    }
    .firts-part-footer-gray{
        width: auto;
        height: auto;
    }
    .second-part-footer{
        background-color: var(--alternate-background);
        width: auto;
        height: 200px;
    }
    .third-part-footer-information{

    }    
    .third-part-footer-information p{
        color: var(--alternate-background);
        font-weight: bold;
    }
    .final-part-footer-gov{
        margin: auto;
        padding: .5rem 1.5rem;
        background-color: var(--gov-background);
        width: auto;
        height: 50px;
        align-items: center;
        justify-content: left;
    }
</style>

<footer id="footer" class="footer">
    <div class="firt-part-footer-gray">

    </div>
    <div class="second-part-footer mb-4">

    </div>
    <div class="third-part-footer-information d-flex px-4">
        <p>
        Servicio Nacional de Aprendizaje SENA - Dirección General
        <br>
        Calle 57 No. 8 - 69 Bogotá D.C. (Cundinamarca), Colombia
        <br>
        Conmutador Nacional (57 1) 5461500 - Extensiones
        <br>
        Atención presencial: lunes a viernes 8:00 a.m. a 5:30 p.m.
        <br>
        Resto del país sedes y horarios
        <br>
        Atención telefónica: lunes a viernes 7:00 a.m. a 7:00 p.m. -
        <br>
        sábados 8:00 a.m. a 1:00 p.m.
        <br>
        Atención al ciudadano: Bogotá (57 1) 3430111 - Línea gratuita y resto del país 018000 910270
        <br>
        Atención al empresario: Bogotá (57 1) 3430101 - Línea gratuita y resto del país 018000 910682
        <br>
        PQRS
        <br>
        Chat en línea
        <br>
        Correo notificaciones judiciales: servicioalciudadano@sena.edu.co
        <br>
        Todos los derechos 2017 SENA - Políticas de privacidad y condiciones uso Portal Web SENA
        <br>
        Política de Tratamiento para Protección de Datos Personales -
        <br>
        Política de seguridad y privacidad de la información
        <br>
        </p>
    </div>
    <div class="final-part-footer-gov d-flex mt-3 p-4">
        <img src="{{asset('img/gov-logo.svg')}}" alt="">
    </div>
</footer>
<!-- End Footer -->