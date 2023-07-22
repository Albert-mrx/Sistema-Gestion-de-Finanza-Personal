function validateForm() {
   
    var montoInput = document.getElementById("montoInput");
    var monto = montoInput.value.trim();
    if (!/^\d+(\.\d+)?$/.test(monto)) {
      alert("El campo de monto solo permite números.");
      montoInput.focus();
      return false;
    }

    
    var formaPagoInput = document.getElementById("formaPagoInput");
    var noteInput = document.getElementById("note");

    if (formaPagoInput.value.trim() === "") {
      alert("Por favor, ingresa una forma de pago.");
      formaPagoInput.focus();
      return false;
    }
    if (noteInput.value.trim() === "") {
      alert("Por favor, ingresa una nota.");
      noteInput.focus();
      return false;
    }

    return true;
  }