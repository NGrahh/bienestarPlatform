$('#togglePassword').on('click', function () {
    var $passwordField = $('#yourPassword');
    var type = $passwordField.attr('type') === 'password' ? 'text' : 'password';
    $passwordField.attr('type', type);
    if ($(this).hasClass('bi-eye-fill')) {
        $(this).removeClass('bi-eye-fill');
        $(this).addClass('bi-eye-slash-fill');
    } else {
        $(this).removeClass('bi-eye-slash-fill');
        $(this).addClass('bi-eye-fill');
    }
});