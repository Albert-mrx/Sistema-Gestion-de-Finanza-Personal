const showPasswordCheckbox = document.getElementById('showPassword');
const passwordInput = document.getElementById('pass');
let isChecked = false;

showPasswordCheckbox.addEventListener('click', function() {
    if (isChecked) {
        passwordInput.type = 'password';
        isChecked = false;
    } else {
        passwordInput.type = 'text';
        isChecked = true;
    }
});