document.addEventListener('DOMContentLoaded', function () {
    let seleccion_rol = document.getElementById('yourRol');
    let programa_formacion = document.getElementById('training_program');
    let numero_ficha = document.getElementById('token_number');
    

    seleccion_rol.addEventListener('change', function () {
        let rol_seleccionado = seleccion_rol.options[seleccion_rol.selectedIndex].text;
        if (rol_seleccionado === 'Aprendiz') {
            programa_formacion.style.display = 'block';
            numero_ficha.style.display = 'block';
            programa_formacion.querySelector('input').removeAttribute('disabled');
            numero_ficha.querySelector('input').removeAttribute('disabled');
        } else {
            programa_formacion.style.display = 'none';
            numero_ficha.style.display = 'none';
            programa_formacion.querySelector('input').setAttribute('disabled', 'disabled');
            numero_ficha.querySelector('input').setAttribute('disabled', 'disabled');
        }
    });

    //Activar evento de cambio inicialmente en caso de que 'Aprendiz' esté preseleccionado.
    seleccion_rol.dispatchEvent(new Event('change'));
});




// options: Es una propiedad de los elementos <select> 
// selectedIndex: Esta propiedad te da el índice de la opción seleccionada dentro del select. Es decir, si el usuario ha seleccionado la tercera opción en el select, seleccion_rol.selectedIndex devolverá 2, ya que los índices en JavaScript comienzan desde 0
// .text: Esta es la propiedad que te da el texto visible de la opción seleccionada en el select. En este caso, estamos obteniendo el texto de la opción seleccionada para almacenarlo en la variable rol_seleccionado.