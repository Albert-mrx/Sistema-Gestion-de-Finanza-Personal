    const passwordInput = document.getElementById("pass");
    const confirmPasswordInput = document.getElementById("confirm_pass");
    const showPasswordCheckbox = document.getElementById("showPassword");
    const errorMessage = document.getElementById("error-message");
    const editButton = document.getElementById("editButton");
    const submitButton = document.getElementById("submitButton");
    const inputName =  document.getElementById("name");
    const inputEmail = document.getElementById("email");
    function checkPasswordsMatch() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (password === confirmPassword) {
            errorMessage.innerHTML = "";
        } else {
            errorMessage.innerHTML = "<p>Las contraseñas no coinciden.</p>";
        }
    }

    confirmPasswordInput.addEventListener("input", checkPasswordsMatch);

    showPasswordCheckbox.addEventListener("change", function () {
        if (showPasswordCheckbox.checked) {
            passwordInput.type = "text";
            confirmPasswordInput.type = "text";
        } else {
            passwordInput.type = "password";
            confirmPasswordInput.type = "password";
        }
    });
    function enableEdit() {
        passwordInput.removeAttribute("readonly");
        confirmPasswordInput.removeAttribute("readonly");
        inputName.removeAttribute("readonly");
        inputEmail.removeAttribute("readonly");
        errorMessage.textContent = ""; // Limpia el mensaje de error
        submitButton.style.display = "inline"; // Muestra el botón de guardar
    }

    // Función para deshabilitar la edición de los campos de contraseña
    function disableEdit() {
        passwordInput.setAttribute("readonly", "true");
        confirmPasswordInput.setAttribute("readonly", "true");
        inputName.setAttribute("readonly","true");
        inputEmail.setAttribute("readonly","true");
        errorMessage.textContent = ""; // Limpia el mensaje de error
        submitButton.style.display = "none"; // Oculta el botón de guardar
    }

    // Evento de clic en el botón "Editar"
    editButton.addEventListener("click", enableEdit);