document.addEventListener('DOMContentLoaded', function() {
    const termsCheckbox = document.getElementById('terms');
    const loginButton = document.getElementById('loginButton');

    termsCheckbox.addEventListener('change', function() {
        loginButton.disabled = !termsCheckbox.checked;
    });
});