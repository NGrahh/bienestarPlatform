document.getElementById('togglePassword').addEventListener('click', function (e) {
    const passwordField = document.getElementById('yourPassword');
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);
    this.classList.toggle('bi-eye-slash-fill');
});