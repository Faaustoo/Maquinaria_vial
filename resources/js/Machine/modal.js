function abrirModal(id) {
  document.getElementById('modalEliminar').classList.remove('hidden');
  const form = document.getElementById('formEliminar');
  form.action = "/machines/" + id;
}

function cerrarModal() {
  document.getElementById('modalEliminar').classList.add('hidden');
}

window.abrirModal = abrirModal;
window.cerrarModal = cerrarModal;
