$(document).on('change', '.rol_edit', function() {
    let dataIdUser = $(this).data('id-user');
    let rol = $(this).val();

    if (rol == 5) {
        $('.inputs-to-rol-' + dataIdUser + ' input').prop('disabled', false);
        $('.inputs-to-rol-' + dataIdUser + ' select').prop('disabled', false);
        $('.inputs-to-rol-' + dataIdUser).show();
    } else {
        $('.inputs-to-rol-' + dataIdUser + ' input').prop('disabled', true);
        $('.inputs-to-rol-' + dataIdUser + ' select').prop('disabled', true);
        $('.inputs-to-rol-' + dataIdUser).hide();
    }
});