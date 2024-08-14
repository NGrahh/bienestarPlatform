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
    a{
        color: white;
    }
    a:hover{
        color: white;
        text-decoration: underline;
    }
    .final-part-footer-gov img{
        height: 1.5rem;
    }
    .firts-part-footer-gray{
        width: auto;
        height: auto;
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
    .third-part-footer-information-text{
        font-size: 12px;
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
        background-color: var(--alternate-background)
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
</style>

<footer id="footer" class="footer">
    <div class="firt-part-footer-gray">

    </div>
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
    <div class="final-part-footer-gov d-flex p-4">
        <img src="{{asset('img/gov-logo.svg')}}" alt="">
    </div>
</footer><!-- End Footer -->