document.addEventListener("DOMContentLoaded", function () {
  // Obtener el formulario y los elementos de entrada
  const form = document.querySelector(".form");
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("pass");

  // Agregar un evento de escucha al enviar el formulario
  form.addEventListener("submit", function (event) {
    // Validar el correo electrónico
    if (!validateEmail(emailInput.value)) {
      event.preventDefault();
      document.getElementById("emailError").textContent =
        "Ingresa un correo electrónico válido";
    } else {
      document.getElementById("emailError").textContent = "";
    }

    // Validar la contraseña
    if (!validatePassword(passwordInput.value)) {
      event.preventDefault();
      document.getElementById("passwordError").textContent =
        "La contraseña debe tener al menos 8 caracteres, incluyendo mayúsculas, minúsculas, números y caracteres especiales";
    } else {
      document.getElementById("passwordError").textContent = "";
    }
  });

  // Función para validar el correo electrónico
  function validateEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
  }

  // Función para validar la contraseña
  function validatePassword(password) {
    // Al menos 8 caracteres
    // Al menos una letra mayúscula
    // Al menos una letra minúscula
    // Al menos un número
    // Al menos un caracter especial
    const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return passwordPattern.test(password);
  }
});
