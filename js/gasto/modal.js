// Obtener referencias a elementos del DOM
var modal = document.getElementById("Modal");
var btnAbrirModal = document.getElementById("openModalBtn");
var spanCerrar = document.getElementsByClassName("close")[0];

// Función para abrir el modal
function abrirModal() {
  modal.style.display = "block";
}

// Función para cerrar el modal
function cerrarModal() {
  modal.style.display = "none";
}

// Asociar eventos a las funciones
btnAbrirModal.addEventListener("click", abrirModal);
spanCerrar.addEventListener("click", cerrarModal);
window.addEventListener("click", function(event) {
  if (event.target == modal) {
    cerrarModal();
  }
});
