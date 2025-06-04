document.addEventListener('DOMContentLoaded', function () {
    const datos = window.assignments;

    const mapa = L.map('map').setView([-34.6, -58.4], 4);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 10,
    }).addTo(mapa);

    const ubicaciones = {};
        datos.forEach(maquina => {
            const latitud = maquina.project.province.latitude;
            const longitud = maquina.project.province.longitude;
            const clave = `${latitud},${longitud}`;

            if (!ubicaciones[clave]) {
                ubicaciones[clave] = {
                    provincia: maquina.project.province.name,
                    latitud: latitud,
                    longitud: longitud,
                    maquinas: []
                };
            }

            ubicaciones[clave].maquinas.push(maquina.machine.serial_number);
        });

        for (const clave in ubicaciones) {
            const ubicacion = ubicaciones[clave];
            const listaMaquinas = ubicacion.maquinas.map(numeroSerie => `<li>${numeroSerie}</li>`).join('');

            const contenido = `
                <b>Provincia:</b> ${ubicacion.provincia}<br>
                <b>Máquinas:</b>
                <ul>
                    ${listaMaquinas}
                </ul>
            `;

            L.marker([ubicacion.latitud, ubicacion.longitud])
                .addTo(mapa)
                .bindPopup(contenido);
        }

});
