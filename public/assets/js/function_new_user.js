// document.addEventListener('DOMContentLoaded', function () {
//     let seleccion_rol_user = document.getElementById('yourRol_user');
//     let programa_formacion_user = document.getElementById('training_program_user');
//     let numero_ficha_user = document.getElementById('token_number_user');


//     seleccion_rol_user.addEventListener('change', function () {
//         let rol_seleccionado = seleccion_rol_user.options[seleccion_rol_user.selectedIndex].text;
//         if (rol_seleccionado === 'Aprendiz') {
//             programa_formacion_user.style.display = 'block';
//             numero_ficha_user.style.display = 'block';
//             programa_formacion_user.querySelector('input').removeAttribute('disabled');
//             numero_ficha_user.querySelector('input').removeAttribute('disabled');
//         } else {
//             programa_formacion_user.style.display = 'none';
//             numero_ficha_user.style.display = 'none';
//             programa_formacion_user.querySelector('input').setAttribute('disabled', 'disabled');
//             numero_ficha_user.querySelector('input').setAttribute('disabled', 'disabled');
//         }
//     });

//     //Activar evento de cambio inicialmente en caso de que 'Aprendiz' esté preseleccionado.
//     seleccion_rol_user.dispatchEvent(new Event('change'));
// });