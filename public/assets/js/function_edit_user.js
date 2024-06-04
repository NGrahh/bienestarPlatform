document.addEventListener('DOMContentLoaded', function () {
    let seleccionRolUpdate = document.getElementById('yourRol_update');
    let programaFormacionUpdate = document.getElementById('training_program_update');
    let numeroFichaUpdate = document.getElementById('token_number_update');
    let aprendizRolId = '5'; // Cambia esto si el ID del rol "Aprendiz" es diferente

    function toggleFields() {
        let rolIdSeleccionado = seleccionRolUpdate.value;
        if (rolIdSeleccionado == aprendizRolId) {
            programaFormacionUpdate.style.display = 'block';
            numeroFichaUpdate.style.display = 'block';
            programaFormacionUpdate.querySelector('input').removeAttribute('disabled');
            numeroFichaUpdate.querySelector('input').removeAttribute('disabled');
        } else {
            programaFormacionUpdate.style.display = 'none';
            numeroFichaUpdate.style.display = 'none';
            programaFormacionUpdate.querySelector('input').setAttribute('disabled', 'disabled');
            numeroFichaUpdate.querySelector('input').setAttribute('disabled', 'disabled');
        }
    }

    seleccionRolUpdate.addEventListener('change', toggleFields);

    // Activar evento de cambio inicialmente en caso de que 'Aprendiz' esté preseleccionado.
    toggleFields();
});
