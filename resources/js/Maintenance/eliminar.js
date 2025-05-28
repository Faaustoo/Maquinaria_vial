function abrir(id) {
        document.getElementById('modalEliminar').classList.remove('hidden');
        const form = document.getElementById('formEliminar');
        form.action = `/maintenances/${id}`;
    }

    function cerrar() {
        document.getElementById('modalEliminar').classList.add('hidden');
    }

    window.abrir = abrir;
    window.cerrar = cerrar;