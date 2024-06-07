$(document).on('change', '.rol_create', function() {
    let rolUser = $(this).val();

    if (rolUser == 5) {
        $('.inputs-to-create select').prop('disabled', false);
        $('.inputs-to-create input').prop('disabled', false); // Enable input fields
        $('.inputs-to-create').show();
    } else {
        $('.inputs-to-create select').prop('disabled', true);
        $('.inputs-to-create input').prop('disabled', true); // Disable input fields
        $('.inputs-to-create').hide();
    }
});
