<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title-page', 'Bienestar')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('img/Senafavicon-32x32.png')}}" rel="icon">
    {{-- <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    {{-- <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> --}}
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/micodigo.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/micodigosebas.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
    


    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">








    
    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
======================================================== -->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
    <!-- /Preloader -->
    <main>
        @yield('content')
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    
    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        /**Load function start**/
        $(window).on("load",function(){
            $(".preloader-it").delay(500).fadeOut("slow");
            setTimeout(() => {
                $('#header').addClass('header fixed-top')
            }, 500);
        });
        /**Load function end***/
    </script>

    <script src="{{asset('assets/js/indexform.js')}}"></script>
    <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('assets/js/function_edit_user.js')}}"></script>
    <script src="{{asset('assets/js/function_register.js')}}"></script>
    <script src="{{asset('assets/js/function_modal_clear.js')}}"></script>
    <script src="{{asset('assets/js/motivoCita.js')}}"></script>
    <script src="{{asset('assets/js/password.js')}}"></script>
    

    {{-- //////////////////////////////////////////////////////////////////////////////////////////////////// --}}
    {{-- Función para cuando exista un error en las validaciones del formulario de actualizar Usuario --}}

    <{{-- script>
        $(document).ready(function() {
            let table = $('.datatable').DataTable();
    
            // Capturar la página actual al enviar el formulario
            $('form').on('submit', function() {
                let pageInfo = table.page.info();
                $('#currentPage').val(pageInfo.page);
            });
    
            // Verificar si hay errores de validación y si la sesión contiene la variable 'reopen_modal'
            @if (session('reopen_modal'))
                // Obtener el ID del modal desde la sesión
                let modalId = "#editUserModal{{ session('modal_open') }}";
                // Abrir el modal correspondiente
                let modal = new bootstrap.Modal(document.getElementById(modalId.substring(1)));
                modal.show();
            @endif
        });
    </script> --}}

    {{-- //////////////////////////////////////////////////////////////////////////////////////////////////// --}}
    {{-- Función para abrir modal cuando surge error en las validaciones del formulario al crear un usuario --}}

    <script>
        $(document).ready(function() {
            // Verificar si hay errores de validación y si la sesión contiene la variable 'reopen_modal'
            @if (session('reopen_modal'))
                // Obtener el ID del modal desde la sesión
                var modalId = "#newUserModal";
                // Abrir el modal correspondiente
                var modal = new bootstrap.Modal(document.getElementById(modalId.substring(1)));
                modal.show();
            @endif
        });

    </script> 
    {{-- //////////////////////////////////////////////////////////////////////////////////////////////////// --}}


    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>