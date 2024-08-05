$('#togglePassword').on('click', function () {
    var $passwordField = $('#yourPassword');
    var type = $passwordField.attr('type') === 'password' ? 'text' : 'password';
    $passwordField.attr('type', type);
    $(this).toggleClass('bi-eye-slash-fill');
});