$(document).on('change', '.rol_edit', function() {
    let dataIdUser = $(this).data('id-user');
    let rol = $(this).val();

    if (rol == 3) {
        $('.inputs-to-area-' + dataIdUser + ' input').prop('disabled', false);
        $('.inputs-to-area-' + dataIdUser).show();
    } else {
        $('.inputs-to-area-' + dataIdUser + ' input').prop('disabled', true);
        $('.inputs-to-area-' + dataIdUser).hide();
    }
});