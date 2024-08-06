$(document).ready(function() {
    // Maneja el cambio en el select de acciones
    $('#youractions').on('change', function() {
        // Obtén el valor seleccionado
        var selectedValue = $(this).val();
        
        // Muestra u oculta el contenedor del motivo basado en el valor seleccionado
        if (selectedValue == '2' || selectedValue == '3') {
            $('#reason-container').removeClass('d-none');
        } else {
            $('#reason-container').addClass('d-none');
        }
    });
})
