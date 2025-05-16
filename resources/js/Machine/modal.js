let formularioAEliminar = null;

window.abrirModal = function(mensaje, formulario) {
  formularioAEliminar = formulario;
  document.getElementById('modal-mensaje').textContent = mensaje;
  document.getElementById('modal-confirmacion').classList.remove('hidden');
};

window.cerrarModal = function() {
  formularioAEliminar = null;
  document.getElementById('modal-confirmacion').classList.add('hidden');
};

document.getElementById('modal-btn-confirmar').addEventListener('click', function() {
  if (formularioAEliminar) {
    formularioAEliminar.submit();
  }
});
