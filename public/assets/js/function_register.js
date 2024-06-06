$(document).on('change', '.rol_create', function() {
    let dataUserId = $(this).data('user-id');
    let rolUser = $(this).val();

    if (rolUser == 5) {
        $('.inputs-to-create-' + dataUserId + ' select').prop('disabled', false);
        $('.inputs-to-create-' + dataUserId + ' input').prop('disabled', false); // Added to enable input fields
        $('.inputs-to-create-' + dataUserId).show();
    } else {
        $('.inputs-to-create-' + dataUserId + ' select').prop('disabled', true);
        $('.inputs-to-create-' + dataUserId + ' input').prop('disabled', true); // Added to disable input fields
        $('.inputs-to-create-' + dataUserId).hide();
    }
});