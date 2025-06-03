Sistema de Gestión de Maquinaria Vial

Este proyecto es un sistema web desarrollado en Laravel para la gestión integral de maquinaria vial, orientado a empresas constructoras que buscan optimizar el uso y control de sus equipos. El sistema permite a los administradores y usuarios gestionar de forma centralizada las máquinas, asignaciones, mantenimientos y obras, diferenciando accesos y funcionalidades según el tipo de usuario.

¿Qué hace el sistema?

El Sistema de Gestión de Maquinaria Vial facilita la administración y trazabilidad de todos los recursos relacionados con la maquinaria y las obras viales. Permite llevar un control claro y organizado sobre el inventario, el estado y la ubicación de las máquinas, los mantenimientos realizados y pendientes, así como las asignaciones de equipos a obras y usuarios.




Funcionalidades principales:


-Gestión de máquinas: 

Alta, edición, baja y visualización de información detallada de cada máquina, incluyendo su estado, kilómetros recorridos y tipo de equipamiento.

-Asignaciones:


Asignación de máquinas a distintos usuarios, sectores u obras activas. Permite editar o finalizar asignaciones y exportar listados en PDF.

-Mantenimientos:


Registro y seguimiento de mantenimientos preventivos y correctivos, con historial por máquina y recordatorios automáticos por email cuando se aproxima un mantenimiento.

-Obras:


Creación y finalización de obras, acceso al historial de proyectos terminados y visualización de las máquinas que participaron en cada uno.

-Ubicación:


Visualización en un mapa de la ubicación actual de las máquinas asignadas a obras, organizadas por provincia.

-Configuración personal:


Edición de perfil, ajuste de parámetros de mantenimiento y cierre de sesión seguro.


Tecnologías utilizadas:


Laravel 12

PHP 8.3.13

MySQL 8.5.30

Blade

Tailwind CSS

Laravel Breeze

Leaflet

Composer

Node.js

NPM

Laragon Full 6.0

Apache 2.4


Descargar e instalar el proyecto paso a paso

1. Clonar el repositorio
Abre tu terminal o consola y ejecuta:

        git clone https://github.com/tuusuario/maquinaria-vial.git
        cd maquinaria-vial

2. Instalar dependencias PHP con Composer
Dentro del directorio del proyecto, ejecuta:

        composer install

3. Configurar el archivo de entorno
Copia el archivo de ejemplo .env.example y renómbralo a .env:

        cp .env.example .env
4. Generar la clave de la aplicación
Ejecuta el siguiente comando para generar la clave de seguridad:

        php artisan key:generate

5. Ejecutar migraciones y seeders

        php artisan migrate
        php artisan db:seed
   
7. Instalar dependencias frontend con NPM
Instala las dependencias para CSS, JS y Tailwind:
        
        npm install
7. Compilar assets frontend
Para compilar los estilos y scripts, ejecuta:

        npm run dev
8. Levantar el servidor local
Finalmente, inicia el servidor de desarrollo de Laravel:

        php artisan serve
9. Acceder al sistema
Abre tu navegador y entra a la URL indicada para comenzar a usar el sistema.





