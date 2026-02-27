# DevStagram

DevStagram es una red social de fotografías construida con **Laravel 11**, inspirada en la dinámica de Instagram. La aplicación permite a los usuarios registrarse, crear publicaciones con imagen, dar likes, comentar y seguir a otros perfiles.

## Características principales

- Registro, inicio y cierre de sesión de usuarios.
- Edición de perfil (username e imagen de perfil).
- Creación de publicaciones con carga de imagen (Dropzone + procesamiento con Intervention Image).
- Visualización de publicaciones por usuario y en la página principal.
- Sistema de likes en publicaciones (Livewire).
- Comentarios en publicaciones.
- Sistema de seguimiento entre usuarios (seguir/dejar de seguir).

## Stack tecnológico

- **Backend:** PHP 8.2+, Laravel 11
- **Frontend:** Blade, Tailwind CSS, Vite
- **Interactividad:** Livewire 3
- **Carga de archivos:** Dropzone
- **Procesamiento de imágenes:** Intervention Image
- **Base de datos:** MySQL (por defecto en Docker Sail)
- **Contenedores (opcional):** Laravel Sail (Docker)

## Requisitos

### Opción A: entorno local

- PHP 8.2+
- Composer
- Node.js 18+ y npm
- MySQL 8+

### Opción B: entorno con Docker

- Docker + Docker Compose
- Composer (para instalar dependencias inicialmente)

## Instalación y ejecución (local)

1. Clona el repositorio.
2. Instala dependencias de PHP:

   ```bash
   composer install
   ```

3. Crea el archivo de entorno:

   ```bash
   cp .env.example .env
   ```

4. Genera la clave de aplicación:

   ```bash
   php artisan key:generate
   ```

5. Configura las variables de base de datos en `.env` (`DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).
6. Ejecuta migraciones:

   ```bash
   php artisan migrate
   ```

7. Instala dependencias de frontend:

   ```bash
   npm install
   ```

8. Compila assets:

   ```bash
   npm run build
   ```

   > Durante desarrollo puedes usar `npm run dev` en otra terminal.

9. Levanta el servidor local:

   ```bash
   php artisan serve
   ```

10. Abre la app en `http://127.0.0.1:8000`.

## Instalación y ejecución con Laravel Sail (Docker)

1. Instala dependencias:

   ```bash
   composer install
   ```

2. Crea `.env` y genera clave:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. Levanta contenedores:

   ```bash
   ./vendor/bin/sail up -d
   ```

4. Ejecuta migraciones dentro del contenedor:

   ```bash
   ./vendor/bin/sail artisan migrate
   ```

5. Instala y compila frontend:

   ```bash
   ./vendor/bin/sail npm install
   ./vendor/bin/sail npm run build
   ```

6. Accede a la aplicación en el puerto configurado (`APP_PORT`, por defecto `80`).

## Comandos útiles

- Ejecutar pruebas:

  ```bash
  php artisan test
  ```

- Ejecutar linter de código PHP (Laravel Pint):

  ```bash
  ./vendor/bin/pint
  ```

- Compilar frontend para producción:

  ```bash
  npm run build
  ```

## Estructura funcional (resumen)

- `routes/web.php`: rutas principales (auth, posts, likes, comentarios, follows, perfil).
- `app/Http/Controllers`: lógica HTTP de autenticación, publicaciones, perfil y social features.
- `resources/views`: vistas Blade.
- `app/Livewire/LikePost.php`: componente Livewire de likes.
- `resources/js/app.js`: integración de Dropzone para subida de imágenes.

## Notas

- Las imágenes de publicaciones se guardan en `public/uploads`.
- Las imágenes de perfil se guardan en `public/perfiles`.
- Si cambias variables de entorno, limpia cachés de configuración:

  ```bash
  php artisan config:clear
  php artisan cache:clear
  ```

---

