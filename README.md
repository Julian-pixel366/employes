🚀 Empleados App


Aplicación de gestión de empleados desarrollada con Laravel 12, Vue 3 e Inertia.js.
Permite registrar, listar y administrar empleados de forma sencilla.


📦 Requisitos previos

Antes de comenzar, asegúrate de tener instalado:
PHP 8.4+
Composer
Node.js 18+
NPM o Yarn
SQLite (o MySQL/PostgreSQL si prefieres)

⚙️ Instalación

Clonar el repositorio:
git clone https://github.com/tuusuario/empleados-app.git
cd empleados-app
Instalar dependencias de PHP:
composer install
Instalar dependencias de Node:
npm install
Copiar el archivo de entorno y configurarlo:
cp .env.example .env
php artisan key:generate

🗄️ Migraciones y Seeders


Ejecutar migraciones y seeders para la base de datos:
php artisan migrate --seed

🚀 Servidor de desarrollo


Levantar el servidor de Laravel:
php artisan serve
Levantar Vite (para Vue):
npm run dev
Acceder en:
👉 http://127.0.0.1:8000


📂 Estructura del proyecto


empleados-app/
├── app/             # Lógica de Laravel
├── database/        # Migraciones y seeders
├── resources/js/    # Código Vue + Inertia
├── routes/          # Archivos de rutas
├── public/          # Archivos públicos

✅ Funcionalidades


Registro de empleados con nombre, email, teléfono, dirección y salario.
Listado de empleados.
CRUD completo con Vue + Inertia.
Base de datos SQLite lista para pruebas.

