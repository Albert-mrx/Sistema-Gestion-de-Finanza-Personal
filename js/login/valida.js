function validarFormulario() {
    var emailInput = document.getElementById("email");
    var passwordInput = document.getElementById("pass");
    var emailErrorLabel = document.getElementById("emailError");
    var passwordErrorLabel = document.getElementById("passwordError");
    var valid = true;

    // Restaurar estilos
    emailInput.style.borderColor = "";
    passwordInput.style.borderColor = "";
    emailErrorLabel.textContent = "";
    passwordErrorLabel.textContent = "";

    // Validar correo electrónico
    var emailRegex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
    if (!emailRegex.test(emailInput.value)) {
      emailInput.style.borderColor = "red";
      emailErrorLabel.textContent = "Ingrese un correo válido de Gmail.";
      valid = false;
    }

    // Validar contraseña
    var passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]{8,}$/;
    if (!passwordRegex.test(passwordInput.value)) {
      passwordInput.style.borderColor = "red";
      passwordErrorLabel.textContent = "La contraseña debe contener al menos 8 caracteres, incluyendo mayúsculas, minúsculas, números y caracteres especiales. o no coinsiden";
      valid = false;
    }

    return valid;
  }