// $(document).ready(function() {
//     $('#togglePassword').on('click', function () {
//         var $passwordField = $('#yourPassword');
//         var type = $passwordField.attr('type') === 'password' ? 'text' : 'password';
//         $passwordField.attr('type', type);

//         // Alternar ícono
//         $(this).toggleClass('bi-eye-slash-fill bi-eye-fill');

//         // Alternar texto en dispositivos móviles
//         var $toggleText = $('#toggleText');
//         if ($toggleText.length) {
//             $toggleText.text(type === 'password' ? 'Mostrar clave' : 'Ocultar clave');
//         }
//     });

//     // Alternar visibilidad al hacer clic en el texto de mostrar/ocultar clave en móviles
//     $('#toggleText').on('click', function() {
//         $('#togglePassword').trigger('click');
//     });
// });
