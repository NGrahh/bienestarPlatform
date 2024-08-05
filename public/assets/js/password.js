$('#togglePassword').on('touchstart', function () {
    var $passwordField = $('#yourPassword');
    var type = $passwordField.attr('type') === 'password' ? 'text' : 'password';
    $passwordField.attr('type', type);
    $(this).removeClass('bi-eye-fill');
    $(this).addClass('bi-eye-slash-fill');
});