// Obtener los elementos del formulario y los checkboxes
let formulario = document.getElementById('form_appointment');
let checkSi = document.getElementById('check_si');
let checkNo = document.getElementById('check_no');
let volverBtn = document.getElementById('button_volver');
// Función para mostrar el formulario
function mostrarFormulario() {
    formulario.style.display = 'block';
}

// Función para ocultar el formulario
function ocultarFormulario() {
    formulario.style.display = 'none';
}

// Evento cuando se hace clic en el checkbox "Sí"
checkSi.addEventListener('change', function () {
    if (this.checked) {
        mostrarFormulario();
        volverBtn.style.display = 'none';
        checkNo.checked = false; // Desmarca el checkbox "No" si "Sí" está marcado
    } else {
        ocultarFormulario();

    }
});

// Evento cuando se hace clic en el checkbox "No"
checkNo.addEventListener('change', function () {
    if (this.checked) {
        ocultarFormulario();
        volverBtn.style.display = 'block';
        checkSi.checked = false; // Desmarca el checkbox "No" si "Sí" está marcado
    } else {
        volverBtn.style.display = 'none';
    }
});

