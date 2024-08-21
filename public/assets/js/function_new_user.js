$(document).on('change', '.rol_create', function() {
    let rolUser = $(this).val();

    if (rolUser == 3) {
        $('.inputs-to-created select').prop('disabled', false);
        $('.inputs-to-created input').prop('disabled', false); // Enable input fields
        $('.inputs-to-created').show();
    } else {
        $('.inputs-to-created select').prop('disabled', true);
        $('.inputs-to-created input').prop('disabled', true); // Disable input fields
        $('.inputs-to-created').hide();
    }
});