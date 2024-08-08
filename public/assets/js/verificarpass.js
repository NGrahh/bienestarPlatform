$(document).ready(function() {
    $('#newPassword').on('keyup', function() {
        var password = $(this).val();
        
        // Check length
        $('#length').toggleClass('invalid', password.length < 8).toggleClass('valid', password.length >= 8);

        // Check lowercase
        $('#lowercase').toggleClass('invalid', !/[a-z]/.test(password)).toggleClass('valid', /[a-z]/.test(password));

        // Check uppercase
        $('#uppercase').toggleClass('invalid', !/[A-Z]/.test(password)).toggleClass('valid', /[A-Z]/.test(password));

        // Check number
        $('#number').toggleClass('invalid', !/[0-9]/.test(password)).toggleClass('valid', /[0-9]/.test(password));

        // Check special character
        $('#special').toggleClass('invalid', !/[@$!%*?&]/.test(password)).toggleClass('valid', /[@$!%*?&]/.test(password));
    });
});